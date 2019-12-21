<?php
$active['servic'] = 'nav-active';
$adTitle = 'Service / '.$service->title;

?>
@extends('admin.layout.app')

@section('content')
    <div class="col-md-12">

        <nav class="row" style="margin: 0 4px">
            <ol class="breadcrumb radius50">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('servic.index') }}">Service</a></li>
                <li class="breadcrumb-item"><span><b>{{ $service->title }}</b></span></li>
            </ol>

            <ol class="breadcrumb radius50" style="margin-left: 20px">
                <li class="breadcrumb-item">
                    <a href="{{ route('servic.edit', $service->unid) }}">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <form id="delete_g" action="{{ route('servic.destroy', $service->unid) }}" method="POST" class="d-inline" style="padding: 0;background: none">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button class="" type="submit" style="background: none;border: 0;cursor: pointer; color: red" onclick="
                                    event.preventDefault();
                                    var person = prompt('Type DELETE to complete: ', '');
                                        if (person == null || person == '') {

                                        } else {
                                            if(person==='DELETE'){
                                                document.getElementById('delete_g').submit();
                                            }
                                        }
                                    "><i class="fa fa-trash"></i>
                            Delete
                        </button>
                    </form>
                </li>
            </ol>
        </nav>
        <!-- first div panel for greeting and important messages-->

        @include('admin.include.notify')

        <div class="" style="margin-top: 50px">

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-sm-3"><h2><i class="{{ $service->icon }}"></i></h2></div>
                        <div class="col-sm-9">
                            <b>{{ $service->title }}</b>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <h4>Intro</h4>
            <p>{{ $service->intro }}</p>
            <br>
            <br>
            <h4>Details</h4>
            <p>{!! $service->detail  !!} </p>
        </div>

    </div>
@endsection