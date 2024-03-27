@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Students</h2>

    <div class="row">
        <div class="col col-md-6">
            
                <a class="btn btn-success" href="{{ route('user.create') }}">Nieuw student</a>
            
        </div>
        <!-- <div class="col-6 col-md-6">
          <form action="{{ route('user.index') }}" method="GET">
              <div class="input-group input-group-sm mb-3 zoekbalk">
                  <input type="text" class="form-control zoekbalksize" name="filter" placeholder="Filter" aria-label="Filter">
                  <button class="btn btn-outline-secondary zoekbalkbutton" type="submit" id="filter">Zoek</button>
              </div>
          </form>
        </div> -->
    </div>

    <div class="responsive-table">
        <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0"
    width="100%">
            <thead>
                <tr>
                    <th>id</th>
                    <th>naam</th>
                    <th>email</th>
                    <th>adres</th>
                    <th>woonplaats</th>
                    <th>geboortedatum</th>
                    <th>tegoed</th>
                    <th>ziek</th>
                    <th>actief</th>
                
                    <th>Acties</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                <!-- <tr onclick="window.location='{{ route('user.show', $user->id) }}'" >  -->
                    <td class="align-middle">{{ $user->id }}</td>
                    <td class="align-middle">{{ $user->naam }}</td>
                    <td class="align-middle">{{ $user->email }}</td>
                    <td class="align-middle">{{ $user->adres }}</td>
                    <td class="align-middle">{{ $user->woonplaats }}</td>
                    <td class="align-middle">{{ $user->geboortedatum }}</td>
                    <td class="align-middle">{{ $user->tegoed }}</td>
                    <td class="align-middle">@if($user->ziek) Nee @else Ja @endif</td>
                    <td class="align-middle">@if($user->actief) Actief @else Inactief @endif</td>

                    
                        <td class="align-middle">
                            <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">Wijzig</a>

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Verwijder</button>
                            </form>
                        </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- TODO: add pagination -->
@endsection