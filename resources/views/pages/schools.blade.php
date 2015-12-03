@extends('app')

@section('content')

    <h1>Schools Hi</h1>
    <div>
        {!! Form::open() !!}
        <div class="input-group">
            {!! Form::text('search', null, array('required',
                            'class'=>'form-control', 'placeholder'=>'')) !!}
            <span class="input-group-btn">
                {!! Form::submit('Filter', array('class'=>'btn btn-primary')) !!}
            </span>
        </div>
        {!! Form::close()  !!}
    </div>

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
                <td>{{ $school-> abbreviation  }}</td>
                <td>{{ $school->schoolName }}</td>
                <td>{{ $school->location }}</td>
                <td>{{ $school->rating }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop