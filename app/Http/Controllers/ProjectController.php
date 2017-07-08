<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use Purifier;
use Session;
use Image;
use Storage;



class ProjectController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $projects = Project::orderBy('id', 'desc')->paginate(10);
      return view('projects.index')->withProjects($projects);
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
      //validate the data

  $this->validate($request, [
    'name' => 'required|max:255',
    'description' => 'required',
    'featured_image' => 'sometimes|image'

  ]);

  //store in the database
  $project = new Project;

  $project->name = $request->name;
  $project->description = Purifier::clean($request->description);
  if($request->hasFile('featured_image')) {
    $image = $request->file('featured_image');
    $filename = time() . '.' . $image->getClientOriginalExtension();
    $location = public_path('images/' . $filename);
    Image::make($image)->resize(400, 400)->save($location);
    $project->image = $filename;
  }

  $project->save();


  Session::flash('success', 'The project was succesfully saved!');

  return redirect()->route('projects.show', $project->id);
  //redirect to show or index
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



      return view('projects.show')->withProject($project);
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
      // find the post in the database and save as a var
      $project = Project::find($id);

      // return the view and pass in the var we previously created
      return view('projects.edit')->withProject($project);
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
  $post = Project::find($id);
      //Check if slug is new

      $this->validate($request, array(
        'name' => 'required|max:255',
        'description' => 'required',
        'featured_image' => 'sometimes|image'
          ));

      // Save the data to the database
      $project = Project::find($id);

      $project->name = $request->input('name');
      $project->description = Purifier::clean($request->input('description'));

  if($request->hasfile('featured_image')) {
    //add the new photo
    $image = $request->file('featured_image');
    $filename = time() . '.' . $image->getClientOriginalExtension();
    $location = public_path('images/' . $filename);
    Image::make($image)->resize(400, 400)->save($location);
    $oldFilename = $project->image;
    //update the database
    $project->image = $filename;
    //delete the old photo
    Storage::delete($oldFilename);
    //update the
  }

      $project->save();




      // set flash data with success message
      Session::flash('success', 'This project was updated successfully.');

      // redirect with flash data to posts.show
      return redirect()->route('projects.show', $project->id);

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
      $project = Project::find($id);

      Storage::delete('images/' . $post->image);
      $project->delete();

      Session::flash('success', 'The project was successfully deleted.');
      return redirect()->route('projects.index');
  }
}
