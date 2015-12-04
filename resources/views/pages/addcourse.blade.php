@extends('app')

@section('content')
    <script>
        $(document).ready(function() {
            $('#subjectCode').keyup(function () {
                this.value = this.value.toUpperCase();
            });
        });
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
                {{--mAYBE FORM CONTROL?????--}}
                <div class="form-group">
                    {!! Form::label('school', 'School:', ['class' => 'control-label col-xs-3']) !!}
                    {!! Form::select('school', [null => 'Please Select'] + $schoolDropdown) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('subjectCode', 'Subject Code:', ['class' => 'control-label col-xs-3'] ) !!}
                    {!! Form::input('text', 'subjectCode', '', ['required', 'class' => 'control-label col-xs-2',
                        'placeholder' => 'eg. CPSC', 'maxlength' => 6]) !!}<br>
                </div>
                <div class="form-group">
                    {!! Form::label('courseCode', 'Course Number:', ['class' => 'control-label col-xs-3']) !!}
                    {!! Form::input('number', 'courseCode', '', ['required', 'class' => 'control-label col-xs-3',
                        'placeholder' => 'eg. 3975']) !!}
                </div>
                {{--OPTIONAL REVIEW???????????--}}
                <div class="form-group">
                    {!! Form::label('star-rating', 'Choose Your Rating:', ['class' => 'control-label col-xs-12']) !!}
                    <br>
            <span class="star-rating">
                <input type="radio" name="rating" value="1"><i></i>
                <input type="radio" name="rating" value="2"><i></i>
                <input type="radio" name="rating" value="3"><i></i>
                <input type="radio" name="rating" value="4"><i></i>
                <input type="radio" name="rating" value="5"><i></i>
                <input type="radio" name="rating" value="6"><i></i>
                <input type="radio" name="rating" value="7"><i></i>
                <input type="radio" name="rating" value="8"><i></i>
                <input type="radio" name="rating" value="9"><i></i>
                <input type="radio" name="rating" value="10"><i></i>
            </span>
                </div>
                <div class="form-group">
                    {!! Form::label('review', 'Review:', ['class' => 'control-label col-xs-2']) !!}
                    {!! Form::textarea('review', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-horizontal">
                    {!! Form::label('author', 'Post as:') !!}<br>
                    <label>{!! Form::radio('author', 'user', true) !!} dajhfkjafhkadf</label>
                    <label>{!! Form::radio('author', 'anon') !!} Anonymous</label>
                </div>
                {!! Form::submit('Add Course', ['class' => 'btn btn-primary']) !!}
            </form>
        {!! Form::close() !!}
    </div>
    <div class="col-md-2"></div>

@stop