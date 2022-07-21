<?php

namespace App\Http\Controllers;
use App\Models\MedicalInstitution;
use App\Models\FirstAidInstruction;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    //

    public function map(){
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


        return view("map")->with('stores', $data);
    }

    public function instructions(){
        $instructions = FirstAidInstruction::all();

        $data = [
            'instructions' => $instructions,

        ];
        return view('allFirstAidInstructions', $data);
    }


}
