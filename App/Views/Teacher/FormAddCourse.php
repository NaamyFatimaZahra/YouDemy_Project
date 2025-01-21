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
use App\Controllers\CategoryController;
use App\Controllers\TagController;
$controllerCategories=new CategoryController();
$categories=$controllerCategories->displayCategory();
$controllerTags=new TagController();
$Tags=$controllerTags->displayTags();
?>
        <section id="add-course" class="bg-white mt-[6rem] rounded-lg min-h-[100vh] shadow-lg p-6 mb-8 w-[80%] m-auto ">
       <?php if (isset($_SESSION['messageSuccess'])): ?>
		 <div id="messageSuccess" class=" absolute right-4 top-20 z-30   p-4 rounded-md bg-[#0080004a] text-[green] border-solid border-[1px] border-[green]"> <?= $_SESSION['messageSuccess'] ?></div>
        <?php endif;
        unset($_SESSION['messageSuccess']);?>

          <?php if (isset($_SESSION['messageNotSuccess'])): ?>
           
             <?php foreach ($_SESSION['messageNotSuccess'] as $message): ?>
               		 <div id="messageNotSuccess" class=" absolute right-4 top-20 z-30   p-4 rounded-md bg-red-100 text-red-700 border-solid border-[1px] border-red-300"> <?= $message ?></div>
            <?php endforeach; ?> 
            <?php endif;
                     unset($_SESSION['messageNotSuccess']);?>
         








<!-- SUCCESS MESSAGE -->
  <?php if (isset($_SESSION['messageSuccess'])): ?>
		 <div id="messageSuccess" class=" absolute right-4 top-20 z-30   p-4 rounded-md bg-[#0080004a] text-[green] border-solid border-[1px] border-[green]"> <?= $_SESSION['messageSuccess'] ?></div>
<?php endif;
unset($_SESSION['messageSuccess']);?>
            <form  action="../../Controllers/CatchController/catchAddCourse.php" >
               

                
                <div class="mb-6">
                    <label for="courseTitle" class="block text-gray-700 font-medium mb-2">Course Title</label>
                    <input type="text"  name="title" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" >
                </div>

       
                <div class="mb-6">
                    <label for="courseDescription" class="block text-gray-700 font-medium mb-2">Course Description</label>
                    <textarea  name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" ></textarea>
                </div>

               
                <div class="mb-6">
                    <label for="courseContent" class="block text-gray-700 font-medium mb-2">Course Link</label>
                    <textarea name="content"  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"></textarea>
                </div>

                
                <div class="mb-6">
                    <label for="courseCategory" class="block text-gray-700 font-medium mb-2">Category</label>
                    <select  name="category" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $category) {
                            echo "<option value='$category[id]'>$category[name]</option>";
                        } ?>
                    </select>
                </div>

      <div class="mb-6">
    <label class="block text-gray-700 font-medium mb-2">Course Tags</label>
    <div class="bg-white rounded-lg shadow p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php foreach ($Tags as $tag): ?>
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="tags[]" value="<?php echo $tag['id']; ?>" class="form-checkbox text-blue-500">
                    <span class="text-gray-700"><?php echo $tag['name']; ?></span>
                </label>
            <?php endforeach; ?>
        </div>
    </div>
</div>

                <!-- Submit Button -->
                <button type="submit" name="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">Create Course</button>
            </form>
           
        </section>
          <script>
         setTimeout(function() {
            document.getElementById('messageSuccess').style.display = 'none';
            document.getElementById('messageNotSuccess').style.display = 'none';
        }, 4000);
    </script>

<?php 
include_once '../Layout/footer.php';
?>
