<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation\Reservation;
use Auth;
class UsersController extends Controller
{
    //

    public function bookings()
    {
        if (Auth::user()->role == 'owner') {
            $bookings = Reservation::orderBy('id', 'asc')->get();
        } else {
            $bookings = Reservation::where('user_id', Auth::user()->id)
                ->orderBy('id', 'asc')->get();
        }

        return view('user.bookings', compact('bookings'));
    }

    public function editbookings($id)
    {
        $bookings = Reservation::find($id);

        return view('user.editbookings', compact('bookings'));
    }

    public function updatebookings(Request $request, $id)
    {
        $bookings = Reservation::find($id);

        // Check if the selected date is already booked by the user
        $existingReservation = Reservation::where('destination', $bookings->destination)
            ->where('check_in_date', $request->check_in_date)
            ->first();

        if ($existingReservation) {
            return view('user.editbookings', compact('bookings'))->withErrors(['check_in_date' => 'This date is already booked by others']);
        }

        else{
            
            $bookings->no_guests = $request->no_guests;
            $bookings->check_in_date = $request->check_in_date;
            $bookings->save();

            
            return redirect()->route('user.bookings')->with('success', 'Booking Updated Successfully');
        }

    }

    public function deleteBookings($id)
    {
        $deleteBooking = Reservation::find($id);


        $deleteBooking->delete();

        if($deleteBooking){
            return redirect()->route('user.bookings')->with(['delete' => 'Booking deleted successfully']);
        }
        
    }
    
}
