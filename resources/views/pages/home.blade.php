@extends('app')

@section('content')
    <script>
        jQuery(document).ready(function ($) {
            $('.course').click(function () {
                $(this).find('.content').slideToggle();
            });
            $('tr').click(function() {
                $(this).find('[name="caret"]').toggleClass('fa-chevron-right fa-chevron-down');
            });
        });
    </script>
    <style>
        .alignright {
            float: right;
        }
    </style>
    <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="page-header">
                <h1>Recent Posts</h1>
            </div>
            <table class="table table-striped table table-hover">
                <tbody>
                @foreach($reviews as $review)
                    <tr>
                        <td>
                            <fieldset class="course">
                                <legend class="courselegend">
                                    <h5>
                                        <i name="caret" class="fa fa-chevron-right 1x"></i>
                                        <a href="{{ url('/school', $review->sid) }}">
                                            {{ $review->abbreviation }}
                                        </a>
                                        -
                                        <a href="{{ url('/course', $review->cid) }}">
                                            {{ $review->ccode }}
                                        </a>
                                        <span class="alignright">
                                            <i class="fa fa-star fa-1x"></i>
                                            {{ $review->rating / 10 }}
                                        </span>
                                    </h5>
                                </legend>
                                <p class="content" style="display:none">
                                    {{ $review->summary }}
                                </p>
                            </fieldset>
                        </td>
                        {{--<td>--}}
                            {{--<i class="fa fa-star fa-1x"></i>--}}
                            {{--{{ $review->rating / 10 }}--}}
                        {{--</td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>



@stop