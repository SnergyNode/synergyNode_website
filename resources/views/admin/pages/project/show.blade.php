<?php

$active['project'] = 'nav-active';

?>
@extends('admin.layout.app')

@section('content')
    <div class="col-md-12">

        <nav class="row" style="margin: 0 4px">
            <ol class="breadcrumb radius50">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><span><b><a href="{{ route('project.index') }}">Projects</a></b></span></li>
                <li class="breadcrumb-item"><span><b>{{ $project->title }}</b></span></li>
            </ol>
        </nav>

        <br>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('project.edit', $project->id) }}" class="btn btn-lg btn-white-border">MANAGE PROJECT</a>
                @if($project->type===1)
                    <a href="{{ route('project.addTask', $project->id) }}" class="btn btn-lg btn-white-border">ADD TASKS</a>
                @endif
            </div>
        </div>

        <!-- first div panel for greeting and important messages-->
        @include('admin.include.notify')

        <div class="row mt-5">
            <div class="col-12 col-md-12 col-lg-4">

                @include('admin.include.projectInfo')

                @include('admin.include.projectTeam')

                @include('admin.include.projectClient')

            </div>
            <div class="col-12 col-md-12 col-lg-8">
                @include('admin.include.projectActivity')
            </div>
        </div>

    </div>

    @include('admin.include.tinymyce')
@endsection