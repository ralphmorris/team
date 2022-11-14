<?php

namespace App\Http\Livewire\Admin\Person;

use App\Models\Person;
use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire.admin.person.create');
    }

    public function create()
    {
    	$person = Person::firstOrCreate([
    		'name' => null
    	]);

    	return redirect()->route('admin.team.edit', $person->id);
    }
}
