@props(['column', 'model'])
<div
    {{ $attributes->class(sprintf('badge space-x-2.5 px-0 text-%s dark:text-%s-light', $model->status_color, $model->status_color))->merge($column->attributes()) }}>
    <div class="h-2 w-2 rounded-full bg-current"></div>
    @if ($label = data_get($model, $column->name))
        <span> {{ __($label) }}</span>
    @endif
</div>
