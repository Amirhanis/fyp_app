@extends('layouts.app')

@section('content')


  <div class="amazing-deals">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading text-center">
            <h2>Reservation Lists</h2>
            <p>Below is all the booking lists</p>
          </div>
        </div>
        
        @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
        @endif

        @if (session()->has('delete'))
                    <div class="alert alert-success">
                        {{ session()->get('delete') }}
                    </div>
        @endif

        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Number of Guests</th>
            <th scope="col">Check in Date</th>
            <th scope="col">Destination</th>
            <th scope="col">Price (RM)</th>
            <th scope="col">Status</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>

        @foreach ($bookings as $booking)
            <tr>
                <th scope="row">{{ $booking->id }}</th>
                <td>{{ $booking->name }}</td>
                <td>{{ $booking->no_guests }}</td>
                <td>{{ $booking->check_in_date }}</td>
                <td>{{ $booking->destination }}</td>
                <td>{{ $booking->price }}</td>
                <td>{{ $booking->status }}</td>
                <td><a href="{{ route('user.editbookings', $booking->id) }}" class="btn btn-warning  text-center ">update</a></td>
                <td><a href="{{ route('user.deletebookings', $booking->id) }}" class="btn btn-danger  text-center ">delete</a></td>
            </tr>
        @endforeach
            
        </tbody>
        </table>
       
      </div>
    </div>
  </div>
@endsection