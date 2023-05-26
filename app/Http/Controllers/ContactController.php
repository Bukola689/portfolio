<?php

namespace App\Http\Controllers;

use App\Events\Contact as EventsContact;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function save(Request $request)
    {
        $data = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:contacts',
            'message' => 'required',
        ]);

        if($data->fails())
        {
            return response()->json([
                'message' => 'Please Fill In Your Contact Details'
            ]);
        }


        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return response()->json([
            'message' => 'Contact Saved Successfully, We Will Send An Email To You Shortly'
        ]);

        event(new EventsContact($contact));
    }
}
