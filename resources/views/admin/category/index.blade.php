@extends('layouts.app')
@section('content')
@section('title','Category')
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
				<a href="{{route('category.create')}}" class="btn btn-warning">Add Category</a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Categories</h4>
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
                          Slug
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
						  @foreach($categories as $key=>$cat)
						  
                        <tr>
                          <td>
                           {{$key+1}}
                          </td>
                          <td>
                           {{$cat->name}}
                          </td>
                          <td>
                           {{$cat->slug}}
                          </td>
                          
							<td>
                           {{$cat->created_at}}
                          </td>
                          <td>
                           {{$cat->updated_at}}
                          </td>
						<td>
			<a href="{{route('category.edit',$cat->id)}}" class="btn btn-info"><i class="material-icons">mode_edit</i></a>
          
		<form id="delete-form-{{ $cat->id }}" style="display:none;" action="{{route('category.destroy',$cat->id)}}" method="post" >
						   {{csrf_field()}}
						   @method('DELETE')
						    </form>
		<button type="button" class="btn btn-danger" onclick="if(confirm('Are You sure ? to delete this cat?')){event.preventDefault();document.getElementById('delete-form-{{ $cat->id }}').submit();}else {event.preventDefault();}
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