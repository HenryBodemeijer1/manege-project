@extends('layouts.app2') <!-- Het 'app2'-layout wordt uitgebreid -->

@section('content') <!-- Definitie van de 'content'-sectie, waar de hoofdinhoud van de pagina wordt geplaatst -->

<div class="container"> <!-- Dit is een container voor de pagina-inhoud -->
    <div class="row"> <!-- Dit is een rij binnen de container -->
        <div class="col-md-8 offset-md-2"> <!-- Dit is een kolom met een breedte van 8 van de 12 beschikbare kolommen, met een horizontale offset van 2 kolommen -->
            <div class="card card-theme"> <!-- Dit is een kaart met een aangepast thema -->
                <div class="card-header">Bekijk gegevens</div> <!-- Dit is de kop van de kaart -->
                <div class="card-body-theme card-body"> <!-- Dit is de inhoud van de kaart met aangepast thema -->
                    <h5 class="card-title">Naam : {{ $paarden->naam }}</h5><br> <!-- Dit toont de naam van het paard -->
                    <p class="card-text">Geslacht : {{ $paarden->geslacht }}</p> <!-- Dit toont het geslacht van het paard -->
                    <p class="card-text">tamheid : @if($paarden->tamheid) wild @else tam @endif</p> <!-- Dit toont de tamheid van het paard -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection <!-- Einde van de 'content'-sectie -->
