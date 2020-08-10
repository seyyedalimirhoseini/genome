<!DOCTYPE HTML>

<html>

<!-- Head -->
	<head>
		@include('UI.Parts.head')
	</head>

<!-- Body -->
	<body>
	<!-- Sidebar -->
		@include('UI.Parts.sidebar')
		{{--@yield('sidebar')--}}

	<!-- Content -->
		@yield('content')

	<!-- Script -->
		@include('UI.Parts.script')
	</body>

</html>