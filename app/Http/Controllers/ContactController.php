<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
        ]);
        if (Auth::check()) {
            Query::create([
                'user_id' => Auth::user()->id,
                'message' => $request->message,
                'subject' => $request->subject,
            ]);
        } else {
            Contact::create($request->all());
        }

        return redirect()->route('contact')->with('success', true);
    }
}