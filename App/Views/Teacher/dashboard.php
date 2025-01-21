<?php 
include_once '../../config/config.php';
include_once '../Layout/header.php';
include_once '../../../vendor/autoload.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role_id'] != '2') {
    header("Location: ".BASE_PATH. "/App/Views/Auth/logIn.php");
    exit();
}elseif($_SESSION['user']['AccountStatus']==='pending'){
    $_SESSION['message']='PLEASE WAIT OUR TEAM WILL ACTIVATE YOUR ACCOUNT SOON!';
    header("Location:".BASE_PATH. "/App/Views/Errors/203.php");
    exit();
}elseif($_SESSION['user']['AccountStatus']==='rejected'){
    $_SESSION['message']='OOPS? IT LOOKS LIKE YOUR REQEUST WAS REJECTED!';
    header("Location:".BASE_PATH. "/App/Views/Errors/203.php");
    exit();
}elseif($_SESSION['user']['status']==='deleted'){
    $_SESSION['message']='OOPS? IT LOOKS LIKE YOUR ACCOUNT IS DELETED!';
    header("Location:".BASE_PATH. "/App/Views/Errors/203.php");
    exit();
}elseif($_SESSION['user']['status']==='suspend'){
    $_SESSION['message']='OOPS? IT LOOKS LIKE YOUR ACCOUNT IS suspended!';
    header("Location:".BASE_PATH. "/App/Views/Errors/203.php");
    exit();
}

use App\Controllers\Statistiques;
$controller=new Statistiques();
$totalCourses=$controller->totalforSpecificTeacher('courses','teacher_id',$_SESSION['user']["id"]);
$totalCategories=$controller->total('categories');
$totalTags=$controller->total('tags');
$course=$controller->topCourseID();
$treeTopTeachers=$controller->treeTopTeachers();

?>

<main class="w-[80%] m-auto min-h-[100vh] flex items-center">
    <div class="w-full">
        <section class="bg-white">
            <h1 class="text-4xl font-bold mb-10 text-yellow-700">
            WELCOME,<?php  echo $_SESSION['user']['name'];?>!          
            </h1>
            

            <hr class="my-10 border-gray-200">

            <div class="grid grid-cols-2 gap-x-20">
                <section>
                    <h2 class="text-2xl font-bold mb-4 text-yellow-700">Stats</h2>
                    <div class="grid grid-cols-2 gap-4">
                        
                         <div class="col-span-1">
                            <div class="p-6 bg-green-100 rounded-xl">
                                <div class="font-bold text-2xl text-gray-800 leading-none">
                            <div class="font-bold text-3xl leading-none"><?=$totalCourses?></div>
                            <div class="mt-2">Total Courses</div>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 bg-yellow-100 rounded-xl text-gray-800">
                            <div class="font-bold text-3xl leading-none"> <?=$totalTags?></div>
                            <div class="mt-2">Total Tags</div>
                        </div>
                        <div class="p-6 bg-yellow-100 rounded-xl text-gray-800">
                            <div class="font-bold text-3xl leading-none"> <?=$totalCategories?></div>
                            <div class="mt-2">Total Categories</div>
                        </div>
                        <div class="col-span-2  ">
                            <div class="p-6 bg-purple-100 rounded-xl text-gray-800">
                                <div class="font-bold text-2xl leading-none">Top Course</div>
                                <div class="mt-2  flex justify-between"> 
                                    <p><?= $course['course_name'] ?></p>

                                    <form action="../../Controllers/CatchController/catchToDisplay.php" method="POST"  
                                    class="border-solid border-[#d97706] bg-[#d977069d]  text-white rounded-lg p-1  border-[1px]">
                                    <input class='hidden' type="text" name="id_course" value="<?= htmlspecialchars($course['course_id']); ?>">
                                  <input type="submit" value="  Details About Course &#10230;">
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <h2 class="text-2xl font-bold mb-4 text-yellow-700">Top Tree Teachers</h2>
                 <?php foreach($treeTopTeachers as $teacher):?>
                      <div class="space-y-4">
                        <div class="p-6 bg-white border rounded-xl text-gray-800 space-y-2 shadow-sm">
                            <div class="flex justify-between">
                                <div class="text-gray-400 text-xs">Courses: <?=$teacher['totalCourseForTeacher']?></div>
                                <div class="text-gray-400 text-xs"><?=$teacher['created_at']?></div>
                            </div>
                            <p href="#" class="font-bold hover:text-yellow-800 hover:underline"><?=$teacher['userName']?></p>
                            <div class="text-sm text-gray-600">
                                <i class="fas fa-exclamation-circle text-gray-800 inline align-middle mr-1"></i><?=$teacher['speciality']?>
                            </div>
                        </div>
                       
                    </div>
                 <?php endforeach;?>
                        
                </section>
            </div>
        </section>
    </div>
</main>

<?php 
include_once '../Layout/footer.php';
?>
