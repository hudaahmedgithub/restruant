@extends('layouts.app')
@section('content')
@section('title','Category')
@push('css')

      <div class="content">
        <div class="container-fluid">
			
			@if ($errors->any())
    
        <ul>
            @foreach ($errors->all() as $error)
			
			<div class="alert alert-info" style="margin-right:100px">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      <b> Danger - </b>{{ $error }}</span>
                  </div>
            @endforeach
        </ul>
    </div>
@endif
          <div class="row">
			  
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Update  Category</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
         
	<div class="card-body">
		
         <form action="{{route('category.update',$cat->id)}}" method="post">
			 {{csrf_field()}}
			 @method('put')
			<div class="form-group">
				<label for="name">Name</label>
					<input class="form-control" name="name" value="{{ $cat->name }}">
					  </div>
			<div class="form-group">
				<label for="slug">Slug</label>
					<input class="form-control" name="slug" value="{{$cat->slug}}">
			 </div>
			
			 <br>
			 <a href="{{route('category.index')}}" class="btn btn-warning">Back</a>
				<input class=" btn btn-primary" type="submit" value="Update category">	  
					</form>
	
                </div>
              </div>
            </div>
           
          </div>
        </div>
   


@push('scripts')
@endpush
@endsection