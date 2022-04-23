<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contact.index', compact('contacts'));
    }

    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'contact' => 'required|max:9|min:9|unique:contacts,contact',
            'email' => 'required|email|unique:contacts,email',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->contact = $request->contact;
        $contact->save();

        return redirect()->route('contact.index')->with('success', 'Contact created successfully');
    }

    public function show(int $id)
    {
        $contact = Contact::find($id);
        return view('contact.show', compact('contact'));
    }

    public function edit(int $id)
    {
        $contact = Contact::find($id);
        return view('contact.edit', compact('contact'));
    }

    public function update(Request $request, int $id)
    {
        $contact = Contact::find($id);

        $this->validate($request, [
            'name' => 'nullable',
            'contact' => 'nullable|max:9|min:9|unique:contacts,contact,' . $contact->id,
            'email' => 'nullable|email|unique:contacts,email,' . $contact->id,
        ]);

        $contact->name = $request->name;
        $contact->contact = $request->contact;
        $contact->email = $request->email;
        $contact->save();

        return redirect()->route('contact.index')->with('success', 'Contact updated successfully');
    }

    public function destroy(int $id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('contact.index')->with('success', 'Contact deleted successfully');
    }
}
