<table class="table table-responsive-sm table-striped" wire:sortable="updateTaskOrder">
    <tbody>
        @foreach ($tasks as $task)
            <tr wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}">
                <td>{{ $task->name }}</td>
                <td>
                    <a class="btn btn-small btn-info"href="{{ route('admin.checklists.tasks.edit', [$checklist, $task]) }}">{{  __('Edit') }}</a>
                    <form style="display: inline-block;"
                        action="{{ route('admin.checklists.tasks.destroy', [$checklist, $task]) }}"
                        method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-small btn-danger" type="submit"
                            onClick="return confirm('{{ __('Are you sure?') }}')">{{ __('Delete') }}</button>
                    </form>
                </td>

            </tr>
        @endforeach

    </tbody>
</table>