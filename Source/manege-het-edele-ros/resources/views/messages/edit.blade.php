<!-- /**
 * The view for editing a message.
 * This file contains the view for editing a message. It extends the app layout and displays a form to update the message content.
 * @var $messages The message to be edited.
 */ -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Wijzig leerling</h2>

    <div class="mb-2">
        <a href="{{ route('messages.index') }}">Terug naar de lijst</a>
    </div>

<!-- TODO: add error/message -->
    

    <form class="row" action="{{ route('messages.update', $messages->id) }}" method="POST">
    @csrf
    @method('PUT')
            <div class="col-12">
                <div class="form-group">
                    <label for="content">wijzig inhoud</label>
                    <input type="text" class="form-control" id="content" name="content" placeholder="content" value="{{$messages->content}}"></input>
                </div>
            </div>
            <div class="col-12 mt-2">
                <button class="btn btn-primary" type="submit">Bewaren</button>
            </div>
    </form>
</div>
@endsection
