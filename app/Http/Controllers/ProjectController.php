<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use DB;
use App\Compound;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $projects = Project::orderBy('id')->paginate(5);
        return view('projects.index',compact('projects'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
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
            'governate' => 'required',
            'city' => 'required',
            'img' => 'required',
        
            

        ]);


        Project::create($request->all());


        return redirect()->route('projects.index')
                        ->with('success','Project created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        return view('projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        return view('projects.edit',compact('project'));
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
            'governate' => 'required',
            'city' => 'required',
            'img' => 'required',
        ]);


        Project::find($id)->update($request->all());


        return redirect()->route('projects.index')
                        ->with('success','Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Project::find($id)->delete();
        return redirect()->route('projects.index')
                        ->with('success','Project deleted successfully');
    }

  
  public function indexcompound(Request $request,$id)
  {
             $projectID=Project::find($id);
             //print_r($projectID->id);
             //$proid=
           // $project=$projectID->id;
            $compounds=DB::table('compounds')->select('name','loction','img')->where('project_id','=',$projectID->id)->paginate(5);
            return view('projects.indexcompound',compact('compounds','projectID'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
  }


  public function createcompound($id)
  {
    $projectID=Project::find($id);
    return view('projects.createcompound',compact('projectID'));
  }


  public  function storecompound(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required',
            'loction' => 'required',
            'img' => 'required',   
        ]);
        //Compound::create($request->all());
        $compounds = new Compound();
        $compounds->name = $request->input('name');
        $compounds->loction = $request->input('loction');
        $compounds->img=$request->input('img');
        $projectID=Project::find($id);
        $compounds->project_id=$projectID->id;
        $compounds->save();
              // return view('projects.indexcompound',compact('compounds','projectID'))
                   //  ->with('i', ($request->input('page', 1) - 1) * 5);
        //return redirect()->route('projects.indexcompound')
            return redirect()->route('projects.indexcompound',compact('projectID'))
                       ->with('success','Project create successfully');

                        
    }


    public function destroycompound($id)
    {
         $compounds = Compound::find($id);
         $projectID->id=$compounds->project_id;
         $compounds->delete();
        return redirect()->route('projects.indexcompound',compact('projectID'))
                        ->with('success','Project deleted successfully');
    }
}


