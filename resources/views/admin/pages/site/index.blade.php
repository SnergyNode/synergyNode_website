<?php
$active['siteinfo'] = 'nav-active';
?>

@extends('admin.layout.app')

@section('content')
    <div class="col-md-12">

        <nav class="row" style="margin: 0 4px">
            <ol class="breadcrumb radius50">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><span><b>Site Information</b></span></li>
            </ol>
        </nav>

        <!-- first div panel for greeting and important messages-->

        @include('admin.include.notify')

        <div class="container" style="margin-top: 50px; padding: 0 5%">

            <div class="row" >
                <div class="col-sm-12" style="margin-top: 20px">
                    <table class="table table-striped table-hover table-checkable order-column valign-middle dataTable no-footer"
                           id="" role="grid" aria-describedby="">
                        <thead>
                        <tr role="row">

                            <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1" style="width: 57px;">Icon</th>
                            <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1" style="width: 90px;">Input</th>
                            <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1" style="width: 67px;">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($synergy))
                            <!-- social handles starts -->
                            <tr class="gradeX odd" role="row">
                                <form action="{{ route('synergy.update', $synergy->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
                                    <td class="text-right"><p><small>Facebook</small> <i class="fa fa-facebook"></i></p></td>
                                    <td style="width: 90px;"><input placeholder="facebook url" type="text" name="facebook" class="form-control" value="{{ $synergy->facebook }}"></td>
                                    <td style="width: 67px"><button class="btn  btn-dark">Save</button></td>
                                </form>
                            </tr>
                            <tr class="gradeX odd" role="row">
                                <form action="{{ route('synergy.update', $synergy->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
                                    <td class="text-right"><p><small>LinkedIn</small> <i class="fa fa-linkedin"></i></p></td>
                                    <td style="width: 90px;"><input placeholder="LinkedIn url" type="text" name="linkd" class="form-control" value="{{ $synergy->linkd }}"></td>
                                    <td style="width: 67px"><button class="btn  btn-dark">Save</button></td>
                                </form>
                            </tr>
                            <tr class="gradeX odd" role="row">
                                <form action="{{ route('synergy.update', $synergy->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
                                    <td class="text-right"><p><small>Twitter</small> <i class="fa fa-twitter-square"></i></p></td>
                                    <td style="width: 90px;"><input placeholder="twitter url" type="text" name="twitter" class="form-control" value="{{ $synergy->twitter }}"></td>
                                    <td style="width: 67px"><button class="btn  btn-dark">Save</button></td>
                                </form>
                            </tr>
                            <tr class="gradeX odd" role="row">
                                <form action="{{ route('synergy.update', $synergy->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
                                    <td class="text-right"><p><small>Instagram</small> <i class="fa fa-instagram"></i></p></td>
                                    <td style="width: 90px;"><input placeholder="instagram url" type="text" name="instagram" class="form-control" value="{{ $synergy->instagram }}"></td>
                                    <td style="width: 67px"><button class="btn  btn-dark">Save</button></td>
                                </form>
                            </tr>
                            <tr class="gradeX odd" role="row">
                                <form action="{{ route('synergy.update', $synergy->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
                                    <td class="text-right"><p><small>Google Plus</small> <i class="fa fa-google-plus"></i></p></td>
                                    <td style="width: 90px;"><input placeholder="google url" type="text" name="google" class="form-control" value="{{ $synergy->google }}"></td>
                                    <td style="width: 67px"><button class="btn  btn-dark">Save</button></td>
                                </form>
                            </tr>
                            <tr class="gradeX odd" role="row">
                                <form action="{{ route('synergy.update', $synergy->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
                                    <td class="text-right"><p><small>Youtube</small> <i class="fa fa-youtube-play"></i></p></td>
                                    <td style="width: 90px;"><input placeholder="youtube url" type="text" name="youtube" class="form-control" value="{{ $synergy->youtube }}"></td>
                                    <td style="width: 67px"><button class="btn  btn-dark">Save</button></td>
                                </form>
                            </tr>

                            <!-- social handles ends -->
                            <!-- contact info handles starts -->

                            <tr class="gradeX odd" role="row">
                                <form action="{{ route('synergy.update', $synergy->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
                                    <td class="text-right"><p><small>Phone 1</small> <i class="fa fa-phone-square"></i></p></td>
                                    <td style="width: 90px;"><input placeholder="phone Line 1" type="text" name="tel1" class="form-control" value="{{ $synergy->tel1 }}"></td>
                                    <td style="width: 67px"><button class="btn  btn-dark">Save</button></td>
                                </form>
                            </tr>
                            <tr class="gradeX odd" role="row">
                                <form action="{{ route('synergy.update', $synergy->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
                                    <td class="text-right"><p><small>Phone 2</small> <i class="fa fa-phone-square"></i></p></td>
                                    <td style="width: 90px;"><input placeholder="phone Line 2" type="text" name="tel2" class="form-control" value="{{ $synergy->tel2 }}"></td>
                                    <td style="width: 67px"><button class="btn  btn-dark">Save</button></td>
                                </form>
                            </tr>
                            <tr class="gradeX odd" role="row">
                                <form action="{{ route('synergy.update', $synergy->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
                                    <td class="text-right"><p><small>mail 1</small> <i class="fa fa-envelope"></i></p></td>
                                    <td style="width: 90px;"><input placeholder="Support Mail" type="text" name="mail1" class="form-control" value="{{ $synergy->mail1 }}"></td>
                                    <td style="width: 67px"><button class="btn  btn-dark">Save</button></td>
                                </form>
                            </tr>
                            <tr class="gradeX odd" role="row">
                                <form action="{{ route('synergy.update', $synergy->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
                                    <td class="text-right"><p><small>mail 2</small> <i class="fa fa-envelope"></i></p></td>
                                    <td style="width: 90px;"><input placeholder="Information Mail" type="text" name="mail2" class="form-control" value="{{ $synergy->mail2 }}"></td>
                                    <td style="width: 67px"><button class="btn  btn-dark">Save</button></td>
                                </form>
                            </tr>
                            <tr class="gradeX odd" role="row">
                                <form action="{{ route('synergy.update', $synergy->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
                                    <td class="text-right"><p><small>Address</small> <i class="fa fa-map-marker"></i></p></td>
                                    <td style="width: 90px;"><input placeholder="Address" type="text" name="adrs" class="form-control" value="{{ $synergy->adrs }}"></td>
                                    <td style="width: 67px"><button class="btn  btn-dark">Save</button></td>
                                </form>
                            </tr>

                        @else
                            <tr class="gradeX odd" role="row">
                                <form action="{{ route('synergy.store') }}" method="post">
                                    {{ csrf_field() }}
                                    <td class="text-right"><small>Start Settings</small> <i class="fa fa-gear"></i></td>
                                    <td class="text-center" style="width: 33%;"><small>Activate Site Settings</small></td>
                                    <td class="text-right" style="width: 33%"><button type="submit" class="btn  btn-dark">Activate</button></td>
                                </form>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection