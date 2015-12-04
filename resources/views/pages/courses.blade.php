@extends('app')

@section('content')
    <script>
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
            $("#myTable").tablesorter( {
                sortList: [[2,0]]
            });
            $('th').click(function() {
                $(this).find('[name="caret"]').toggleClass('fa-caret-up fa-caret-down');
            });
        });
    </script>
    <style>
        .alignright {
            float: right;
            padding-right: 50px;
        }
    </style>
    <div class="col-md-1"></div>
    <div class="col-md-10">
            <h1>Courses<span class="alignright"><a href="{{ url('/addcourse') }}">Not here? Add it!</a></span></h1>
            <input id="searchInput" placeholder="Filter by course number" class="form-control">
    <table id="myTable" class="tablesorter table table-striped table table-hover">
        <thead>
        <tr>
            <th width="50px"><i name="caret" class="fa fa-caret-up fa-1x"></i></th>
            <th width="100px"><i name="caret" class="fa fa-caret-up fa-1x"></i></th>
            <th width="550px"><i name="caret" class="fa fa-caret-up fa-1x"></i></th>
            <th width="100px"><i name="caret" class="fa fa-caret-up fa-1x"></i></th>
            <th></th>
        </tr>
        </thead>
        <tbody id="fbody">
            @foreach($courses as $course)
                <tr>
                    <td>
                        <a href="{{ url('/school', $course->schoolId) }}">
                            {{ $course->abbreviation }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ url('/course', $course->cid) }}">
                            {{ $course->courseCode }}
                        </a>
                    </td>
                    <td>{{ $course->courseName }}</td>
                    <td>
                        @if($course->avgRating == 0)
                            -
                        @else
                            <i class="fa fa-star fa-1x"></i>
                            {{ round($course->avgRating, 1) / 10}}
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('/reviewcourse', $course->cid) }}">
                            {{--<i class="fa fa-commenting-o fa-1x"></i>--}}
                            Review
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <div class="col-md-1"></div>

@stop