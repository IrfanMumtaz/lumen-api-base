<?php


namespace App\Http\Services\V1;


use App\Models\Contact;
use App\Models\UserContact;

class ContactService
{
    public function store($request)
    {
        $contact = new Contact();
        $contact->phone = $request->get('contact.phone', $request->contact['phone']);
        $contact->email = $request->get('contact.email', $request->contact['email']);
        $contact->save();

        return $contact;
    }

    public function userContact($user, $contact, $primary = false)
    {
        $uc = new UserContact();
        $uc->user_id = $user->id;
        $uc->contact_id = $contact->id;
        $uc->primary = $primary;
        $uc->save();

        return $uc;
    }
}
