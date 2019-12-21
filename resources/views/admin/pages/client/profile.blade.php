<?php
$active['admin'] = 'nav-active';

?>
@extends('admin.layout.app')

@section('content')
    <div class="col-md-12">

        <nav class="row" style="margin: 0 4px">
            <ol class="breadcrumb radius50">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><span><b>{{ $admin->setName() }}</b></span></li>
            </ol>

            <ol class="breadcrumb radius50" style="margin-left: 20px">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.edit', $admin->unid) }}">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <form id="delete_g" action="{{ route('admin.destroy', $admin->unid) }}" method="POST" class="d-inline" style="padding: 0;background: none">
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
                        <div class="col-md-3 col-xs-12" style="padding: 0 20px">
                            <img src="{{ $admin->setPhoto() }}" alt="" class="img-fit img-stable">
                        </div>
                        <div class="col-md-9 col-xs-12">
                            <h2  style="padding:  20px">{{ $admin->setName() }}</h2>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <small>Tel </small>
                                    <br>
                                    <p>{{ $admin->phone }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <small>Email </small>
                                    <br>
                                    <p>{{ $admin->email }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <small>Username</small>
                                    <br>
                                    <p>{{ $admin->username }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <h4>Office</h4>
            <p>{{ $admin->office }}</p>
            <h4>Home Address</h4>
            <p>{{ $admin->address }}</p>
        </div>

    </div>
@endsection