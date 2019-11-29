@extends('layouts.app')
@section('content')
@section('title','Contact')
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
                  <h4 class="card-title ">All Contact</h4>
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
                          subject
                        </th>
						 <th>
                          email 
                        </th>
                        <th>
                         message
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
						  @foreach($contacts as $key=>$contact)
						  
                        <tr>
                          <td>
                           {{$key+1}}
                          </td>
                          <td>
                           {{$contact->name}}
                          </td>
							<td>
                           {{$contact->subject}}
                          </td>
                          <td>
                           {{$contact->email}}
                          </td>
                           <td>
                           {{$contact->message}}
                          </td>
                          
				
							<td>
                           {{$contact->created_at}}
                          </td>
                          <td>
                           {{$contact->updated_at}}
                          </td>
						<td>
							<a href="{{route('contact.show',$contact->id)}}" class="btn btn-info"><i class="material-icons">details</i></a>
         
		<form id="delete-form-{{ $contact->id }}" style="display:none;"  action="{{route('contact.destroy',$contact->id)}}" method="post" >
			{{csrf_field()}}
			@method('DELETE')
		 </form>
		<button type="button" class="btn btn-danger" onclick="if(confirm('Are You verify his request by phone')){event.preventDefault();document.getElementById('delete-form-{{ $contact->id }}').submit();}else {event.preventDefault();}
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
@if ($errors->any())
    
  
            @foreach ($errors->all() as $error)
			<script>
                    toastr.error('{{ $error }}');
			</script>
            @endforeach
    @endif
		<script>
{!! Toastr::message() !!}

@push('scripts')
@endpush
@endsection