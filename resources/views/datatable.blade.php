<x-tall-app-main :$tableAttr>
    <x-tall-app-filter :$filters :$tableAttr :status="$statusOptions" wire:model="isFilterExpanded">
        @if ($selected)
            <x-slot name="actions">
                <x-tall-dropdown label="Bulk Actions">
                    <x-tall-dropdown.item type="button" wire:click="exportSelected" class="flex items-center space-x-2">
                        <x-tall-icon.download class="text-cool-gray-400" /> <span>{{ __('Export') }}</span>
                    </x-tall-dropdown.item>
                    <x-tall-table.delete-confirm wire:click="deleteSelected">
                        <x-tall-icon.trash class="text-cool-gray-400" /> <span>{{ __('Delete') }}</span>
                    </x-tall-table.delete-confirm>
                </x-tall-dropdown>
            </x-slot>
        @endif

        <x-tall-app-table>
            <x-slot name="head">
                <x-tall-table.heading class="pr-0 w-8">
                    <x-tall-input.checkbox wire:model="selectPage" />
                </x-tall-table.heading>
                @foreach ($columns as $column)
                    <x-tall-table.heading :sortable="$column->sortable" :name="$column->name">
                        {{ __($column->label) }}
                    </x-tall-table.heading>
                @endforeach
            </x-slot>
            @if ($selectPage)
                <x-tall-table.sample-row class="bg-cool-gray-200" wire:key="row-message">
                    <x-tall-table.cell colspan="100">
                        @unless($selectAll)
                            <div>
                                <span>{{ __('You have selected') }} <strong>{{ $models->count() }}</strong>
                                    {{ __('transactions, do you want to select all') }}
                                    <strong>{{ $models->total() }}</strong>?</span>
                                <x-tall-button.link wire:click="selectAll" class="ml-1 text-blue-600">{{ __('Select All') }}
                                </x-tall-button.link>
                            </div>
                        @else
                            <span>{{ __('You are currently selecting all') }} <strong>{{ $models->total() }}</strong>
                                {{ __('transactions') }}.</span>
                @endif
                </x-tall-table.cell>
                </x-tall-table.sample-row>
                @endif
                @foreach ($models as $model)
                    <x-tall-table.row :$columns :$model :$tableAttr wire:loading.class.delay="opacity-50"
                        wire:key="row-{{ $model->id }}" />
                @endforeach
                <x-slot name="pagination">
                    {{ $models->links() }}
                </x-slot>
            </x-tall-app-table>
        </x-tall-app-filter>
    </x-tall-app-main>