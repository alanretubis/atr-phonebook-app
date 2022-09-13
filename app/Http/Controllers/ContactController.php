<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function userContactList($id)
    {
        $user = User::find($id);
        return view('user_contacts', compact('user', 'id'));
    }

    public function allContactList()
    {
        return view('contact_list');
    }
}
