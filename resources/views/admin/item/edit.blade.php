@extends('layouts.app')
@section('content')
@section('title','Item')
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
                  <h4 class="card-title ">Update  Item</h4>
                  <p class="card-Item"> Here is a subtitle for this table</p>
                </div>
         
	<div class="card-body">
		
         <form action="{{route('item.update',$item->id)}}" method="post" enctype="multipart/form-data">
			 {{csrf_field()}}
			 @method('put')
			<div class="form-group">
				<label for="name">Name</label>
					<input class="form-control" name="name" value="{{ $item->name }}">
					  </div>
			<div class="form-group">
				<label for="description">Description</label>
					<input class="form-control" name="description" value="{{$item->description}}">
			 </div>
			 <div class="form-group">
				<label for="price">Price</label>
					<input class="form-control" name="price" value="{{$item->price}}">
			 </div>
			 <div class="row">
				<label class="control-label">Image</label>
					<input name="image" type="file">
			 </div>
			 <div class="form-group">
				<label for="category_id">category name</label>
				 <select class="form-control" name="category_id">
				 @foreach($categories as $cat)
				 <option value="{{$cat->id}}">{{$cat->name}}</option>
					 @endforeach
				 </select>
					
			 </div>
			 <br>
			 <a href="{{route('item.index')}}" class="btn btn-warning">Back</a>
				<input class=" btn btn-primary" type="submit" value="Update item">	  
					</form>
	
                </div>
              </div>
            </div>
           
          </div>
        </div>
   


@push('scripts')
@endpush
@endsection