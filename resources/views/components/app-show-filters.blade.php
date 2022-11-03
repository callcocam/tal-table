@props(['showAttr' => []])
<main class="main-content w-full px-[var(--margin-x)] pb-8">
    <div class="flex items-center space-x-4 py-5 lg:py-6">
        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            {{ data_get($showAttr, 'title', 'Show Model') }}
        </h2>
        <div class="hidden h-full py-1 sm:flex">
            <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
        </div>
        <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
            <li class="flex items-center space-x-2">
                @if (\Route::has(data_get($showAttr, 'routeEdit')))
                    <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                        href="{{ route(data_get($showAttr, 'routeEdit', 'admin')) }}">
                        {{ data_get($showAttr, 'description', 'Current') }}
                    </a>
                @elseif(\Route::has(data_get($showAttr, 'routeList')))
                    <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                        href="{{ route(data_get($showAttr, 'routeList', 'admin')) }}">
                        {{ data_get($showAttr, 'description', 'Current') }}
                    </a>
                @else
                    <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                        href="{{ route('admin') }}">
                        {{ data_get($showAttr, 'description', 'Current') }}
                    </a>
                @endif
                <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewbox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </li>
            <li>{{ data_get($showAttr, 'active', 'Active') }}</li>
        </ul>
    </div>
    <!-- Users Table -->
    <div x-data="{ isFilterExpanded: false }">
        <div class="flex items-center justify-between">
            <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                {{ data_get($showAttr, 'active', 'Show Model') }}
            </h2>
            <div class="flex">
                @isset($filters)
                    @isset($actions)
                        {{ $actions }}
                    @endisset
                    <button @click="isFilterExpanded = !isFilterExpanded"
                        class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewbox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M18 11.5H6M21 4H3m6 15h6" />
                        </svg>
                    </button>
                @endisset
            </div>
        </div>
        @isset($filters)
            <div x-show="isFilterExpanded" x-collapse>
                <div class="max-w-full py-3">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:gap-6">
                        {{ $filters }}
                    </div>
                    <div class="mt-4 space-x-1 text-right">
                        <button @click="isFilterExpanded = ! isFilterExpanded"
                            class="btn font-medium text-slate-700 hover:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-100 dark:hover:bg-navy-300/20 dark:active:bg-navy-300/25">
                            {{ __('Cancel') }}
                        </button>

                        <button wire:click="gerarApp"
                            class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            {{ __('Save Or Update') }}
                        </button>

                        <button wire:click="up"
                            class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            {{ __('Gerar Migration') }}
                        </button>
                    </div>
                </div>
            </div>
        @endisset
        <div class="card mt-3">
            <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                {{ $slot }}
            </div>
            <div
                class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">
                @isset($pagination)
                    {{ $pagination }}
                @endisset
            </div>
        </div>
    </div>
</main>
