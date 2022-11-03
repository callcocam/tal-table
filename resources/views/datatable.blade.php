<x-tall-app-table :tableAttr="$tableAttr">

    <x-slot name="actions">
        <ul>
            <li>
                <a href="{{ route('admin.make.create') }}"
                    class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>
            </li>
            <li>
                <a href="#"
                    class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another
                    Action</a>
            </li>
            <li>
                <a href="#"
                    class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something
                    else</a>
            </li>
        </ul>
    </x-slot>
    <x-slot name="header">
        <th
            class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
            {{ __('Name') }}
        </th>
        <th
            class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
            {{ __('Status') }}
        </th>
        <th
            class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
            Action
        </th>
    </x-slot>
    @if ($models)
        @foreach ($models as $model)
            <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $model->name }}</td>
                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                    <label class="inline-flex items-center">
                        <input value="published" wire:model='status.{{ $model->id }}'
                            class="form-switch h-5 w-10 rounded-full bg-slate-300 before:rounded-full before:bg-slate-50 checked:bg-primary checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:bg-accent dark:checked:before:bg-white"
                            type="checkbox" />
                    </label>
                </td>
                <td class="px-4 py-3 sm:px-5 flex space-x-3">
                    <a href="{{ route('admin.make.edit', $model) }}">
                        <x-tall-icon name="pencil" />
                    </a>
                    <a href="{{ route('admin.make.show', $model) }}">
                        <x-tall-icon name="eye" />
                    </a>
                </td>
            </tr>
        @endforeach
        <x-slot name="pagination">
            {{ $models->links() }}
        </x-slot>
    @endif
</x-tall-app-table>
