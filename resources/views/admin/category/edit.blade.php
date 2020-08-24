@extends('layouts.admin_master')

@section('admin_content')
<div class="container">
    <div class="row justify-content-center mt-5">
       
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Category
                    </div>
                
                    <div class="card-body">

                        {{--@if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif 
    
                         {{ __('You are logged in!') }}
                        
                        --}}


    
                        @if ($errors->any())
                     <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                        @endif




                            <form action="{{ url('Store/Category/'.$edit->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputEmail1">Update Category</label>
                              <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" 
                            id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $edit->category_name }}">
                           
                              @error('category_name')
                            <span class="text-danger">{{ $message }}</span>   
                              @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Update</button>
                          </form>
                        



                    </div>
                </div>
            </div>
    </div>
</div>
@endsection