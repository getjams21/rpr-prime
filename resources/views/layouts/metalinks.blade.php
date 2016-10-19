<meta charset="UTF-8">
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- icon -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset("components/images/logo/rpr-icon.ico") }}" />
<!-- Bootstrap 3.3.2 -->
<link href="{{ asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
<!-- Font Awesome Icons -->
<link href="{{ asset("/bower_components/admin-lte/fontawesome/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="{{ asset("/bower_components/admin-lte/fontawesome/ionicons.min.css") }}" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
<!-- AdminLTE Skins. We have chosen the skin-blue for this starter
      page. However, you can choose any other skin. Make sure you
      apply the skin class to the body tag so the changes take effect.
-->
<link href="{{ asset("/bower_components/admin-lte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />
<!-- Custom CSS file -->
<link href="{{ asset("/components/css/mystyle.min.css")}}" rel="stylesheet" type="text/css" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<!-- DataTables CSS -->
<link href="{{ asset("/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css")}}" rel="stylesheet" type="text/css" />