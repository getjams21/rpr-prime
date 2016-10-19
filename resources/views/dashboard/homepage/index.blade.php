@extends('layouts.master')
@section('metalinks')
    @include('layouts.metalinks')
@stop
@section('title','Home')
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
                    Welcome Admin!
                    <small>Optional description</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                    <li class="active">Here</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Your Page Content Here -->

            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

    </div><!-- ./wrapper -->
@stop
@section('footer')
    @include('layouts.footer')
@stop