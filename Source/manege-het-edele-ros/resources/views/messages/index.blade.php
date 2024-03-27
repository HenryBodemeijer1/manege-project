<!-- 
 * This file contains the view for displaying messages. It extends the app layout and displays messages in a table.
 * The messages are filtered based on the user's role. If the user is an owner, they can create new messages and edit or delete existing ones.
 * Pagination is not yet implemented.
  -->

@extends('layouts.app')

@section('content')
<div class="container">

    @if (Auth::user()->role == 'eigenaar')
        <h2>bestaande berichten</h2>
    @elseif (Auth::user()->role == 'leerling' || Auth::user()->role == 'instructeur' )
        <h2>berichten</h2>
    @endif

    @if (Auth::user()->role == 'eigenaar')
    <div class="row">
        <div class="col col-md-6"> 
            <a class="btn btn-success" href="{{ route('messages.create') }}">nieuw</a>
        </div>
    </div>
    @endif

    <div class="responsive-table">
        <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0"
    width="100%">
            <thead>
                <tr>
                    <th>inhoud</th>
                    @if (Auth::user()->role == 'eigenaar')
                        <th>rol</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $message)
                @if (Auth::user()->role == $message->role || Auth::user()->role == 'eigenaar') 
                <tr>
                    <td class="align-middle">{{ $message->content }}</td>
                    @if (Auth::user()->role == 'eigenaar')
                        <td class="align-middle">{{ $message->role }}</td>
                    @endif
                        <td class="align-middle">
                            <form action="{{ route('messages.destroy',$message->id) }}" method="POST">
                                @if (Auth::user()->role == 'eigenaar')
                                   <a class="btn btn-primary" href="{{ route('messages.edit',$message->id) }}">Wijzig</a>
                                @endif
                                    <button type="submit" class="btn btn-danger">Verwijder</button>
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                </tr>
                @endif
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>

<!-- TODO: add pagination -->
@endsection