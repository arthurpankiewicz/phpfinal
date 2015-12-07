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
              course.id AS cid,
              school.id AS sid,
              review.author,
              review.datePosted
            FROM
              review
            INNER JOIN course ON review.courseId = course.id
            INNER JOIN school ON review.schoolId = school.id
            ORDER BY review.datePosted DESC;
        ");

        return view('pages.home', compact('reviews'));
    }

    public function myposts()
    {
        $name = session('name');
        $avatar = session('avatar');
        $authorId = session('authorId');

        $reviews = DB::select("
            SELECT
              review.rating,
              review.summary,
              school.abbreviation AS abbreviation,
              course.courseCode AS ccode,
              course.id AS cid,
              school.id AS sid,
              review.author,
              review.datePosted
            FROM
              review
            INNER JOIN course ON review.courseId = course.id
            INNER JOIN school ON review.schoolId = school.id
            WHERE review.authorId = '" . $authorId . "'
            ORDER BY review.datePosted DESC;
        ");

        return view('pages.profile', compact('reviews', 'name', 'avatar'));
    }
}