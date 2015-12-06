<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class SchoolsController extends Controller
{

    public function schools()
    {
        $schools = DB::select("
            SELECT
              school.schoolName,
              school.abbreviation,
              school.location,
              school.id AS sid,
              school.url,
              (SELECT SUM(review.rating) FROM review WHERE review.schoolId = sid) AS totalRating,
              (SELECT COUNT(review.rating) FROM review WHERE review.schoolId = sid) AS numberOfRatings,
              (SELECT(totalRating / numberOfRatings)) AS avgRating
            FROM
              school;
        ");

        return view('pages.schools', compact('schools', 'averageReview'));
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
              course.id AS cid,
              course.courseCode,
              course.courseName,
              course.rating,
              (SELECT SUM(review.rating) FROM review WHERE review.courseId = cid) AS totalRating,
              (SELECT COUNT(review.rating) FROM review WHERE review.courseId = cid) AS numberOfRatings,
              (SELECT(totalRating / numberOfRatings)) AS avgRating
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