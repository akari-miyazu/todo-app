<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;



class EditController extends Controller
{
    /**
 * GET /folders/{id}/tasks/{task_id}/edit
 */
public function showEditForm(int $id )
{
    $task = Task::find($id);

    return view('edit', [
        'task' => $task,
    ]);
}

public function edit(int $id,$request)
{
    // 1
    $task = Task::find($id);

    // 2
    $task->name = $request->name;
    $task->status = $request->status;
    $task->complete = $request->complete;
    $task->save();

    Toastr::success('タスクが変更されました！');

    // 3
    return redirect()->route('edit', [
        'id' => $task->id,
        '' => $request

    ]);
}
}


