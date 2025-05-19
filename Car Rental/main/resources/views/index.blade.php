@extends('layout')

@section('title', 'Al-Qadi Company')

@section('content')

<div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
        <img src={{ url('../../admin/public/img/slide1.jpg') }} alt="" />
        <img src={{ url('../../admin/public/img/slide3.jpg') }} alt="" />
        <img src={{ url('../../admin/public/img/slide4.jpg') }} alt="" />
    </div>
</div>
<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider({pauseTime: 3000,});
});
</script>

    <h1>Our Centers</h1><br><br>
    <table><tr>
    @foreach ($centers as $center)
        <td><article>
            <h1> {{ $center->city }}</h1>
            <p>
                <p>
                    Region: {{  $center->region }}
                </p>
                <p>
                    Street: {{  $center->street }}
                </p>
                <p>
                    Mobile Number: {{  $center->mobileNum }}
                </p>
                <p>
                    Telephone: {{  $center->telephone }}
                </p>
            </p>
        </article></td><td></td><td></td><td></td><td></td><td></td>
        @endforeach
        </tr></table>
        <br><br>
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
