<?php

namespace App\Http\Controllers;

use App\Todo;

use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index(){
        //fetch all todos from database and display them in the index page

    

        return view('todos.index')->with('todos',Todo::all());

    }
    public function show(Todo $todo)
    {   
       // $todo =Todo::find($todoId);

        return view('todos.show')->with('todo',$todo);
    }

    public function create(){

        return view('todos.create');
    }
    public function store(){

            $this->validate(request(),[

                'name'=>'required|min:6|max:20',
                'description'=>'required'

            ]);
        $data=request()->all();

        $todo = new Todo();
        $todo->name=$data['name'];
        $todo->description=$data['description'];
        $todo->completed=false;
        $todo->save();

        session()->flash('success','Todo Created Successfully');

        return redirect('./todos');
    }


    public function edit(Todo $todo){

        
       // $todo =Todo::find($todoId);
        return view('todos.edit')->with('todo',$todo);

    }

    public function update()
    {
        $this->validate(request(),[

            'name'=>'required|min:6|max:20',
            'description'=>'required'

        ]);
       // dd(request());
    $data=request()->all();
    $todoId=$data['todo_id'];
    $todo = Todo::find($todoId);

    $todo->name=$data['name'];
    $todo->description=$data['description'];
    $todo->completed=false;
    $todo->save();
    
    session()->flash('success','Todo Updated Successfully');

    return redirect('./todos');
    }
    public function destroy(Todo $todo)
    {
       // $todo= Todo::find($todoId);
        $todo->delete();
        
        session()->flash('success','Todo Deleted Successfully');
    return redirect('./todos');
    }
    public function complete(Todo $todo){
    $todo->completed=true;
    $todo->save();
    session()->flash('success','Todo Completed Successfully');

    return redirect('./todos');
    }
}
