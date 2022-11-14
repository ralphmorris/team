<div>
    
    <section class="py-8">
		<div class="max-w-medium mx-auto">
			@if ($person->profile_photo)
				<div class="bg-brand-primary-2 flex items-end justify-center mb-8">
					<img class="" src="{{$person->getProfileImageUrl()}}" alt="{{$person->name}}">
				</div>
				<div class="px-4 lg:px-0">
					<h1 class="text-brand-primary-2 text-5xl mb-1">{{$person->name}}</h1>
					<div class="text-lg mb-5">
						{{$person->position}}
					</div>
					<div class="flex gap-4 border-b mb-8 pb-2">
						@include('livewire.person._location', ['person' => $person])
						<div class="">
							<span class="font-bold">Languages:</span> {{$person->languages}}
						</div>
					</div>
					@if ($person->bio)
						<div>
							<h2 class="uppercase text-brand-primary-2 font-bold text-lg mb-4">About me</h2>

							<p class="text-xl">{{$person->bio}}</p>
						</div>
					@endif
				</div>
			@endif

		</div>
    </section>

</div>