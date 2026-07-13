<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * API: Store a new contact message submission from frontend
     */
    public function apiStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $message = ContactMessage::create($validated);

        return response()->json([
            'message' => 'Pesan Anda berhasil terkirim!',
            'data' => $message
        ], 201);
    }

    /* ----------------------------------------------------
     * ADMIN PANEL WEB METHODS
     * ---------------------------------------------------- */

    public function index()
    {
        $messages = ContactMessage::latest()->paginate(10);
        return view('admin.contacts.index', compact('messages'));
    }

    public function show(ContactMessage $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy(ContactMessage $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Pesan kontak berhasil dihapus.');
    }
}
