<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\UploadPhotos;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    // this is path function image
    use UploadPhotos;

    // This is function router page index category
    public function index()
    {
        $categorys =  Category::all();
        return view('Admin.Category.index', compact('categorys'));
    }

    // This is function router page index add category
    public function addcate()
    {
        return view('Admin.category.addCate');
    }

    // This is function router insert date category in datebase
    public function insert(Request $request)
    {
        // Validation input
        $validated = $request->validate([
            'name_cate'   => 'required|unique:categories,name_cate|max:255',
            'mate_title'  => 'required|max:255',
            'description' => 'required|String',
            'image'       => 'required',
        ]);

        $file_name = $this->savePhotos($request->image , 'assets/uploads/category/') ;
        Category::create([
            'name_cate'     =>  ucwords($request->name_cate) ,
            'mate_title'    =>  ucwords($request->mate_title),
            'description'   =>  ucfirst($request->description),
            'image'         =>  $file_name,
        ]);
        return  redirect('/category')->with('status', "Category Added Successfull");
    }

    // This is function router find id category
    public function editCate(Request $request, $id)
    {
        $categorys = Category::find($id);
        return view('Admin.category.editCate', compact('categorys'));
    }

    // This is function Router update date category
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name_cate'   => 'required|max:255',
            'mate_title'  => 'required|max:255',
            'description' => 'required',
        ]);
        $categorys = Category::find($id) ;
        $file_name = $categorys->image;
        if($request -> hasFile('image'))
        {
            $path = 'assets/uploads/category/'.$categorys->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file_name = $this->savePhotos($request->image , 'assets/uploads/category');
        }
        $categorys->name_cate    = ucwords($request->input('name_cate'));
        $categorys->mate_title   = ucwords($request->input('mate_title'));
        $categorys->description  = ucfirst($request->input('description'));
        $categorys->image        = $file_name;
        $categorys->update();
        return redirect('category')->with("status","category update Successfully");
    }

    // This function Router for Deleted category
    public function dropCate(Request $request,$id)
    {
        $categorys = Category::find($id);
        if ($categorys->image) {
            $path = 'assets/uploads/category/'.$categorys->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $categorys->delete();
        return redirect('category')->with("status","category Deleted Successfully");
    }


}
