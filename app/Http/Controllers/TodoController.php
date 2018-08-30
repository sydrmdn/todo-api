<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

 class TodoController extends Controller
{
    public function index()
    {
        return Todo::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'completed' => 'required|boolean'
        ]);
        $todo = Todo::create($data);
        return response($todo, 201); // Created
    }

    public function update(Request $request, Todo $todo)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'completed' => 'required|boolean'
        ]);
        $todo->update($data);
        return response($todo, 200); // OK
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response('Successfully deleted!', 200); // OK
    }

    public function checkAll(Request $request)
    {
        $data = $request->validate([
            'completed' => 'required|boolean'
        ]);
        Todo::query()->update($data); // Bulk update
        return response('Successfully updated!', 200); // OK                
    }

    public function destroyCompleted(Request $request)
    {
        $request->validate([
            'todos' => 'required|array'
        ]);
        // Todo:destroy([1, 2, 3]); --> Bulk destroy
        Todo::destroy($request->todos);
        return response('Successfully deleted!', 200); // OK   
    }
}