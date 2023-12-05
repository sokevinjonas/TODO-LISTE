<?php

namespace App\Livewire;

use App\Models\Tache;
use Livewire\Component;
use Livewire\Attributes\Rule;
use WithPagination;

class TodoListe extends Component
{   

    #[Rule('required|min:3|max:50')]
    public $titre;

    public function create()
    {
       $validated = $this->validateOnly('titre');
       Tache::create($validated);
       $this->reset();
       session()->flash('success', 'tache creer');
    }

    public function render()

    {
        return view('livewire.todo-liste',
        [
            'taches' => Tache::latest()->paginate(2),
        ]
    );
    }
}
