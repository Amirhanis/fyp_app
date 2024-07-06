@extends('layouts.admin')
@section('content')

<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Countries</h5>
          <form method="POST" action="{{ route('create.states') }}" enctype="multipart/form-data">
                <!-- Email input -->
                 @csrf
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="file" name="image" id="form2Example1" class="form-control" />
                 
                </div>  
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="continent" id="form2Example1" class="form-control" placeholder="continent" />
                 
                </div> 
                 <div class="form-outline mb-4 mt-4">
                  <input type="text" name="population" id="form2Example1" class="form-control" placeholder="population" />
                 
                </div>  <div class="form-outline mb-4 mt-4">
                  <input type="text" name="territory" id="form2Example1" class="form-control" placeholder="territory" />
                 
                </div> 
                <div class="form-floating">
                  <textarea name="description" class="form-control" placeholder="description" id="floatingTextarea2" style="height: 100px"></textarea>
                </div>
                <br>
      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>

@endsection