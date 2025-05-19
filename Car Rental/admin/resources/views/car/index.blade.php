@extends('layout')

@section('title', 'Cars Page')

@section('content')
    @if (count($allCars) > 0)
    <div id="latestp">
        @for($i = 0; $i < count($centers); $i++)
            <article>
                <h1>{{ strtoupper($centers[$i]->city) }}</h1>
                <h1>{{ $carsCount[$i] }} Car(s)</h1>
                @if ($carsCount[$i] > 0)
                    <a href={{ route('car.show', $centers[$i]->id) }} class="rm">See All Cars</a>
                @endif
            </article>
        @endfor
    </div>
    @else
        <h1>There is no cars yet</h1>
    @endif
    <BR><BR><BR><BR>
    <p>
	    <a href={{ route('car.create') }}> Add a new Car </a>
    </p>
@endsection
