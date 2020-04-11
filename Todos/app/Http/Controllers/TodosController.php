<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
class TodosController extends Controller
{
    public function index()
    {
       // dd(Todo::all());
        return view('Todos.index')->with('todos', Todo::all());
    }

    public function show(Todo $todo){

        return view('Todos.show' )->with('todo' ,$todo);

    }

    public function create(){

        return view('Todos.create' );

    }

    public function store(){

        $this->validate(request() , [
            'name' => 'required|min:5|max:12',
            'description' => 'required',
        ]);

        $data = request()->all();
        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        $todo->save();

        session()->flash('success' , 'Todo created successfuly!');

        return redirect('/todos');

    }


    public function edit(Todo $todo){

              return view('Todos.edit')->with('todo' , $todo);
    }

    public function update(Todo $todo){

        $this->validate(request() , [
            'name' => 'required|min:5|max:20',
            'description' => 'required',
        ]);

        $data = request()->all();
        $todo->name =$data['name'];
        $todo->description = $data['description'];

        $todo->save();

        session()->flash('success' , 'Todo successfully updated');

        return redirect('/todos');

    }

    public function destroy(Todo $todo){

        $todo->delete();

        session()->flash('success' , 'Todo successfully deledted');

        return redirect('/todos');

    }

    public function complete(Todo $todo){

        $todo->completed = true;

        $todo->save();

        session()->flash('success' , 'Todo successfully completed');

        return redirect('/todos');
    }


}
