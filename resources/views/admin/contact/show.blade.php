@extends('layouts.app')
@section('content')
@section('title','Show Contact')
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
                  <h4 class="card-title ">Show  Contact</h4>
                  <p class="card-Item"> {{$contact->subject}}</p>
                </div>
         
	<div class="card-body">
		<div class="row">
			<div class="col-md-12">
		<strong>Name: {{ $contact->name }}</strong><br>
				
			<b>Email:{{$contact->email}}</b><br>
				<b> subject:{{$contact->subject}}</b><br>
				<strong>Message:
					<br>{{$contact->message}}</strong>
			
			</div>
			 </div>
			 <br>
			 <a href="{{route('contact.index')}}" class="btn btn-info">Back</a>
				 
	
                </div>
              </div>
            </div>
           
          </div>
        </div>
   


@push('scripts')
@endpush
@endsection