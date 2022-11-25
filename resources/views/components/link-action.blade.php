@props(['action','model'])

<a {{ $attributes->merge($action->attributes) }}>
    @if ($action->icon)
        <x-tall-icon name="{{ $action->icon }}" />
    @endif
    @if ($action->label)
        <span> {{ __($action->label) }}</span>
    @endif
</a>
