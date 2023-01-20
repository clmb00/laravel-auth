<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;

use function PHPUnit\Framework\isNull;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $projects = Project::where('name', 'like', '%' . $search . '%')->get();
        } else {
            $projects = Project::all();
        }

        $direction = 'asc';
        $active_order = 'id';

        return view('admin.project.index', compact('projects', 'direction', 'active_order'));
    }

    public function orderby($column, $direction)
    {
        $direction = $direction == 'desc' ? 'asc' : 'desc';
        $projects = Project::orderBy($column, $direction)->get();
        $active_order = $column;
        return view('admin.project.index', compact('projects', 'direction', 'active_order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $form_data = $request->all();
        $form_data['slug'] = Project::generate_slug($form_data['name']);

        // $new_project = new Project();
        // $new_project->fill($form_data);
        // $new_project->save();

        // Scrittura alternativa
        $new_project = Project::create($form_data);

        return redirect(route('admin.projects.show', $new_project->slug));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $project = Project::where('slug', $slug)->first();

        return view('admin.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

        $project = Project::where('slug', $slug)->first();

        return view('admin.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $form_data = $request->all();

        if($form_data['name'] != $project->name){
            $form_data['slug'] = Project::generate_slug($form_data['name']);
        } else {
            $form_data['slug'] = $project->slug;
        }

        $project->update($form_data);

        return view('admin.project.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
