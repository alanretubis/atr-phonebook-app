<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserListComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $users;

    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {
        $this->users = User::paginate(10);
        return view('livewire.user-list-component', ['users' => $this->users]);
    }
}
