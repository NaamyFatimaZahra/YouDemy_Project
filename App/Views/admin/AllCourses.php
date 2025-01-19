<?php 
include_once '../../config/config.php';
include_once '../Layout/header.php';
include_once '../../../vendor/autoload.php';
use App\Controllers\AdminController;

$controller = new AdminController();
$courses = $controller->displayCourses();

?>

<!-- Display all tags -->
<section class="w-[80%] min-h-[100vh] py-[8rem] flex justify-center items-center flex-wrap gap-[3rem]">
 
           <?php foreach ($courses as $course): ?>
  <div class="bg-white shadow-md border w-[25rem] border-[#d97706] rounded-lg overflow-hidden">
        <a href="#">
            <img class="rounded-t-lg" src="<?= htmlspecialchars($course['image_url']); ?>" alt="">
        </a>
        <div class="p-5">
            <a href="#">
                <h5 class=" font-bold text-2xl tracking-tight mb-2 text-[#595959]"><?= htmlspecialchars($course['title']); ?></h5>
            </a>
            <div class="flex justify-between">
                <p class="font-normal text-gray-700 mb-3 dark:text-gray-400">Teacher:<?= htmlspecialchars($course['table2_name']); ?></p>
            <p class="font-normal text-gray-700 mb-3 dark:text-gray-400"><?= htmlspecialchars($course['table3_name']); ?></p>
           
            </div>
            <form action="Post">
                <input class='hidden' type="text" name="id_courese" value="<?= htmlspecialchars($course['table2_id']); ?>">
                 <p href="#" class="text-white bg-[#d97706] hover:bg-[#d97706b9] font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center ">
                 more &#10230;
            </p>
            </form>
            
        </div>
    </div>
            <?php endforeach; ?>
        
  
   
  
</section>


<?php 
include_once '../Layout/footer.php';
?>