@extends('layout')

@section('title', 'Make a Reservation')

@section('content')
@if (isset($error))
<script>
    alert('You must choose a date OUT of the reservations times');
</script>
@endif
<h1>{{ strtoupper($car->name . ' ' . $car->type) }}</h1>
    <p>
        <p>
            Center: {{ $center->city }}
        </p>
        <p>
            Rent Price Daily: {{ $car->rentPrice }}
        </p>
    </p>
@if (count($arrReservations) > 0)
<h1>All Reservations for this car</h1>
<table>
    <tr>
        <th>No.</th><th></th><th></th>
        <th>Start Date of reservation</th><th></th><th></th>
        <th>End Date of reservation</th>
    </tr>
    @for ($i = 0; $i < count($arrReservations); $i++)
        <tr>
            <td>{{ $i+1 }}</td><td></td><td></td>
            <td>{{ $arrReservations[$i]->startDate }}</td><td></td><td></td>
            <td>{{ $arrReservations[$i]->endDate }}</td>
        </tr>
    @endfor
</table>
@else
<h1>There is no previous reservations for this car</h1>
@endif
        <form name="form1" action={{ route('reserve.store') }} method="post" onsubmit="return validate()">
                                @csrf
                                <h1>Choose a START and an END Date for this reservation</h1>
                                <input type="hidden" name="carID" value={{ $car->id }} />
                                <input type="hidden" name="centerID" value={{ $center->id }} />
                                <p>
									<label style="color: white; font-size:25;" for="start">Start Date that you want to rent</label>
									<input type="date" id="startDate" min="01-11-2023" name="startDate" required="required">
								</p>
                                <p>
									<label style="color: white; font-size:25;" for="start">End Date</label>
									<input type="date" id="endDate" min="01-11-2023" name="endDate" required="required">
								</p>
                                <table><tr><td>
                                <p class="signin button">
                                    <input type="submit" value="Done">
                                </p>
                                </td></tr></table>
                            </form>
@endsection
