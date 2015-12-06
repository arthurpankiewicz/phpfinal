@extends('app')

@section('content')
    <script>
        $(':radio').change(
                function(){
                    $('.choice').text( this.value + ' stars' );
                }
        )
    </script>
    <?php
        $name = session('name');
    ?>

    <div class="container">
        <div class="jumbotron">
            <h3>
            {{ $selectedCourse[0]->abbreviation }} - {{ $selectedCourse[0]->schoolName }}
            </h3>
            <h2>
            {{ $selectedCourse[0]->courseCode }} - {{ $selectedCourse[0]->courseName }}
            </h2>
        </div>
    <div class="col-md-3"></div>
    <div class="col-md-6">
    {!! Form::open() !!}
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
            @if(isset($name))
                <label>{!! Form::radio('author', 'anonymous') !!} anonymous</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>{!! Form::radio('author', $name, true) !!} {{ $name }}</label>
            @else
                <label>{!! Form::radio('author', 'anonymous', true) !!} anonymous</label>
            @endif
        </div>
        {!! Form::submit('Submit My Review', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::hidden('schoolId', $selectedCourse[0]->schoolId) !!}
    {!! Form::close() !!}
    </div>
    <div class="col-md-3"></div>
    </div>

@stop