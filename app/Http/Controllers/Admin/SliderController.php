<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
use Carbon\Carbon;
class SliderController extends Controller
{
    public function index()
    {
		$sliders=Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

  public function create()
    {
        return view('admin.slider.create');
    }
public function store(Request $request)
    {
		$this->validate($request,[
			'title'=>'required',
			'sub_title'=>'required',
			'image'=>'required'
		]);
		$image=$request->file('image');
        $slug=str_slug($request->title);//to put title in the first name of image
		if(isset($image))
		{
			$currentDate=Carbon::now()->toDateString();
			$imagename=$slug.'-'.$currentDate.'-'.uniqid(). '.'. $image->getClientOriginalExtension();
			
			$image->move('uploads/slider',$imagename);
		}
	else
	{
		$imagename='food.jpg';
	}
	
	$slider=new Slider();
	$slider->title=$request->title;
	$slider->sub_title=$request->sub_title;
	$slider->image=$imagename;
	
	$slider->save();
	return redirect()->route('slider.index')->with('success','your slider is added');
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
		$sliders=Slider::find($id);
		return view('admin.slider.edit',compact('sliders'));
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request,[
			'title'=>'required',
			'sub_title'=>'required',
			'image'=>'required'
		]);
		$image=$request->file('image');
        $slug=str_slug($request->title);//to put title in the first name of image
		$slider=Slider::find($id);
		if(isset($image))
		{
			$currentDate=Carbon::now()->toDateString();
			$imagename=$slug.'-'.$currentDate.'-'.uniqid(). '.'. $image->getClientOriginalExtension();
			
			$image->move('uploads/slider',$imagename);
		}
	else
	{
		$imagename=$slider->image;
	}
	
	$slider->title=$request->title;
	$slider->sub_title=$request->sub_title;
	$slider->image=$imagename;
	
	$slider->save();
	return redirect()->route('slider.index')->with('success','your slider is updated');
    }

    public function destroy($id)
    {
      $slider=Slider::find($id);
		if(file_exists('uploads/slider/'.$slider->image))
		{
		unlink('uploads/slider/'.$slider->image);
		}
			$slider->delete();
		
		
	return redirect()->route('slider.index')->with('success',' your slider is deleted');
    }
}
