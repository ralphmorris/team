<?php

namespace App\Http\Livewire\Person;

use App\Models\Person;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
	use WithPagination;
	
    protected $perPage = 6;

	public $search;

    public $people;

	protected $queryString = ['search'];

    public $offset = 0;

    public $noMoreResults = false;

    public function mount()
    {
        $this->people = $this->query();
    }

    public function updatedSearch()
    {
        $this->offset = 0;
        $this->people = $this->query();
    }

    public function render()
    {
        return view('livewire.person.index', [
        	'people' => $this->people,
        ])
        ->layout('layouts.guest');
    }

    public function query()
    {
        $results = Person::query()
                ->when($this->search, function($query) {
                    return $query->where('name', 'like', '%' . $this->search . '%');
                })
                ->whereNotNull('profile_photo')
                ->offset($this->offset)
                ->take($this->perPage)
                ->get();

        if ($results->count() < $this->perPage) {
            $this->noMoreResults = true;
        } else {
            $this->noMoreResults = false;
        }

        return $results;
    }

    public function loadMore()
    {
        $this->offset = $this->offset + $this->perPage;

        $this->people = $this->people->merge($this->query());
    }
}
