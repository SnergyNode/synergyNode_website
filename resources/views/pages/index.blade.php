<?php $title = 'Synergy Node - Home'; ?>

@extends('layouts.app')

@section('content')
    <!--top bar start-->
    @include('pages.include.nav')
    <!--slider start-->
    @include('pages.include.sliders')
    <!-- steps and about -->
    @include('pages.include.about')
    <!-- Counter-section  -->
    @include('pages.include.counter')

    <!--start services-->
    @include('pages.include.services')

    <!--end services-->

    <!-- Quote Section -->
    @include('pages.include.quote')

    <!-- work Section -->
    @include('pages.include.works')

    <!-- CLINTS Section -->
    @include('pages.include.client')
    <!-- contact Section -->
    @include('pages.include.contact')

    <div class="height-60"> </div>
    <!-- footer Section  with map...map in trash-->

    @include('pages.include.footer')
@endsection
