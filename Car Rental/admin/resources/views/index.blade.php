@extends('layout')

@section('title', 'Al-Qadi Company')

@section('content')

<div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
        <img src={{ url('img/slide1.jpg') }} alt="" />
        <img src={{ url('img/slide3.jpg') }} alt="" />
        <img src={{ url('img/slide4.jpg') }} alt="" />
    </div>
</div>
<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider({pauseTime: 3000,});
});
</script>

@endsection
