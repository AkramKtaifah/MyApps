@extends('layout')

@section('title', 'Edit a Car')

@section('content')
        <form action={{ route('car.update', $car->id) }} method="post" enctype="multipart/form-data" autocomplete="on">
                                @csrf
                                @method('PUT')
                                <h1>Car Info</h1>
                                <p>
                                    <label style="color: white; font-size:20;" for="boardNum" class="youpasswd" >Center</label>
                                    <select name="centerName">
                                        @foreach ($centers as $center)
                                            @if ($center->id == $car->centerID)
                                                <option value={{ $center->city }} selected="selected">{{ $center->city }}</option>
                                            @else
                                                <option value={{ $center->city }}>{{ $center->city }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </p>
                                    <p>
                                        <label style="color: white; font-size:20;" for="carName" class="uname" >Name</label>
                                        <input id="carName" name="name" required="required" type="text" placeholder="eg. Kia" value={{ $car->name }}>
                                    </p>

                                    <p>
                                        <label style="color: white; font-size:20;" for="carType" class="uname" >Type</label>
                                        <input id="carType" name="type" required="required" type="text" placeholder="eg. Rio" value={{ $car->type }}>
                                    </p>
                                    <p>
                                        <label style="color: white; font-size:20;" for="color" class="youmail" >Color</label>
                                        <input id="color" name="color" required="required" type="text" placeholder="eg. Red" value={{ $car->color }}>
                                    </p>
                                    <p>
                                        <label style="color: white; font-size:20;" for="year" class="uname" >Year</label>
                                        <input id="year" name="year" required="required" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" placeholder="eg. 1995" value={{ $car->year }}>
                                    </p>
                                    <p>
                                        <label style="color: white; font-size:20;" for="boardNum" class="youpasswd" >Board Number</label>
                                        <input id="boardNum" name="boardNum" required="required" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" placeholder="eg. 455856" value={{ $car->boardNum }}>
                                    </p>
                                    <p>
                                        <label style="color: white; font-size:20;" for="rentPrice" class="youpasswd" >Renting Price per day</label>
                                        <input id="rentPrice" name="rentPrice" required="required" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" placeholder="eg. 25000" value={{ $car->rentPrice }}>
                                    </p>
                                    <p>
                                        <label style="color: white; font-size:20;" for="img"> All Car's Images </label><br>
                                        <label style="color: white; font-size:20;" for="img"> If you want to delete one or more of them, Check it/them </label><br>
                                        @foreach ($images as $image)
                                        <input type="checkbox" name="checked[]" value={{ $image->id }}/>
                                        <img src={{ url('img/' . $image->path . '') }} alt="" width=100 height=50 /><br>
                                        @endforeach
                                    </p>
                                    <p>
                                        <label style="color: white; font-size:20;" for="img"> Add a new Image </label>
                                        <input type="file" name="img[]" multiple="multiple"/>
                                    </p>
                                    <p class="signin button">
                                        <input type="submit" value="Edit">
                                    </p>
                            </form>
@endsection
