<?php
$active['admin'] = 'nav-active';

?>
@extends('admin.layout.app')

@section('content')
    <div class="col-md-12">

        <nav class="row" style="margin: 0 4px">
            <ol class="breadcrumb radius50">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><span><b>Administrators</b></span></li>
            </ol>
        </nav>

        <!-- first div panel for greeting and important messages-->

        @include('admin.include.notify')

        {{ $users->links() }}

        <div class="" style="margin-top: 50px">

            <div class="row" >
                <div class="col-md-12">
                    <a href="{{ route('admin.create') }}" class="btn btn-orange-border btn-lg btn-sm">New Admin</a>
                </div>
                <div class="col-sm-12" style="margin-top: 20px">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle dataTable no-footer"
                           id="" role="grid" aria-describedby="">
                        <thead>
                        <tr role="row">

                            <th class="sorting" tabindex="0" aria-controls="example4"
                                rowspan="1" colspan="1" style="width: 57px;"> Name </th>
                            <th class="sorting" tabindex="0" aria-controls="example4"
                                rowspan="1" colspan="1" style="width: 222px;">Photo </th>
                            <th class="sorting" tabindex="0" aria-controls="example4"
                                rowspan="1" colspan="1" style="width: 137px;">  Tel </th>
                            <th class="sorting" tabindex="0" aria-controls="example4"
                                rowspan="1" colspan="1" style="width: 137px;"> Last Seen </th>
                            <th class="sorting" tabindex="0"
                                aria-controls="example4" rowspan="1" colspan="1"
                                style="width: 47px;"> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $user)
                            <tr class="gradeX odd" role="row">
                                <td>{{ $user->setName() }}</td>
                                <td>
                                    <div class="user-pic" style="width: 52px;height: 52px">
                                        <div class="img_box">
                                            <div class="img_container">
                                                <img src="{{ $user->setPhoto() }}" class="img-large-fit" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->seen() }}</td>
                                <td>
                                    <a style="width: 100%" href="{{ route('admin.show', $user->unid) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Preview</a>
                                    <a style="width: 100%" href="" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i> Disable</a>
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