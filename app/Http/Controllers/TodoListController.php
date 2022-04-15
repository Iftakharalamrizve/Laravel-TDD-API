<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    use RefreshDatabase;

    public function index()
    {
        $lists = TodoList::all();
        return response (['list'=>[]]);
    }
}
