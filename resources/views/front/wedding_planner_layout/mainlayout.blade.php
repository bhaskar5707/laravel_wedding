<!DOCTYPE html>
<html lang="en">
 <head>
    @include('front.wedding_planner_layout.head')
    @include('front.wedding_planner_layout.header')
 </head>
 <body>
	@yield('content')
	@include('front.wedding_planner_layout.footer')
	@include('front.wedding_planner_layout.footer-scripts')
 </body>
</html>