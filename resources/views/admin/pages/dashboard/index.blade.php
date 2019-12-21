<?php
$active['dashboard'] = 'nav-active';
$jslinks = ['socket_receive.js'];
?>
@extends('admin.layout.app')

@section('content')
    <div class="col-md-12">

        <nav class="row" style="margin: 0 4px">
            <ol class="breadcrumb radius50">
                <li class="breadcrumb-item"><b>Dashboard</b></li>
            </ol>
        </nav>

        <!-- first div panel for greeting and important messages-->

        <div class="">

            <div class="row">
                <div class="col-md-3 col-xs-12 col-sm-6">
                    <div class="card radius50" style="padding: 20px">
                        <b class="text-center"> <span class="online">0</span> <span> Online</span></b>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 col-sm-6">
                    <a href="{{ route('visits.index') }}" class="card radius50" style="padding: 20px">
                        <b class="text-center"> <span class="visits">{{ count($visits) }}</span> <span>Visitors Today</span> </b>
                    </a>
                </div>
                <div class="col-md-3 col-xs-12 col-sm-6"></div>
                <div class="col-md-3 col-xs-12 col-sm-6"></div>
            </div>
        </div>
        <div class="">

            <div class="row">
                <!-- quick links here -->
            </div>
        </div>

    </div>
@endsection