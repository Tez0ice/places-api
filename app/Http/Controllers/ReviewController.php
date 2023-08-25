<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Place;
use App\Models\Review;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ReviewController extends Controller
{
     // Create
     public function store(Request $request, $id){
          // $review = new Review();
          // $review->rating = $request->rating; 
          // $review->comments = $request->comments;
          // $review->user_id = User::find($request->user_id)->id;
          // $review->place_id = Place::find($id)->id;

          try{
               $place = Place::find($id);
               
               $place->avg_rating = ($place->avg_rating *
               count($place['reviews']) + $request->rating) /
               (count($place['reviews']) + 1);
                    
               $user = JWTAuth::parseToken()->authneticate();
               $userId = $user->id;
               
               //with authenticate token we can get user Id.

               Review::create([
                    "rating"=>$request->rating,
                    "user_id"=>$userId,
                    "place_id"=>$id,
                    "comments"=>$request->comments,
               ]);

               return response()->json(['success'=>true,"message"=>"Review successfully added"]);
          }

          catch (\Exception $err){
               return response()->json(["sucess"=>false,"message"=>$err]);
          }


          // if ($review->save()){
          //      return response()->json([
          //           "success"=>true,    
          //           "message"=>"Place Successfully added"
          //       ]);
          // }

          // else{
          //      return response()->json([
          //           "success"=>false,
          //           "message"=>"Review Successfully added"
          //       ]);
          // }

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
