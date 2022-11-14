<div>
    
	<div class="max-w-large">
		<div class="p-6">
			<div class="search-form">
				<div class="search-form__inner relative">
					<input class="bg-brand-grey-3 border-0 rounded-lg" class="p-2" type="text" wire:model="search">
					<div class="absolute right-2 top-0 bottom-0 flex items-center">
						@include('svg.search')
					</div>
				</div>
			</div>
		</div>

		<div class="team-index">
			<h2 class="team-index__title">Management Team</h2>

			<div class="grid grid-cols-12 gap-4">
				@forelse($people as $person)

					<article class="col-span-12 sm:col-span-6 lg:col-span-4">
						<div class="person-card">
							<a href="{{route('person.show', $person->slug)}}" class="person-card__header">
								@if ($person->profile_photo)
								 	<img src="{{$person->getProfileImageUrl()}}" alt="{{$person->name}}">
								@endif 
							</a>
							<div class="person-card__content p-4">
								<h3 class="text-brand-primary-2 text-3xl mb-2">{{$person->name}}</h3>
								<p class="text-grey-1 mb-4 text-lg">{{$person->position}}</p>
								<div class="mb-8">
									@include('livewire.person._location', ['person' => $person])
								</div>
								<div>
									<a class="bg-brand-secondary-1 text-brand-grey-1 py-2 px-8 font-bold rounded-lg inline-block uppercase text-sm" href="{{route('person.show', $person->slug)}}">View Bio</a>
								</div>
							</div>
						</div>
					</article>

				@empty
					<div class="col-span-12 text-center p-4">
						No results found.
					</div>
				@endforelse

			</div>
		
			@unless ($noMoreResults)
				<div class="py-10">
					<button wire:click="loadMore" class="flex items-center font-bold text-brand-grey-2 gap-3 mx-auto border border-brand-grey-2 rounded-lg py-3 px-4  uppercase text-sm">
						@include('svg.plus')
						Show more
					</button>
				</div>
			@endunless

		</div>
	</div>

</div>
