<?php

namespace App\Http\Controllers;


use App\Http\Requests\FormRequest;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Trip;
use App\TripList;
use App\User;
use App\Child;
use App\Parcent;
use App\Order;

class FromController extends Controller
{

    public function index($id,Request $request)
    {
        $trip = Trip::findOrFail($id);
        $trip_lists = TripList::where('trip_id', $trip->id)
            ->whereDate('date_start', '>', date('Y-m-d'))
            ->get();
        $trip_lists = $trip_lists->each(function ($trip_list, $key) use ($trip) {
            if($trip_list->parcent_price != 0){
                $trip->need_parcent = 1;
            }else{
                $trip->need_parcent = 0;
            }
            if($trip_list->child_price_bed != 0){
                $trip->need_bed = 1;
            }else{
                $trip->need_bed = 0;
            }
            $trip_list->date_start = Carbon::parse($trip_list->date_start);
            $trip_list->date_end = Carbon::parse($trip_list->date_end);
        });
        $user = User::find(session('user_id'));
        if (!empty($user)){
            return view("wechat.form.form", compact('trip', 'trip_lists','user'));
        }
        return view("wechat.form.form", compact('trip', 'trip_lists','user'));
    }


    public function store(FormRequest $request)
    {
        //children
        $inputChilds = $request->input('inputChild.*');
        $inputIDs = $request->input('inputID.*');
        $inputHeights = $request->input('inputHeight.*');
        $inputWeights = $request->input('inputWeight.*');
        $inputSchools = $request->input('inputSchool.*');

        $is_bed = $request->input('is_bed',0);
        foreach ($inputChilds as $key => $value) {
            $child = Child::firstOrNew(['card' => $inputIDs[$key]]);

            $child->name = $inputChilds[$key];
            $child->height = $inputHeights[$key];
            $child->weight = $inputWeights[$key];
            $child->school = $inputSchools[$key];
            $child->user_id = session('user_id');

            $child->save();
            $child_arr[$key] =  $child->toArray();
            $child_arr[$key]['is_bed'] = $is_bed;
        }
        $order = new Order;
        //parcent
        $inputParents = $request->input('inputParent.*');
        $inputTels = $request->input('inputTel.*');
        foreach ($inputParents as $key => $value) {
            if ($key == 0) {
                //user
                $user = User::find(session('user_id'));
                if (!$user->real_name){
                    $user->name = $user->real_name = $inputParents[$key];
                    $user->phone_number = $inputTels[$key];
                    $user->save();
                }
                $order->mobile =  $inputTels[$key];
            }
            $parcent = Parcent::firstOrNew(['user_id' => session('user_id') , 'phone_number' => $inputTels[$key]]);
            $parcent->name = $inputParents[$key];
            $parcent->phone_number = $inputTels[$key];
            $parcent->user_id = session('user_id');
            $parcent->save();
            $parcent_arr[$key] =  $parcent->toArray();
        }
        //order
        $trip_list = TripList::findOrFail($request->input('Date'));
        $trip = Trip::findOrFail($trip_list->trip_id);



        $order->enjoin =  $request->input('inputEnjoin');
        $order->is_bed =  $is_bed;

        $order->trip_id = $trip->id;
        $order->trip_name = $trip->name;
        $order->triplist_id = $trip_list->id;
        $order->triplist_name = $trip_list->times;

        $order->user_id = session('user_id');
        $order->user_name = $user->name;

        $order->child_info = serialize($child_arr);
        $order->parcent_info = serialize($parcent_arr);
        $child_num = count($inputIDs);
        $parcent_num = count($inputParents);
        if ($is_bed) {
            $price = ((int)$trip_list->parcent_price * $parcent_num) + ((int)$trip_list->child_price_bed * $child_num);
        }else {

            $price = ((int)$trip_list->parcent_price * $parcent_num) + ((int)$trip_list->child_price * $child_num);
        }
        $order->need_total = $price;
        $order->total = 0.00;

        $order->save();
        session(['order_id' => $order->id]);
        return view("wechat.pay");
        return redirect('/pay');
    }

}
