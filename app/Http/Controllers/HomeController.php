<?php

namespace App\Http\Controllers;


use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function updateImage(Request $request){
        $request->validate([
           'stamp'=>'required'
        ]);
      $teacher=  Teacher::find($request->id);

        if($request->hasFile('stamp')){
            $teacher->clearMediaCollection('stamp');
            $teacher->
            addMedia($request->stamp)
                ->toMediaCollection('stamp');
        }


        return back();
    }
}
