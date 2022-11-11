{{--
-- Important note:
--
-- This template is based on an example from Tailwind UI, and is used here with permission from Tailwind Labs
-- for educational purposes only. Please do not use this template in your own projects without purchasing a
-- Tailwind UI license, or they’ll have to tighten up the licensing and you’ll ruin the fun for everyone.
--
-- Purchase here: https://tailwindui.com/
--}}

@props(['type' => 'link'])

@if ($type === 'link')
    <a {{ $attributes->merge(['href' => '#', 'class' => 'flex w-full items-center px-3 h-8 pr-12 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100']) }}
        role="menuitem">
        {{ $slot }}
    </a>
@elseif ($type === 'button')
    <button
        {{ $attributes->merge(['type' => 'button', 'class' => 'flex  w-full items-center px-3 h-8 pr-12 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100']) }}
        role="menuitem">
        {{ $slot }}
    </button>
@endif
