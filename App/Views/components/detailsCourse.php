    <?php 
include_once '../../config/config.php';
include_once '../Layout/header.php';
include_once '../../../vendor/autoload.php';
use App\Controllers\CategoryController;
use App\Controllers\StudentController;
  
   $controller=new StudentController();
   $isEnrolled=$controller->checkEnrollmentStudent($_SESSION['user']['id'], $_SESSION['details_course']['idCourse']);
   
   
?>

<main class="min-h-[100vh] my-[9rem]">
       <?php if (isset($_SESSION['messageNotSuccess'])): ?>
		 <div id="messageNotSuccess" class=" absolute right-4 top-20 z-30   p-4 rounded-md bg-red-100 text-red-700 border-solid border-[1px] border-red-300"> <?= $_SESSION['messageNotSuccess'] ?></div>
<?php endif;
unset($_SESSION['messageNotSuccess']);?>

<!-- SUCCESS MESSAGE -->
  <?php if (isset($_SESSION['messageSuccess'])): ?>
		 <div id="messageSuccess" class=" absolute right-4 top-20 z-30   p-4 rounded-md bg-[#0080004a] text-[green] border-solid border-[1px] border-[green]"> <?= $_SESSION['messageSuccess'] ?></div>
<?php endif;
unset($_SESSION['messageSuccess']);?>
    <!-- Course Content -->
    <div class=" w-[80%] m-auto  mb-10">
       
            <h1 class="text-4xl text-center capitalize  font-extrabold text-[#d97706] mb-[3rem]"><?=$_SESSION['details_course']['title']?></h1>
            <div class="relative w-[80%] m-auto h-[60vh] overflow-hidden">
                <iframe 
                    src="<?=$_SESSION['details_course']['content']?>" 
                    class="w-full m-auto h-full rounded-lg border border-yellow-500" 
                    allowfullscreen>
                </iframe>
           <?php if(empty($_SESSION['user']) || $isEnrolled==false): ?>
                 <div 
        class="absolute inset-0 bg-black opacity-50 pointer-events-auto rounded-t-lg"
        title="Video is disabled">
                </div>
            <?php endif?>

            </div>
           
        
    </div>

    <!-- Course Details -->
   
        <div class="relative bg-[#201d70] rounded-lg w-[80%] m-auto shadow-lg p-6">
            <h2 class="text-3xl font-bold text-[#d97706] mb-4">Course Details</h2>
             <p class="text-gray-300 text-lg mb-4">
                <?=$_SESSION['details_course']['description']?>
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div>
                    <h4 class="font-bold text-gray-300">Teacher:</h4>
                    <p class="text-gray-400"><?=$_SESSION['details_course']['name']?></p>
                </div>
                <div>
                    <h4 class="font-bold text-gray-300">Tags</h4>
                    <ul class="flex flex-wrap gap-2">
                        <?php 
                        
                        foreach ($_SESSION['Tags'] as $tag): 
                        ?>
                            <li class="px-2 py-1 mt-2 bg-yellow-500 text-gray-900 rounded-full text-sm">
                                <?= htmlspecialchars($tag['name']) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-gray-300">publication Date</h4>
                    <p class="text-gray-400 capitalize"><?=$_SESSION['details_course']['publication_date']?></p>
                </div>
               

            </div>
<?php if(isset($_SESSION['user'])&&($_SESSION['user']['role_id']===1||$_SESSION['user']['role_id']===2)): ?>
<form class='absolute bottom-4 right-4' method="POST" action="../../Controllers/CatchController/catchArchivedCourse.php">
    <select 
        name="archived" 
        class="py-3 px-4 text-center text-white  border-[#d97706] border-solid border-[1px] rounded-lg text-sm bg-[#d97706] outline-none" 
       onchange="this.form.submit()" >
        <option value="" >SELECT</option>
        <option value="Archived" >Archived</option>
        <option value="NOT Archived" >NOT Archived</option>
    </select>
    <input type="hidden" name="course_id" value="<?= $_SESSION['details_course']['idCourse'] ?>">
</form>
  <?php endif?>
        </div>
   
</main>
 <script>
         setTimeout(function() {
            document.getElementById('messageSuccess').style.display = 'none';
            document.getElementById('messageNotSuccess').style.display = 'none';
        }, 4000);
    </script>
    <?php 
include_once '../Layout/footer.php';
?>