<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\User;
use Livewire\WithPagination;



class UsersIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search = "";


    public function updatingSearch() { // q en cada nueva busqueda empiece desde la página 1
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name', 'LIKE', '%'.$this->search.'%')
            ->orwhere('email', 'LIKE', '%'.$this->search.'%')
            ->paginate(5);

        return view('livewire.admin.users-index', compact('users'));
    }
}
