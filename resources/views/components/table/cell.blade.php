
{{--
-- Important note:
--
-- This template is based on an example from Tailwind UI, and is used here with permission from Tailwind Labs
-- for educational purposes only. Please do not use this template in your own projects without purchasing a
-- Tailwind UI license, or they’ll have to tighten up the licensing and you’ll ruin the fun for everyone.
--
-- Purchase here: https://tailwindui.com/
--}}

<td {{ $attributes->merge(['class' => 'whitespace-nowrap px-4 py-2 font-medium text-slate-700 dark:text-navy-100 sm:px-5']) }}>
    {{ $slot }}
</td>