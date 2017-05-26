<?php

namespace App\Http\Controllers;


use App\Http\Requests\FormRequest;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Trip;
use App\TripList;
use App\User;
use App\Child;
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
            if($trip_list->parcent_price){
                $trip->need_parcent = 1;
            }else{
                $trip->need_parcent = 0;
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

        //user

        $inputParents = $request->input('inputParent.*');
        $inputTels = $request->input('inputTel.*');
        foreach ($inputParents as $key => $value) {
            $user = Child::firstOrNew(['user_id' => session('user_id') , 'phone_number' => $inputTels[$key]]);
            $user->name = $user->real_name = $inputParents[$key];
            $user->phone_number = $inputTels[$key];
            $user->user_id = session('user_id');
            $user->save();
        }
        //order
        $trip_list = TripList::findOrFail($request->input('Date'));
        $trip = Trip::findOrFail($trip_list->trip_id);
        $order = new Order;


        $order->enjoin =  $request->input('inputEnjoin');
        $order->is_bed =  $is_bed;

        $order->trip_id = $trip->id;
        $order->trip_name = $trip->name;
        $order->triplist_id = $trip_list->id;
        $order->triplist_name = $trip_list->times;

        $order->user_id = session('user_id');
        $order->user_name = $user->name;

        $order->child_info = serialize($child_arr);
        if ($is_bed) {
            $unit_price = $trip->price + $trip->price_bed;
        }else {
            $unit_price = $trip->price;
        }
        $order->need_total = $unit_price * count($inputIDs);
        $order->total = 0.00;

        $order->save();
        session(['order_id' => $order->id]);
        return redirect('/pay');
    }

}
