<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Place;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
     // Create
     public function store(Request $request){
          $review = new Review();
          $review->rating = $request->rating; 
          $review->comments = $request->comments;

     
          $review->user_id = User::find($request->user_id)->id;
          $review->place_id = Place::find($request->place_id)->id;

          if ($review->save()){
               return response()->json([
                    "success"=>true,    
                    "message"=>"Place Successfully added"
                ]);
          }

          else{
               return response()->json([
                    "success"=>false,
                    "message"=>"Review Successfully added"
                ]);
          }
     }
 
     // Read all
     public function index(){
 
     }
 
     // get 
     public function show($id){
 
     }
 
     // update
     public function update($id){
 
     }
 
     // delete
     public function delete($id){
 
     }
     
}
