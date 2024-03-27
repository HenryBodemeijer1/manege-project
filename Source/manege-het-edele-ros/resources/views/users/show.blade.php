@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row" style="padding: 10px 0px;"></div>
    <div class="card shadow">
        <div class="card-body">
            <h2 class="card-title">Profiel</h2>
            <hr> <!-- Divider -->
            <div class="card-text">
                <p><strong>naam: </strong>{{ $user->naam }}</p>
                <p><strong>email: </strong>{{ $user->email }}</p>
                <p><strong>adres: </strong>{{ $user->adres }}</p>
                <p><strong>woonplaats: </strong>{{ $user->woonplaats }}</p>
                <p><strong>geboortedatum: </strong>{{ $user->geboortedatum }}</p>
                <p><strong>tegoed: </strong>{{ $user->tegoed }}</p>
                <p><strong>actief: </strong>@if($user->actief) Actief @else Inactief @endif</p>
                @auth
                @if (Auth::user()->role == 'leerling' || Auth::user()->role == 'instructeur' )
                <form class="row" id="updateForm" data-route="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <p><strong>ziek: </strong>
                        <label><input type="radio" name="ziek" value="0" {{ $user->ziek == '0' ? 'checked' : '' }}> Ja</label>
                        <label><input type="radio" name="ziek" value="1" {{ $user->ziek == '1' ? 'checked' : '' }}> Nee</label>
                    </p>
                    <button type="submit" class="btn btn-primary">Opslaan</button>
                </form>
                <div id="success-message"></div> <!-- Success message placeholder -->
                @endif
                @if (Auth::user()->role == 'eigenaar')
                <form class="row" action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                    <p><strong>ziek: </strong>
                        <label><input type="radio" name="ziek" value="0" {{ $user->ziek == '0' ? 'checked' : '' }}> Ja</label>
                        <label><input type="radio" name="ziek" value="1" {{ $user->ziek == '1' ? 'checked' : '' }}> Nee</label>
                    </p>
                        <button type="submit" class="btn btn-primary">Opslaan</button>
                </form>
                @endif
                @endauth
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const updateForm = document.getElementById('updateForm');

        updateForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const route = this.getAttribute('data-route');

            fetch(route, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            })
            .catch(error => {
                console.error('An error occurred:', error);
            });
        });
    });
</script>

@endsection