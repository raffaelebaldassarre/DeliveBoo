<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Restaurant;
use Illuminate\Support\Facades\DB;

class ChartsController extends Controller
{
    public function index(Request $request)
    {
        $restaurant = Restaurant::where('slug', $request->slug)->first();
        $orders = Order::select(DB::raw('COUNT(*)as count'))
                ->where('restaurant_id', $restaurant->id)
                ->whereYear("created_at", date('Y'))
                ->groupBy(DB::raw('Month(created_at)'))
                ->pluck('count');
        $months = Order::select(DB::raw('Month(created_at) as month'))
                ->whereYear("created_at", date('Y'))
                ->groupBy(DB::raw('Month(created_at)'))
                ->pluck('month');
        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0,0);
        // dd($orders);
        if (count($orders) != 0) {
            foreach ($months as $index => $month) {
                $datas[$month] = $orders[$index];
            }
            array_shift($datas);
        }

        return view('Admin.restaurants.charts', compact('datas'));
    }
}
