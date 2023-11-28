<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;


class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'country' => 'required',
            'phones.*' => 'required',
            'emails.*' => 'required|email',
        ]);
        $loggedInUser = Auth::user();

    
        // Krijo një instancë të modelit Contact dhe ruaj të dhënat në bazën e të dhënave
        $contact = new Contact();
        $contact->firstname = $request->input('firstname');
        $contact->lastname = $request->input('lastname');
        $contact->address = $request->input('address');
        $contact->zip = $request->input('zip');
        $contact->country = $request->input('country');
        $contact->phones = implode(', ', $request->input('phones'));
    
        $contact->emails = implode(', ', $request->input('emails'));
    
        // Vendosim vlerën për fushën "publish" bazuar në zgjedhjen e checkbox-it
        $contact->publish = $request->has('publish') ? 1 : 0;
        $contact->username = $loggedInUser->username;

    
        $contact->save();
    
        // Kthehu në një faqe tjetër ose shfaq një mesazh të suksesshëm
        return redirect()->back()->with('success', 'Contact insert successfully.');
    }

    public function editoContact(Request $request)
{
    if ($request->isMethod('put')) {
        // Get the data from the form
        $formData = $request->all();

        // Update the contact information in the database
        $lastContactId = Contact::max('id');
        $lastContact = Contact::find($lastContactId);

        if ($lastContact) {
            // Determine the value for 'publish'
            $publishValue = isset($formData['publish']) ? 1 : 0;

            $lastContact->update([
                'firstname' => $formData['firstname'],
                'lastname' => $formData['lastname'],
                'address' => $formData['address'],
                'zip' => $formData['zip'],
                'country' => $formData['country'],
                'phones' => implode(',', $formData['phones']),
                'emails' => implode(',', $formData['emails']),
                'publish' => $publishValue, // Update 'publish' based on checkbox value
            ]);

            // Redirect back with a success message or do whatever you need
            return redirect()->back()->with('success', 'Contact information updated successfully.');
        }
    }

    // Fetch the last contact information from the database
    $lastContactId = Contact::max('id');
    $lastContact = Contact::find($lastContactId);

    return view('editContact', compact('lastContact'));
}

public function edit($id)
{
    $contact = Contact::find($id);
    return view('editoContacts', compact('contact'));
}

public function update(Request $request, $id)
{
    if ($request->isMethod('put')) {
        $contact = Contact::find($id);

        if (!$contact) {
            return redirect()->back()->with('error', 'Contact not found.');
        }

        $formData = $request->all();

        // Determine the value for 'publish'
        $publishValue = isset($formData['publish']) ? 1 : 0;

        $contact->update([
            'firstname' => $formData['firstname'],
            'lastname' => $formData['lastname'],
            'address' => $formData['address'],
            'zip' => $formData['zip'],
            'country' => $formData['country'],
            'phones' => implode(',', $formData['phones']),
            'emails' => implode(',', $formData['emails']),
            'publish' => $publishValue,
        ]);

        return redirect()->back()->with('success', 'Contact updated successfully.');
    }
    
    return redirect()->back()->with('error', 'Invalid request method.');
}


public function deleteContact($id)
{
    $contact = Contact::find($id);

    if (!$contact) {
        return redirect()->back()->with('error', 'Contact not found.');
    }

    // Këtu mund të bëni fshirjen e kontaktit
    $contact->delete();

    return redirect()->back()->with('success', 'Contact deleted successfully.');
}



}