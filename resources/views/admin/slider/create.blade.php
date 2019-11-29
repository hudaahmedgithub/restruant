@extends('layouts.app')
@section('content')
@section('title','Slider')
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
                  <h4 class="card-title ">Add  Slider</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
         
	<div class="card-body">
         <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
			 {{csrf_field()}}
			<div class="form-group">
				<label for="title">Title</label>
					<input class="form-control" name="title">
					  </div>
			<div class="form-group">
				<label for="sub_title">Sub Title</label>
					<input class="form-control" name="sub_title">
			 </div>
			 <div class="row">
				<label class="control-label">Image</label>
					<input name="image" type="file">
			 </div>
			 <br>
			 <a href="{{route('slider.index')}}" class="btn btn-warning">Back</a>
				<input class=" btn btn-primary" type="submit" value="Add Slider">	  
					</form>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>


@push('scripts')
@endpush
@endsection