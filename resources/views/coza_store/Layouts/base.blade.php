
<!DOCTYPE html>
<html lang="en">
@include('coza_store.Layouts.head')
<body> {{-- class="animsition" --}}

	<!-- Header -->
@include('coza_store.Layouts.header')



	<!-- Slider -->

@yield('main')

	<!-- Banner -->



	<!-- Product -->



	<!-- Footer -->
@include('coza_store.Layouts.footer')
	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>
@include('coza_store.Layouts.script')
</body>
</html>
