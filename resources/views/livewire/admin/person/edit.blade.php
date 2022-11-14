<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

		<x-jet-form-section submit="update">
		    <x-slot name="title">
		        {{ __('Team Member Details') }}
		    </x-slot>

		    <x-slot name="description">
		        
		    </x-slot>

		    <x-slot name="form">
		    	<div class="col-span-6 sm:col-span-4">
		    		@if ($person->profile_photo)
		    			<img class="w-24 mb-4 rounded" src="{{$person->getProfileImageUrl()}}" alt="{{$person->name}}">
		    		@endif
			    	<input type="file" wire:model.defer="state.profile_photo">
		            <x-jet-input-error for="profile_photo" class="mt-2" />
		    	</div>

		        <div class="col-span-6 sm:col-span-4">
		            <x-jet-label for="name" value="{{ __('Name') }}" />
		            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="none" />
		            <x-jet-input-error for="name" class="mt-2" />
		        </div>
		        <div class="col-span-6 sm:col-span-4">
		            <x-jet-label for="slug" value="{{ __('Slug') }}" />
		            <x-jet-input id="slug" type="text" class="mt-1 block w-full" wire:model.defer="state.slug" autocomplete="none" />
		            <x-jet-input-error for="slug" class="mt-2" />
		        </div>
		        <div class="col-span-6 sm:col-span-4">
		            <x-jet-label for="position" value="{{ __('Position') }}" />
		            <x-jet-input id="position" type="text" class="mt-1 block w-full" wire:model.defer="state.position" autocomplete="none" />
		            <x-jet-input-error for="position" class="mt-2" />
		        </div>
		        <div class="col-span-6 sm:col-span-4">
		            <x-jet-label for="location" value="{{ __('Location') }}" />
		            <x-jet-input id="location" type="text" class="mt-1 block w-full" wire:model.defer="state.location" autocomplete="none" />
		            <x-jet-input-error for="location" class="mt-2" />
		        </div>
		        <div class="col-span-6 sm:col-span-4">
		            <x-jet-label for="languages" value="{{ __('Languages') }}" />
		            <x-jet-input id="languages" type="text" class="mt-1 block w-full" wire:model.defer="state.languages" autocomplete="none" />
		            <x-jet-input-error for="languages" class="mt-2" />
		        </div>
		        <div class="col-span-6 sm:col-span-4">
		            <x-jet-label for="bio" value="{{ __('Bio') }}" />
		            <x-textarea rows="4" id="bio" class="mt-1 block w-full" wire:model.defer="state.bio" autocomplete="none" ></x-textarea>
		            <x-jet-input-error for="bio" class="mt-2" />
		        </div>
		    </x-slot>

		    <x-slot name="actions">
		        <x-jet-action-message class="mr-3" on="saved">
		            {{ __('Saved.') }}
		        </x-jet-action-message>

		        <x-jet-button>
		            {{ __('Save') }}
		        </x-jet-button>
		    </x-slot>
		</x-jet-form-section>

	</div>

	<div class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8 text-right">
		@livewire('admin.person.delete', ['person' => $person])
	</div>
</div>