<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\task;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjetController extends Controller
{
    //
    public function index()
    {
        $projets = Projet::all();
        return view("projects.index", compact('projets'));
    }

    public function create()
    {
        return view("projects.create");
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);
        
        Projet::create($request->all());
        return redirect()->route('index.project');
    }

    public function destroy($id)
    {
        $projet = Projet::findorFail($id);
        $projet->delete();
    }

    public function show($id)
    {
        $projets = Projet::findOrFail($id);
        $projets = Projet::all();
        return view("projects.show", compact('projets'));
    }

    public function edit($id)
    {
        $projet = Projet::find($id);
        return view('projects.edit', compact('projet'));
        

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        $projet = Projet::findOrFail($id);
        $projet->update($request->all());
        // return view('projects.index', compact('projet'));

        return redirect()->route('index.project');
    }


//     public function filter(Request $request)
//     {
//     $task= $request->input('task');

//     if ($task) {
//         $projet = Projet::where('title', $task)->get();
//     } else {
//         $projet = Projet::all();
//     }
//     $tasks = task::all();

//     return view('filter', compact('projets','tasks'));
// }


public function filter(Request $request)
    {
        $project = $request->input('project');
        $status = $request->input('status');

        $query = Task::query();

        if ($project) {
            $projet = Projet::where('name', 'like', '%' . $project . '%')->first();

            if ($projet) {
                $query->where('projet_id', $projet->id);
            }
        }

        if ($status) {
            $query->where('status', $status);
        }

        $tasks = $query->with('projet')->get();


        return view('welcome', compact('tasks', 'project', 'status'));
    }


   
}
