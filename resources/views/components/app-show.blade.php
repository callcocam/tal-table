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
    <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
        <!-- Users Table -->
        <div>
            <div class="flex items-center justify-between">
                <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">{{ data_get($this->model, $this->columnName, 'Active') }}</h2>
            </div>
            <div class="card mt-3">
                <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</main>
