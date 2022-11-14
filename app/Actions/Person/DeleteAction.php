<?php

namespace App\Actions\Person;

use App\Models\Person;
use Illuminate\Support\Facades\Storage;

class DeleteAction
{
	public function delete(Person $person)
	{
		if ($person->profile_photo) {
			Storage::delete($person->profile_photo);
		}

		$person->delete();
	}
}