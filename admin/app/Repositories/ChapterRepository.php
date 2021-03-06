<?php
namespace App\Repositories;

use App\Repositories\Repository;
use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ChapterRepository extends Repository
{
    protected $model = null;

    public function __construct(Chapter $model){
        $this->model = $model;
    }

    public function search($filter)
    {
        $term = $filter['term'];
        $id = $filter['id'];
        $course_id = $filter['course_id'];
        $query = Chapter::query();

        if($id) {
            $query = $query->where('id','=', $id);
        }
        if($course_id) {
            $query = $query->where('course_id','=', $course_id);
        }
        
        return $query;
    }

    public function getLessonByChapter($request) {
        // $chapters = Chapter::query()->select('chapters.name','chapters.id','chapters.description','chapters.course_id')->where('course_id', '=', $request->course_id)->get()->makeHidden('chapter','lessons');
        // $course = Course::where('id','=',$request->course_id)->first()->makeHidden('authors','subscriptions','category','lessons');
        // $collections = array();
        $query = Lesson::query()->where('course_id', '=', $request->course_id)->get();
        
        $collections = $query->unique('chapter_id');

        $chapters = [];
        foreach($collections as $collect) {
            if($collect->chapter_id !== null) {
                $data = (object) [
                    'chapter' => $collect->chapter
                ];
                $lessons = [];
                foreach($query as $item) {
                    if($item->chapter_id === $collect->chapter_id) {
                        $lessons[] = $item;
                    }
                }
                $data->chapter['lessons'] = $lessons;
                $chapters[] = $data;
            } else {
                $data = (object) [
                    'Unassigned' => $collect->chapter
                ];
                $lessons = [];
                foreach($query as $item) {
                    if($item->chapter_id === null) {
                        $lessons[] = $item;
                    }
                }
                $data->Unassigned['lessons'] = $lessons;
                $chapters[] = $data;
                // $chapters['Unassigned'] = $collect;
            }
        }

   
        return response(['status' => 'success', 'data' => $chapters, 'course' => $request->course_id], 200);;
        // foreach ($chapters as $chapter) {
        //     $lessons = Lesson::query()->select('lessons.name','lessons.id',
        //     'lessons.chapter_id as ch_id','lessons.description','lessons.video_url',
        //     'lessons.image_url','lessons.is_active','lessons.author_id', 'lessons.duration',
        //     'lessons.preview_url')->where('chapter_id','=',$chapter->id)->get();
          
        //     $data = (object) [
        //         'chapters' => $chapter
        //     ];
        //     $data->chapters['lessons'] = $lessons;
        //     $data->chapter['course'] = $course;
            
        //     $collections[] = $data;
        // }
 
    }
}
