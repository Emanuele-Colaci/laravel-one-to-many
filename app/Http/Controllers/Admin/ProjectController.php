<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datas = $request->all();

        if(isset($datas['message'])){
            $message = $datas['message'];
        }else{
            $message = '';
        }

        $projects = Project::all();

        return view('admin.post.index', compact('projects', 'message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        
        return view('admin.post.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->all();

        $project = new Project();
        
        if($request->hasFile('image')){
            //EFFETTUO L'UPLOAD E MI RICAVO IL PATH DELL'IMMAGINE
            //$path = Storage::put('project-image', $form_data['image']);
            //OPPURE
            
            $path = Storage::put('projects-image', $request->image);
            $form_data['image'] = $path;
        }
        
        $project->fill($form_data);
        
        $project->save();

        $message = 'Creazione progetto completata';
        return redirect()->route('admin.project.index', ['message' => $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.post.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        
        return view('admin.post.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->all();

        if($request->hasFile('image')){
            if($project->image){
                Storage::delete($project->image);
            }

            $path = Storage::put('projects-image', $request->image);
            $form_data['image'] = $path;
        }

        $project->update($form_data);

        $message = 'Aggiornamento progetto completato';
        return redirect()->route('admin.project.index', ['message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if($project->image){
            Storage::delete($project->image);
        }
        
        $project->delete();
        $message = 'Cancellazione proggetto completata';
        return redirect()->route('admin.project.index', ['message' => $message]);
    }
}
