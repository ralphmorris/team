<div>

	<x-jet-danger-button wire:click="$set('confirmingDeletePerson', true)" wire:loading.attr="disabled">
        {{ __('Delete Person') }}
    </x-jet-danger-button>

	<div class="text-left">
		<x-jet-dialog-modal wire:model="confirmingDeletePerson">
		    <x-slot name="title">
		        <p class="mb-4">{{ __('Are you sure you would like to delete ' . $person->name . '?') }}</p>

		        <p class="text-xs">They may be upset...</p>
		    </x-slot>

		    <x-slot name="content">

		    </x-slot>

		    <x-slot name="footer">
		        <x-jet-secondary-button wire:click="$toggle('confirmingDeletePerson')" wire:loading.attr="disabled">
		            {{ __('Cancel') }}
		        </x-jet-secondary-button>

		        <x-jet-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
		            {{ __('Delete Person') }}
		        </x-jet-danger-button>
		    </x-slot>
		</x-jet-dialog-modal>
	</div>

</div>
