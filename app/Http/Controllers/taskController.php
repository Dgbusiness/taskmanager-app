<?php

namespace App\Http\Controllers;

use App\projects;
use App\task;
use Illuminate\Http\Request;

class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $proy = projects::find($id);
        return view('tasks.create')->with('proy', $proy);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'priority' => 'required'
        ]);
        $task = new task;
        $task->name = $request->input('name');
        $task->priority = $request->input('priority');
        $task->projects_id = $request->input('projects_id');
        $task->save();
        return redirect(route('projects.show', ['project' => $request->input('projects_id')]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = task::find($id);
        return view('tasks.edit')->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'priority' => 'required'
        ]);
        $task = task::find($id);
        $task->name = $request->input('name');
        $task->priority = $request->input('priority');
        $task->projects_id = $request->input('projects_id');
        $pId = $task->projects_id;
        $task->save();
        return redirect(route('projects.show', ['project' => $pId]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = task::find($id);
        $task->delete();
        return back();
    }

    public function updateOrder(Request $request) {

        if($request->has('ids')){
            $arr = explode(',',$request->input('ids'));
            
            foreach($arr as $sortOrder => $id){
                $task = task::find($id);
                $pId = $task->projects_id;
                $task->priority = $sortOrder + 1;
                $task->save();
            }
            return redirect(route('projects.show', ['project' => $pId]));
        }
    }
}
