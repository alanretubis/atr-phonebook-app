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
    public $perPage = 10;

    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {
        $this->users = User::paginate($this->perPage);
        return view('livewire.user-list-component', ['users' => $this->users]);
    }

    public function loadMore()
    {
        $this->perPage += 10;
    }
}
