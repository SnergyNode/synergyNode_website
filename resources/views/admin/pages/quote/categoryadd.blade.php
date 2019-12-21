<?php
$active['dashboard'] = 'imactive';
?>
@extends('admin.layout.app')

@section('content')
    <div class="col-md-12">
        <nav class="row" style="margin: 0 4px">
            <ol class="breadcrumb radius50">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                <li class="breadcrumb-item"><b>Categories</b></li>
            </ol>
        </nav>
    </div>

    @include('admin.include.notify')

    <!--                first div panel for greeting and important messages-->

    <div class="">
        <br>
        <small class="gray">
            Create a new Blog Category Detail.
        </small>
        <br>

        <hr>

        <div class="col-md-12">
            <form class="form-horizontal" role="form" action="{{ route('category.store') }}" method="POST">
                {{ csrf_field() }}

                <fieldset>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" placeholder="Category name" class="form-control" required>
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Status</label>
                        <div class="col-sm-10">
                            <input type="text" name="status" placeholder="active" class="form-control" disabled value="active">
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="group">Group</label>
                        <div class="col-sm-4">
                            <input type="text" name="group" placeholder="Group [use article, except not a blog]" class="form-control" value="article" >
                        </div>

                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="content">Content Info</label>
                        <div class="col-sm-10">
                            <input name="content" type="text" placeholder="Category Information" class="form-control abt_field">
                        </div>

                    </div>



                    <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-sm btn-info">Create Category</button>
                        </div>

                    </div>

                </fieldset>

            </form>
        </div>
        <br>
        <br>
        <br>



    </div>

@endsection


