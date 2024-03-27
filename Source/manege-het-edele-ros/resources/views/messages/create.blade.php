<!-- /**
 * The create view file of the messages component.
 * This view file extends the app layout and displays a form to create a new message.
 * The form includes fields for selecting a role and entering a message content.
 * The form data is submitted to the 'messages.store' route using the POST method.
 * The form includes a CSRF token to protect against cross-site request forgery attacks.
 * The available roles are displayed in a dropdown list using a foreach loop.
 */ -->

@extends('layouts.app')

@section('content')

<form action="{{ route('messages.store') }}" method="POST">
    @csrf
    <!-- Other message fields -->
    <div class="form-group">
        <label for="role">Selecteer Rol:</label>
        <select name="role" id="role" class="form-control">
            <option value="">Selecteer een Rol</option>
            @foreach($roles as $role)
                <option value="{{ $role }}">{{ $role }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="content">bericht:</label>
        <input type="text" name="content" id="content" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Maak bericht</button>
</form>

@endsection
