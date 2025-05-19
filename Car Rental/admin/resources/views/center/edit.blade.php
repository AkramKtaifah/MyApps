@extends('layout')

@section('title', 'Edit a Center')

@section('content')
        <form action={{ route('center.update', $center->id) }} method="post" autocomplete="on">
                                @csrf
                                @method('PUT')
                                <h1>Center Info</h1>
                                <p>
                                    <label style="color: white; font-size:25;" for="city" data-icon="c"> City </label>
                                    <input id="city" name="city" required="required" type="text" value={{ $center->city }}>
                                </p>
                                <p>
                                    <label style="color: white; font-size:25;" for="region" data-icon="r"> Region </label>
                                    <input id="region" name="region" required="required" type="text" value={{ $center->region }}>
                                </p>
                                <p>
                                    <label style="color: white; font-size:25;" for="street" data-icon="s"> Street </label>
                                    <input id="street" name="street" required="required" type="text" value={{ $center->street }}>
                                </p>
                                <p>
                                    <label style="color: white; font-size:25;" for="mobileNum" data-icon="mn"> Mobile Number </label>
                                    <input id="mobileNum" name="mobileNum" required="required" type="text" value={{ $center->mobileNum }}>
                                </p>
                                <p>
                                    <label style="color: white; font-size:25;" for="tel" data-icon="t"> Telephone Number </label>
                                    <input id="tel" name="tel" required="required" type="text" value={{ $center->telephone }}>
                                </p>
                                <table><tr><td>
                                    <input type="submit" value="Edit">
								</td></tr></table>
                            </form>
@endsection
