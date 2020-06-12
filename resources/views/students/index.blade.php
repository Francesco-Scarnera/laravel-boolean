@extends('layouts.main')
@section('main-content')

    <h1>I nostri ex studenti</h1>
    {{--@dump($students)--}}

    <div class="students-filter">
        {{-- @dump($genders) --}}
        <select name="filter" id="filter">
            @foreach($genders as $gender)
                <option value="{{ $gender }}">
                    @if($gender == 'm') Uomo @elseif($gender == 'f') Donna @else Tutti @endif
                </option>
            @endforeach
        </select>
    </div>

    <div class="student">
        @foreach($students as $student)
            <a href="{{ route('student.show', ['slug' => $student['slug']]) }}" class="student">
                <header>
                <img src="{{ $student['img'] }}" alt="{{ $student['nome'] }}">
                    <div class="info">
                        <h3>{{ $student['nome'] }} ({{ $student['età'] }} anni)</h3>
                        <h4>
                            Assunt{{ ($student['genere'] == 'm') ? 'o' : 'a' }} <!-- al posto di if e else(operatore ternario) -->
                            da {{ $student['azienda'] }} come {{ $student['ruolo'] }}
                        </h4>
                    </div>
                </header>
                <p>{{ $student['descrizione'] }}</p>
            </a>
        @endforeach
    </div>
@include('shared.handlebars.student')

@endsection

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection    