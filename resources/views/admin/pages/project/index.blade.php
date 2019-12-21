<?php

$active['project'] = 'nav-active';

?>
@extends('admin.layout.app')

@section('content')
    <div class="col-md-12">

        <nav class="row" style="margin: 0 4px">
            <ol class="breadcrumb radius50">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><span><b>Projects</b></span></li>
            </ol>
        </nav>

        <br>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('project.create') }}" class="btn btn-lg btn-white-border">NEW PROJECT</a>
            </div>
        </div>

        <!-- first div panel for greeting and important messages-->
        @include('admin.include.notify')

        {{ $projects->links() }}

        <div class="" style="margin-top: 50px">

            <div class="row" >
                <div class="col-sm-12" style="margin-top: 10px">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle dataTable no-footer"
                           id="" role="grid" aria-describedby="">
                        <thead>
                        <tr role="row">

                            <th class="sorting" tabindex="0" aria-controls="example4"
                                rowspan="1" colspan="1" style="width: 200px;"> Project </th>
                            <th class="sorting" tabindex="0" aria-controls="example4"
                                rowspan="1" colspan="1" style="width: 150px;">Days Left</th>
                            <th class="sorting" tabindex="0" aria-controls="example4"
                                rowspan="1" colspan="1" style="width: 137px;">  Status </th>
                            <th class="sorting" tabindex="0" aria-controls="example4"
                                rowspan="1" colspan="1" style="width: 137px;"> Team Lead </th>
                            <th class="sorting" tabindex="0"
                                aria-controls="example4" rowspan="1" colspan="1"
                                style="width: 47px;"> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($projects as $project)
                            <tr>
                                <td style="">
                                    {{ $project->title }}
                                </td>

                                <td style="">
                                    {{ $project->daysleft() }}
                                </td>

                                <td>
                                    {{ empty($project->status)?'Unset':$project->status  }}
                                </td>
                                <td>
                                    {{ $project->teamlead()}}
                                </td>
                                <td>
                                    <a href="{{ route('project.show', $project->id) }}" class="btn btn-xs btn-info btn-xs"><i class="fa fa-eye"></i> view</a>
                                    <form id="dform" onclick="
                                    event.preventDefault();
                                    var person = prompt('Type DELETE to complete: ', '');
                                        if (person == null || person == '') {

                                        } else {
                                            if(person==='DELETE'){
                                                document.getElementById('dform').submit();
                                            }
                                        }
                                    " action="{{ route('project.destroy', $project->id) }}" method="post" style="display: inline;" >
                                        {{ csrf_field() }}
                                        <button class="btn btn-xs btn-danger btn-xs" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    No Item found! click <a href="{{ route('blog.create') }}">here </a> to add now
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