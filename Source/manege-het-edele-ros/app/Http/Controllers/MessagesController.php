<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class MessagesController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('messages.index', compact('messages'));
    }

    public function create(Request $request)
    {
        // get all users and roles from the database for dropdowns
        
        $users = User::all();
        
        foreach($users as $user)
        {
            $roles[] = $user->role;
        }

        return view('messages.create', compact('users', 'roles'));
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $messages = Message::find($id);
        return view('messages.edit', compact('messages'));
    }
    public function update(Request $request, string $id)
    {
        $messages = Message::find($id);
                
        $messages->content = $request->content;

        $messages->save();
        return redirect(route("messages.index"));


    }

    public function store(Request $request)
    {
        // Validate the form data

        $this->validate($request, [
            'role' => 'string||max:255',
            'content' => 'required|string|max:255',
        ]);
        // Create a new message
        $message = new message([
            'role' => $request->role,
            'content' => $request->content,
        ]);

        $message->save();

        return redirect(route("messages.index"));
    }
    
    public function destroy(string $id)
    {
        $message = Message::find($id);
        $message->delete();
        return redirect(route("messages.index"));


    }
}
