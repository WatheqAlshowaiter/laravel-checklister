<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Checklist;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{

    public function store(StoreTaskRequest $request, Checklist $checklist): RedirectResponse
    {
        $position = $checklist->tasks()->where('user_id', NULl)->max('position') + 1;
        $checklist->tasks()->create($request->validated() + ['position' => $position]);
        return redirect()->route('admin.checklist_groups.checklists.edit', [$checklist->checklist_group_id, $checklist]);
    }

    public function edit(Checklist $checklist, Task $task): View
    {
        return view('admin.tasks.edit', compact('checklist', 'task'));
    }

    public function update(StoreTaskRequest $request, Checklist $checklist, Task $task): RedirectResponse
    {
        $task->update($request->validated());
        return redirect()->route('admin.checklist_groups.checklists.edit', [$checklist->checklist_group_id, $checklist]);
    }

    public function destroy(Checklist $checklist, Task $task): RedirectResponse
    {
        // for the sake of the position order
        $checklist->tasks()->where('user_id', NULl)->where('position', '>', $task->position)->decrement('position');
        $task->delete();
        return redirect()->route('admin.checklist_groups.checklists.edit', [$checklist->checklist_group_id, $checklist]);
    }
}
