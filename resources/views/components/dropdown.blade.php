{{--
-- Important note:
--
-- This template is based on an example from Tailwind UI, and is used here with permission from Tailwind Labs
-- for educational purposes only. Please do not use this template in your own projects without purchasing a
-- Tailwind UI license, or they’ll have to tighten up the licensing and you’ll ruin the fun for everyone.
--
-- Purchase here: https://tailwindui.com/
--}}

@props(['label' => ''])

<div x-data="{ open: @entangle('isShowPopper').defer }" @keydown.window.escape="open= false" @click.away="open= false"
    class="relative inline-block text-left z-10">
    <div>
        <span class="rounded-md shadow-sm">
            <button  wire:click="$toggle('isShowPopper')"
                class="hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/2"
                id="options-menu" aria-haspopup="true" x-bind:aria-expanded="open" aria-expanded="true">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                </svg>
            </button>
        </span>
    </div>

    <div x-show="open" style="display: none;" x-description="Dropdown panel, show/hide based on dropdown state."
        x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95"
        class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg">
        <div class="rounded-md bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700 shadow-xs">
            <div class="py-1 w-full" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
