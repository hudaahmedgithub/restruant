<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
class CategoryController extends Controller
{
   
    public function index()
    {
		$categories=Category::all();
      return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {$this->validate($request,[
			'name'=>'required',
			'slug'=>'required'
		]);
	 
	$cat=new Category();
	$cat->name=$request->name;
	$cat->slug=$request->slug;
    $cat->save();
	return redirect()->route('category.index')->with('success','your category is added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
		$cat=Category::find($id);
		return view('admin.category.edit',compact('cat'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request,[
			'name'=>'required',
			'slug'=>'required'
		]);
		$cat=Category::find($id);
	$cat->name=$request->name;
	$cat->slug=$request->slug;

	
	$cat->save();
	return redirect()->route('category.index')->with('success','your category is updated');
    }

   
    public function destroy($id)
    {
        $cat=Category::find($id);
			$cat->delete();
		
		
	return redirect()->route('category.index')->with('success',' your category is deleted');
    }
    
}
