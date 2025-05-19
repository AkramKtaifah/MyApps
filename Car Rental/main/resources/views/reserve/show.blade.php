@extends('layout')

@section('title', 'Reservation Info')

@section('content')
<h1>Summary</h1>
<ul type="circle">
    <li>You make a reservation for: <b>{{ $car->name . ' ' . $car->type }}</b> with Board Number: <b>{{ $car->boardNum }}</b></li>
    <li>In the Center: <b>{{ $center->city . ', ' . $center->region . ', ' . $center->street}} Street</b></li>
    <li>Duration of this reservation: <b>From: {{ $reserve->startDate }}   To: {{ $reserve->endDate }}</b></li>
</ul>
<h1>Details</h1>
<ul type="circle">
<li><p>
You reserve this car for <b>{{ $days }}</b> day(s).
</p></li>
<li><p>
The price of renting this car DAILY is <b>{{ $car->rentPrice }}</b>.
</p></li>
<li><p>
The total amount of price is <b>{{ $car->rentPrice }} X {{ $days }} = {{ $car->rentPrice * $days }}</b>.
</p></li></ul>
<h1>Important</h1>
<ul type="circle">
    <li><u style="color: red;">Note:</u> You must pay the money only <u>CASH</u> in one of our centers.</li>
    <li>You hava only <u>24 hours</u> to confirm the reservation by paid, otherwise it will be cancelled.</li>
</ul>
@endsection
