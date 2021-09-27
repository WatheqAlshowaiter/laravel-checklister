<table class="table table-responsive-sm">
    <tbody>
        @foreach ($tasks as $task)
            <tr>
                <td>
                    @if ($task->position > 1)
                        <a wire:click.prevent="task_up({{ $task->id }})" href="#">
                            &uarr;
                        </a>
                    @endif
                    @if ($task->position < $tasks->max('position'))
                        <a wire:click.prevent="task_up({{ $task->id }})" href="#">
                            &darr;
                        </a>
                    @endif

                </td>
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
