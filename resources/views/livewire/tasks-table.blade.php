<table class="table table-responsive-sm" wire:sortable="updateTaskOrder">
    <tbody>
        @foreach ($tasks as $task)
            <tr wire:sortable.item="{{ $task->id }}" draggable="true" wire:key="task-{{ $task->id }}" style="cursor: move">
                <td>{{ $task->name }}</td>
                <td>
                    <a href="{{ route('admin.checklists.tasks.edit', [$checklist, $task]) }}"
                        class="btn btn-sm btn-primary">
                        {{ __('Edit') }}
                    </a>

                    <form action="{{ route('admin.checklists.tasks.destroy', [$checklist, $task]) }}" method="POST"
                        style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit"
                            onclick="return confirm('{{ __('Are You Sure to Delete this task?') }}')">
                            {{ __('Delete') }}
                        </button>
                    </form>
            </tr>
        @endforeach

    </tbody>
</table>
