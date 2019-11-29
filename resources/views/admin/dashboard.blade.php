@extends('layouts.app')
@section('content')
@section('title','Dashboard')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Category/Item</p>
                  <h3 class="card-title">{{$categorycount}}/{{$itemcount}}
                   
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="#pablo">Get More Space...</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">SliderCount</p>
                  <h3 class="card-title">{{$slider}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">Reservation</p>
                  <h3 class="card-title">
					  {{$reservs->count()}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> Tracked from Github
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-twitter"></i>
                  </div>
                  <p class="card-category">Contacts</p>
                  <h3 class="card-title">{{$contact}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
				</div>
			  </div>
			</div>
			

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
@endsection
@push('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endpush