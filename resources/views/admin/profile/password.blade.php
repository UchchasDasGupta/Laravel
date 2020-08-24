@extends('layouts.admin_master')

@section('admin_content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-danger text-white">Change Password
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

                        <form action="{{ route('update.password')}}" method="POST">
                        @csrf
                          <div class="form-group">
                            <label for="exampleInputEmail1">Old Password</label>
                            <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" 
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Old Password">
                         
                            @if(session('error'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('error')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          @endif

                            @error('old_password')
                          <span class="text-danger">{{ $message }}</span>   
                            @enderror
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">New Password</label>
                            <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" 
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter New Password">
                         
                            @error('new_password')
                          <span class="text-danger">{{ $message }}</span>   
                            @enderror
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" 
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Confirm Password">
                         
                            @if(session('danger'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('danger')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          @endif

                            @error('confirm_password')
                          <span class="text-danger">{{ $message }}</span>   
                            @enderror
                          </div>


                          <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Password</button>
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