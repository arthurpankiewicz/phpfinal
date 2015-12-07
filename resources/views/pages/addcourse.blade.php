@extends('app')

@section('content')
    <script>
        $(document).ready(function() {
            $('#subjectCode').keyup(function () {
                this.value = this.value.toUpperCase();
            });
            $('#courseCode').keyup(function () {
                this.value = this.value.toUpperCase();
            });
        });
        function maxLengthCheck(object)
        {
            if (object.value.length > object.maxLength)
                object.value = object.value.slice(0, object.maxLength)
        }
    </script>
    <div class="container">
        <div class="row page-head-line">
            <div class="col-md-6 col-sm-6">
                <h1>Add a Course</h1>
            </div>
        </div>
    </div>

    <div class="col-md-2"></div>
    <div class="col-md-8">
        {!! Form::open() !!}
            <form class="form-horizontal">
                <div class="form-group">
                    {!! Form::label('school', 'School:', ['class' => 'control-label col-xs-3']) !!}
                    {!! Form::select('school', [null => 'Please Select'] + $schoolDropdown, null, ['required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('subjectCode', 'Subject Code:', ['class' => 'control-label col-xs-3'] ) !!}
                    {!! Form::input('text', 'subjectCode', '', ['required', 'class' => 'control-label col-xs-2',
                        'placeholder' => 'eg. CPSC', 'maxlength' => 6]) !!}<br>
                </div>
                <div class="form-group">
                    {!! Form::label('courseCode', 'Course Number:', ['class' => 'control-label col-xs-3']) !!}
                    {!! Form::input('text', 'courseCode', '', ['required', 'class' => 'control-label col-xs-3',
                        'placeholder' => 'eg. 3975', 'oninput' => 'maxLengthCheck(this)', 'maxlength' => '5']) !!}
                    <br>
                </div>
                <div class="form-group">
                    {!! Form::label('courseName', 'Course Name:', ['class' => 'control-label col-xs-3']) !!}
                    {!! Form::input('text', 'courseName', '', ['required', 'class' => 'control-label col-xs-5',
                        'placeholder' => 'eg. Server Side Web Scripting with PHP', 'minlength' => 5,
                        'maxlength' => 150]) !!}
                    <br>
                </div>
                &nbsp;&nbsp;&nbsp;
                {!! Form::submit('Add Course', ['class' => 'btn btn-primary']) !!}
            </form>
        {!! Form::close() !!}
        <?php
        if(isset($exists)) {
            if($exists != null) {
                echo "<hr><div class=\"alert alert-danger\">
                Course already exists.
                </div>";
            }
        }
        ?>
    </div>
    <div class="col-md-2"></div>


@stop