@extends('layouts.admin_master')

@section('admin_content')
<div class="container">
    <div class="row justify-content-center mt-3">
    
        <div class="col-md-8">                
            <div class="card-deck">
                @foreach ($images as $item)
                <div class="col-md-4 mt-5">
                <div class="card">
                <img src="{{ asset($item->image) }}" height="300px;" width="300px;" class="card-img-top" alt="Mulltiple Image">
                  <div class="card-body">
                    <p class="card-text"><small class="text-muted">Last updated
                        @if($item->created_at == NULL)
                        <span class="text-danger">No Time Set</span>
                        @else
                        {{$item->created_at->diffForHumans()}}
                        @endif    
                    </small></p>
                    <div>
                    <a href="{{ url('Multi/Image/Delete/'.$item->id) }}" onclick="return confirm('Are you sure to Delete?')" 
                        class="btn btn-danger">Delete</a>
                    </div>
                  </div>
            </div>
                </div>
                @endforeach
              </div>
        </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add Multiple Image
                    </div>
                
                    <div class="card-body">

                        {{--@if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif 
    
                         {{ __('You are logged in!') }}
                        
                        --}}

                       {{-- @if ($errors->any())
                     <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                        @endif --}}


                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              @endif

                        <form action="{{ route('store.image') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Multiple Image</label>
                                <input type="file" name="image[]" class="form-control @error('image') is-invalid @enderror" 
                                id="exampleInputEmail1" aria-describedby="emailHelp" multiple>
                             
                                @error('image')
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