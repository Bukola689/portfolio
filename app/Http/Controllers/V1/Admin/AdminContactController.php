<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function allContact()
    {
        $contacts = Contact::orderBy('id', 'desc')->paginagte('5');

        return response()->json($contacts);
    }

    public function viewContact($id)
    {
        $contact = Contact::find($id);

        return response()->json($contact);
    }

    public function remove($id)
    {
        $contact = Contact::find($id);

        $contact->remove();

        return response()->json([
            'message' => 'Contact Deleted Successfully'
        ]);
    }
}
