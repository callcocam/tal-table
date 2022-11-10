<div class="sm:col-span-2">
    <span>{{ __('Status') }}:</span>
    <div class="mt-2 grid grid-cols-1 gap-4 sm:grid-cols-4 sm:gap-5 lg:gap-6">
        @foreach ($status as $key => $value)
            <label class="inline-flex items-center space-x-2">
                <input
                     value="{{ $key }}"
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 checked:border-slate-500 checked:bg-slate-500 hover:border-slate-500 focus:border-slate-500 dark:border-navy-400 dark:checked:bg-navy-400"
                    type="radio" wire:model="filters.status"/>
                <span>{{ __($value) }}</span>
            </label>
        @endforeach
    </div>
</div>
