<!DOCTYPE html>
    <!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
    -->
    <html>
    <head>
        @yield('metalinks')
        <title>@yield('title','RPR Prime')</title>
    </head>
    <body class="skin-blue">
    <div class="wrapper">
    	@yield('inbodyscripts')
       	@yield('header')
       	@yield('sidebar')
       	@yield('content')
       	@yield('footer')
       	<!-- REQUIRED JS SCRIPTS -->

	    <!-- jQuery 2.1.3 -->
	    <script src="{{ asset ("/bower_components/admin-lte/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
	    <!-- Bootstrap 3.3.2 JS -->
	    <script src="{{ asset ("/bower_components/admin-lte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
	    <!-- AdminLTE App -->
	    <script src="{{ asset ("/bower_components/admin-lte/dist/js/app.min.js") }}" type="text/javascript"></script>

	    <!-- Optionally, you can add Slimscroll and FastClick plugins.
	          Both of these plugins are recommended to enhance the
	          user experience -->
	    <script src="{{ asset ("/components/js/navbar.min.js") }}" type="text/javascript">
	    </script>
	    <script src="{{ asset ("/components/js/sidebar.min.js") }}" type="text/javascript">
	    </script>
	    <script src="{{ asset ("/components/js/footer.min.js") }}" type="text/javascript">
	    </script>
	    <script src="{{ asset ("/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") }}" type="text/javascript"></script>
	    <script src="{{ asset ("/components/js/myscript.min.js") }}" type="text/javascript">
	    </script>
       	@yield('scripts')
    </body>
</html>