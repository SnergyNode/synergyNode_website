<?php
$active['quotes'] = 'nav-active';

?>
@extends('admin.layout.app')

@section('content')
    <div class="col-md-12">

        <nav class="row" style="margin: 0 4px">
            <ol class="breadcrumb radius50">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><span><b>Quote</b></span></li>
            </ol>
        </nav>

        <!-- first div panel for greeting and important messages-->

        @include('admin.include.notify')

        {{ $quotes->links() }}

        <div class="" style="margin-top: 50px">

            <div class="row" >
                <div class="col-sm-12" style="margin-top: 20px">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle dataTable no-footer"
                           id="" role="grid" aria-describedby="">
                        <thead>
                        <tr role="row">

                            <th class="sorting" tabindex="0" aria-controls="example4"
                                rowspan="1" colspan="1" style="width: 57px;"> Names </th>
                            <th class="sorting" tabindex="0" aria-controls="example4"
                                rowspan="1" colspan="1" style="width: 222px;">Email</th>
                            <th class="sorting" tabindex="0" aria-controls="example4"
                                rowspan="1" colspan="1" style="width: 137px;">  Interest </th>
                            <th class="sorting" tabindex="0" aria-controls="example4"
                                rowspan="1" colspan="1" style="width: 137px;"> Phone </th>
                            <th class="sorting" tabindex="0"
                                aria-controls="example4" rowspan="1" colspan="1"
                                style="width: 47px;"> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($quotes as $quote)
                            <tr>
                                <td style="width: 400px">
                                    {{ $quote->yname }}
                                </td>

                                <td style="width: 400px">
                                    {{ $quote->yemail }}
                                </td>

                                <td>
                                    {{ $quote->interest  }}
                                </td>
                                <td>
                                    {{ $quote->phone }}
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
                                    " action="{{ route('quote.destroy', $quote->id) }}" method="post" style="display: inline;" >
                                        {{ csrf_field() }}
                                        <button style="width: 100%" class="btn btn-xs btn-danger btn-xs" type="submit">Delete</button>
                                    </form>
                                    <a style="width: 100%" href="{{ route('quote.show', $quote->id) }}" class="btn btn-xs btn-info btn-xs">Preview</a>
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