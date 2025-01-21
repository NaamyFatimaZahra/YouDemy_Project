<?php 
include_once '../../config/config.php';
include_once '../Layout/header.php';
include_once '../../../vendor/autoload.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['role_id'] != '1') {
    header('Location: ../Auth/logIn.php');
    exit();
}
use App\Controllers\TagController;
// Instancier le contrôleur et récupérer les données
$controller = new TagController();
$Tags = $controller->displayTags();

?>
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
            All Tags          
            </h1>
    <table class="w-[60%] rounded-xl border border-gray-200">
        <thead>
            <tr class="bg-gray-50">
                <th scope="col" class="text-left p-5 text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">ID</th>
                <th scope="col" class="text-left p-5 text-sm leading-6 font-semibold text-gray-900 capitalize">Tag Name</th>
                <th scope="col" class="text-left p-5 text-sm leading-6 font-semibold text-gray-900 capitalize">Creation Date</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
             <?php foreach ($Tags as $Tag): ?>
            <!-- Example Row 1 -->
            <tr class="bg-white transition-all duration-300 hover:bg-gray-50">
                <td class="text-left p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">  <?= htmlspecialchars($Tag['id']); ?></td>
                <td class="text-left p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">  <?= htmlspecialchars($Tag['name']); ?></td>
                <td class="text-left p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> <?= htmlspecialchars($Tag['creation_date']); ?></td>
                <td class="p-5">
                    <div class="flex items-center gap-2">
                       
                         <!-- Delete Button (Form that sends the tag_id) -->
                        <form action="../../Controllers/CatchController/catchDelete.php" method="POST">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($Tag['id']); ?>" />
                            <input type="hidden" name="typePost" value="tags" />
                            <button type="submit" class="p-2 rounded-full hover:bg-red-100 transition-all duration-300 flex items-center">
                                <i class="fas fa-trash-alt text-red-600"></i>
                            </button>
                        </form>
                          <button onclick="openUpdateTagModal('<?= $Tag['name'] ?>','<?= $Tag['id'] ?>')" class="p-2 rounded-full hover:bg-indigo-100 transition-all duration-300 flex items-center">
                            <i class="fas fa-edit text-indigo-500"></i>
                        </button>
                       
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Add Tag Button -->
    <div class="fixed bottom-10 right-10">
        <button onclick="openAddTagModal()" class="px-4 py-2 bg-[#f97316] text-white rounded-full hover:bg-[#f97416d5] transition-all duration-300 shadow-lg flex items-center gap-2">
            <i class="fas fa-plus"></i> Add Tag
        </button>
    </div>

    <!-- Modal for Adding Tags -->
    <div id="addTagModal" class="fixed  inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center">
        <div class="bg-white rounded-lg p-6 w-full max-w-md mx-4 relative">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Ajouter des tags</h2>
                <button onclick="closeAddTagModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- AddTagModal -->
             <!-- <button onclick="AddTagModal(this.value)" class='absolute top-[45%] translate-y-[-50%] right-7'>
                    <i class="fa-solid fa-plus border-solid border-[1px] text-white border-[#f97316] py-3 px-4  bg-[#f9741646] rounded-[50%] hover:bg-[#f97316]"></i>
                </button> -->
            <form method="POST" action="../../Controllers/CatchController/catchAddInfo.php">
                <input type="hidden" name="typePost" value="tags" />
                
                <div class="flex  gap-3">
                    <input type="text" 
                       name="Add_names" 
                       placeholder="Entrez les tags séparés par des virgules" 
                       class="w-[85%] border rounded p-2 mb-2 outline-[#f97316] outline-[1px]"
                       required/>
                      
                </div>
                    <p class="text-sm text-gray-500 mb-4">Exemple : JavaScript, Python, React, Node.js</p>
                <div class="flex justify-end space-x-2">
                    <button type="button" 
                            onclick="closeAddTagModal()" 
                            class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                        Annuler
                    </button>
                    <button type="submit" 
                            name="add_tags"
                            class="px-4 py-2 bg-[#f9741646] text-white rounded hover:bg-[#f97316] ">
                        Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>
       <!-- Modal for update Tags -->
    <div id="updateTagModal" class="fixed  inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center">
        <div class="bg-white rounded-lg p-6 w-full max-w-md mx-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Ajouter des tags</h2>
                <button onclick="closeUpdateTagModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form action="../../Controllers/CatchController/catchUpdate.php" method="POST">
                <input type="hidden" name="typePost" value="tags" />
                <input id="inputId" type="hidden" name="id" value="" />
                <input type="text" 
                 id="update_input"
                 name="update_name" 
                 class="w-full border rounded p-2 mb-2"
                 required/>
                <div class="flex justify-end space-x-2">
                    <button type="button" 
                            onclick="closeUpdateTagModal()" 
                            class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                        Annuler
                    </button>
                    <button type="submit" 
                           
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    // add function
    function openAddTagModal() {
        document.getElementById('addTagModal').classList.remove('hidden');
         document.getElementById('addTagModal').classList.add('flex');
        


    }



    function AddTagModal(value){
console.log(value);
    }

    function closeAddTagModal() {
        document.getElementById('addTagModal').classList.remove('flex');
        document.getElementById('addTagModal').classList.add('hidden');
    }


  // edit function
function openUpdateTagModal(tagName,id) {
        
        document.getElementById('updateTagModal').classList.remove('hidden');
         document.getElementById('updateTagModal').classList.add('flex');
         document.getElementById('update_input').value=tagName;
         document.getElementById('inputId').value=id;

    }

    function closeUpdateTagModal() {
        document.getElementById('updateTagModal').classList.remove('flex');
        document.getElementById('updateTagModal').classList.add('hidden');
    }
     setTimeout(function() {
            document.getElementById('messageSuccess').style.display = 'none';
            document.getElementById('messageNotSuccess').style.display = 'none';
        }, 4000);

</script>

<?php 
include_once '../Layout/footer.php';
?>