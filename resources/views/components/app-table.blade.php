<div class="card mt-3">
    <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
        <table class="is-hoverable w-full text-left">
            <thead>
                <tr>
                    {{ $head }}
                </tr>
            </thead>
            <tbody>
                {{ $slot }}
            </tbody>
        </table>
    </div>
    <div class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">
        @isset($pagination)
            {{ $pagination }}
        @endisset
    </div>

    <!-- Delete Transactions Modal -->
    <form wire:submit.prevent="deleteSelected">
        <x-tall-table.modal.confirmation wire:model.defer="showDeleteModal">
            <x-slot name="title">Delete Transaction</x-slot>

            <x-slot name="content">
                <div class="py-8 text-cool-gray-700">Are you sure you? This action is irreversible.</div>
            </x-slot>

            <x-slot name="footer">
                <x-tall-button.secondary wire:click="$set('showDeleteModal', false)">Cancel</x-tall-button.secondary>

                <x-tall-button.primary type="submit">Delete</x-tall-button.primary>
            </x-slot>
        </x-tall-table.modal.confirmation>
    </form>
</div>
