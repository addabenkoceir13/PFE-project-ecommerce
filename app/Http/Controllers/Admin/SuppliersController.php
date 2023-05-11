<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadPhotos;
use App\Http\Traits\UploadPhotouser;
use App\Models\Suppliers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

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

            $suppliers->fname       = $request->input('fname');
            $suppliers->lname       = $request->input('lname');
            $suppliers->email       = $request->input('email');
            $suppliers->phone       = $request->input('phone');
            // $suppliers->image       = $file_name;
            $suppliers->address     = $request->input('address');
            $suppliers->description = $request->input('descrpition');
            $suppliers->save();

            return redirect('suppliers')->with("status" , "Suppliers Added Successfull");
        }

    }

    public function removesupp( $id)
    {
        $suppliers_check = Suppliers::where('id', $id)->exists();

        if ($suppliers_check)
        {
            $suppliers = Suppliers::find($id);
            $suppliers->delete();

            return redirect()->back()->with("status" , " Suppliers Deleted Successfull ");
        }
        else
        {
            return redirect()->back()->with("statuserror" , "There is no such thing as a provider.");
        }

    }
}
