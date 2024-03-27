@extends('layouts.app2')  <!-- Het 'app2'-layout wordt uitgebreid -->

@section('content')  <!-- Definitie van de 'content'-sectie, waar de hoofdinhoud van de pagina wordt geplaatst -->

<div class="container"> <!-- Dit is een container voor de pagina-inhoud -->
    <div class="row"> <!-- Dit is een rij binnen de container -->

        <div class="col-md-9"> <!-- Dit is een kolom met een breedte van 9 van de 12 beschikbare kolommen -->

            <div class="card card-theme"> <!-- Dit is een kaart met een aangepast thema -->
                <div class="card-header">paard toevoegen</div> <!-- Dit is de kop van de kaart -->
                <div class="card-body-theme card-body"> <!-- Dit is de inhoud van de kaart met aangepast thema -->

                    @if (session('message'))
                        <div style="background:#a14137; color:white;" class="alert">{{ session('message') }}</div>
                    @endif
                    <!-- Bovenstaande code toont een melding als er een sessiebericht is in dit geval een fout melding -->

                    <form action="{{ route('Horses_store') }}" method="post">
                        {!! csrf_field() !!} 
                        
                        <label>Naam</label></br> <!-- Dit is een label voor de naaminput -->
                        <input type="text" name="naam" id="naam" class="form-control-theme form-control" required pattern="[A-zÀ-ž\s]+"></br>
                        <!-- Dit is een invoerveld voor de naam met validatie -->

                        <div class="form-group">
                            <label>Geslacht</label></br> <!-- Dit is een label voor het geslachtselectieveld -->
                            <select class="form-select-theme form-select" id="geslacht" name="geslacht">
                                <option value="hengst">Hengst</option>
                                <option value="merrie">merries</option>
                                <option value="ruin">ruin</option>
                            </select></br>
                            <!-- Dit is een selectieveld voor het geslacht -->

                        <label>Tamheid</label></br> <!-- Dit is een label voor het tamheidselectieveld -->
                        <select class="form-select-theme form-select" id="tamheid" name="tamheid">
                            <option value="0">tam</option>
                            <option value="1">wild</option>
                        </select></br>
                        <!-- Dit is een selectieveld voor de tamheid -->

                        <input type="submit" value="Opslaan" class="btn btn-success-theme btn-success"></br>
                        <!-- Dit is een knop om het formulier in te dienen -->

                    </form> <!-- Einde van het formulier -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection  <!-- Einde van de 'content'-sectie -->
