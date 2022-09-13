<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use App\Models\User;
use Livewire\Component;

class ContactFormComponent extends Component
{
    public $user_id, $user_name, $name, $phone_number;

    protected $listeners = ['setUserId'];

    public function render()
    {
        return view('livewire.contact-form-component');
    }

    public function setUserId(User $user)
    {
        $this->user_name = $user->name;
        $this->user_id = $user->id;
    }

    public function submit()
    {
        $message = array(
            "user_id.required" => "Please select user first.",
            "phone_number.regex" => "Please use the +(country code) (space) (10 digits number) format."
        );

        $this->validate([
            'user_id' => 'required',
            'name' => 'required',
            'phone_number' => 'required|regex:/^([+]\d{2})? \d{10}$/',
        ], $message);

        if ($this->user_id != null) {

            // Create contact record if not exists
            $contact = Contact::updateOrCreate(
                ['name' => $this->name, 'phone_number' => $this->phone_number]
            );

            // Attach Many to Many relationship of contact to user
            $contact->users()->attach($this->user_id);

            session()->flash('success', 'Contact Information saved!');
        }

        // session()->flash('success', 'LOMA was successfully registered in the system.');
        // $this->emitTo('event-list', 'refreshList');

        return redirect(route('home'));
    }
}
