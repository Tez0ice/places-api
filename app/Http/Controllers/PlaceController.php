<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
     // Create
     public function store(Request $request){

        $place = new Place();
        $place->name = $request->name;
        $place->address = $request->address;
        $place->description = $request->description;
        $place->image_url = $request->image_url;
        $place->phone_number = $request->phone_number;
        $place->email = $request->email;
        
        if($place->save()){
            return response()->json([
                "success"=>true,
                "message"=>"Place Successfully added"
            ]);
        }
        else{
            return response()->json([
                "success"=>false,
                "message"=>"Place can't be added"
            ]);
        }


     }
 
     // Read all
     public function index(){
        $places = Place::all();

        if($places){
            return response()->json([
                "success"=>true,
                "data"=>$places
            ]);
        }

        else{
            return response()->json([
                "success"=>false,
                "data"=>"No available data"
            ]);
        }
     }
 
     // get 
     public function show($id){
        $place = Place::find($id);
        if ($place){
            return response()->json([
                "success"=>true,
                "data"=>$place
            ]);
        }
        
        else{
            return response()->json([
                "success"=>false,
                "data"=>"No available Data"
            ]);
        }
     }
 
     // update
     public function update(Request $request, $id){
          $place = Place::find($id);

        if ($place){
            $place->name = $request->name;
            $place->address = $request->address;
            $place->description = $request->description;
            $place->image_url = $request->image_url;
            $place->phone_number = $request->phone_number;
            $place->email = $request->email;

            if ($place->save()){
                return response()->json([
                    "success"=>true,
                    "data"=>$place
                ]);
            }
            else{
                return response()->json([
                    "success"=>false,
                    "data"=>"Cannot update"
                ]);
            }
        }
        
        else{
            return response()->json([
                "success"=>false,
                "data"=>"No available data"
            ]);
          }
     }
 
     // delete
     public function delete($id){
        $place = Place::find($id);

        if ($place){
            if ($place->delete()){
                return response()->json([
                    "success"=>true,
                    "data"=>"Place Successfully deleteed"
                ]);
            }
            else{
                return response()->json([
                    "success"=>false,
                    "data"=>"Delete unsuccessfuly"
                ]);
            }

        }
        else{
            return response()->json([
                "success"=>false,
                "data"=>"Data not Found"
            ]);
        }
     }
}
