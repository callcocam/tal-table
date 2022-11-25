@props(['columns', 'model', 'tableAttr'])
<tr {{ $attributes->class('border-y border-transparent border-b-slate-200 dark:border-b-navy-500') }}>
    @if ($columns)
        <x-tall-table.cell>
            @if (auth()->id() == $model->id)
                <x-tall-input.checkbox disabled value="{{ $model->id }}" />
            @else
                <x-tall-input.checkbox wire:model="selected" value="{{ $model->id }}" />
            @endif
        </x-tall-table.cell>
        @foreach ($columns as $column)
            @if ($actions = array_filter($column->actions))
                <x-tall-table.cell>
                    <div class="flex space-x-4 items-center">
                        @foreach ($actions as $action)
                            {{-- @can($action->route) --}}
                                @if ($action->visible)
                                    <x-tall-link-action title="{{$action->route}}" :model="$model" :action="$action"
                                        href="{{ route($action->route, $model) }}" />
                                @endif
                            {{-- @endcan --}}
                        @endforeach
                    </div>
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
