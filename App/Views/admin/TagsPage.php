<?php 
include_once '../../config/config.php';
include_once '../Layout/header.php';
include_once '../../Controllers/TagController.php';
use App\Controllers\TagController;
// Instancier le contrôleur et récupérer les données
$controller = new TagController();
$Tags = $controller->displayTags();

?>

<!-- Display all tags -->
<section class="w-[100%] min-h-[100vh] py-[8rem] flex justify-center items-center">
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
                            <button type="submit" class="p-2 rounded-full hover:bg-red-100 transition-all duration-300 flex items-center">
                                <i class="fas fa-trash-alt text-red-600"></i>
                            </button>
                        </form>
                          <button onclick="openEditTagModal('<?= $Tag['name'] ?>')" class="p-2 rounded-full hover:bg-indigo-100 transition-all duration-300 flex items-center">
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
        <button onclick="openAddTagModal()" class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition-all duration-300 shadow-lg flex items-center gap-2">
            <i class="fas fa-plus"></i> Add Tag
        </button>
    </div>

    <!-- Modal for Adding Tags -->
    <div id="addTagModal" class="fixed  inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center">
        <div class="bg-white rounded-lg p-6 w-full max-w-md mx-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Ajouter des tags</h2>
                <button onclick="closeAddTagModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form method="POST">
                <input type="text" 
                    
                       name="tag_names" 
                       placeholder="Entrez les tags séparés par des virgules" 
                       class="w-full border rounded p-2 mb-2"
                       required>
                <p class="text-sm text-gray-500 mb-4">Exemple : JavaScript, Python, React, Node.js</p>
                <div class="flex justify-end space-x-2">
                    <button type="button" 
                            onclick="closeAddTagModal()" 
                            class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                        Annuler
                    </button>
                    <button type="submit" 
                            name="add_tags"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>
       <!-- Modal for edit Tags -->
    <div id="editTagModal" class="fixed  inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center">
        <div class="bg-white rounded-lg p-6 w-full max-w-md mx-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Ajouter des tags</h2>
                <button onclick="closeEditTagModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form method="POST">
                <input type="text" 
                       id="edit_input"
                       name="tag_names" 
                       placeholder="Entrez les tags séparés par des virgules" 
                       class="w-full border rounded p-2 mb-2"
                       required>
                <div class="flex justify-end space-x-2">
                    <button type="button" 
                            onclick="closeEditTagModal()" 
                            class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                        Annuler
                    </button>
                    <button type="submit" 
                            name="add_tags"
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

    function closeAddTagModal() {
        document.getElementById('addTagModal').classList.remove('flex');
        document.getElementById('addTagModal').classList.add('hidden');
    }


  // edit function
 function openEditTagModal(name) {
        document.getElementById('editTagModal').classList.remove('hidden');
         document.getElementById('editTagModal').classList.add('flex');
         document.getElementById('edit_input').value=name;
         


    }

    function closeEditTagModal() {
        document.getElementById('editTagModal').classList.remove('flex');
        document.getElementById('editTagModal').classList.add('hidden');
    }

</script>

<?php 
include_once '../Layout/footer.php';
?>