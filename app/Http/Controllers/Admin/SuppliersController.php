<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Suppliers;
use App\Models\User;
use GuzzleHttp\Client;
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
         // Get the first result and save the coordinates to the database
        $result = $data[0];
        $lat = $result['lat'];
        $lng = $result['lon'];
        $suppliers->name = $result['display_name'];
        $suppliers->let = $lat;
        $suppliers->lng = $lng;

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
