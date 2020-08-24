@extends('layouts.admin_master')

@section('admin_content')
<div class="container">
    <div class="row justify-content-center mt-3">
       
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Brand
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
    
                        @if ($errors->any())
                     <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                        @endif


                            <form action="{{ url('Brand/Update/'.$edit->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_image" value="{{ $edit->brand_image }}">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Brand Name</label>
                              <input type="text" name="brand_name" class="form-control @error('brand_name') is-invalid @enderror" 
                            id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $edit->brand_name }}">
                           
                              @error('brand_name')
                            <span class="text-danger">{{ $message }}</span>   
                              @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Brand Image</label>
                                <input type="file" name="brand_image" class="form-control @error('brand_image') is-invalid @enderror" 
                              id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $edit->brand_image }}">
                             
                                @error('brand_image')
                              <span class="text-danger">{{ $message }}</span>   
                                @enderror
                              </div>

                            <div class="form-group">
                              <img src="{{ asset($edit->brand_image) }}" style="height:60px; width:80px;" 
                                alt="Brand Image">
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                          </form>
                        
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection