

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
<section class="w-[100%] min-h-[100vh] py-[8rem] flex flex-col justify-center items-center">
   
       <?php if (isset($_SESSION['messageNotSuccess'])): ?>
		 <div id="messageNotSuccess" class=" absolute right-4 top-20 z-30   p-4 rounded-md bg-red-100 text-red-700 border-solid border-[1px] border-red-300"> <?= $_SESSION['messageNotSuccess'] ?></div>
<?php endif;
unset($_SESSION['messageNotSuccess']);?>

<!-- SUCCESS MESSAGE -->
  <?php if (isset($_SESSION['messageSuccess'])): ?>
		 <div id="messageSuccess" class=" absolute right-4 top-20 z-30   p-4 rounded-md bg-[#0080004a] text-[green] border-solid border-[1px] border-[green]"> <?= $_SESSION['messageSuccess'] ?></div>
<?php endif;
unset($_SESSION['messageSuccess']);?>
               <h1 class="text-4xl font-bold mb-10  text-yellow-700">
            All Users          
            </h1>
          
   <table class="w-[60%] rounded-xl border border-gray-200">
        <thead>
            <tr class="bg-gray-50">
                <th scope="col" class="text-left p-5 text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">ID</th>
                <th scope="col" class="text-left p-5 text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">Role</th>
                <th scope="col" class="text-left p-7 text-sm leading-6 font-semibold text-gray-900 capitalize">User Name</th>
                <th scope="col" class="text-left p-5 text-sm leading-6 font-semibold text-gray-900 capitalize">Email</th>
                            <th scope="col" class="text-left p-5 text-sm leading-6 font-semibold text-gray-900 capitalize">Creation Date</th>
                <th scope="col" class="text-left p-5 text-sm leading-6 font-semibold text-gray-900 capitalize">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
             <?php foreach ($Users as $User): ?>

             <?php if($User['role_id']!=1):?>  
            <!-- Example Row 1 -->
            <tr class="bg-white transition-all duration-300 hover:bg-gray-50">
                <td class="text-left p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">  <?= htmlspecialchars($User['table1_id']); ?></td>
                <td class="text-left p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">  <?= htmlspecialchars($User['name']); ?></td>
                <td class="text-left p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">  <?= htmlspecialchars($User['table2_name']); ?></td>
                <td class="text-left p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">  <?= htmlspecialchars($User['email']); ?></td>
                <td class="text-left p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> <?= htmlspecialchars($User['created_at']); ?></td>
                <td class="text-left p-5 whitespace-nowrap text-sm leading-6 font-medium 
  ">
   <p class='px-2 rounded-md text-center py-1
     <?php if ($User['status'] === 'deleted') echo 'text-red-600 bg-red-100 border border-red-300'; ?>
    <?php if ($User['status'] === 'suspend') echo 'text-yellow-600 bg-yellow-100 border border-yellow-300'; ?>
    <?php if ($User['status'] === 'activated') echo 'text-green-600 bg-green-100 border border-green-300'; ?>'>
     <?= htmlspecialchars($User['status']); ?></p>
</td>

                <td class="text-left p-5  whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> 
           <form method="POST" action="../../Controllers/CatchController/catchChangeStatusUser.php">
    <select 
        name="status" 
        class="py-3 px-4 text-center  border-[#d97706] border-solid border-[1px] rounded-lg text-sm bg-[#d977064b] outline-none" 
        onchange="this.form.submit()">
        <option value="deleted" <?= $User['status'] === 'deleted' ? 'selected' : '' ?>>Deleted</option>
        <option value="suspend" <?= $User['status'] === 'suspend' ? 'selected' : '' ?>>Suspended</option>
        <option value="activated" <?= $User['status'] === 'activated' ? 'selected' : '' ?>>Activated</option>
    </select>
    <input type="hidden" name="user_id" value="<?= htmlspecialchars($User['table1_id']); ?>">
    <input type="hidden" name="user_role" value="<?= htmlspecialchars($User['role_id']); ?>">
</form>
               </td> 
            </tr>
             <?php endif;?> 
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