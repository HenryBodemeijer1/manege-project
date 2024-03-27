@extends('layouts.app')

@php
    $session = session('niet gelukt');
@endphp

@section('head')
    <script type="application/javascript">
        document.addEventListener("DOMContentLoaded", function () {
            var errorMessage = document.getElementById("errorMessage");
            var showErrorButton = document.getElementById("showError");

            showErrorButton.onclick = function () {
                if (errorMessage.style.display === "block") {
                    errorMessage.style.display = "none";
                } else {
                    errorMessage.style.display = "block";
                }
            };
        });

        document.addEventListener("DOMContentLoaded", function () {

            var bevestigVeranderingButton = document.getElementById("bevestigVerandering");
            @if($session)
            @foreach($session['error'] as $key => $value)
            var errorKey = '{{ array_key_first($session['error']) }}';
            var errorValue = '{{ $session['data'][$key] }}';
            @endforeach
            @endif
            var input = document.getElementById(errorKey);

            bevestigVeranderingButton.onclick = function () {

                input.value = document.getElementById(errorKey).value = errorValue;
                document.getElementById("myDiv").innerHTML = ''
                document.getElementById("myDiv").className = '';
            };
        });
    </script>
@endsection

@section('content')
    <div class="container">
        @if($session)
            <div class="alert alert-danger" id="myDiv">
                Fout bij het updaten van een les
                <a href="#" id="showError"><span>&#8505;</span></a>
                <div id="errorMessage" style="display: none;">
                    @foreach($session['error'] as $key => $value)
                        {{ $session['message'] }}<br>
                        Verander {{$key}} van '{{ $session['error'][$key] }}' naar '{{ $session['data'][$key] }}'
                        <br>
                        <a id="bevestigVerandering" class="btn btn-secondary" href="#">bevestig</a>
                    @endforeach
                </div>
            </div>
        @endif
        <h2>Wijzig Lessen</h2>

        <div class="mb-2">
            <a href="{{ route('lessen.index') }}">Terug naar de lijst</a>
        </div>

        <form class="row" action="{{ route('lessen.update', $les->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="col-12">
                <div class="form-group">
                    <label for="lesdoel">lesdoel</label>
                    <input type="text" class="form-control" id="lesdoel" name="lesdoel" placeholder="lesdoel"
                           @if(!$session)
                           value="{{$les->lesdoel}}" required
                           @elseif($session)
                           @foreach($session['error'] as $key => $value)
                           @if($key == 'lesdoel')
                           value="{{$value}}"
                           @else
                           value="{{ $session['data']['lesdoel'] }}"
                            @endif
                            @endforeach
                            @endif
                    >
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="onderwerp">onderwerp</label>
                    <input type="text" class="form-control" id="onderwerp" name="onderwerp" placeholder="onderwerp"
                           @if(!$session)
                           value="{{$les->onderwerp}}" required
                           @elseif($session)
                           @foreach($session['error'] as $key => $value)
                           @if($key == 'onderwerp')
                           value="{{$value}}"
                           @else
                           value="{{ $session['data']['onderwerp'] }}"
                        @endif
                        @endforeach
                        @endif
                    >
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="datetime">datetime</label>
                    <input type="datetime-local" class="form-control" id="datetime" name="datetime"
                           placeholder="datetime" required min="{{$currentDate}}" max="{{$oneYearDate}}"
                           @if($session)
                           value="{{$session['data']['datetime']}}"
                    @else
                        value="{{ $les->datetime }}"
                        @endif
                    >
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="instructeur">Instructeur</label>
                    <select name="instructeur" id="instructeur" class="form-select" aria-label="Default select example">
                        @foreach($instructeurs as $instructeur)
                            <option value="{{$instructeur->id}}">{{$instructeur->naam}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-12 mt-2">
                <button class="btn btn-primary" type="submit">edit</button>
            </div>
        </form>
    </div>
@endsection
