<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessagesController extends Controller
{
    public function submitMessage(Request $request)
    {
        // Validasi input jika diperlukan
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Simpan pesan ke database
        $message = new Message();
        $message->name = $validatedData['name'];
        $message->email = $validatedData['email'];
        $message->message = $validatedData['message'];
        $message->save();

        // Redirect atau berikan respons sesuai kebutuhan Anda
        return redirect()->back()->with('success', 'Pesan Anda telah berhasil dikirim!');
    }
}

