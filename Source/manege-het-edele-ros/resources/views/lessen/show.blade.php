@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-6">
                <div class="mb-2">
                    <a href="{{ route('lessen.index') }}">Terug naar de lijst</a>
                </div>
                <h1>Les:</h1>
            </div>
            <div class="responsive-table">
                <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm">
                    <tr>
                        <th>Lesdoel</th>
                        <td>{{$les->lesdoel}}</td>
                    </tr>
                    <tr>
                        <th>Onderwerp</th>
                        <td>{{$les->onderwerp}}</td>
                    </tr>
                    <tr>
                        <th>Datum en Tijd</th>
                        <td>{{$les->datetime}}</td>
                    </tr>
                    <tr>
                        <th>Instructeur</th>
                        <td>{{$instructeur->naam}}</td>
                    </tr>
                    <tr>
                        <th>Examen</th>
                        <td>
                            @if($examen !== null)
                            {{$examen['exam_name']}}
                                @else
                                Geen Examen
                        @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Leerlingen</th>
                        <td>
                            @php
                                $counter = 1;
                            @endphp
                            @foreach($leerlingen as $leerling)
                                {{$counter}}. {{$leerling->naam}}
                                @php
                                    $counter++; // Increment the counter variable
                                @endphp
                                @if($leerling->ziek == 1)
                                    <i class="fas fa-hospital" style="display: inline;"></i><br>
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Opmerkingen</th>
                        <td>
                            @if($opmerkingen !== null)
                                @foreach($opmerkingen as $opmerking)
                                    <strong>{{$opmerking->naam}}.</strong><br>
                                    {{$opmerking->opmerking}}
                                    @if($opmerking->user_id == Auth()->id() || Auth()->user()->role == 'eigenaar')
                                        <br>
                                        <form action="{{route('opmerkingen.destroy', $opmerking->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                        <hr>
                                    @endif
                                @endforeach
                            @endif
                            <form
                                action="{{route('opmerkingen.store', ['user_id' => Auth()->id(), 'lessen_id' => $les->id])}}" method="post">
                                @csrf
                                <br>
                                <textarea name="opmerking" id="comment" rows="4" cols="50"></textarea>
                                <br>
                                <button class="btn btn-success" type="submit">Voeg opmerking toe</button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
