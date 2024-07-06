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
              <h5 class="card-title mb-4 d-inline">States</h5>
             <a  href="{{ route('create.states') }}" class="btn btn-primary mb-4 text-center float-right">Create States</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">continent</th>
                    <th scope="col">population</th>
                    <th scope="col">territory</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>

                @foreach ($allstates as $state)
                  <tr>
                    <th scope="row">{{ $state->id }}</th>
                    <td>{{ $state->name }}</td>
                    <td>{{ $state->continent }}</td>
                    <td>{{ $state->population }}</td>
                    <td>{{ $state->territory }}</td>
                    <td><a href="delete-country.html" class="btn btn-danger  text-center ">Delete</a></td>
                  </tr>
                @endforeach
                  
                  
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

@endsection