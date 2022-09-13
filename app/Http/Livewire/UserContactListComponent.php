<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserContactListComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $contacts;
    public $user, $perPage = 10;

    public function mount($id)
    {
        $this->user = User::find($id);
    }

    public function render()
    {
        $this->contacts = $this->user->contacts()->paginate($this->perPage);
        return view('livewire.user-contact-list-component', ['contacts' => $this->contacts]);
    }

    public function removeFromUser(Contact $contact, User $user)
    {
        $this->contact = $contact;
        $this->contact->users()->detach($user);
        session()->flash('success', 'Contact Information successfully deleted!');

        return redirect(route('user.contacts', ['id' => $user]));
    }

    public function loadMore()
    {
        $this->perPage += 10;
    }
}
