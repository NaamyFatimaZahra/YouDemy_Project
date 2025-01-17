<?php 
include_once '../../config/config.php';
include_once '../Layout/header.php';

// Vérification si l'utilisateur est connecté et a le rôle de professeur
if (!isset($_SESSION['user']) || $_SESSION['user']['role_id'] != '1') {
    header('Location: ../Auth/logIn.php');
    exit();
}else{

}

?>

<main class="w-[80%] m-auto min-h-[140vh] flex items-center">
    <div class="w-full">
        <section class="bg-white">
            <h1 class="text-4xl font-bold mb-10 text-yellow-700">
            WELCOME,<?php  echo $_SESSION['user']['name'];?>!          
            </h1>
            <div class="flex items-center justify-between">
                <div class="flex items-stretch">
                    <div class="text-gray-400 text-xs">
                        Members<br>connected
                    </div>
                    <div class="h-100 border-l mx-4"></div>
                    <div class="flex flex-nowrap -space-x-3">
                        <div class="h-9 w-9">
                            <img class="object-cover w-full h-full rounded-full" src="https://ui-avatars.com/api/?background=random" alt="Avatar">
                        </div>
                        <div class="h-9 w-9">
                            <img class="object-cover w-full h-full rounded-full" src="https://ui-avatars.com/api/?background=random" alt="Avatar">
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-x-2">
                    <button type="button" class="inline-flex items-center justify-center h-9 px-3 rounded-xl border hover:border-gray-400 text-gray-800 hover:text-gray-900 transition">
                        <i class="fas fa-comment"></i>
                    </button>
                    <button type="button" class="inline-flex items-center justify-center h-9 px-5 rounded-xl bg-gray-900 text-gray-300 hover:text-white text-sm font-semibold transition">
                        Open
                    </button>
                </div>
            </div>

            <hr class="my-10 border-gray-200">

            <div class="grid grid-cols-2 gap-x-20">
                <section>
                    <h2 class="text-2xl font-bold mb-4 text-yellow-700">Stats</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <div class="p-6 bg-green-100 rounded-xl">
                                <div class="font-bold text-2xl text-gray-800 leading-none">
                                    Good day, <br>Kristin
                                </div>
                                <div class="mt-5">
                                    <button type="button" class="inline-flex items-center justify-center py-2 px-4 rounded-xl bg-white text-gray-800 hover:text-green-500 text-sm font-semibold transition">
                                        Start tracking
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 bg-yellow-100 rounded-xl text-gray-800">
                            <div class="font-bold text-3xl leading-none">20</div>
                            <div class="mt-2">Tasks finished</div>
                        </div>
                        <div class="p-6 bg-yellow-100 rounded-xl text-gray-800">
                            <div class="font-bold text-3xl leading-none">5.5</div>
                            <div class="mt-2">Tracked hours</div>
                        </div>
                        <div class="col-span-2">
                            <div class="p-6 bg-purple-100 rounded-xl text-gray-800">
                                <div class="font-bold text-2xl leading-none">Your daily plan</div>
                                <div class="mt-2">5 of 8 completed</div>
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <h2 class="text-2xl font-bold mb-4 text-yellow-700">Your tasks today</h2>
                    <div class="space-y-4">
                        <div class="p-6 bg-white border rounded-xl text-gray-800 space-y-2 shadow-sm">
                            <div class="flex justify-between">
                                <div class="text-gray-400 text-xs">Number 10</div>
                                <div class="text-gray-400 text-xs">4h</div>
                            </div>
                            <a href="#" class="font-bold hover:text-yellow-800 hover:underline">Blog and social posts</a>
                            <div class="text-sm text-gray-600">
                                <i class="fas fa-exclamation-circle text-gray-800 inline align-middle mr-1"></i>Deadline is today
                            </div>
                        </div>
                        <div class="p-6 bg-white border rounded-xl text-gray-800 space-y-2 shadow-sm">
                            <div class="flex justify-between">
                                <div class="text-gray-400 text-xs">Grace Aroma</div>
                                <div class="text-gray-400 text-xs">7d</div>
                            </div>
                            <a href="#" class="font-bold hover:text-yellow-800 hover:underline">New campaign review</a>
                            <div class="text-sm text-gray-600">
                                <i class="fas fa-exclamation-circle text-gray-800 inline align-middle mr-1"></i>New feedback
                            </div>
                        </div>
                        <div class="p-6 bg-white border rounded-xl text-gray-800 space-y-2 shadow-sm">
                            <div class="flex justify-between">
                                <div class="text-gray-400 text-xs">Petz App</div>
                                <div class="text-gray-400 text-xs">2h</div>
                            </div>
                            <a href="#" class="font-bold hover:text-yellow-800 hover:underline">Cross-platform and browser QA</a>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </div>
</main>

<?php 
include_once '../Layout/footer.php';
?>
