<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FirstAidInstruction;
use App\Models\FirstAidInstructionVideo;

class FirstAidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $instructions = FirstAidInstruction::all();

        $data = [
            'instructions' => $instructions,

        ];
        return view('admin.firstAid.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.firstAid.addEntry');
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
                'title' => 'required|max:255',
                'symptoms' => 'required', 
                'image' => 'required|image',
                'treatment' => 'required',
                'video' => 'url'
            ]);     

             echo "<pre>";
            print_r($_REQUEST);
            echo "</pre>";   
            $fileName = $request->file('image')->hashName();

          

            try {
                $request->file('image')->move(public_path('img/firstAidIndtructions'), $fileName);
            } catch (Exception $e) {
                report($e);
            }
            $img_location = 'img/firstAidIndtructions/'.$fileName;

            $entry = new FirstAidInstruction;

            $entry->author = Auth::id();
            $entry->title = $request->title;
            $entry->symptoms = $request->symptoms;
            $entry->treatment = $request->treatment;
            $entry->image = $img_location;
            $entry->video = $request->video;

            $entry->save();



            if($entry){
                return redirect()->route('admin.firstAid.index');
            }else{
                return redirect()->back()->with('status', 'Post Creation Failed');
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
        //
        $instruction = FirstAidInstruction::find($id);

        $data = [ 'instruction' => $instruction ];

        return view('admin.firstAid.show',$data);
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
        $instruction = FirstAidInstruction::find($id)->first();

        $data =[
            'instruction' => $instruction,
        ];
        return view('admin.firstAid.editEntry',$data);
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
                'title' => 'required|max:255',
                'symptoms' => 'required', 
                'image' => 'image',
                'treatment' => 'required',
                'video' => 'url'

            ]); 
        $entry = FirstAidInstruction::find($id);

    

        if (isset($request->image)) {
            // code...
            
            $fileName = $request->file('image')->hashName();


            try {
                
                $request->file('image')->move(public_path('img/firstAidIndtructions'), $fileName);
            
            } catch (Exception $e) {
                report($e);
            }
            
            $img_location = 'images/firstAidIndtructions/'.$fileName;
            $entry->image = $img_location;

        }

            $entry->author = Auth::id();
            $entry->title = $request->title;
            $entry->symptoms = $request->symptoms;
            $entry->treatment = $request->treatment;
            $entry->video = $request->video;

            $entry->save();


            if($entry)
            {
               
                return redirect()->route('admin.firstAid.show',$id);
            }else{
                return redirect()->back()->with('status', 'Post Update Failed');
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
    }
}
