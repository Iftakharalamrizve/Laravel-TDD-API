<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoListController extends Controller
{


    public function index()
    {
        $lists = TodoList::all();
        return response ($lists);
    }

    public function show(TodoList $list)
    {
        return response ($list);
    }

    public function store(Request $request)
    {
        $request->validate (['name'=>'required']);
        $list = TodoList::create($request->all());
        return response ($list,Response::HTTP_CREATED);
    }
}
