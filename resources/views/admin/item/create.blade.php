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
                  <h4 class="card-title ">Add  Item</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
         
	<div class="card-body">
         <form action="{{route('item.store')}}" method="post" enctype="multipart/form-data" >
			 {{csrf_field()}}
			<div class="form-group">
				<label for="name">Name</label>
					<input class="form-control" name="name">
			 </div>
			<div class="form-group">
				<label for="description">description</label>
					<input class="form-control" name="description">
			 </div>
			 <div class="form-group">
				<label for="price">price</label>
					<input class="form-control" name="price">
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
				<input class=" btn btn-primary" type="submit" value="Add Item">	  
					</form>
                </div>
              </div>
            </div>
           
          </div>
        </div>



@push('scripts')
@endpush
@endsection