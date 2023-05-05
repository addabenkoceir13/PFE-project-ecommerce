<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Suppliers;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    public function index()
    {
        $suppliers = Suppliers::all();
        return view('admin.suppliers.index',compact('suppliers'));
    }

    public function insert(Request $request)
    {
        $suppliers = new Suppliers();

        $suppliers->fname = $request->input('fname');
        $suppliers->lname = $request->input('lname');
        $suppliers->email = $request->input('email');
        $suppliers->phone = $request->input('phone');
        $suppliers->fax   = $request->input('fax');
        $suppliers->address     = $request->input('address');
        $suppliers->description = $request->input('descripition');
        $suppliers->save();

        return redirect('suppliers')->with("status" , "Suppliers Added Successfull");
    }
}
