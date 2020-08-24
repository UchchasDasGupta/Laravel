@extends('layouts.admin_master')

@section('admin_content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Profile
                </div>
            
                <div class="card-body">
                    {{--@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif 

                     {{ __('You are logged in!') }}
                    
                    --}}


                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          @endif

                        <form action="{{ route('update.user')}}" method="POST">
                        @csrf
                          <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                         
                            @error('name')
                          <span class="text-danger">{{ $message }}</span>   
                            @enderror
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
                         
                            @error('email')
                          <span class="text-danger">{{ $message }}</span>   
                            @enderror
                          </div>

                          <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                        </form>
                </div>
            </div>
        </div>


            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                <img src="{{ asset('image/u1.jpg') }}" height="280px"; width="20px"; class="card-img-top" alt="Profile Picture">
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">Email :- <small>{{ Auth::User()->email }}</small></li>
                    <li class="list-group-item"><a href="{{ route('change.password') }}" >Change Password</a></li>  
                    <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                  </div>
            </div>
    </div>
</div>
@endsection