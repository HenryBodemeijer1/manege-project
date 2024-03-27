@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Wijzig leerling</h2>

    <div class="mb-2">
        <a href="{{ route('user.index') }}">Terug naar de lijst</a>
    </div>

<!-- TODO: add error/message -->
    

    <form class="row" action="{{ route('user.store') }}" method="POST">
    @csrf
        <div class="col-12">
            <div class="form-group">
                <label for="naam">naam</label>
                <input type="text" class="form-control" id="naam" name="naam" placeholder="naam">
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="email">email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email">
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="adres">adres</label>
                <input type="text" class="form-control" id="adres" name="adres" placeholder="adres">
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="woonplaats">woonplaats</label>
                <input type="text" class="form-control" id="woonplaats" name="woonplaats" placeholder="woonplaats">
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="geboortedatum">geboortedatum</label>
                <input type="date" class="form-control" id="geboortedatum" name="geboortedatum" placeholder="geboortedatum">
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="tegoed">tegoed</label>
                <input type="number" class="form-control" id="tegoed" name="tegoed" placeholder="tegoed">
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="ziek">ziek</label>
                <select class="form-select" id="ziek" name="ziek">
                    <option value="0">Ja</option>
                    <option value="1">Nee</option>
                </select>
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="actief">actief</label>
                <select class="form-select" id="actief" name="actief">
                    <option value="0">Actief</option>
                    <option value="1">Inactief</option>
                </select>
            </div>
        </div>

        <div class="col-12 mt-2">
            <button class="btn btn-primary" type="submit">Bewaren</button>
        </div>
    </form>
</div>
@endsection
