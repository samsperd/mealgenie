<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\Restaurant;
use App\Food;
use App\Addon;
use App\Order;
use App\Toggle;
use App\Coupon;
use App\Advert;


class OperationsController extends Controller
{
    public function schoolIndex() {
        return response()->json([

            'schools' => School::where('status', '=', 'OPEN')->get(),
            'toggle' => Toggle::find(1)

        ]);
    }
    public function selectSchool(Request $request) {
        $school = School::findBySlug($request->get('locator'));
        $request->session()->put('university', $school);
        $request->session()->save();

        return response()->json(url('/'));
    }
    public function getRestaurants(Request $request, $slug) {
        $school = School::findBySlug($slug);
        $toggle = Toggle::find(1);
        if (auth()->check()) {
            $myRequests = Order::where('author_id', auth()->user()->id)->where('status', '!=','COMPLETED')->where('status', '!=','OPENED')->latest()->get();
        
        }
        else {
            $myRequests = '';
        }
        if ($school->status == 'CLOSE' ) {
            return response()->json(['sch' => 'no', 'resquest' => $myRequests, 'toggle' => $toggle]);
            
        } else {
            $restaurants = $school->restaurants()->where('status', '=', 'OPEN')->get();
            return response()->json(['cafetarias' => $restaurants, 'resquest' => $myRequests, 'toggle' => $toggle]);
        }
    }
    public function getRequests(Request $request) {
        $toggle = Toggle::find(1);
        if (auth()->check()) {
            $myRequests = Order::where('author_id', auth()->user()->id)->whereIn('status', ['ACCEPTED','REQUESTED'])->latest()->get();
        
        }
        else {
            $myRequests = '';
        }
        return response()->json(['resquest' => $myRequests, 'toggle' => $toggle]);
    }    
    public function getWorkerHomes(Request $request, $slug) {
        $school = School::findBySlug($slug);
        $toggle = Toggle::find(1);
        if (auth()->check()) {
            $myRequests = Order::where('status', '!=','COMPLETED')->count();
            $myRestaurants = Restaurant::all();
        
        }
        else {
            $myRequests = '';
        }
        return response()->json(['cafetarias' => $myRestaurants, 'resquest' => $myRequests, 'toggle' => $toggle]);
    }
    public function getWorkerHome(Request $request, $slug) {
        $school = School::findBySlug($slug);
        $toggle = Toggle::find(1);
        if (auth()->check()) {
            $myRequests = Order::where('status', '!=','COMPLETED')->latest()->get();
        
        }
        else {
            $myRequests = '';
        }
        if ($school->status == 'CLOSE' ) {
            return response()->json(['sch' => 'no', 'resquest' => $myRequests, 'toggle' => $toggle]);
            
        } else {
            $restaurants = $school->restaurants()->get();
            return response()->json(['cafetarias' => $restaurants, 'resquest' => $myRequests, 'toggle' => $toggle]);
        }
    }
    public function getFoods(Request $request, $slug) {
        $school = School::findBySlug($request->get('schoolslug'));
        $toggle = Toggle::find(1);
        if ($school->status == 'CLOSE' ) {
            return response()->json(['sch' => 'no', 'toggle' => $toggle]);
            
        } else {
            $restaurant = $school->restaurants()->where('status', '=', 'OPEN')->where('slug', '=', $slug)->first();
            $foods = Food::where('status', '=', 'ACTIVATE')->where('restaurant_id', '=', $restaurant->id)->with('foodcategories')->get();
            $addons = Addon::where('status', '=', 'ACTIVATE')->where('restaurant_id', '=', $restaurant->id)->with('food')->with('category')->get();
            // $advert = Advert::where('')

            return response()->json(['sch' => $foods, 'res' => $restaurant, 'add' => $addons, 'toggle' => $toggle]);
        }
    }
    public function getWorkerMenu(Request $request, $slug) {
        $school = School::findBySlug($request->get('schoolslug'));
        if ($school->status == 'CLOSE' ) {
            return response()->json(['sch' => 'no']);
            
        } else {
            $restaurant = $school->restaurants()->where('slug', '=', $slug)->first();
            $foods = Food::where('restaurant_id', '=', $restaurant->id)->with('foodcategories')->get();
            $addons = Addon::where('restaurant_id', '=', $restaurant->id)->with('food')->with('category')->get();
            
            return response()->json(['sch' => $foods, 'res' => $restaurant, 'add' => $addons]);
        }
    } 
    public function historyTab() {
        $historyTabs = Order::where('author_id', '=', auth()->user()->id)->where('status', '=','COMPLETED')->orderBy('updated_at', 'DESC')->get();
        if($historyTabs == null) {
            return response()->json(['historyt' => null]);
        } else {
            return response()->json(['historyt' => $historyTabs]);
        }
    }
    public function workerHistory() {
        $historyTabs = Order::where('status', '=','COMPLETED')->orderBy('updated_at', 'DESC')->get();
        if($historyTabs == null) {
            return response()->json(['historyt' => null]);
        } else {
            return response()->json(['historyt' => $historyTabs]);
        }
    }
    public function addToCart(Request $request) {
        $getMain = $request->get('dd');
        $newOrder = new Order;
        $newOrder->author_id = $request->get('dc');
        $newOrder->user_name = $request->get('ds');
        $newOrder->phone_number = $request->get('db');
        $newOrder->cafetaria = $getMain['whichcaf'];
        $newOrder->cafetaria_id = $getMain['cafid'];
        $newOrder->location = $getMain['locatedat'];
        if ($getMain['couponcode'] != '') {
            $newOrder->beforecoupon = $getMain['beforecouponed'];
            $newOrder->couponused = $getMain['couponcode'];
        }
        $newOrder->babename = $getMain['babename'];
        $newOrder->babename = $getMain['babename'];
        $newOrder->babenumber = $getMain['babenumber'];
        $newOrder->sub_total = $getMain['allfamount'];
        $newOrder->total_amount = $getMain['allttamount'];
        $newOrder->items = json_encode($getMain['foods_ordered']);
        $newOrder->save();
            
        return response()->json(['sch' => $newOrder->id]);
    }
    public function payed(Request $request) {
        $order = Order::find($request->get('id'));
        $order->status = 'REQUESTED';
        $order->save();
        return response()->json(['sch' => 'yes']);
    }
    public function toggleRestaurant(Request $request) {
        $restaurant = Restaurant::find($request->get('id'));
        if ($restaurant->status == "OPEN") {
            $restaurant->status = "CLOSE";
        } else if ($restaurant->status == "CLOSE") {
            $restaurant->status = "OPEN";
        }
        $restaurant->save();
        return response()->json(['sch' => 'yes']);
    }    
    public function toggleFood(Request $request) {
        $restaurant = Food::find($request->get('id'));
        if ($restaurant->status == "ACTIVATE") {
            $restaurant->status = "DEACTIVATE";
        } else if ($restaurant->status == "DEACTIVATE") {
            $restaurant->status = "ACTIVATE";
        }
        $restaurant->save();
        return response()->json(['sch' => 'yes']);
    }    
    public function toggleAddon(Request $request) {
        $restaurant = Addon::find($request->get('id'));
        if ($restaurant->status == "ACTIVATE") {
            $restaurant->status = "DEACTIVATE";
        } else if ($restaurant->status == "DEACTIVATE") {
            $restaurant->status = "ACTIVATE";
        }
        $restaurant->save();
        return response()->json(['sch' => 'yes']);
    }    
    public function toggle() {
        $restaurant = Toggle::find(1);
        if ($restaurant->toggle == "0") {
            $restaurant->toggle = "1";
        } else if ($restaurant->toggle == "1") {
            $restaurant->toggle = "0";
        }
        $restaurant->save();
        return response()->json(['sch' => 'yes']);
    }    
    public function toggleAccept(Request $request) {
        $restaurant = Order::find($request->get('id'));
            $restaurant->status = "ACCEPTED";

        $restaurant->save();
        return response()->json(['sch' => 'yes']);
    }    
    public function toggleComplete(Request $request) {
        $restaurant = Order::find($request->get('id'));
            $restaurant->status = "COMPLETED";
        $restaurant->save();
        return response()->json(['sch' => 'yes']);
    }
    public function couponGet(Request $request) {
        $code = $request->get('code');
        $coupon = Coupon::findByCode($code);
        $msg = 1;
        if($coupon != null) {
            if ($coupon->status == 'ACTIVATE') {
                $msg = $coupon;
            }
        }
        return response()->json(['coupon' => $msg]);
    }
    public function coupons() {
        $coupons = Coupon::where('status', '=', 'ACTIVATE')->get();
        return response()->json(['coupons' => $coupons]);
    }
    public function toggleValue() {
        $toggle = Toggle::find(1);
        return response()->json(['toggle' => $toggle]);
    }    
}
