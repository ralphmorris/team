<?php

namespace App\Http\Livewire\Person;

use App\Models\Person;
use Livewire\Component;

class Show extends Component
{
	public $person;

	public function mount($slug)
	{
		$this->person = Person::whereSlug($slug)->firstOrFail();
	}

    public function render()
    {
        return view('livewire.person.show')
	        ->layout('layouts.guest');
    }
}
