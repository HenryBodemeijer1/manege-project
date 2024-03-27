@extends('layouts.app2') <!-- Het 'app2'-layout wordt uitgebreid -->

@section('content') <!-- Definitie van de 'content'-sectie, waar de hoofdinhoud van de pagina wordt geplaatst -->

<div class="container"> <!-- Dit is een container voor de pagina-inhoud -->
    <div class="row"> <!-- Dit is een rij binnen de container -->

        <div class="col-md-9"> <!-- Dit is een kolom met een breedte van 9 van de 12 beschikbare kolommen -->

            <div class="card card-theme"> <!-- Dit is een kaart met een aangepast thema -->
                <div class="card-header">Paarden</div> <!-- Dit is de kop van de kaart -->
                <div class="card-body card-body-theme maincard"> <!-- Dit is de inhoud van de kaart met aangepast thema -->

                    <a href="{{ url('/Horses/create') }}" class="btn btn-success-theme btn-success btn-sm" title="voeg nieuw paard toe">
                        <i class="fa fa-plus" aria-hidden="true"></i> voeg toe
                    </a>
                    <br/>
                    <br/>
                    <!-- Bovenstaande code voegt een knop toe om een nieuw paard toe te voegen -->
                    <!-- Onderstaande code geeft de kopjes van het tabel aan -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="th-theme">#</th>
                                    <th class="th-theme">Naam</th>
                                    <th class="th-theme">geslacht</th>
                                    <th class="th-theme">Tamheid</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($paarden as $item)
                                <tr>
                                    <td class="td-theme">{{ $loop->iteration }}</td>
                                    <td class="td-theme">{{ $item->naam }}</td>
                                    <td class="td-theme align-middle">{{ $item->geslacht }}</td>
                                    <td class="td-theme align-middle">@if($item->tamheid) wild @else tam @endif</td>
                                    <!-- Bovenstaande code vult de tabel met paardgegevens -->

                                    <td class="align-middle td-theme">
                                        <a href="{{ url('/Horses/' . 'show/' . $item->id) }}" title="bekijk paard"><button class="btn btn-info btn-info-theme spacer btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Bekijk</button></a>
                                        <a href="{{ url('/Horses/' . $item->id . '/edit') }}" title="pas gegevens aan"><button class="btn btn-primary btn-primary-theme btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Pas aan</button></a>
                                        <a href="{{ url('/Horses/' . 'destroy/' . $item->id ) }}" onclick="return confirm('Weet je zeker dat je deze gegevens wilt verwijderen?')" title="verwijder"><button class=" btn btn-danger btn-danger-theme spacer spacer btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Verwijder</button></a>
                                    </td>
                                    <!-- Bovenstaande code voegt knoppen toe voor het bekijken, bewerken en verwijderen van paardgegevens -->
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Bovenstaande code genereert een tabel om de paardgegevens weer te geven -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection <!-- Einde van de 'content'-sectie -->
