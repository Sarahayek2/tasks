<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasks  = Task::latest()->get();
        return view('home', compact('tasks'));
    }

    public function add_task(Request $request)
    {
        $request->validate([
            'task' => 'required'
        ]);

        Task::create([
            'task' => $request->task,
            'user_id' => Auth::id()
        ]);

        return redirect()-> route('home');
    }

    public function delete_task ($id)
    {
        Task::destroy($id);

        return redirect()-> route('home');
    }
}
