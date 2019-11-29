@extends('layouts.app')
@section('content')
@section('title','Slider')
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
				<a href="{{route('slider.create')}}" class="btn btn-warning">Add Slider</a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Sliders</h4>
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
                          Title
                        </th>
                        <th>
                          sub_title
                        </th>
                        <th>
                          Image
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
						  @foreach($sliders as $key=>$slider)
						  
                        <tr>
                          <td>
                           {{$key+1}}
                          </td>
                          <td>
                           {{$slider->title}}
                          </td>
                          <td>
                           {{$slider->sub_title}}
                          </td>
                          <td>
                        {{$slider->image}}
                          </td>
							<td>
                           {{$slider->created_at}}
                          </td>
                          <td>
                           {{$slider->updated_at}}
                          </td>
						<td>
			<a href="{{route('slider.edit',$slider->id)}}" class="btn btn-info"><i class="material-icons">mode_edit</i></a>
          
		<form id="delete-form-{{ $slider->id }}" style="display:none;" action="{{route('slider.destroy',$slider->id)}}" method="post" >
						   {{csrf_field()}}
						   @method('DELETE')
						    </form>
		<button type="button" class="btn btn-danger" onclick="if(confirm('Are You sure ? to delete this slider?')){event.preventDefault();document.getElementById('delete-form-{{ $slider->id }}').submit();}else {event.preventDefault();}
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