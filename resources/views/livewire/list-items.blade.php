<div class="items-list">
    <table>
        <tr>
            <th>Task</th>
            <th>Statu</th>
            <th>Actions</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td class="task @if ($item->completed) task-completed @endif">
                    {{ $item->title }}
                </td>

                <td class="completed-at @if ($item->completed) task-completed @else task-incompleted @endif">
                    @if ($item->completed)
                        Completed at {{ $item->completed_at }}
                    @else
                        Incompleted
                    @endif
                </td>

                <td class="action">
                    @if ($item->completed)
                        <button class="btn incompleted" wire:click="incompleted({{ $item->id }})">Inomplete</button>
                    @else
                        <button class="btn completed" wire:click="completed({{ $item->id }})">Complete</button>
                    @endif
                    <button class="btn delete" wire:click="delete({{ $item->id }})">Delete</button>

                </td>
            </tr>
        @endforeach

    </table>

</div>
