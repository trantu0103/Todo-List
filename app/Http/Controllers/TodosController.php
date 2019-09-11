<?php

namespace App\Http\Controllers;

use App\Todo;

use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index() {
        return view('todos.index')->with('todos', Todo::all());
    }
    public function show(Todo $todo) {
        return view('todos.show')->with('todo', $todo);
    }
    public function create() {
        return view('todos.create');
    }
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:10',
            'description' => 'required'
        ]);

        $todo = new Todo();
        $todo->name = $request->input('name');
        $todo->description = $request->input('description');
        $todo->completed = false;
        $todo->save();

        session()->flash('success', 'Todo created successfully');

        return redirect('todos');
    }

    public function edit(Todo $todo) {
        return view('todos.edit')->with('todo', $todo);
    }

    public function update(Request $request, Todo $todo) {
        $request->validate([
            'name' => 'required|max:10',
            'description' => 'required'
        ]);
        $todo->name = $request->input('name');
        $todo->description = $request->input('description');
        $todo->save();
        session()->flash('success', 'Todo updated successfully');

        return redirect('todos');
    }
    public function destroy(Todo $todo) {
        $todo->delete();
        session()->flash('success', 'Todo deleted successfully');

        return redirect('todos');
    }
    public function complete(Todo $todo) {
        $todo->completed = true;
        $todo->save();
        session()->flash('success', 'Todo completed successfully');

        return redirect('todos');
    }
}
