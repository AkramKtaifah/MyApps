<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />

        <link rel="stylesheet" href={{ url('css/style.css') }}>
		<link rel="stylesheet" href={{ url('css/nivo-slider.css') }} type="text/css" media="screen">
		<link rel="stylesheet" href={{ url('css/default/default.css') }} type="text/css" media="screen">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
		<script src={{ url('js/jquery.nivo.slider.pack.js') }} type="text/javascript"></script>

        <title>@yield('title')</title>
    </head>
	<body style="background: url('../../admin/public/img/bg.png') repeat;">
        <div id="wrapper">
			<!--__--__--__--__--__--  L O G O  &   N A V    B A R --__--___--__--__--__-->
			<header>
				<div id="logo">
				<h1>Al-Qadi Company<span id="iisrt"><span id="ii">II</span>  <span id="srt">QDC</span></span></h1>
				<div id="tagline">
					<h2>Small Company For Renting Cars</h2>
				</div>
				</div>
				<nav>
					<ul>
						<li><a href={{ route('home.index') }} id="homenav">Home</a></li>
						<li><a href={{ route('home.center') }}>Centers</a></li>
						<li><a href={{ route('car.index') }}>Cars</a></li>
					</ul>
				</nav>
			</header>

			<!--__--__--__--__--  T H E    S L I D E R --__--__--__--___--__--__--__-->
			@yield('content')
			<!--__--__--__--__--  M A I N   C O N T E N T  --__--__--__--___--__--__-->

            <!--__--__--__--__--  T H E    F O O T E R --__--__--__--___--__--__--__-->
			<footer>
				<p>Copyright &copy 2022 Al-Qadi Company, Designed by Akram Kutifah. All Rights Reserved.</p>
			</footer>
		</div>
	</body>
    <script>
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
         if(dd<10){
                dd='0'+dd
            }
            if(mm<10){
                mm='0'+mm
            }

        today = yyyy+'-'+mm+'-'+dd;
        document.getElementById("startDate").setAttribute("min", today);
        document.getElementById("endDate").setAttribute("min", today);

        function validate() {
            var x = document.forms["form1"]["startDate"].value;
            var y = document.forms["form1"]["endDate"].value;
            if (x >= y) {
                alert("EndDate must be greater than StartDate");
                return false;
            }
        }

        </script>

</html>




