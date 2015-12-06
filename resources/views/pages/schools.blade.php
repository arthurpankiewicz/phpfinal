@extends('app')

@section('content')

    <div class="container">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <h1>Schools</h1>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>

                </thead>
                <tbody>
                @foreach($schools as $school)
                    <tr>
                        <td><a href="{{  $school->url }}">{{ $school-> abbreviation  }} </a></td>
                        <td><a href="{{ url('/school', $school->sid) }}">{{ $school->schoolName }} </a></td>
                        <td>
                            @if($school->avgRating == 0)
                                -
                            @else
                                <i class="fa fa-star fa-1x"></i>
                                {{ round($school->avgRating, 0) / 10}}
                            @endif
                        </td>
                        <td>{{ $school->location }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    <div class="col-md-1"></div>
    </div>

@stop