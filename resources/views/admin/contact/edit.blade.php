@extends('layouts.app')
@section('content')
@section('title','Contact')
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
                  <h4 class="card-title ">Update  Contact</h4>
                  <p class="card-Item"> Here is a subtitle for this table</p>
                </div>
         
	<div class="card-body">
		
         <form action="{{route('contact.update',$contact->id)}}" method="post" >
			 {{csrf_field()}}
			 @method('put')
			<div class="form-group">
				<label for="name">Name</label>
					<input class="form-control" name="name" value="{{ $item->name }}">
					  </div>
			<div class="form-group">
				<label for="email">Email</label>
					<input class="form-control" name="email" value="{{$contact->email}}">
			 </div>
			 <div class="form-group">
				<label for="subject">subject</label>
					<input class="form-control" name="subject" value="{{$contact->subject}}">
			 </div>
			
			<div class="form-group">
				<label for="message">Message</label>
				<teaxtarea class="form-control" name="message" value="{{$contact->message}}"></teaxtarea>
			 </div>
			 <br>
			 <a href="{{route('contact.index')}}" class="btn btn-warning">Back</a>
				<input class=" btn btn-primary" type="submit" value="Update contact">	  
					</form>
	
                </div>
              </div>
            </div>
           
          </div>
        </div>
   


@push('scripts')
@endpush
@endsection