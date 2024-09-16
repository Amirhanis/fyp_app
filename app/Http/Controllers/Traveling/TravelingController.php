<?php

namespace App\Http\Controllers\Traveling;

use App\Http\Controllers\Controller;
use App\Models\Inquiry\Inquiry;
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

        // Check if the selected date is already booked by the user
        $existingReservation = Reservation::where('destination', $request->destination)
            ->where('check_in_date', $request->check_in_date)
            ->first();

        if ($existingReservation) {
            return view('traveling.reservation', compact('area'))->withErrors(['check_in_date' => 'This date is already booked by others']);
        }

        if ($request->check_in_date > date("Y-m-d")) {
            $totprice = (int)$area->price * $request->no_guests;

            $storeReservations = Reservation::create([
                "name" => $request->name,
                "no_guests" => $request->no_guests,
                "check_in_date" => $request->check_in_date,
                "destination" => $request->destination,
                "price" => $totprice,
                "user_id" => $request->user_id,
                "status" => "pending",
            ]);

            if ($storeReservations) {
                $price = Session::put('price', $area->price * $request->no_guests);
                $newPrice = Session::get('price');
                return Redirect::route('traveling.pay');
            }
        } else if ($request->check_in_date < date("Y-m-d")) {
            return view('traveling.reservation', compact('area'))->withErrors(['check_in_date' => 'Please choose a date greater than today\'s date']);
        }
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

    public function report() {

        $reservationsCount = Reservation::select()->count();
        $reservationOne = Reservation::select()->where('destination', 'Homestay Kinabatangan, Pekan')->count();
        $reservationTwo = Reservation::select()->where('destination', 'Raudhah Homestay, Pulai')->count();
        $reservationThree = Reservation::select()->where('destination', 'Homestay Primabayu, Kuantan')->count();
        $reservationFour = Reservation::select()->where('destination', 'Adam Homestay, Skudai')->count();
        $reservationFive = Reservation::select()->where('destination', 'Selesa Homestay, Sungai Besar')->count();
        $reservationSix = Reservation::select()->where('destination', 'Zamzam Homestay')->count();
        //$statesCount = State::select()->count();
        $areasCount = Area::select()->count();

        return view('traveling.report', compact( 'reservationsCount','reservationOne','reservationTwo','reservationThree','reservationFour','reservationFive','reservationSix', 'areasCount'));

    }

    public function allInquiry() {
        if (Auth::user()->role == 'owner') {
            $inquiries = Inquiry::orderBy('id', 'asc')->get();
        } else {
            $inquiries = Inquiry::where('user_id', Auth::user()->id)
                ->orderBy('id', 'asc')->get();
        }

        return view('traveling.inquiry', compact('inquiries'));
    }
    public function addInquiry()
    {
        $areas = Area::all();
        return view('user.addInquiry', compact('areas'));
    }

    public function storeInquiry(Request $request)
    {
        $inquiry = Inquiry::create([
            "name" => $request->name,
            "destination" => (string)$request->destination,
            "type" => (string)$request->type,
            "description" => $request->description,
            "user_id" => $request->user_id,
            "status" => $request->status,
        ]);

        if ($inquiry) {
            return redirect()->route('traveling.inquiry')->with('success', 'Inquiry Sent Successfully');
        }
    }

    public function editInquiry($id)
    {
        $inquiry = Inquiry::find($id);

        return view('user.editInquiry', compact('inquiry'));
    }

    public function updateInquiry(Request $request, $id)
    {
        $editinquiry = Inquiry::find($id);

        $editinquiry->update($request->all());

        if ($editinquiry) {
            return redirect()->route('traveling.inquiry')->with('success', 'Inquiry Updated Successfully');
        }
    }

    public function deleteInquiry($id)
    {
        $deleteInquiry = Inquiry::find($id);

        $deleteInquiry->delete();

        if($deleteInquiry){
            return redirect()->route('traveling.inquiry')->with(['delete' => 'Inquiry deleted successfully']);
        }

    }
}
