@if (\Route::has($action->route))
    <a class="{{ implode(' ', $action->class) }}" href="{{ route($action->route, $model) }}">
        @if ($action->icon)
            <x-icon name="{{ $action->icon }}" style="{{ $action->icon_type }}" class="{{ $action->icon_class }}" />
        @endif
        {{ __($action->label) }}
    </a>
@endif
