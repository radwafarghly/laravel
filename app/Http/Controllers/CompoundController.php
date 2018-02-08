<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compound;
use App\Project;

class CompoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
       // $project=Project::find($id)-get();

        $compounds = Compound::orderBy('id','DESC')->paginate(5);
        return view('compounds.index',compact('compounds'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('compounds.create');       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'loction' => 'required',
            'img' => 'required',
            
        ]);

        

        Compound::create($request->all());
        return redirect()->route('compounds.index')
                        ->with('success','Compound created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $compound = Compound::find($id);
        return view('compounds.show',compact('compound'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $compound = Compound::find($id);
        return view('compounds.edit',compact('compound'));
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
        
        $this->validate($request, [
            'name' => 'required',
            'loction' => 'required',
            'img' => 'required'
        ]);


        Compound::find($id)->update($request->all());


        return redirect()->route('compounds.index')
                        ->with('success','Compound updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Compound::find($id)->delete();
        return redirect()->route('compounds.index')
                        ->with('success','Compound deleted successfully');
    }
    public function createcompound($id)
    {
        
        $project = Project::find($id)->get();
        return view('compounds.index',compact('project'));
        
        
    }
    
}
