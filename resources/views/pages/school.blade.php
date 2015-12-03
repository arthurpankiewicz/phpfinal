@extends('app')

@section('content')
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $("#searchInput").keyup(function () {
                var rows = $("#fbody").find("tr").hide();
                if (this.value.length) {
                    var data = this.value.split(" ");
                    $.each(data, function (i, v) {
                        rows.filter(":contains('" + v + "')").show();
                    });
                } else rows.show();
            });
        });
    </script>
    <style>
        .alignright {
            float: right;
            padding-right: 50px;
        }
    </style>
    <div class="container">
        <div class="jumbotron">
            <h2>
                {{ $school[0]->abbreviation }} - {{ $school[0]->schoolName }}
                <span class="alignright">
                    <i class="fa fa-star"></i>{{ $averageReview }}
                </span>
            </h2>
            <h3>
                {{ $school[0]->location }}
            </h3>
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div>
            <input id="searchInput" placeholder="Filter by course number" class="form-control">
        </div>
        <table class="table table-striped table table-hover">
            <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody id="fbody">
            @foreach($courses as $course)
                <tr>
                    <td width="100">
                        <a href="{{ url('/course', $course->id) }}">
                            {{ $course->courseCode }}
                        </a>
                    </td>
                    <td width="600">{{ $course->courseName }}</td>
                    <td>{{ $course->rating }}</td>
                    <td>
                        <a href="{{ url('/reviewcourse', $course->id) }}">
                            <i class="fa fa-commenting-o fa-1x"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-1"></div>

@stop