@extends('layouts.master')
@section('metalinks')
    @include('layouts.metalinks')
    <link href="{{ asset("/components/images/gallery/css/blueimp-gallery.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/components/images/gallery/css/bootstrap-image-gallery.min.css") }}" rel="stylesheet" type="text/css" />
@stop
@section('title','Items')
@section('header')
    @include('layouts.navbar')
@stop
@section('sidebar')
    @include('layouts.sidebar')
@stop
@section('content')
@include('gallery.gallery')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Items Manipulation Panel
                    <small>View, add, edit or deactivate item options</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Items</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">

                <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 shadowed"><br>
                            <div class="col-md-12 col-md-offset-0">
                                @include('dashboard.items.new')
                            </div>   
                        </div>
                    </div>
                </div><!-- /#container-fluid -->
                </div><!-- /#page-content-wrapper -->

            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

    </div><!-- ./wrapper -->
@stop
@section('footer')
    @include('layouts.footer')
@stop
@section('scripts')
    <script src="{{ asset ("/components/images/gallery/js/jquery.blueimp-gallery.min.js") }}"></script>
    <script src="{{ asset ("/components/images/gallery/js/bootstrap-image-gallery.min.js") }}"></script>
    <script type="text/javascript">
        var url = '{{ route('edititem') }}';
        var imagePreviewURL = '{{ route('imagePreviewURL') }}';
        var APP_URL = {!! json_encode(url('/')) !!};
    </script>
    <script src="{{ asset ("/components/js/itemScripts.min.js") }}" type="text/javascript">
        </script>
@stop