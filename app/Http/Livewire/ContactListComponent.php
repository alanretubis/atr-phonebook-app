<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactListComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $contacts;
    public $perPage = 10;

    public function render()
    {
        $this->contacts = Contact::paginate($this->perPage);
        return view('livewire.contact-list-component', ['contacts' => $this->contacts]);
    }

    public function deleteContact(Contact $contact)
    {
        $this->contact = $contact;
        $this->contact->users()->detach();
        $this->contact->delete();

        session()->flash('success', 'Contact Information successfully deleted!');
        return redirect(route('contact.list'));
    }

    public function loadMore()
    {
        $this->perPage += 10;
    }
}
