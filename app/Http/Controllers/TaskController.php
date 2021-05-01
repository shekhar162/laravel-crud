<?php
/**
 * @package  crud
 * @author   corinfotech by chandrashekhar
 */

namespace App\Http\Controllers;

use App\task;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dataArr = [];
        $tasks = task::all();
        foreach($tasks as $id => $task){
            $dataArr[$id]['id']             = $task['id'];
            $dataArr[$id]['title']          = $task['title'];
            $dataArr[$id]['shortDesc']      = $task['shortDesc'];
            $dataArr[$id]['status']         = ($task['isCompleted'] == 1) ? 'Yes':'No';
            $dataArr[$id]['createdAt']      = $task['created_at'];
        }

        return view('tasks.list')->with('dataArr', $dataArr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'shortDesc' => 'required|max:255'
        ]);

        if($validator->fails()){

            return Redirect::back()->withErrors($validator)->withInput();
        }else{

            $task = new task([
                'title' => $request->get('title'),
                'shortDesc' => $request->get('shortDesc'),
            ]);
            $task->save();

            return Redirect::to('/tasks')->with('notification', 'Task added');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $taskDetails = task::find($id);

        if($taskDetails !=null){
            return view('tasks.taskDetails')->with('taskDetails', $taskDetails);
        }else{
            return Redirect::to('/tasks')->with('notification', 'No page found');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $taskDetails = task::find($id);
        if($taskDetails !=null){
            return view('tasks.edit')->with('taskDetails', $taskDetails);
        }else{
            return Redirect::to('/tasks')->with('notification', 'No page found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'shortDesc' => 'required|max:255',
        ]);

        if($validator->fails()){

            return Redirect::back()->withErrors($validator)>withInput();

        }else{
            $task = task::find($id);
            $task->title = $request->input('title');
            $task->shortDesc = $request->input('shortDesc');
            if($task->save()){
                return Redirect::to('/tasks')->with('notification', 'Task Updated');
            }else{
                return Redirect::back()->with('notification', 'Failed to update, Please try after some time');
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $task = task::find($id);
        if($task->delete()){
            return Redirect::to('/tasks')->with('notification', 'Task deleted');
        }else{
            return Redirect::to('/tasks')->with('notification', 'Failed to delete, Please try after some time');
        }
    }
}
