<?php
$active['visits'] = 'nav-active';

?>
@extends('admin.layout.app')

@section('content')
    <div class="col-md-12">

        <nav class="row" style="margin: 0 4px">
            <ol class="breadcrumb radius50">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><span><b>Visitor</b></span></li>
            </ol>
        </nav>
        <br>
        <div class="col-xs-12"><h5><p>V I S I T O R S</p></h5></div>
        <div class="row">

            <div class="col-md-3 col-xs-6 col-sm-4">
                <a href="#" class="card radius50" style="padding: 20px">
                    <b class="text-center"> <span class="online">{{ !empty($visitz)?count($visitz->today()):'0' }}</span> <span> Today</span></b>
                </a>
            </div>
            <div class="col-md-3 col-xs-6 col-sm-4">
                <a href="#" class="card radius50" style="padding: 20px">
                    <b class="text-center"> <span class="online">{{ !empty($visitz)?count($visitz->thisweek()):'0' }}</span> <span> This Week</span></b>
                </a>
            </div>
            <div class="col-md-3 col-xs-6 col-sm-4">
                <a href="#" class="card radius50" style="padding: 20px">
                    <b class="text-center"> <span class="online">{{ !empty($visitz)?count($visitz->thismonth()):'0' }}</span> <span> This Month</span></b>
                </a>
            </div>
            <div class="col-md-3 col-xs-6 col-sm-4">
                <a href="#" class="card radius50" style="padding: 20px">
                    <b class="text-center"> <span class="online">{{ !empty($visitz)?count($visitz->thisyear()):'0' }}</span> <span> This Year</span></b>
                </a>
            </div>
        </div>

        <!-- first div panel for greeting and important messages-->

        @include('admin.include.notify')

        <div class="" style="margin-top: 50px">

            <div class="row" >
                <div class="col-md-12">
                    {{ $visits->links() }}
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
                            <th class="sorting" tabindex="0"
                                aria-controls="example4" rowspan="1" colspan="1"
                                style="width: 47px;"> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($visits as $visit)
                            <tr class="gradeX odd" role="row">
                                <td>{{ $visit->ip }}</td>
                                <td>{{ $visit->device }} <b>{{ $visit->hit }}</b></td>
                                <td>{{ $visit->url }}</td>
                                <td>{{ $visit->timeago() }}</td>
                                <td>
                                    <a href="{{ route('visits.show', $visit->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Preview</a>
                                </td>
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