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
                @forelse ($models as $model)
                    <x-tall-table.row :$columns :$model :$tableAttr wire:loading.class.delay="opacity-50"
                        wire:key="row-{{ $model->id }}" />

                @empty
                    <x-tall-table.sample-row wire:key="row-empty">
                        <x-tall-table.cell colspan="100">
                            <div class="flex flex-col justify-content-center">
                                <div class="flex justify-center items-center space-x-2">
                                    <x-tall-icon.inbox class="h-8 w-8 text-cool-gray-400" />
                                    <span
                                        class="font-medium py-8 text-cool-gray-400 text-xl">{{ __('No transactions found') }}...</span>
                                </div>
                                @if ($routeCreate = data_get($tableAttr, 'crud.create'))
                                    <x-tall-app-link href="{{ $routeCreate }}">
                                        <div class="flex space-x-1 w-full justify-center">
                                            <x-tall-icon name="plus" class="h-4.5 w-4.5" />
                                        {{ __('Create your first record') }}
                                        </div>
                                    </x-tall-app-link>
                                @endif
                            </div>
                        </x-tall-table.cell>
                    </x-tall-table.sample-row>
                @endforelse
                <x-slot name="pagination">
                    {{ $models->links() }}
                </x-slot>
            </x-tall-app-table>
        </x-tall-app-filter>
        @livewire('tall::admin.imports.csv-component', ['model' => $config])
    </x-tall-app-main>
