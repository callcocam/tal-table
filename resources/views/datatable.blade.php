<x-slot name="header">
    <header>
        <!-- Section Hero -->
        @include('tall-table::header', ['label' => \Arr::get($tableAttr, 'tableTitle')])

    </header>
</x-slot>
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto">
        <div class="py-2 min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg min-h-[400px]">
                @include(include_table('filters._show-filters'))
                <table class="min-w-full divide-y divide-gray-200">
                    @include(include_table('_thed'))
                    <tbody @if ($sortable) wire:sortable="updateOrder" @endif
                        class="bg-white divide-y divide-gray-200 ">
                        @forelse ($models as $model)
                            <tr @if ($sortable) wire:sortable.item="{{ $model->id }}" 
                             wire:key="task-{{ $model->id }}" @endif>
                                @include(include_table('_checkbox'))

                                @include(include_table('_tbody'))
                                @if ($actions)
                                    <td colspan="2">
                                        <div class="flex px-2 space-x-2 align-middle">
                                            @foreach ($actions as $action)
                                                @include(include_table($action->view), compact('model'))
                                            @endforeach
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ $this->count_columns }}">{{ __('Nenhum registro encontrado') }}</td>
                            </tr>
                        @endforelse
                        <!-- More people... -->
                    </tbody>
                    <tfoot>
                        @include(include_table('_pagination'))
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
