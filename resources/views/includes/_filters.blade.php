<tr class="p-2 flex-1 w-full">
    @if ($sortable)
        <th>

        </th>
    @elseif($checkbox)
        <th>
            <div class="flex px-2 space-x-2 align-middle">
                <x-toggle wire:click="selectCheckboxAll()" wire:model.defer="checkboxAll" lg />
            </div>
        </th>
    @endif
    @if ($columns)
        @foreach ($columns as $column)
            <th>
                @include(include_table('filters._date-picker'), compact('column', 'theme'))
                @include(include_table('filters._date-renge'), compact('column', 'theme'))
                @include(include_table('filters._input-text'), compact('column', 'theme'))
                @include(include_table('filters._input-select'), compact('column', 'theme'))
            </th>
        @endforeach
    @endif
    <th>
        @if ($this->isSearch())
            <x-input wire:model.debounce.500ms="search" right-icon="search" placeholder="{{ __('Search..') }}" />
        @endif
    </th>
    <th>
        @if (\Route::has($this->create))
            <x-button icon="plus" positive squared href="{{ route($this->create) }}"
                label="{{ __('Adicionar') }}" teal flat />
        @endif
    </th>
</tr>
