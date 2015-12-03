<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class SchoolsController extends Controller
{

    public function schools()
    {
        $schools = DB::select("
            SELECT
              schoolName,
              abbreviation,
              location,
              rating,
              id,
              url
            FROM
              school;
        ");

        return view('pages.schools', compact('schools'));
    }

    public function school($id)
    {
        $school = DB::select("
            SELECT
              school.id,
              school.schoolName,
              school.abbreviation,
              school.location
            FROM
              school
            WHERE
              school.id = $id;
        ");

        $courses = DB::select("
            SELECT
              course.id,
              course.courseCode,
              course.courseName,
              course.rating
            FROM
              course
            INNER JOIN school ON course.schoolId = school.id
            WHERE school.id = $id;

        ");

        $reviewSum = DB::select("
            SELECT
              SUM(review.rating) AS totalRating,
              COUNT(review.rating) AS numberOfRatings
            FROM
              review
            INNER JOIN school ON review.schoolId = school.id
            WHERE school.id = $id;
        ");

        $averageReview = null;
        if(isset($reviewSum[0]->totalRating)) {
            $averageReview = $reviewSum[0]->totalRating / $reviewSum[0]->numberOfRatings / 10;
            $averageReview = round($averageReview, 1);
        }

        return view('pages.school', compact('school', 'courses', 'averageReview'));
    }

}