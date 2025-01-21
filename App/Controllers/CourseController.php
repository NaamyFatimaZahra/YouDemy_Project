<?php
namespace App\Controllers;
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';
use App\Models\CourseModel;
use App\Models\CrudModel;
use App\Controllers\DisplayAbstactClass;
class CourseController{
      public function displayDetailsCourse($course):array{
         $course_id=$course->getId();
          $details= new CourseModel;
         return $details->displayDetailsCourse($course_id);
      }


      
       public function createCourse($course):bool{
        $courseModel = new CourseModel();
        $courseId = $courseModel->addNewCourse([
            'title' => $course['title'],
            'description' => $course['description'],
            'content' => $course['content'],
            'category_id' => $course['category_id'],
            'teacher_id' => $course['teacher_id']
        ]);

        if (!$courseId) {
            return false; 
        }
        $courseTagModel = new CourseModel();
        foreach ($course['tags'] as $tagId) {
            $courseTagModel->addNewTag([
                'course_id' => $courseId,
                'tag_id' => $tagId
            ]);
        }

        return true; 
      }
       
       public function ArchivedCourse($course):bool{
          $course_id=$course->getId();
          $course_isArchived=$course->getIsArchived();
          $details= new CrudModel;
          return $details->update('courses','is_archived', $course_isArchived, $course_id);
      }

     
       
}

