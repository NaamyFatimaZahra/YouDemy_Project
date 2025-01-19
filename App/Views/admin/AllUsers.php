

<?php 
include_once '../../config/config.php';
include_once '../Layout/header.php';
include_once '../../../vendor/autoload.php';
use App\Controllers\AdminController;
// Instancier le contrôleur et récupérer les données
$controller = new AdminController();
$Users = $controller->displayUsers();


?>

<!-- Display all tags -->
<section class="w-[100%] min-h-[100vh] py-[8rem] flex justify-center items-center">
   
       <?php if (isset($_SESSION['messageNotSuccess'])): ?>
		 <div id="messageNotSuccess" class=" absolute right-4 top-20 z-30   p-4 rounded-md bg-red-100 text-red-700 border-solid border-[1px] border-red-300"> <?= $_SESSION['messageNotSuccess'] ?></div>
<?php endif;
unset($_SESSION['messageNotSuccess']);?>

<!-- SUCCESS MESSAGE -->
  <?php if (isset($_SESSION['messageSuccess'])): ?>
		 <div id="messageSuccess" class=" absolute right-4 top-20 z-30   p-4 rounded-md bg-[#0080004a] text-[green] border-solid border-[1px] border-[green]"> <?= $_SESSION['messageSuccess'] ?></div>
<?php endif;
unset($_SESSION['messageSuccess']);?>
             
          
   <table class="w-[60%] rounded-xl border border-gray-200">
        <thead>
            <tr class="bg-gray-50">
                <th scope="col" class="text-left p-5 text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">ID</th>
                <th scope="col" class="text-left p-5 text-sm leading-6 font-semibold text-gray-900 capitalize">Tag Name</th>
                <th scope="col" class="text-left p-5 text-sm leading-6 font-semibold text-gray-900 capitalize">Creation Date</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
             <?php foreach ($Users as $User): ?>
            <!-- Example Row 1 -->
            <tr class="bg-white transition-all duration-300 hover:bg-gray-50">
                <td class="text-left p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">  <?= htmlspecialchars($User['id']); ?></td>
                <td class="text-left p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">  <?= htmlspecialchars($User['name']); ?></td>
                <td class="text-left p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">  <?= htmlspecialchars($User['email']); ?></td>
                <td class="text-left p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">  <?= htmlspecialchars($User['status']); ?></td>
                <td class="text-left p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> <?= htmlspecialchars($User['created_at']); ?></td>
                <td class="p-5">
                    <div class="flex items-center gap-2">
                     <?php if($User['role_id']!=1):?>  
                          <!-- Delete Button (Form that sends the tag_id) -->
                        <form action="../../Controllers/CatchController/catchDeleteUser.php" method="POST">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($User['id']); ?>" />
                            <input type="hidden" name="role" value="<?= htmlspecialchars($User['role_id']); ?>" />
                            <button type="submit" class="p-2 rounded-full hover:bg-red-100 transition-all duration-300 flex items-center">
                                <i class="fas fa-trash-alt text-red-600"></i>
                            </button>
                        </form>
           <?php endif;?> 
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

      

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