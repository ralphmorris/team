<?php

namespace App\Actions\Person;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Facades\Storage;

class UpdateAction
{
	public function update($person, $data)
	{
		$validatedData = Validator::make($data, [
		    'profile_photo' => 'nullable|image|max:1024',
		    'name' => ['required', 'string', 'max:255'],
		    'slug' => ['required', 'string', 'max:255', Rule::unique('people')->ignore($person->id)],
		    'position' => ['required', 'string', 'max:255'],
		    'location' => ['required', 'string', 'max:255'],
		    'languages' => ['required', 'string', 'max:255'],
		    'bio' => ['required', 'string', 'max:500'],
		])->validate();

		$person->update(
			array_merge(
		    	$validatedData,
		    	[
		    		'profile_photo' => $this->maybeStoreNewProfilePhoto($person, $data)
		    	]
		    )
		);
	}

    public function maybeStoreNewProfilePhoto($person, $data)
    {
    	if (isset($data['profile_photo']) && $data['profile_photo'] instanceof TemporaryUploadedFile) {
    		if ($person->profile_photo) {
				Storage::delete($person->profile_photo);
    		}

    		return $data['profile_photo']->store('public/assets/'.$person->id);
    	}

    	return $person->profile_photo;
    }
}