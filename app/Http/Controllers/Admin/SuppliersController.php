<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadPhotos;
use App\Http\Traits\UploadPhotouser;
use App\Models\Suppliers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;



class SuppliersController extends Controller
{
    // this is path function image
    use UploadPhotos;
    // use UploadPhotouser;

    public function index()
    {
        $suppliers = Suppliers::all();
        return view('admin.suppliers.index',compact('suppliers'));
    }

    public function insert(Request $request)
    {
        $validator = $request->validate([
            'fname'         =>'required|string',
            'lname'         =>'required|string',
            'email'         =>'required|unique:suppliers',
            'phone'         =>'required|min:0',
            // 'image'         =>'required',
            'address'       =>'required|string',
            'descrpition'   =>'required|string',
            'location_name'   =>'required',
        ]);

        // $photo = $request->image;
        // $file_name = $this->savePhotos($photo , 'assets/uploads/suppliers/') ;

        $suppliers = new Suppliers();

        $locationName = $request->input('location_name');

        // Use Nominatim API to geocode the location name
        $client = new Client();
        $response = $client->get('https://nominatim.openstreetmap.org/search.php', [
            'query' => [
                'q' => $locationName,
                'format' => 'json',
                'addressdetails' => 1,
                'limit' => 1
            ]
        ]);
        $data = json_decode($response->getBody(), true);

        // Check if any results were found
        if (empty($data))
        {
            return redirect()->back()->with("statuserror" , "Location not found.");
        }
        else
        {
             // Get the first result and save the coordinates to the database
            $result = $data[0];
            $lat = $result['lat'];
            $lng = $result['lon'];
            $suppliers->location = $result['display_name'];
            $suppliers->let = $lat;
            $suppliers->lng = $lng;

            $suppliers->fname       = ucwords($request->input('fname'));
            $suppliers->lname       = ucwords($request->input('lname'));
            $suppliers->email       = $request->input('email');
            $suppliers->phone       = $request->input('phone');
            // $suppliers->image       = $file_name;
            $suppliers->address     = ucwords($request->input('address'));
            $suppliers->description = ucfirst($request->input('descrpition'));
            $suppliers->save();

            return redirect('suppliers')->with("status" , "Suppliers Added Successfull");
        }

    }

    public function removeSupp( $id)
    {
        $suppliers_check = Suppliers::where('id', $id)->exists();

        if ($suppliers_check)
        {
            $suppliers = Suppliers::find($id);
            if ($suppliers->image) {
                $path = 'assets/uploads/suppliers/'.$suppliers->image;
                if(File::exists($path))
                {
                    File::delete($path);
                }
            }
            $suppliers->delete();

            return redirect()->back()->with("status" , " Suppliers Deleted Successfull ");
        }
        else
        {
            return redirect()->back()->with("statuserror" , "There is no such thing as a provider.");
        }

    }

    public function viewSupplier($id)
    {
        $supplier = Suppliers::find($id);
        return view('Admin.suppliers.edit', compact('supplier'));
    }

    public function updateSupplier(Request $request, $id)
    {
        $suppliers = Suppliers::find($id);

        $validator = $request->validate([
            'fname'         =>'required|string',
            'lname'         =>'required|string',
            'phone'         =>'required|min:0',
            'email'         =>'required|string',
            'address'       =>'required|string',
            'location_name' =>'required|string',
            'description'   =>'required|string',
        ]);

        $file_name = $suppliers->image;
        if ($request->hasFile('image'))
        {
            $path = 'assets/uploads/suppliers/'.$suppliers->image;
                if(File::exists($path))
                {
                    File::delete($path);
                }
            $file_name = $this->savePhotos($request->image , 'assets/uploads/suppliers');
        }

        $locationName = $request->input('location_name');

        // Use Nominatim API to geocode the location name
        $client = new Client();
        $response = $client->get('https://nominatim.openstreetmap.org/search.php', [
            'query' => [
                'q' => $locationName,
                'format' => 'json',
                'addressdetails' => 1,
                'limit' => 1
            ]
        ]);
        $data = json_decode($response->getBody(), true);

        // Check if any results were found
        if (empty($data))
        {
            return redirect()->back()->with("statuserror" , "Location not found.");
        }
        else
        {
            // Get the first result and save the coordinates to the database
            $result = $data[0];
            $lat = $result['lat'];
            $lng = $result['lon'];
            $suppliers->location = $result['display_name'];
            $suppliers->let = $lat;
            $suppliers->lng = $lng;

            $suppliers->fname       = $request->input('fname');
            $suppliers->lname       = $request->input('lname');
            $suppliers->email       = $request->input('email');
            $suppliers->phone       = $request->input('phone');
            $suppliers->address     = $request->input('address');
            $suppliers->image       = $file_name;
            $suppliers->rating      = $request->input('supplier_rating');
            $suppliers->description = $request->input('description');
            $suppliers->save();


            return redirect('view-suppliers/'.$suppliers->id)->with("status" , "Suppliers Updated Successfull");
        }




    }

    public function viewForm($id)
    {
        $suppliers = Suppliers::find($id);
        return view('admin.contect.supplier' , compact('suppliers'));

    }


}
