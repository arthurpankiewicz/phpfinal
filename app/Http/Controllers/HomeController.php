<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function home()
    {
        $reviews = DB::select("
            SELECT
              review.rating,
              review.summary,
              school.abbreviation AS abbreviation,
              course.courseCode AS ccode,
              course.id AS cid
            FROM
              review
            INNER JOIN course ON review.courseId = course.id
            INNER JOIN school ON review.schoolId = school.id
            ORDER BY review.datePosted DESC;
        ");

        return view('pages.home', compact('reviews'));
    }

}