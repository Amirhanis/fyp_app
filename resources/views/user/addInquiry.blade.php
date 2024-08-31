@extends('layouts.app')
@section('content')

<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Add Inquiry</h5>
          <form method="POST" action="{{ route('store.inquiry') }}" enctype="multipart/form-data">
                <!-- Email input -->
                 @csrf

                 <input type="hidden" value="{{ auth()->user()->id }}" name="user_id" class="user_id" required>
                <div class="form-outline mb-4 mt-4">
                  <label>Homestay Name:</label>
                  <input type="hidden" value="{{ Auth::user()->name }}" name="name" class="Name" required>
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                    <label><p>Destination:</p></label>
                    <select name="destination" id="form2Example1" class="form-control">
                        @foreach($areas as $area)
                            <option value="{{ $area->name }}">{{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-outline mb-4 mt-4">
                  <label><p>Type:</p></label>
                  <select name="type" id="form2Example1" class="form-control">
                    <option value="Medical">Medical</option>
                    <option value="Facilities">Facilities</option>
                    <option value="Meal">Meal</option>
                    </select>                 
                </div> 
                 <div class="form-outline mb-4 mt-4">
                  <label><p>Description:</p></label>
                  <input type="text" name="description" id="form2Example1" class="form-control" placeholder="description" />
                </div>  
                <div class="form-outline mb-4 mt-4">
                  <label>Status:</label>
                  <input type="hidden" name="status" value="Pending" />
                 
                </div> 
                <!--<div class="form-floating">
                  <textarea name="description" class="form-control" placeholder="description" id="floatingTextarea2" style="height: 100px"></textarea>
                </div>-->
                <br>
      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>

@endsection