@props([
    'name' => null,
    'sortable' => null,
    'direction' => $this->getDirection(),
    'sort' => $this->getSortField()
])
<th
    {{ $attributes->class('whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5') }}>
    @unless($sortable)

        <span> {{ $slot }}</span>

    @else

        <button wire:click="sort('{{$name}}')" class="flex items-center justify-between w-full">

            <span>{{ $slot }}</span>

            @if ($direction === 'asc' && $name == $sort)

                <x-tall-icon name="chevron-up" class="w-4 h-4"/>

            @elseif($direction === 'desc' && $name == $sort)

                <x-tall-icon name="chevron-down" class="w-4 h-4"/>

            @else

                <x-tall-icon name="chevron-up-down" />

            @endif

        </button>

    @endunless

</th>
