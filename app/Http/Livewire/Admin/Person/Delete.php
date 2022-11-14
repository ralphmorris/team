<?php

namespace App\Http\Livewire\Admin\Person;

use App\Actions\Person\DeleteAction;
use Livewire\Component;

class Delete extends Component
{
	public $person;

	public $confirmingDeletePerson = false;

    public function render()
    {
        return view('livewire.admin.person.delete');
    }

    public function delete()
    {
    	app(DeleteAction::class)->delete($this->person);

    	$this->confirmingDeletePerson = false;

    	return redirect()->route('admin.team.index');
    }
}
