@extends('layouts.master')
@section('metalinks')
    @include('layouts.metalinks')
@stop
@section('title','Items')
@section('header')
    @include('layouts.navbar')
@stop
@section('sidebar')
    @include('layouts.sidebar')
@stop
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Item Gallery
                    <small>View and manipute item images</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li>Items</li>
                    <li class="active">Images</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 shadowed"><br>
                            <div class="col-md-12 col-md-offset-0">
                                @include('dashboard.items.gallery')
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
    <script type="text/javascript">
        var url = '{{ route('edititem') }}';
    </script>
    <script src="{{ asset ("/components/js/itemScripts.min.js") }}" type="text/javascript">
        </script>
@stop