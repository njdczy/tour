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
    public function index($id)
    {
        $trip = Trip::findOrFail($id);
        $trip_lists = TripList::where('trip_id', $trip->id)
            ->whereDate('date_start', '>', date('Y-m-d'))
            ->get();
        $trip_lists = $trip_lists->each(function ($trip_list, $key) {

            $trip_list->date_start = Carbon::parse($trip_list->date_start);;
            $trip_list->date_end = Carbon::parse($trip_list->date_end);;
        });

        return view("wechat.form.form", compact('trip', 'trip_lists'));
    }


    public function store($id, FormRequest $request)
    {
        //children
        //$child_ids = $request->input('child_id.*');
        $inputChilds = $request->input('inputChild.*');
        $inputIDs = $request->input('inputID.*');
        $inputHeights = $request->input('inputHeight.*');
        $inputWeights = $request->input('inputWeight.*');
        $inputSchools = $request->input('inputSchool.*');

        $is_bed = $request->input('is_bed');

        foreach ($inputChilds as $key => $value) {
            $child = Child::firstOrNew(['card' => $inputIDs[$key]]);

            $child->name = $inputChilds[$key];
            $child->height = $inputHeights[$key];
            $child->weight = $inputWeights[$key];
            $child->school = $inputSchools[$key];
            $child->user_id = 1;

            //$child->save();
            $child_arr[$key] =  $child->toArray();
            $child_arr[$key]['is_bed'] = $is_bed;
        }

//        if ($child_ids) {
//            foreach ($child_ids as $key => $value) {
//                $child = Child::findOrFail($value);
//                $child->name = $inputChilds[$key];
//                $child->card = $inputIDs[$key];
//                $child->height = $inputHeights[$key];
//                $child->weight = $inputWeights[$key];
//                $child->school = $inputSchools[$key];
//                $child->save();
//            }
//        } else {
//            foreach ($inputChilds as $key => $value) {
//
//                $child = new Child;
//                $child->name = $inputChilds[$key];
//                $child->card = $inputIDs[$key];
//                $child->height = $inputHeights[$key];
//                $child->weight = $inputWeights[$key];
//                $child->school = $inputSchools[$key];
//                $child->user_id = \Auth::id();
//                $child->save();
//            }
//        }

        //user
        $user = User::findOrFail(1);
        $user->name = $user->real_name = $request->input('inputParent');
        $user->phone_number = $request->input('inputTel');
        $user->address = $request->input('inputAddress');
        $user->email = $request->input('inputEmail');
        //$user->save();

        //order
        $trip_list = TripList::findOrFail($id);
        $trip = Trip::findOrFail($trip_list->trip_id);
        $order = new Order;

        $order->trip_id = $trip->id;
        $order->trip_name = $trip->name;
        $order->triplist_id = $id;
        $order->triplist_name = $trip_list->times;

        $order->user_id = 1;
        $order->user_name = $user->name;

        $order->child_info = serialize($child_arr);
        $order->total = 0.00;

        $order->save();
    }

}
