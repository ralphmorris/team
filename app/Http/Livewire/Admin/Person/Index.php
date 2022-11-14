<?php

namespace App\Http\Livewire\Admin\Person;

use App\Models\Person;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
	use WithPagination;

    public function render()
    {
        return view('livewire.admin.person.index', [
        	'people' => Person::whereNotNull('name')->latest()->paginate(),
        ])
        ->layoutData([
            'pageTitle' => 'Team'
        ]);
    }
}
