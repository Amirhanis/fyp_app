<?php

namespace App\Http\Controllers\Traveling;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Area;
use App\Models\State;
use App\Models\Reservation\Reservation;
use Auth;
use Redirect;
use Session;
class TravelingController extends Controller
{
    //

    public function about($id) {
        
        $areas = Area::select()->orderBy('id', 'desc')->take(5)
        ->where('country_id', $id)->get();

        $state = State::find($id);


        $areasCount = Area::select()->where('country_id', $id)->count();

        return view('traveling.about', compact('areas', 'state', 'areasCount'));
    }

    public function makeReservations($id) {
        

        $area = Area::find($id);


        return view('traveling.reservation', compact('area'));
    }

    public function storeReservations(Request $request, $id) {
        

        $area = Area::find($id);


        if($request->check_in_date > date("Y-m-d")) {
            
            $totprice = (int)$area->price * $request->no_guests;
            
            $storeReservations = Reservation::create([
                "name" => $request->name,
                "phone_no" => $request->phone_no,
                "no_guests" => $request->no_guests,
                "check_in_date" => $request->check_in_date,
                "destination" => $request->destination,
                "price" => $totprice,
                "user_id" => $request->user_id,
            ]);
        

        if($storeReservations){

            $price = Session::put('price', $area->price * $request->no_guests);

            $newPrice = Session::get('price');
            
            return Redirect::route('traveling.pay');
        }

    } else {
        echo "Please choose a date greater than today's date";
    }

        //return view('traveling.reservation', compact('area'));
    }

    public function payWithPaypal() {
        return view('traveling.pay');
    }

    public function success() {

        Session::forget('price');
        return view('traveling.success');

    }
    
    public function deals() {

        $areas = Area::select()->orderBy('id', 'desc')->take(4)->get();
        $states = State::all();
        return view('traveling.deals', compact('areas','states'));

    }
    
    public function searchDeals(Request $request) {

        $country_id = $request->get('country_id');
        $price = $request->get('price');

        $searches = Area::where('country_id', $country_id)
         ->where('price', '<=', $price)->orderBy('id', 'desc')
         ->take(4)
         ->get();


         $states = State::all();
         
        return view('traveling.searchdeals', compact('searches', 'states'));

    }
}
