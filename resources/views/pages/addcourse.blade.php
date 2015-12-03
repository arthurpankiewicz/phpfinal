@extends('app')

@section('content')

    <div class="container">
        <div class="row page-head-line">
            <div class="col-md-6 col-sm-6">
                <h1>Review a Course</h1>
            </div>
        </div>
    </div>

    <div class="col-md-2"></div>
    <div class="col-md-8">
        {!! Form::open() !!}
            <form class="form-horizontal">
                {{--mAYBE FORM CONTROL?????--}}
                <div class="form-group">
                    {!! Form::label('school', 'School:', ['class' => 'control-label col-xs-2']) !!}
                    {!! Form::select('school', [null => 'Please Select'] + $schoolDropdown) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('school', 'School:', ['class' => 'control-label col-xs-2']) !!}
                    {!! Form::select('school', [null => 'Please Select'] + $schoolDropdown) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('subjectCode', 'Subject Code:', ['class' => 'control-label col-xs-2'] ) !!}
                    {!! Form::input('text', 'subjectCode', '', ['required', 'class' => 'control-label col-xs-1', 'placeholder' => 'eg. CPSC']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('courseCode', 'Course Number:', ['class' => 'control-label col-xs-2']) !!}
                    {!! Form::input('number', 'courseCode', '', ['required', 'class' => 'control-label col-xs-1', 'placeholder' => 'eg. 3975']) !!}
                </div>
                {{--OPTIONAL REVIEW???????????--}}
                {!! Form::submit('Add Course', ['class' => 'btn btn-primary']) !!}
            </form>
        {!! Form::close() !!}
    </div>
    <div class="col-md-2"></div>

@stop