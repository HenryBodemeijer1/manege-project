@extends('layouts.app')

@section('head')

@endsection

@section('content')
    <div class="container">
        @if(session('niet gelukt'))
            <div class="alert alert-danger">
                {{ session('niet gelukt') }}
            </div>
        @endif
        <div class="row">
            <div class="col col-md-6">
                <form action="{{url("/lessen")}}" method="get">
                    <label for="date">Datum:</label><br>
                    <input type="date" id="date" name="date" value="{{$date}}" min="{{$currentDate}}"
                           max="{{$oneYearDate}}"><br>
                    <input type="submit" class="btn btn-success">
                </form>
                @if(auth()->user()->role == 'eigenaar')
                    <a class="btn btn-warning" href="{{route('lessen.create')}}">create</a>
                @endif
            </div>
            <div class="responsive-table">
                @if(auth()->user()->role !== 'instructeur')
                <h2>Alle lessen:</h2>
                <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>lesdoel</th>
                        <th>onderwerp</th>
                        <th>datetime</th>
                        <th>instructeur</th>
                        <th>examen</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lessen as $les)
                        <tr>
                            <th scope="row">{{$les['id']}}</th>
                            <td class="align-middle">{{$les['lesdoel']}}</td>
                            <td class="align-middle">{{$les['onderwerp']}}</td>
                            <td class="align-middle">{{$les['datetime']}}</td>
                            <td class="align-middle">{{$les['instructeur_id']}}</td>
                            <td class="align-middle">
                                @foreach($examen as $exam)
                                    @if($exam->lessen_id == $les->id)
                                        {{$exam->exam_name}}
                                    @endif
                                @endforeach
                            </td>
                            <td class="align-middle">
                                @if(auth()->user()->role == 'eigenaar')
                                    <a role="button" class="btn btn-primary"
                                       href="{{route('lessen.edit', $les->id)}}">Edit</a> /
                                    <a role="button" class="btn btn-secondary"
                                       href="{{route('lessen.show', $les->id)}}">Show</a> /
                                    <form action="{{route('lessen.destroy', $les->id)}}" method="post"
                                          style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                @else
                                    <a role="button" class="btn btn-secondary"
                                       href="{{route('lessen.show', $les->id)}}">Show</a> /
                                    <form
                                        action="{{route('lessenLeerling.store')}}"
                                        method="POST"
                                        style="display: inline">
                                        @csrf
                                        <input type="hidden" name="les_id" value="{{$les->id}}">
                                        <input type="hidden" name="user_id" value="{{auth()->id()}}">
                                        <button class="btn btn-success" type="submit">Inschrijven</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
                @if(auth()->user()->role !== 'eigenaar')
                <h2>Geplande lessen</h2>
                <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>lesdoel</th>
                        <th>onderwerp</th>
                        <th>datetime</th>
                        <th>instructeur</th>
                        <th>examen</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lessenLeerling as $les)
                        <tr>
                            <th scope="row">{{$les['id']}}</th>
                            <td class="align-middle">{{$les['lesdoel']}}</td>
                            <td class="align-middle">{{$les['onderwerp']}}</td>
                            <td class="align-middle">{{$les['datetime']}}</td>
                            <td class="align-middle">{{$les['instructeur_id']}}</td>
                            <td class="align-middle">
                                @foreach($examen as $exam)
                                    @if($exam->lessen_id == $les->id)
                                        {{$exam->exam_name}}
                                    @endif
                                @endforeach
                            </td>
                            <td class="align-middle">
                                @if(auth()->user()->role == 'eigenaar')
                                    <a role="button" class="btn btn-primary"
                                       href="{{route('lessen.edit', $les->id)}}">Edit</a> /
                                    <a role="button" class="btn btn-secondary"
                                       href="{{route('lessen.show', $les->id)}}">Show</a> /
                                    <form action="{{route('lessen.destroy', $les->id)}}" method="post"
                                          style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                @else
                                    <a role="button" class="btn btn-secondary"
                                       href="{{route('lessen.show', $les->id)}}">Show</a>
                                @if(auth()->user()->role !== 'instructeur')
                                     /
                                    <form
                                        action="{{route('lessenLeerling.destroy', $les->id)}}"
                                        method="POST"
                                        style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Uitschrijven</button>
                                    </form>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    @endif
            </div>
        </div>
    </div>
@endsection
