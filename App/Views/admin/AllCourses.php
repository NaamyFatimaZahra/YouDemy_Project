<?php 
include_once '../../config/config.php';
include_once '../Layout/header.php';
include_once '../../../vendor/autoload.php';
use App\Controllers\AdminController;

$controller = new AdminController();
$courses = $controller->displayCourses();

?>

<!-- Display all tags -->
<section class="w-[100%] min-h-[100vh] py-[8rem] flex justify-center items-center">
 
            <?php foreach ($courses as $course): ?>
  
            <?php endforeach; ?>
       

   
  
</section>


<?php 
include_once '../Layout/footer.php';
?>