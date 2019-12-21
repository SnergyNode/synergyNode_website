<?php
$active['blog'] = 'nav-active';

?>
@extends('admin.layout.app')

@section('content')
    <div class="col-md-12">

        <nav class="row" style="margin: 0 4px">
            <ol class="breadcrumb radius50">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><span><b>Blog</b></span></li>
            </ol>

            <ol class="breadcrumb radius50" style="margin-left: 50px">
                <li class="breadcrumb-item">
                    <b>
                        <a href="{{ route('category.index') }}">Categories</a>
                    </b>
                </li>
            </ol>
        </nav>

        <!-- first div panel for greeting and important messages-->

        @include('admin.include.notify')

        {{ $blogs->links() }}

        <div class="" style="margin-top: 50px">

            <div class="row" >
                <div class="col-md-12">
                    <a href="{{ route('blog.create') }}" class="btn btn-orange-border btn-lg btn-sm">New Blog</a>
                </div>
                <div class="col-sm-12" style="margin-top: 20px">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle dataTable no-footer"
                           id="" role="grid" aria-describedby="">
                        <thead>
                        <tr role="row">

                            <th class="sorting" tabindex="0" aria-controls="example4"
                                rowspan="1" colspan="1" style="width: 57px;"> Title </th>
                            <th class="sorting" tabindex="0" aria-controls="example4"
                                rowspan="1" colspan="1" style="width: 222px;">Description </th>
                            <th class="sorting" tabindex="0" aria-controls="example4"
                                rowspan="1" colspan="1" style="width: 137px;">  Category </th>
                            <th class="sorting" tabindex="0" aria-controls="example4"
                                rowspan="1" colspan="1" style="width: 137px;"> Status </th>
                            <th class="sorting" tabindex="0"
                                aria-controls="example4" rowspan="1" colspan="1"
                                style="width: 47px;"> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($blogs as $blog)
                            <tr>
                                <td style="width: 400px">
                                    {{ $blog->title }}
                                </td>

                                <td style="width: 400px">
                                    {{ $blog->desc }}
                                </td>

                                <td>
                                    {{ $blog->category->name }}
                                </td>
                                <td>
                                    {{ $blog->status() }}
                                </td>
                                <td>
                                    <form id="dform" onclick="
                                    event.preventDefault();
                                    var person = prompt('Type DELETE to complete: ', '');
                                        if (person == null || person == '') {

                                        } else {
                                            if(person==='DELETE'){
                                                document.getElementById('dform').submit();
                                            }
                                        }
                                    " action="{{ route('blog.destroy', $blog->id) }}" method="post" style="display: inline;" >
                                        {{ csrf_field() }}
                                        <button style="width: 100%" class="btn btn-xs btn-danger btn-xs" type="submit">Delete</button>
                                    </form>
                                    <a style="width: 100%" href="{{ route('blog.show', $blog->id) }}" class="btn btn-xs btn-info btn-xs">Preview</a>
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