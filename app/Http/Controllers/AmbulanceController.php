<?php

namespace App\Http\Controllers;

use App\Models\MedicalInstitution;
use Illuminate\Http\Request;

class AmbulanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $institutions = MedicalInstitution::all();
        $features = array();

      foreach ($institutions as $institution) {
          // code...
        $location = json_decode($institution->location);
        $coordinates = [$location->longitude,$location->latitude];

        $prop = [
            "type" => "Feature",
            "geometry" => [
                "type" => "Point",
                "coordinates" => $coordinates,
            ],

            "properties" => [
                "id" => $institution->id,
                "name" => $institution->name,
                "ambulances" => $institution->ambulances,
                "contact" => $institution->contact,
            ],

        ];

       array_push($features, $prop);

      }


      $data = [
        "type" => "FeatureCollection",
        "features" => $features,

      ];


      $data = json_encode($data);


        return view("admin.ambulances.all2")->with('stores', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.ambulances.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
                'name' => 'required|max:255',
                'ambulances' => 'required|integer', 
                'latitude' => 'required',
                'contact' => 'required|string|max:255',
                'longitude' => 'required',
            ]);

        $coordinates = [
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ];

 

        $institution = new MedicalInstitution;
        $institution->name = $request->name;
        $institution->ambulances = $request->ambulances;
        $institution->location = json_encode($coordinates);
        $institution->contact = $request->contact;

        $institution->save();

        if($institution){
            return redirect()->route('admin.ambulance.index');
        }else{
            return redirect()->back()->with('error','Institution Addition failed');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $institution = MedicalInstitution::find($id);

       
        $location = json_decode($institution->location);
        $coordinates = [$location->longitude,$location->latitude];
        $prop = [
            "type" => "Feature",
            "geometry" => [
                "type" => "Point",
                "coordinates" => $coordinates,
            ],

            "properties" => [
                "id" => $institution->id,
                "name" => $institution->name,
                "ambulances" => $institution->ambulances,
                "contact" => $institution->contact,
            ],
        ];

        $data = [
            'institution' => $institution,
            'geojson' => $prop,
        ];        


        return view('admin.ambulances.edit2')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
                'name' => 'required|max:255',
                'ambulances' => 'required|integer', 
                'latitude' => 'required',
                'contact' => 'required|string|max:255',
                'longitude' => 'required',
            ]);
        $coordinates = [
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ];

        $institution = MedicalInstitution::find($id);


        $institution->name = $request->name;
        $institution->ambulances = $request->ambulances;
        $institution->location = json_encode($coordinates);
        $institution->contact = $request->contact;

        $institution->update();

        if($institution){
            return redirect()->route('admin.ambulance.index');
        }else{
            return redirect()->back()->with('error','Institution Edition failed');
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $entry = MedicalInstitution::find($id);
 
        $entry->delete();


            if($entry){
                return redirect()->route('admin.firstAid.index')->with('status', 'Post Deleted');
            }else{
                return redirect()->back()->with('status', 'Post Deletion Failed');
            }

    }
        
}
