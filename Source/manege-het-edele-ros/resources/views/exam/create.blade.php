@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Create Exam</h1>

        @if(session('niet gelukt'))
            <div class="alert alert-danger">
                {{ session('niet gelukt') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display the form -->
        <form action="{{ route('exam.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <!-- loop trough the lessons and give them as an option -->
            <div class="form-group">
                <label for="les">Les:</label>
                <select class="form-control" id="les" name="les" required>
                    @foreach($lessen as $les)
                        <option value="{{ $les->id }}">{{ $les->lesdoel }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exam_name">Exam Name:</label>
                <input type="text" class="form-control" id="exam_name" name="exam_name" required>
            </div>

            <button type="submit" class="btn btn-primary">vraag aan</button>
        </form>
    </div>
@endsection
