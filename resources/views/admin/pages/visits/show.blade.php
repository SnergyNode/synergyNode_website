<?php
$active['visits'] = 'nav-active';

?>
@extends('admin.layout.app')

@section('content')
    <div class="col-md-12">

        <nav class="row" style="margin: 0 4px">
            <ol class="breadcrumb radius50">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('visits.index') }}">Visits</a></li>
                <li class="breadcrumb-item"><span><b>{{ $visit->ip }}</b></span></li>
            </ol>
        </nav>

        <!-- first div panel for greeting and important messages-->

        @include('admin.include.notify')

        <div class="" style="margin-top: 50px">

            <div class="row" >
                <div class="col-md-12">
                </div>
                <div class="col-sm-12" style="margin-top: 20px">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle dataTable no-footer"
                           id="" role="grid" aria-describedby="">
                        <thead>
                        <tr role="row">

                            <th class="sorting" tabindex="0" aria-controls="example4"
                                rowspan="1" colspan="1" style="width: 57px;"> IP </th>
                            <th class="sorting" tabindex="0" aria-controls="example4"
                                rowspan="1" colspan="1" style="width: 222px;">Device </th>
                            <th class="sorting" tabindex="0" aria-controls="example4"
                                rowspan="1" colspan="1" style="width: 137px;">  Url </th>
                            <th class="sorting" tabindex="0" aria-controls="example4"
                                rowspan="1" colspan="1" style="width: 137px;"> Time </th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($visit->hits() as $visit)
                            <tr class="gradeX odd" role="row">
                                <td>{{ $visit->ip }}</td>
                                <td>{{ $visit->device }}</td>
                                <td>{{ $visit->url }}</td>
                                <td>{{ $visit->timeago() }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <p class="text-center">No Records Found</p>
                                </td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection