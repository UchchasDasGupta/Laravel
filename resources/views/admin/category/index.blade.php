@extends('layouts.admin_master')

@section('admin_content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Category
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
                            <th scope="col">Added By</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                       
                            {{--@php($i=1)--}}
                            @foreach ($category as $item)
                            
                            <tr>
                                {{--<th scope="row">{{$i++}}</th>--}}
                                <th scope="row">{{$category->firstItem()+$loop->index}}</th>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->category_name}}</td>
                                <td>
                                    @if($item->created_at == NULL)
                                    <span class="text-danger">No Time Set</span>
                                    @else
                                    {{$item->created_at->diffForHumans()}}
                                    @endif
                                </td>
                                <td>
                                <a href="{{ url('Category/Edit/'.$item->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('softdelete/category/'.$item->id) }}" class="btn btn-danger">Delete</a>
                            </td>

                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                                {{$category->links()}}
                </div>
            </div>
        </div>


            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add Category
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




                        <form action="{{ route('store.category') }}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputEmail1">Add Category</label>
                              <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" 
                              id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">
                           
                              @error('category_name')
                            <span class="text-danger">{{ $message }}</span>   
                              @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Add</button>
                          </form>
                        



                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Trash List
                    </div>
                
                    <div class="card-body">
                        {{--@if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif 
    
                         {{ __('You are logged in!') }}
                        
                        --}}
    
    
                       {{-- @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              @endif
    --}}
    
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">SL No</th>
                                <th scope="col">Added By</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                           
                                {{--@php($i=1)--}}
                                @foreach ($trash as $item)
                                
                                <tr>
                                    {{--<th scope="row">{{$i++}}</th>--}}
                                    <th scope="row">{{$category->firstItem()+$loop->index}}</th>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->category_name}}</td>
                                    <td>
                                        @if($item->created_at == NULL)
                                        <span class="text-danger">No Time Set</span>
                                        @else
                                        {{$item->created_at->diffForHumans()}}
                                        @endif
                                    </td>
                                    <td>
                                    <a href="{{ url('Category/restore/'.$item->id) }}" class="btn btn-primary">Restore</a>
                                    <a href="{{ url('pdelete/category/'.$item->id) }}" class="btn btn-danger">Permanent Delete</a>
                                    </td>
    
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                                    {{$trash->links()}}
                    </div>
                </div>
            </div>

            <div class="col-md-4"></div>
    </div>
</div>
@endsection