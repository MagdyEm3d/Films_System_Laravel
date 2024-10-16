<?php

namespace App\Http\Controllers;

use App\Models\films;
use Illuminate\Http\Request;

class FilmsController extends Controller
{
   function getallfilms()
   {

    $films=films::all();
    return view("films",compact("films"));

   }

   function getonefilm($id)
   {
    $film=films::find($id);
    return view("singlefilm",compact("film"));
   }
   function deletefilm($id)
   {
    $film=films::find($id);
    $film->delete();
    return redirect()->back();


   }
   function addfilm()
   {
    return view("addfilm");
   }
   function insertfilm(Request $request)
   {
      $input=$request->except("image");
      if($request->hasFile("image"))
      {
       $image=$request->image;
       $extension=$image->getClientOriginalExtension();
       $imagename=uniqid().".$extension";
       $image->move("images/",$imagename);
       $filepath="images/$imagename";
       $input["image"]= $filepath;
      }
      films::create($input);
      return redirect()->route('films');

    }
    function editfilm($id)
    {
        $film=films::find($id);
        return view('editfilm',compact('film'));
    }
    function updatefilm(Request $request, $id)
    {
        $input=$request->except("image");
        if($request->hasFile("image"))
        {
         $image=$request->image;
         $extension=$image->getClientOriginalExtension();
         $imagename=uniqid().".$extension";
         $image->move("images/",$imagename);
         $filepath="images/$imagename";
         $input["image"]= $filepath;
        }
        $film=films::find($id);
       $film->update($input);
        return redirect()->route('films');

    }
}
