@props(['column', 'model'])
<span {{ $attributes->merge($column->attributes()) }}>
    {{ data_get($model, $column->name) }}
</span>