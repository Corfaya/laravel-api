<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $technologies = Technology::all();
        $types = Type::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request, Project $project)
    {
        $form_data = $request->validated();
        $form_data['slug'] = Project::generateSlug($form_data['name']);

        if($request->hasFile('preview')) {
            $path = Storage::disk('public')->put('preview', $form_data['preview']);
            $form_data['preview'] = $path;
        }

        $project->fill($form_data);
        $project->save();

        //Controllo per checkbox: se l'HTTP request contiene in campo 'tech'
        if($request->has('techs')) {
            //salva il valore del campo (l'array di id)
            $techs = $request->techs;
            // attach()->prendo array di tech e creo record nella pivot che rappresenta la relazione m-to-m
            $project->technologies()->attach($techs);
        }

        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $technologies = Technology::all();
        $types = Type::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->validated();
        $form_data['slug'] = Project::generateSlug($form_data['name']);

        if($request->hasFile('preview')) {
            if(!Str::startsWith($project->preview, 'https')) {
                Storage::disk('public')->delete($project->preview);
            }
            $path = Storage::disk('public')->put('preview', $form_data['preview']);
            $form_data['preview'] = $path;
        }

        $project->update($form_data);

        //Controllo per checkbox dell'edit: se l'HTTP request contiene il campo 'tech'
        if($request->has('techs')) {
            //sincronizzo le relazioni: se ci sono ID già presenti, rimane invariato; se ci sono nuovi Id non collegati, vengono aggiunti; se ci sono ID non più presenti nell'array, vengono rimossi
            $project->technologies()->sync($request->techs);
        } else {
            $project->technologies()->sync([]);
        }

        return redirect()->route('admin.projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {   
        if(!Str::startsWith($project->preview, 'https')) {
            Storage::disk('public')->delete($project->preview);
        }

        $project->technologies()->sync([]);

        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
