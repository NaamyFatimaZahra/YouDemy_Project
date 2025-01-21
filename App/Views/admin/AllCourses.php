<?php 
include_once '../../config/config.php';
include_once '../Layout/header.php';
include_once '../../../vendor/autoload.php';
use App\Controllers\AdminController;


$controller = new AdminController();
$courses = $controller->displayCourses($searchValue);

?>

<!-- Display all tags -->
<section class="w-[80%] relative min-h-[100vh] m-auto py-[8rem] ">

 <form action="../../Controllers/CatchController/catchSearch.php" method="POST" class="absolute right-7 top-[8rem] flex justify-center">
        <input 
            type="text" 
            name="search" 
            placeholder="Search courses..." 
            class="w-[50%] px-4 py-2 border border-[#d97706] rounded-lg focus:outline-none focus:border-[#d97706b9]"
            value="<?= htmlspecialchars($_GET['search'] ?? ''); ?>"
        >
        <button 
            type="submit" 
            class="ml-2 px-4 py-2 bg-[#d97706] text-white rounded-lg hover:bg-[#d97706b9]"
        >
            Search
        </button>
    </form>
          
          <h1 class="text-4xl text-center font-bold mb-10  text-yellow-700">
            All COURSES          
            </h1>
        <div class="flex justify-center  items-center flex-wrap gap-[3rem]">
  <?php foreach ($courses as $course): ?>
  <?php if($course['is_archived']==0): ?>
     <div class="bg-white shadow-md border w-[20rem] h-[28rem] border-[#d97706] rounded-lg overflow-hidden">
        <div>
        <div class="relative rounded-t-lg w-full h-[15rem]">
   
    <iframe 
        src="<?= htmlspecialchars($course['content']); ?>" 
        class="absolute inset-0 w-full h-full rounded-t-lg"
        allowfullscreen>
    </iframe>
    
   
    <div 
        class="absolute inset-0 bg-black opacity-50 pointer-events-auto rounded-t-lg"
        title="Video is disabled">
    </div>
</div>
            </div>
        <div class="p-5">
            <div href="h-[5rem] bg-[red]">
                <h5 class="font-bold text-2xl  tracking-tight mb-2 text-[#595959]"><?= htmlspecialchars($course['title']); ?></h5>
           </div>
          
                <p class="font-normal text-gray-700 mb-3 dark:text-gray-400 appercase">Teacher:<?= htmlspecialchars($course['table2_name']); ?></p>
           
           
          <div class="flex justify-between mt-7">
            <form  action="../../Controllers/CatchController/catchToDisplay.php" method="POST">
                <input class='hidden' type="text" name="id_course" value="<?= htmlspecialchars($course['table1_id']); ?>">
                <input class="text-white bg-[#d97706] hover:bg-[#d97706b9] font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center " type="submit" value=" more &#10230;">
            </form>
             <p class="text-white border-solid border-[1px] border-[#d97706b9] bg-[#d977064d] px-2 py-1 rounded-lg"><?= htmlspecialchars($course['table3_name']); ?></p>
                </div>
        </div>
    </div>
            <?php endif; ?>
 
            <?php endforeach; ?>
        </div>
         
        
  
   
  
</section>


<?php 
include_once '../Layout/footer.php';
?>