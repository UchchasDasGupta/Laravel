@extends('layouts.admin_master')

@section('admin_content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Brand
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


                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">SL No</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Brand Image</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                       
                            {{--@php($i=1)--}}
                            @foreach ($brands as $item)
                            
                            <tr>
                                {{--<th scope="row">{{$i++}}</th>--}}
                                <th scope="row">{{$brands->firstItem()+$loop->index}}</th>
                                <td>{{$item->brand_name}}</td>
                                <td>
                                <img src="{{ asset($item->brand_image) }}" style="height:60px; width:80px;" 
                                alt="Brand Image">
                                </td>
                                <td>
                                    @if($item->created_at == NULL)
                                    <span class="text-danger">No Time Set</span>
                                    @else
                                    {{$item->created_at->diffForHumans()}}
                                    @endif
                                </td>
                                <td>
                                <a href="{{ url('Brand/Edit/'.$item->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('Brand/Delete/'.$item->id) }}" onclick="return confirm('Are you sure to Delete?')" 
                                class="btn btn-danger">Delete</a>
                            </td>

                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                                {{$brands->links()}}
                </div>
            </div>
        </div>


            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add Brand
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




                        <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputEmail1">Brand Name</label>
                              <input type="text" name="brand_name" class="form-control @error('brand_name') is-invalid @enderror" 
                              id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand Name">
                           
                              @error('brand_name')
                            <span class="text-danger">{{ $message }}</span>   
                              @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Brand Image</label>
                                <input type="file" name="brand_image" class="form-control @error('brand_image') is-invalid @enderror" 
                                id="exampleInputEmail1" aria-describedby="emailHelp" >
                             
                                @error('brand_image')
                              <span class="text-danger">{{ $message }}</span>   
                                @enderror
                              </div>
                            
                            <button type="submit" class="btn btn-primary">Add</button>
                          </form>
                        



                    </div>
                </div>
            </div>
    </div>
</div>
@endsection