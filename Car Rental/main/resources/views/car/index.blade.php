@extends('layout')

@section('title', 'Cars Page')

@section('content')
<form role="search" action={{ route('car.display') }} method="GET">
<input type="search" name="search" placeholder="Search a car"/>
<table><tr><td><input type="submit" value="Search"></td></tr></table>
</form>
<br><br><br><br>
<h1>Our Cars</h1><br><br>
<div id="latestp">
    @foreach($manus as $manu)
        <article>
            <h1>{{ $manu->name }}</h1>
            <img src={{ url('../../admin/public/img/' . $manu->name . '.jpg') }} alt="" width=150 height=100/>
            <button onclick="location.href='{{ route('car.display', ['manu' => $manu->name]) }}'">See More</button>
        </article>
    @endforeach
</div>
@endsection
