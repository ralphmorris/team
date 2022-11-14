<div>
    
	<div class="py-12">
	    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
	        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
	            <table class="table">
	            	<thead>
	            		<tr>
	            			<th>Team Member</th>
	            			<td class="text-right">
	            				@livewire('admin.person.create')
	            			</td>
	            		</tr>
	            	</thead>
	            	<tbody>
	            		@forelse ($people as $person)
						    <tr>
						    	<td>
						    		<div class="flex items-center">
							    		@if ($person->profile_photo)
							    			<div>
							    				<img class="w-24 rounded" src="{{$person->getProfileImageUrl()}}" alt="{{$person->name}}">
							    			</div>
							    		@endif
							    		<div class="font-bold pl-4"><a href="{{route('admin.team.edit', $person->id)}}">{{$person->name}}</a></div>
						    		</div>
						    	</td>
						    	<td class="text-right"><a href="{{route('admin.team.edit', $person->id)}}">Edit</a></td>
						    </tr>
						@empty
						    <tr>
						    	<td colspan="2">No results found</td>
						    </tr>
						@endforelse
	            	</tbody>
	            </table>

	            <div class="p-8">
		            {{$people->links()}}
	            </div>
	        </div>
	    </div>
	</div>

</div>
