@extends('app')

@section('content')
    <style>
        .alignright {
            float: right;
            padding-right: 50px;
            font-size: 85%;
        }
    </style>
    <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="page-header">
                <h1>Recent Posts for {{ $name }}</h1>
            </div>
            <table class="table table-striped table table-hover">
                <thead>
                <th></th>
                <th width="50px"></th>
                </thead>
                <tbody>
                @foreach($reviews as $review)
                    <tr>
                        <td>
                            <a href="{{ url('/school', $review->sid) }}">{{ $review->abbreviation }}</a>
                            -
                            <a href="{{ url('/course', $review->cid) }}">{{ $review->ccode }}</a>
                            <br><br>
                            {{ $review->summary }}
                        </td>
                        <td>
                            <i class="fa fa-star fa-1x"></i>
                            {{ $review->rating / 10 }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <span class="alignright">
                                <i>{{ $review->datePosted }} by {{$review->author}} </i>
                            </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>

@stop