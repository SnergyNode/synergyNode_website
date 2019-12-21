<?php

$active['project'] = 'nav-active';

?>
@extends('admin.layout.app')

@section('content')
    <div class="col-md-12">

        <nav class="row" style="margin: 0 4px">
            <ol class="breadcrumb radius50">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('project.index') }}">Project</a></li>
                <li class="breadcrumb-item"><span><b>New Blog</b></span></li>
            </ol>
        </nav>
        <!-- first div panel for greeting and important messages-->

        @include('admin.include.notify')

        <br>
        <br>
        <h4>Manage Project</h4>
        <hr>

        <div class="" style="">

            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('project.update', $project->id) }}" class="form-horizontal" role="form" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <fieldset>

                            <br>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Title</label>
                                <div class="col-sm-12">
                                    <textarea type="text" rows="1" name="title" placeholder="Projecty Title" class="form-control" required>{{ $project->title }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-sm-6 control-label" for="textinput">Project Type</label>
                                        <div class="col-sm-12">
                                            <select name="type" id="" class="form-control" required>
                                                <option {{ $project->type===0?'selected':'' }} value="0">No Tasks</option>
                                                <option {{ $project->type===1?'selected':'' }} value="1">Has Tasks</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-sm-6 control-label" for="textinput">Project Type</label>
                                        <div class="col-sm-12">
                                            <select name="priority" id="" class="form-control" required>
                                                <option {{ $project->priority===1?'selected':'' }} value="1">Very Low</option>
                                                <option {{ $project->priority===2?'selected':'' }} value="2">Low</option>
                                                <option {{ $project->priority===3?'selected':'' }} value="3">Moderate</option>
                                                <option {{ $project->priority===4?'selected':'' }} value="4">High</option>
                                                <option {{ $project->priority===5?'selected':'' }} value="5">Very High</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-6 control-label" for="textinput">Project Cost</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" name="cost" placeholder="Cost" value="{{ $project->cost }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-6 control-label" for="textinput">Start Date</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" name="start_date" placeholder="Cost" required value="{{ date('Y-m-d', $project->start_date) }}">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-6 control-label" for="textinput">Due Date</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" name="due_date" placeholder="Due date" required value="{{ date('Y-m-d', $project->due_date) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Detail</label>
                                <div class="col-sm-12">
                                    <textarea rows="10" name="details" class="myfield form-control">{!! $project->details !!}</textarea>
                                </div>

                            </div >

                            <div class="form-group" style="margin-bottom: 50px">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-sm btn-info">Create Project</button>
                                </div>

                            </div>

                        </fieldset>

                    </form>
                </div>
            </div>
        </div>

    </div>

    @include('admin.include.tinymyce')
@endsection