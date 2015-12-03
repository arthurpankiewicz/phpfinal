@extends('app')

@section('content')
    <style>
        .alignright {
            float: right;
            padding-right: 50px;
        }
    </style>
    <div class="container">
        <div class="jumbotron">
            <h2>
                <a href="{{ url('/reviewcourse', $course[0]->id) }}">
                    {{ $course[0]->courseCode }} - {{ $course[0]->courseName }}
                </a>
            </h2>
            <h3>
                <a href="{{ url('/school', $course[0]->schoolId) }}">
                    {{ $course[0]->abbreviation }}</a> - {{ $course[0]->schoolName }}
                <span class="alignright">
                    <i class="fa fa-star"></i>
                    {{ $averageReview }}
                </span>
            </h3>
        </div>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <table class="table table-striped table table-hover">
            <thead>
                <th></th>
                <th width="50px"></th>
            </thead>
            <tbody>
                @foreach($reviews as $review)
                    <tr>
                        <td>
                            {{ $review->summary }}
                        </td>
                        <td>
                            <i class="fa fa-star fa-1x"></i>
                            {{ $review->rating / 10 }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-3"></div>

@stop