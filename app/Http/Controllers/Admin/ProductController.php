<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\UploadPhotos;
use App\Models\Products_part;
use App\Models\Suppliers;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    // this is path function image
    use UploadPhotos;

    // This function Router for page index products
    public function index()
    {
        $products = Products::all();
        return view('Admin.products.index', compact('products'));
    }

    // This function Router for page added products
    public function addprod()
    {
        $category = Category::all();
        $suppliers = Suppliers::all();
        return view('Admin.products.addProd', compact('category', 'suppliers'));
    }

    // This function Router for insert data Products
    public function insert(Request $request)
    {
        $products = new Products();
        $category = Category::all();


        $validator = $request->validate([
            'id_cate'           =>'required',
            'id_supp'           =>'required',
            'name_prod'         =>'required|string',
            'mark_prod'         =>'required|string',
            'original_price'    =>'required|min:0',
            'qte_stock'         =>'required|min:0',
            'image'             =>'required',
            'small_descripton'  =>'required|string',
            'description'       =>'required|string',
        ]);
        $file_name = $this->savePhotos($request->image , 'assets/uploads/products/') ;
        Products::create([
            'id_cate'           =>  $request->id_cate,
            'id_supp'           =>  $request->id_supp,
            'name_prod'         =>  $request->name_prod,
            'mark_prod'         =>  $request->mark_prod,
            'original_price'    =>  $request->original_price,
            'selling_price'     =>  $request->selling_price,
            'status'            =>  $request->status == TRUE ? '1': '0',
            'qte_stock'         =>  $request->qte_stock,
            'image'             =>  $file_name,
            'small_descripton'  =>  $request->small_descripton,
            'description'       =>  $request->description,
        ]);

        $colors = json_encode($request->input('colors', []));
        $storages = json_encode($request->input('storages', []));

        $partproducts = new Products_part();
        $id_product = Products::where('name_prod', $request->name_prod)->first();
        $partproducts->id_prod = $id_product->id;
        $partproducts->colors = $colors;
        $partproducts->storage = $storages;
        $partproducts->save();

        return  redirect('/products')->with('status', "Products Added Successfull");
    }

    // This function Router for page edit Products
    public function editProd($id)
    {
        $products = Products::find($id);
        $category = Category::all();
        $suppliers = Suppliers::all();

        return view('Admin.products.editProd', compact('products'));
    }

    // This router for update date products

    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'name_prod'         =>'required|string',
            'mark_prod'         =>'required|string',
            'original_price'    =>'required|min:0',
            'qte_stock'         =>'required|min:0',
            'small_descripton'  =>'required|string',
            'description'       =>'required|string',
        ]);
        $products = Products::find($id);

        $file_name = $products->image;
        if ($request->hasFile('image'))
        {
            $path = 'assets/uploads/products/'.$products->image;
                if(File::exists($path))
                {
                    File::delete($path);
                }
                $file_name = $this->savePhotos($request->image , 'assets/uploads/products');
        }

        $products->name_prod        = $request->input('name_prod');
        $products->mark_prod        = $request->input('mark_prod');
        $products->original_price   = $request->input('original_price');
        $products->selling_price    = $request->input('selling_price');
        $products->status           = $request->input('status') == TRUE ? '1': '0';
        $products->qte_stock        = $request->input('qte_stock');
        $products->image            = $file_name;
        $products->small_descripton = $request->input('small_descripton');
        $products->description      = $request->input('description');
        $products->update();

        // $colors = json_encode($request->input('colors', []));
        // $storages = json_encode($request->input('storages', []));

        // $partproducts = Products_part::where('id_prod', $id)->first();
        // $partproducts->colors = $colors;
        // $partproducts->storage = $storages;
        // $partproducts->update();

        return redirect('products')->with("status","Products update Successfully");
    }

        // This function Router for Deleted category
    public function dropProd(Request $request,$id)
    {
        $products = Products::find($id);
        if ($products->image) {
            $path = 'assets/uploads/products/'.$products->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $products->delete();
        return redirect('products')->with("status","Products Deleted Successfully");
    }

}



