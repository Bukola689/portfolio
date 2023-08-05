<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Events\Contact as EventsContact;
use App\Mail\SendContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function save(Request $request)
    {
        $data = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email',
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

        Mail::to('Portfolio Website')->send(new SendContactMail($request->name, $request->email, $request->message));

        return response()->json([
            'message' => 'Contact Saved Successfully, We Will Send An Email To You Shortly'
        ]);

        event(new EventsContact($contact));
    }
}
