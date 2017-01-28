@extends('layouts.landing')
@section('content')
		  <div class="slider">
		  <ul class="slides">
			 <li>
				<img src="/img/slider/1.jpg"> <!-- random image -->
{{-- 				<div class="caption center-align">
				  <h3>This is our big Tagline!</h3>
				  <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
				</div> --}}
			 </li>
			 <li>
				<img src="/img/slider/2.jpg"> <!-- random image -->
			{{-- 	<div class="caption left-align">
				  <h3>Left Aligned Caption</h3>
				  <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
				</div> --}}
			 </li>
			 <li>
				<img src="/img/slider/3.jpg"> <!-- random image -->
				{{-- <div class="caption right-align">
				  <h3>Right Aligned Caption</h3>
				  <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
				</div> --}}
			 </li>
			 <li>
				<img src="/img/slider/5.jpg"> <!-- random image -->
				{{-- <div class="caption center-align">
				  <h3>This is our big Tagline!</h3>
				  <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
				</div> --}}
			 </li>
		  </ul>
		</div>
		<div class="container">
			
			@yield('welcome-content')
				
			
		</div>
@stop


		 
		  
