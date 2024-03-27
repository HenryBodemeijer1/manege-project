@extends('layouts.app2') <!-- Het 'app2'-layout wordt uitgebreid -->

@section('content') <!-- Definitie van de 'content'-sectie, waar de hoofdinhoud van de pagina wordt geplaatst -->

<div class="container"> <!-- Dit is een container voor de pagina-inhoud -->
    <div class="row"> <!-- Dit is een rij binnen de container -->

        <div class="col-md-9"> <!-- Dit is een kolom met een breedte van 9 van de 12 beschikbare kolommen -->

            <div class="card card-theme"> <!-- Dit is een kaart met een aangepast thema -->
                <div class="card-header">gegevens aanpassen van het paard</div> <!-- Dit is de kop van de kaart -->
                <div class="card-body-theme card-body"> <!-- Dit is de inhoud van de kaart met aangepast thema -->

                    @if (session('message'))
                        <div style="background:#a14137; color:white;" class="alert">{{ session('message') }}</div>
                    @endif
                    <!-- Bovenstaande code toont een melding als er een sessiebericht is in dit geval een fout melding-->

                    <form action="{{ route('Horses_update') }}" method="post">
                        {!! csrf_field() !!} 
                        <input type="hidden" name="id" id="id" value="{{$paarden->id}}" id="id" />
                        <!-- Dit is een verborgen veld om het paard-ID door te geven -->

                        <label>Naam</label></br> <!-- Dit is een label voor de naaminput -->
                        <input type="text" name="naam" id="naam" class="form-control-theme form-control" value="{{$paarden->naam}}" required pattern="[A-zÀ-ž]\s]+"></br>
                        <!-- Dit is een invoerveld voor de naam met de huidige waarde en validatie -->

                        <label>Geslacht</label></br> <!-- Dit is een label voor het geslachtselectieveld -->
                        <select class="form-select form-select-theme" id="geslacht" name="geslacht">
                            <option value="Hengst">Hengst</option>
                            <option value="merry">Merry</option>
                            <option value="ruin">ruin</option>
                        </select></br>
                        <!-- Dit is een selectieveld voor het geslacht -->

                        <label>Tamheid</label></br> <!-- Dit is een label voor het tamheidselectieveld -->
                        <select class="form-select form-select-theme" id="tamheid" name="tamheid">
                            <option value="0">tam</option>
                            <option value="1">wild</option>
                        </select></br>

                        <input type="submit" value="opslaan" class="btn btn-success-theme btn-success"></br>
                        <!-- Dit is een knop om het formulier in te dienen -->

                    </form> <!-- Einde van het formulier -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection <!-- Einde van de 'content'-sectie -->
