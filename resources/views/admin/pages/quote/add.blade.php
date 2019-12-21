<?php
$active['blog'] = 'nav-active';

?>
@extends('admin.layout.app')

@section('content')
    <div class="col-md-12">

        <nav class="row" style="margin: 0 4px">
            <ol class="breadcrumb radius50">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                <li class="breadcrumb-item"><span><b>New Blog</b></span></li>
            </ol>
        </nav>
        <!-- first div panel for greeting and important messages-->

        @include('admin.include.notify')

        <br>
        <br>
        <h3>New Blog</h3>
        <hr>

        <div class="" style="margin-top: 50px">

            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('blog.store') }}" class="form-horizontal" role="form" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}

                        <fieldset>

                            <div class="row">
                                <label class="col-sm-2 control-label" for="textinput">Slug</label>
                                <div class="col-sm-4">
                                    <input type="text" name="slug" placeholder="slug. e.g: how-to-make-money (no spaces)" class="form-control" required value="{{ old('slug') }}">
                                </div>

                                <label class="col-sm-2 control-label" for="textinput">Category</label>
                                <div class="col-sm-4">
                                    <select name="category_id" class="form-control" id="" required>
                                        <option value=""></option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach


                                    </select>
                                </div>
                            </div >

                            <br>

                            <div class="row">
                                <label class="col-sm-2 control-label" for="textinput">Type</label>
                                <div class="col-sm-4">
                                    <select name="type" id="" class="form-control">

                                    </select>
                                </div>

                                <label class="col-sm-2 control-label" for="textinput">Banner</label>
                                <div class="col-sm-4">
                                    <input class="form-input form-control" type="file" name="banner" accept="image/*" onchange="shwimg()" id="imgInp" required >
                                </div>
                            </div >

                            <br>
                            <div class="form-group">

                                <div class="col-sm-10">
                                    <p><small style="color: red">note: dimensions must be 950 x 400 pixels </small></p>
                                    <div class="text-center" style="max-height: 400px; padding: 0; border-radius: 5px; margin: 0 auto; background: #a7a7a7">
                                        <img id="imgtoshow"  src="{{ url('images/default.png') }}" class="img-fit-h" alt="">
                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Title</label>
                                <div class="col-sm-10">
                                    <textarea type="text" rows="2" name="title" placeholder="Blog Title" class="form-control" required>{{ old('title') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" rows="2" name="desc" placeholder="Blog Description" class="form-control" required>{{ old('desc') }}</textarea>
                                </div>
                            </div>




                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Tags</label>
                                <div class="col-sm-10">
                                    <p><small>please separate each tag with a space and each tag must be one word</small></p>
                                    <textarea type="text" rows="2" name="tags" placeholder="Blog tags related. e.g: #Money #Training #Housing" class="form-control" required>{{ old('tags') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Detail</label>
                                <div class="col-sm-10">
                                    <textarea rows="20" name="detail" class="myfield form-control">{!! old('detail') !!}</textarea>
                                </div>

                            </div >

                            <div class="form-group" style="margin-bottom: 50px">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-sm btn-info">Save</button>
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