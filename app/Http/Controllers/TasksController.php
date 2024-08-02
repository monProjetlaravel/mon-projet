<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Task;
use Illuminate\Http\Request;



class TasksController extends Controller
{
    public function index (){
        // $tasks = Task::all();
        $tasks = Task::with('projet')->get();
        return view("tasks.index",compact('tasks'));
    }

    public function create(){
        $projets = Projet::all();
        
        return view("tasks.create", compact('projets'));
        
    }


    public function store(Request $request ){

            $validate = $request->validate([
            'projet_id' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|max:255',
            
        ]);

       Task::create($validate);
       return redirect('/tasks');
    }
   
    public function edit($id)
    {
        $task = Task::find($id);
        $projets=Projet::all();
        return view('tasks.edit', compact('task','projets'));
    } 



    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'projet_id' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|max:255',
        ]);

        $tasks = Task::findOrFail($id);
        $tasks->update($request->all());

        return redirect('/tasks');
    }


    public function destroy($id){
    
        $task = Task::findorFail($id);
        $task->delete();
    }


}
