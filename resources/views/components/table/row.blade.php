@props(['columns', 'model', 'tableAttr'])
<tr {{ $attributes->class('border-y border-transparent border-b-slate-200 dark:border-b-navy-500') }}>
    @if ($columns)
        <x-tall-table.cell>
            <x-tall-input.checkbox wire:model="selected" value="{{ $model->id }}" />
        </x-tall-table.cell>
        @foreach ($columns as $column)
            @if ($actions = array_filter($column->actions))
                <x-tall-table.cell>
                    @foreach ($actions as $action)
                        @if ($action->visible)
                            <x-tall-link-action :action="$action" href="{{ route($action->route, $model) }}" />
                        @endif
                    @endforeach
                </x-tall-table.cell>
            @else
                <x-tall-table.cell>
                    @if ($component = $column->component)
                        <x-dynamic-component component="tall-table.cell.{{ $component }}" :$column :$model />
                    @else
                        {{ data_get($model, $column->name) }}
                    @endif
                </x-tall-table.cell>
            @endif
        @endforeach
    @endif
    @if (data_get($tableAttr, 'sortable'))
        <x-tall-table.cell class="whitespace-nowrap px-4 py-3 sm:px-5">
            <x-tall-icon name="arrows-expand" />
        </x-tall-table.cell>
    @endif
</tr>
