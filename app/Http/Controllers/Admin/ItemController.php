<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Item;
use Carbon\Carbon;
class ItemController extends Controller
{ public function index()
    {
		$items=Item::all();
        return view('admin.item.index',compact('items'));
    }

  public function create()
    {
      $categories=Category::all(); 
	  return view('admin.item.create',compact('categories'));
    }
    public function store(Request $request)
    {
		$this->validate($request,[
			'name'=>'required',
			'description'=>'required',
			'price'=>'required',
			'image'=>'required',
			'category_id'=>'required'
		]);
		$image=$request->file('image');
        $name=str_slug($request->name);//to put title in the first name of image
		if(isset($image))
		{
			$currentDate=Carbon::now()->toDateString();
			$imagename=$name.'-'.$currentDate.'-'.uniqid().'.'. $image->getClientOriginalExtension();
			
			$image->move('uploads/item',$imagename);
		}
	else
	{
		$imagename='food.jpg';
	}
	
	$item=new Item();
	$item->name=$request->name;
	$item->description=$request->description;
	$item->image=$imagename;
	$item->price=$request->price;
	$item->category_id=$request->category_id;
	$item->save();
	return redirect()->route('item.index')->with('success','your item is added');
    }
    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item=Item::find($id);
		$categories=Category::all();
		return view('admin.item.edit',compact('item','categories'));
    }

    public function update(Request $request, $id)
    {
       
        $this->validate($request,[
			'name'=>'required',
			'description'=>'required',
			'price'=>'required',
			'category_id'=>'required',
			'image'=>'required'
		]);
		$image=$request->file('image');
        $name=str_slug($request->name);//to put title in the first name of image
		$item=Item::find($id);
		if(isset($image))
		{
			$currentDate=Carbon::now()->toDateString();
			$imagename=$name.'-'.$currentDate.'-'.uniqid(). '.'. $image->getClientOriginalExtension();
			
			$image->move('uploads/item',$imagename);
		}
	else
	{
		$imagename=$item->image;
	}
	
	$item->name=$request->name;
	$item->description=$request->description;
	$item->image=$imagename;
	$item->price=$request->price;
	$item->category_id=$request->category_id;
	
	$item->save();
	return redirect()->route('item.index')->with('success','your item is updated');
    }

  
    public function destroy($id)
    {
      $item=Item::find($id);
		if(file_exists('uploads/item/'.$item->image))
		{
		unlink('uploads/item/'.$item->image);
		}
			$item->delete();
		
		
	return redirect()->route('item.index')->with('success',' your item is deleted');
    
    }
}
