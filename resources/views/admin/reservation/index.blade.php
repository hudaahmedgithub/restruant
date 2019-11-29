@extends('layouts.app')
@section('content')
@section('title','Reservations')
@push('css')

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
      <div class="content">
        <div class="container-fluid">
			@if(session('success'))
			<div class="alert alert-info" style="margin-right:100px">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
						<b>Success</b>{{session('success')}}</span>
                  </div>
			@endif
          <div class="row">
            <div class="col-md-12">
				
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Reservations</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Name
                        </th>
						 <th>
                          phone
                        </th>
						 <th>
                          email 
                        </th>
                        <th>
                         message
                        </th>
                         <th>
                          date and time
                        </th>
						  <th>
							  Status
						  </th>
                        <th>
                          Created at
                        </th>
						   <th>
                          Updated at
                        </th>
						    <th>
                          Action
                        </th>
                      </thead>
                      <tbody>
						  @foreach($reservs as $key=>$reserv)
						  
                        <tr>
                          <td>
                           {{$key+1}}
                          </td>
                          <td>
                           {{$reserv->name}}
                          </td>
							<td>
                           {{$reserv->phone}}
                          </td>
                          <td>
                           {{$reserv->email}}
                          </td>
                           <td>
                           {{$reserv->message}}
                          </td>
                          <td>
                           {{$reserv->date_and_time}}
                          </td>
							<td>
				@if($reserv->status==true)
		<span class="btn btn-info">Confirmed</span>
								@else
<span class="btn btn-primary">not confirmed</span>
								@endif
							</td>
							<td>
                           {{$reserv->created_at}}
                          </td>
                          <td>
                           {{$reserv->updated_at}}
                          </td>
						<td>
			
          @if($reserv->status==false)
		<form id="status-form-{{ $reserv->id }}" style="display:none;"  action="{{route('reservation.status',$reserv->id)}}" method="post" >
			{{csrf_field()}}
		
						    </form>
		<button type="button" class="btn btn-info" onclick="if(confirm('Are You verify his request by phone')){event.preventDefault();document.getElementById('status-form-{{ $reserv->id }}').submit();}else {event.preventDefault();}
	"><i class="material-icons">done</i></button>
			@endif			  
                       
	<form id="delete-form-{{ $reserv->id }}" style="display:none;"action="{{route('reservation.destroy',$reserv->id)}}" method="post" >
			{{csrf_field()}}
			 @method('DELETE')
						    </form>
		<button type="button" class="btn btn-danger" onclick="if(confirm('Are You sure ? to delete this reservation?')){event.preventDefault();document.getElementById('delete-form-{{ $reserv->id }}').submit();}else {event.preventDefault();}
	"><i class="material-icons">delete</i></button>
							</td>
                        </tr>
						  @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{!! Toastr::message() !!}

@push('scripts')
@endpush
@endsection