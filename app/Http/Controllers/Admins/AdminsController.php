<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Reservation\Reservation;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Area;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;

class AdminsController extends Controller
{
    //

    public function viewlogin()
    {
        return view('admins.login');
    }

    public function checklogin(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            
            return redirect() ->route('admins.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);    
    
    }

    public function index()
    {

        $statesCount = State::select()->count();
        $areasCount = Area::select()->count();
        $adminsCount = Admin::select()->count();

        return view('admins.index', compact('statesCount', 'areasCount', 'adminsCount'));
    }

    public function allAdmins()
    {

        $alladmins = Admin::select()->orderBy('id', 'asc')->get();

        return view('admins.alladmins', compact('alladmins'));
    }
    
    public function addadmins()
    {

        $alladmins = Admin::select()->orderBy('id', 'desc')->get();

        return view('admins.addadmins');
    }

    public function storeadmins(Request $request)
    {

        $storeadmins = Admin::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        if($storeadmins){
            return Redirect::route('admins.all.admins')->with(['success' => 'Admin created successfully']);
        }

    }

    public function allstates()
    {

        $allareas = Area::select()->orderBy('id', 'asc')->get();

        return view('admins.allstates', compact('allareas'));
    }
    
    public function createstates()
    {

        return view('admins.createstates');
    }

    public function storestates(Request $request)
    {
        $destination = 'assets/images';
        $imageori = $request->image->getClientOriginalName();
        $request->image->move(public_path($destination), $imageori);
        
        $storestates = Area::create([
            "name" => $request->name,
            "price" => $request->price,
            "num_days" => $request->num_days,
            "country_id" => $request->country_id,
            "image" => $imageori,
            
        ]);

        if($storestates){
            return Redirect::route('all.states')->with(['success' => 'Homestay created successfully']);
        }

    }

    public function deletestates($id)
    {

        $deletestates = Area::find($id);
        $deletestates->delete();

        if($deletestates){
            return Redirect::route('all.states')->with(['delete' => 'Homestay deleted successfully']);
        }
    }

    public function allBookings()
    {

        $bookings = Reservation::select()->orderBy('id', 'asc')->get();

        return view('admins.allbookings', compact('bookings'));
    }

    public function editBookings($id)
    {

        $booking = Reservation::find($id);

        return view('admins.editbooking', compact('booking'));
    }

    public function updateBookings(request $request, $id)
    {

        $editbooking = Reservation::find($id);

        $editbooking->update($request->all());

        if($editbooking){

            return Redirect::route('all.bookings')->with(['delete' => 'Booking updated successfully']);
        }
    }

    public function deleteBookings($id)
    {
        $deleteBooking = Reservation::find($id);


        $deleteBooking->delete();

        if($deleteBooking){
            return Redirect::route('all.bookings')->with(['delete' => 'Booking deleted successfully']);
        }
        
    }
}
