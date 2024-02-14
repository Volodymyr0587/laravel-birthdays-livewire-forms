<div>
    <!-- HEADER -->
    <x-header title="Hello" separator progress-indicator>
        <x-slot:middle class="!justify-end">
            <x-input placeholder="Search..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>
        <x-slot:actions>
            <x-button label="Add" @click="$wire.addModal = true" responsive icon="o-plus" class="btn-primary" />
        </x-slot:actions>
    </x-header>

    <!-- TABLE  -->
    <x-card>
        <x-table :headers="$headers" :rows="$users" :sort-by="$sortBy">
            @scope('actions', $user)
            <x-button icon="o-trash" wire:click="delete({{ $user['id'] }})" spinner class="btn-ghost btn-sm text-red-500" />
            @endscope
        </x-table>
    </x-card>

    <x-modal wire:model="addModal" title="Add Birthday" subtitle="" separator>
        <x-form wire:submit="save">
            <x-input label="Name" wire:model="form.name" />
            <x-input label="Email" wire:model="form.email" />
            <x-datetime label="Birthday" wire:model="form.dob" icon="o-calendar" />

            <x-slot:actions>
                <x-button label="Cancel" @click="$wire.addModal = false" />
                <x-button label="Save" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-modal>
</div>
