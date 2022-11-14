<?php

namespace App\Http\Livewire\Admin\Person;

use App\Actions\Person\UpdateAction;
use App\Models\Person;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

	public $person;
	
	public $state;

	public function mount(Person $person)
    {
        $this->person = $person;

        $this->state = collect($this->person->toArray())->transform(function ($item, $key) {
		    return $key === 'profile_photo' ? null : $item;
		})
		->toArray();
    }

    public function render()
    {
        return view('livewire.admin.person.edit')
        	->layoutData([
	            'pageTitle' => 'Edit Team Member'
	        ]);;
    }

    public function update()
    {
    	app(UpdateAction::class)->update($this->person, $this->state);

        $this->emit('saved');
    }
}
