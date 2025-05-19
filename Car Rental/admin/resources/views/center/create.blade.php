@extends('layout')

@section('title', 'Create a Center')

@section('content')
        <form action={{ route('center.store') }} method="post" autocomplete="on">
                                @csrf
                                <h1>Center Info</h1>
                                <p>
                                <p>
                                    <label style="color: white; font-size:25;"> City </label>
                                    <input id="city" name="city" required="required" type="text">
                                </p>
                                <p>
                                    <label style="color: white; font-size:25;"> Region </label>
                                    <input id="region" name="region" required="required" type="text">
                                </p>
                                <p>
                                    <label style="color: white; font-size:25;"> Street </label>
                                    <input id="street" name="street" required="required" type="text">
                                </p>
                                <p>
                                    <label style="color: white; font-size:25;"> Mobile Number </label>
                                    <input id="mobileNum" name="mobileNum" required="required" type="text">
                                </p>
                                <p>
                                    <label style="color: white; font-size:25;"> Telephone Number </label>
                                    <input id="tel" name="tel" required="required" type="text">
                                </p>
                                <table><tr><td>
                                    <input type="submit" value="Add">
								</td></tr></table>
                                </p>
                                </p>
            </form>
@endsection
