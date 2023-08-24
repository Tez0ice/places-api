<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{

    // Create
    public function store(Request $request){
        $facility = new Facility();
        $facility->name = $request->name;

        if($facility->save()){
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

            $facilities = Facility::all();

            if($facilities){
                return response()->json([
                    "success"=>true,
                    "data"=>$facilities
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

        $facility = Facility::find($id);

        if ($facility){
            return response()->json([
                "success"=>true,
                "data"=>$facility
            ]);
        }
        else{
            return response()->json([
                "success"=>false,
                "data"=>"No available data"
            ]);
        }

    }

    // update
    public function update($id){

        $facility = Facility::find($id);

        if ($facility){
            if ($facility->save()){
                return response()->json([
                    "success"=>true,
                    "data"=>"Data Sucessfully Updated"
                ]);
            }
            else{
                return response()->json([
                    "success"=>false,
                    "data"=>"Update Unsuccessful"
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

        $facility = Facility::find($id);

        if ($facility){
            if ($facility->delete()){
                return response()->json([
                    "success"=>true,
                    "data"=>"Data Sucessfully Deleted"
                ]);
            }
            else{
                return response()->json([
                    "success"=>false,
                    "data"=>"Delete Unsuccessful"
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
    
}
