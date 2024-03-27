@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row" style="padding: 10px 0px;"></div>
    <div class="card shadow">
        <div class="card-body">
            <h2 class="card-title">berichten</h2>
            <hr> <!-- Divider -->
            <div class="card-text">
                @auth 
                @if (Auth::user()->role == 'leerling' || Auth::user()->role == 'instructeur' )
                foreach($messages as $message)

                <p><strong>content: </strong>{{ $message->content }}</p>
                
                
                <div id="success-message"></div> <!-- Success message placeholder -->
                
            </div>
        </div>
    </div>
</div>