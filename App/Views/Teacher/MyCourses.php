<?php 
include_once '../../config/config.php';
include_once '../Layout/header.php';
include_once '../../../vendor/autoload.php';
use App\Controllers\AdminController;
// Instancier le contrôleur et récupérer les données
// $controller = new AdminController();
// $AllCourse = $controller->displayCourses();

?>

<!-- Display all tags -->
<section class="w-[100%] min-h-[100vh] py-[8rem] flex justify-center items-center">
   
    
             
          
           <div class="max-w-sm rounded overflow-hidden shadow-lg">
  <img class="w-full" src="/img/card-top.jpg" alt="Sunset in the mountains">
  <div class="px-6 py-4">
    <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
    <p class="text-gray-700 text-base">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
    </p>
  </div>
  <div class="px-6 pt-4 pb-2">
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
  </div>

         <div class="fixed bottom-10 right-10">
        <button onclick="openAddTagModal()" class="px-4 py-2 bg-[#f97316] text-white rounded-full hover:bg-[#f97416d5] transition-all duration-300 shadow-lg flex items-center gap-2">
            <i class="fas fa-plus"></i> Add Course
        </button>
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