<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{

    public function courses()
    {
        $courses = DB::select("
            SELECT
              course.id AS cid,
              course.courseName AS courseName,
              course.courseCode AS courseCode,
              school.id AS schoolId,
              school.abbreviation AS abbreviation,
              (SELECT SUM(review.rating) FROM review WHERE review.courseId = cid) AS totalRating,
              (SELECT COUNT(review.rating) FROM review WHERE review.courseId = cid) AS numberOfRatings,
              (SELECT(totalRating / numberOfRatings)) AS avgRating
            FROM
              course
            LEFT JOIN school ON course.schoolId = school.id;
        ");

        return view('pages.courses', compact('courses'));
    }

    public function course($id)
    {
        $course = DB::select("
            SELECT
              course.id,
              course.courseCode,
              course.courseName,
              school.id AS schoolId,
              school.schoolName,
              school.abbreviation
            FROM
              course
            INNER JOIN school ON course.schoolId = school.id
            WHERE course.id = $id;
        ");
        $reviews = DB::select("
            SELECT
              review.summary,
              review.rating,
              review.datePosted,
              review.author
            FROM
              review
            INNER JOIN course ON review.courseId = course.id
            INNER JOIN school ON review.schoolId = school.id
            WHERE course.id = $id
            ORDER BY review.datePosted DESC;
        ");
        $reviewSum = DB::select("
           SELECT
            SUM(rating) AS totalRating,
            COUNT(rating) AS numberOfRatings
           FROM
            review
           WHERE review.courseId = $id;
        ");

        $numberOfRatings = $reviewSum[0]->numberOfRatings;
        $averageReview = null;
        if(isset($reviewSum[0]->totalRating)) {
            $averageReview = $reviewSum[0]->totalRating / $reviewSum[0]->numberOfRatings / 10;
            $averageReview = round($averageReview, 1);
        }

        return view('pages.course', compact('course', 'reviews', 'averageReview', 'numberOfRatings'));
    }

    public function reviewCourse($id)
    {
        $selectedCourse = DB::select("
            SELECT
              course.id,
              course.courseCode,
              course.courseName,
              school.schoolName AS schoolName,
              school.abbreviation AS abbreviation,
              school.id AS schoolId
            FROM
              course
            INNER JOIN school ON course.schoolId = school.id
            WHERE course.id = $id;
        ");

        return view('pages.reviewcourse', compact('schoolDropdown', 'courseDropdown', 'selectedCourse'));
    }

    public function reviewedCourse($id)
    {
        if( ! isset($_POST['rating']))
            return redirect()->back();

        $rating = $_POST['rating'];
        $rating = $rating * 10;
        $summary = $_POST['review'];
        $summary = strip_tags($summary);
        $schoolId = $_POST['schoolId'];
        $author = $_POST['author'];
        $t = time();
        $t = date("Y-m-d H:i", $t);

        $insert = DB::table('review')
            ->insert([
                'id' => null,
                'courseId' => $id,
                'schoolId' => $schoolId,
                'rating' => $rating,
                'summary' => $summary,
                'datePosted' => $t,
                'author' => $author,
            ]);

        return redirect()->action('CoursesController@course', [$id]);
    }

    public function addCourse()
    {
        $schoolDropdown = DB::table('school')->lists('abbreviation', 'id');

        return view('pages.addCourse', compact('schoolDropdown'));
    }

    public function addedCourse()
    {
        $schoolDropdown = DB::table('school')->lists('abbreviation', 'id');
        $schoolId = $_POST['school'];
        $schoolId = intval($schoolId);
        $courseCode = $_POST['subjectCode'] . " " .  $_POST['courseCode'];
        $courseName = $_POST['courseName'];

        $exists = DB::select("
            SELECT
              course.courseCode,
              course.schoolId
            FROM
              course
            WHERE
              course.courseCode = '" . $courseCode . "'
            AND
              course.schoolId = '" . $schoolId . "';
        ");
        if((empty($exists))) {
            DB::table('course')
                ->insert([
                    'id' => null,
                    'courseCode' => $courseCode,
                    'courseName' => $courseName,
                    'schoolId' => $schoolId
                ]);

            return redirect()->action('CoursesController@courses');
        } else {
            return view('pages.addcourse', compact('exists', 'schoolDropdown'));
        }
    }
}