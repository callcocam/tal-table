<div x-data="{ showModal: @entangle('showDeleteModal').defer }">
    @isset($button)
        {{ $button }}
    @endisset
    <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
        x-show="showModal" role="dialog" @keydown.window.escape="@this.set('showDeleteModal', false)">
        <div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300" x-on:click="@this.set('showDeleteModal', false)"
            x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"></div>
        <div class="relative max-w-md rounded-lg bg-white pt-10 p-4 text-center transition-all duration-300 dark:bg-navy-700"
            x-show="showModal" x-transition:enter="easy-out"
            x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]"
            x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]" 
            x-transition:leave="easy-in"
            x-transition:leave-start="opacity-100 [transform:translate3d(0,0,0)]"
            x-transition:leave-end="opacity-0 [transform:translate3d(0,1rem,0)]">

            {{ $slot }}

        </div>
    </div>
</div>
