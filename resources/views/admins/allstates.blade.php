@extends('layouts.admin')
@section('content')

<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
              <h5 class="card-title mb-4 d-inline">Homestay</h5>
             <a  href="{{ route('create.states') }}" class="btn btn-primary mb-4 text-center float-right">Add Homestay</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">image</th>
                    <th scope="col">price</th>
                    <th scope="col">no. days trip</th>
                    <th scope="col">country id</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>

                @foreach ($allareas as $area)
                  <tr>
                    <th scope="row">{{ $area->id }}</th>
                    <td>{{ $area->name }}</td>
                    <td>{{ $area->image }}</td>
                    <td>{{ $area->price }}</td>
                    <td>{{ $area->num_days }}</td>
                    <td>{{ $area->country_id }}</td>
                    <td><a href="{{ route('delete.states', $area->id) }}" class="btn btn-danger  text-center ">delete</a></td>
                    </tr>
                @endforeach
                  
                  
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

@endsection