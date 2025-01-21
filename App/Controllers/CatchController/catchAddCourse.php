<?php


// Include necessary files
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';

use App\Controllers\CourseController;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $errors = [];

  
    $title = trim($_POST['title']);
    if (empty($title)) {
        $errors[] = 'Course title is required.';
    } elseif (strlen($title) > 255) {
        $errors[] = 'Course title must be less than 255 characters.';
    }
    echo $title;
    exit();

    
    // $description = trim($_POST['description']);
    // if (empty($description)) {
    //     $errors[] = 'Course description is required.';
    // } elseif (strlen($description) > 1000) {
    //     $errors[] = 'Course description must be less than 1000 characters.';
    // }

   
    // $content = trim($_POST['content']);
    // if (empty($content)) {
    //     $errors[] = 'Course link is required.';
    // } elseif (!preg_match('/^https:\/\/.+\/embed\/.+$/', $content)) {
    //     $errors[] = 'Invalid course link. Please provide a valid URL.';
    // }
     

   
    // $category = $_POST['category'];
    // if (empty($category)) {
    //     $errors[] = 'Course category is required.';
    // }

   
    // $tags = $_POST['tags'] ?? [];
    // if (empty($tags)) {
    //     $errors[] = 'At least one tag is required.';
    // }

    
    // if (empty($errors)) {
        
    //     // $courseData = [
    //     //     'title' => $title,
    //     //     'description' => $description,
    //     //     'content' => $content,
    //     //     'category_id' => $category,
    //     //     'tags' => $tags,
    //     //     'teacher_id' => $_SESSION['user']['id'] 
    //     // ];

    //     // // // Create a new course using the CourseController
    //     // // $courseController = new CourseController();
    //     // // $result = $courseController->createCourse($courseData);

    //     // if ($result) {
    //     //     $_SESSION['messageSuccess'] = 'Course created successfully!';
    //     //     header("Location: " . BASE_PATH . "/App/Views/Teacher/FormAddCourse.php");
    //     //     exit();
    //     // } else {
    //     //     $_SESSION['messageNotSuccess'] = 'Failed to create course. Please try again.';
    //     //     header("Location: " . BASE_PATH . "/App/Views/Teacher/FormAddCourse.php");
    //     //     exit();
    //     // }
    // }else{
    //     echo 'hh';
    //     //  $_SESSION['messageNotSuccess'] = $errors;
    //     // header("Location: ../../../../Views/Teacher/FormAddCourse.php"); 
    //     exit();  
    // }
} 