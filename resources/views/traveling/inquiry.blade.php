@extends('layouts.app')

@section('content')


  <div class="amazing-deals">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading text-center">
            <h2>Inquiry Lists</h2>
            <p>Below is all the inquiry lists</p>
          </div>
        </div>
        @if(Auth::user()->role == 'customer')
        <a  href="{{ route('create.inquiry') }}" class="btn btn-primary mb-4 text-center float-right">Add Inquiry</a>
        @endif
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
            <th scope="col">Destination</th>
            <th scope="col">Type</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            @if(Auth::user()->role == 'owner')
            <th scope="col">Edit</th>
            @endif
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>

        @foreach ($inquiries as $inquiry)
            <tr>
                <th scope="row">{{ $inquiry->id }}</th>
                <td>{{ $inquiry->name }}</td>
                <td>{{ $inquiry->destination }}</td>
                <td>{{ $inquiry->type }}</td>
                <td>{{ $inquiry->description }}</td>
                <td>{{ $inquiry->status }}</td>
                @if(Auth::user()->role == 'owner')
                <td><a href="{{ route('edit.inquiry', $inquiry->id) }}" class="btn btn-warning  text-center ">update</a></td>
                @endif
                <td><a href="{{ route('delete.inquiry', $inquiry->id) }}" class="btn btn-danger  text-center ">delete</a></td>
            </tr>
        @endforeach
            
        </tbody>
        </table>
       
      </div>
    </div>
  </div>
@endsection