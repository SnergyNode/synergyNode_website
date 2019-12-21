<?php
$active['servic'] = 'nav-active';
$adTitle = 'Dashboard/Service';
?>

@extends('admin.layout.app')

@section('content')
    <div class="col-md-12">

        <nav class="row" style="margin: 0 4px">
            <ol class="breadcrumb radius50">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><span><b>Our Services</b></span></li>
            </ol>
        </nav>

        <!-- first div panel for greeting and important messages-->

        @include('admin.include.notify')

        <div class="" style="margin-top: 50px">

            <div class="row" >
                <div class="col-md-12">
                    <a href="{{ route('servic.create') }}" class="btn btn-orange-border btn-lg btn-sm">New Service</a>
                </div>
                <div class="col-sm-12" style="margin-top: 20px">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle dataTable no-footer"
                           id="" role="grid" aria-describedby="">
                        <thead>
                        <tr role="row">

                            <th class="sorting" tabindex="0" aria-controls="example4"
                                rowspan="1" colspan="1" style="width: 57px;"> Title </th>
                            <th class="sorting" tabindex="0" aria-controls="example4"
                                rowspan="1" colspan="1" style="width: 222px;">Intro </th>
                            <th class="sorting" tabindex="0" aria-controls="example4"
                                rowspan="1" colspan="1" style="width: 137px;">  Status </th>
                            <th class="sorting" tabindex="0"
                                aria-controls="example4" rowspan="1" colspan="1"
                                style="width: 47px;"> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($servic as $service)
                            <tr class="gradeX odd" role="row">
                                <td>{{ $service->title }}</td>
                                <td style="width: 222px;">{{ $service->intro() }}</td>
                                <td>{{ $service->status===1?'Active':'Disabled' }}</td>
                                <td>
                                    <a href="{{ route('servic.show', $service->unid) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Preview</a>
                                    <a href="" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i> Disable</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <p>No Records Found</p>
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