@extends('layout')

@section('title', 'Create a Car')

@section('content')
        <form action={{ route('car.store') }} method="post" enctype="multipart/form-data" autocomplete="on">
                                @csrf
                                <h1>Car Info</h1>
                                <p>
                                    <label style="color: white; font-size:20;" for="boardNum" class="youpasswd" >Center</label>
                                    <select name="centerName">
                                        @foreach ($centers as $center)
                                            <option value={{ $center->city }}>{{ $center->city }}</option>
                                        @endforeach
                                    </select>
                                </p>
                                    <p>
                                        <label style="color: white; font-size:20;" for="carName" class="uname" >Name</label>
                                        <input id="carName" name="name" required="required" type="text" placeholder="eg. Kia">
                                    </p>

                                    <p>
                                        <label style="color: white; font-size:20;" for="carType" class="uname" >Type</label>
                                        <input id="carType" name="type" required="required" type="text" placeholder="eg. Rio">
                                    </p>
                                    <p>
                                        <label style="color: white; font-size:20;" for="color" class="youmail" >Color</label>
                                        <input id="color" name="color" required="required" type="text" placeholder="eg. Red">
                                    </p>
                                    <p>
                                        <label style="color: white; font-size:20;" for="year" class="uname" >Year</label>
                                        <input id="year" name="year" required="required" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" placeholder="eg. 1995">
                                    </p>
                                    <p>
                                        <label style="color: white; font-size:20;" for="boardNum" class="youpasswd" >Board Number</label>
                                        <input id="boardNum" name="boardNum" required="required" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" placeholder="eg. 455856">
                                    </p>
                                    <p>
                                        <label style="color: white; font-size:20;" for="rentPrice" class="youpasswd" >Renting Price per day</label>
                                        <input id="rentPrice" name="rentPrice" required="required" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" placeholder="eg. 25000">
                                    </p>
                                    <p>
                                        <label style="color: white; font-size:20;" for="img"> Choose one Image or more </label>
                                        <input type="file" name="img[]" required="required" multiple="multiple"/>
                                    </p>
                                    <table><tr><td>
                                        <input type="submit" value="Add">
                                    </td></tr></table>
                            </form>
@endsection
