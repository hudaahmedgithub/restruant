@extends('layouts.app')
@section('content')
@section('title','Item')
@push('css')

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
				<a href="{{route('item.create')}}" class="btn btn-warning">Add item</a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All item</h4>
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
                          image
                        </th>
						 <th>
                          category name
                        </th>
                        <th>
                          price
                        </th>
                         <th>
                          description
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
						  @foreach($items as $key=>$item)
						  
                        <tr>
                          <td>
                           {{$key+1}}
                          </td>
                          <td>
                           {{$item->name}}
                          </td>
							 <td>
                          <img src="{{asset('uploads/item/'.$item->image)}}" width="150px;" height="100px">
                          </td>
							<td>
                           {{$item->category->name}}
                          </td>
                          <td>
                           {{$item->description}}
                          </td>
                           <td>
                           {{$item->price}}
                          </td>
                          
							<td>
                           {{$item->created_at}}
                          </td>
                          <td>
                           {{$item->updated_at}}
                          </td>
						<td>
			<a href="{{route('item.edit',$item->id)}}" class="btn btn-info"><i class="material-icons">mode_edit</i></a>
          
		<form id="delete-form-{{ $item->id }}" style="display:none;" action="{{route('item.destroy',$item->id)}}" method="post" >
						   {{csrf_field()}}
						   @method('DELETE')
						    </form>
		<button type="button" class="btn btn-danger" onclick="if(confirm('Are You sure ? to delete this item?')){event.preventDefault();document.getElementById('delete-form-{{ $item->id }}').submit();}else {event.preventDefault();}
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


@push('scripts')
@endpush
@endsection