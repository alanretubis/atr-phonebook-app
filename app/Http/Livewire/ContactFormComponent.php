<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use App\Models\User;
use Livewire\Component;

class ContactFormComponent extends Component
{
    public $edit = false, $user_required = true;
    public $user_id, $user_name, $contact, $name, $phone_number;
    protected $listeners = ['setUserId', 'editContact'];

    public function render()
    {
        return view('livewire.contact-form-component');
    }

    public function setUserId(User $user)
    {
        $this->user_name = $user->name;
        $this->user_id = $user->id;
    }

    public function editContact(Contact $contact)
    {
        $this->contact = $contact;
        $this->name = $contact->name;
        $this->phone_number = $contact->phone_number;
        $this->edit = true;
    }

    public function submit()
    {
        $message = array(
            "user_id.required" => "Please select user first.",
            "phone_number.regex" => "Please use the +(country code) (space) (10 digits number) format."
        );

        if ($this->edit == true) {

            $this->validate([
                'name' => 'required|unique:contacts,name,' . $this->contact->id,
                'phone_number' => 'required|regex:/^([+]\d{2})? \d{10}$/',
            ], $message);

            // Create contact record if not exists
            $contact = Contact::find($this->contact->id);
            $contact->name = $this->name;
            $contact->phone_number = $this->phone_number;
            $contact->save();

            session()->flash('success', 'Contact Information updated!');
            return redirect(route('contact.list'));
        } else {

            $validation_rules = array(
                'name' => 'required',
                'phone_number' => 'required|regex:/^([+]\d{2})? \d{10}$/'
            );

            if ($this->user_required == true) {
                $validation_rules = array_merge($validation_rules, array('user_id' => 'required'));
            }

            $this->validate($validation_rules, $message);

            // Create contact record if not exists
            $contact = Contact::updateOrCreate(
                ['name' => $this->name, 'phone_number' => $this->phone_number]
            );
            if ($this->user_id != null) {
                // Attach Many to Many relationship of contact to user
                $contact->users()->attach($this->user_id);
            }
            session()->flash('success', 'Contact Information saved!');
        }

        // session()->flash('success', 'LOMA was successfully registered in the system.');
        // $this->emitTo('event-list', 'refreshList');

        return redirect(route('home'));
    }
}
