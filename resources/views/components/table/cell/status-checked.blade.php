@props(['column', 'model'])
<label class="inline-flex items-center space-x-2">
    <input value="published" wire:model='status.{{ $model->id }}'
        {{ $attributes->class(sprintf('form-switch h-5 w-10 rounded-full bg-slate-300 before:rounded-full before:bg-slate-50 checked:bg-%s checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:bg-accent dark:checked:before:bg-white', $model->status_color))->merge($column->attributes()) }}
        type="checkbox" />
    @if ($label = data_get($model, $column->name))
        <span> {{ __($label) }}</span>
    @endif
</label>
