    <?php 
include_once '../../config/config.php';
include_once '../Layout/header.php';
include_once '../../../vendor/autoload.php';
// use App\Controllers\CategoryController;

?>
    
    <article class="max-w-2xl px-6 py-24 mx-auto space-y-12">
        <div class="w-full mx-auto space-y-4 text-center">
            <h1 class="text-4xl font-bold leading-tight md:text-5xl">Interdum et malesuada fames ac ante ipsum primis in faucibus?</h1>
            <p class="text-sm dark:text-gray-600">by
                <a rel="noopener noreferrer" href="#" target="_blank" class="underline dark:text-violet-600">
                    <span itemprop="name">Leroy Jenkins</span>
                </a> on
                <time datetime="2021-02-12 15:34:18-0200">Feb 12th 2021</time>
            </p>
        </div>
        <div class="dark:text-gray-800">
            <p>Insert the actual text content here...</p>
        </div>
        <div class="pt-12 border-t dark:border-gray-300">
            <div class="flex flex-col space-y-4 md:space-y-0 md:space-x-6 md:flex-row">
                <img src="https://source.unsplash.com/75x75/?portrait" alt="" class="self-center flex-shrink-0 w-24 h-24 border rounded-full md:justify-self-start dark:bg-gray-500 dark:border-gray-300">
                <div class="flex flex-col">
                    <h4 class="text-lg font-semibold">Leroy Jenkins</h4>
                    <p class="dark:text-gray-600">Sed non nibh iaculis, posuere diam vitae, consectetur neque. Integer velit ligula, semper sed nisl in, cursus commodo elit. Pellentesque sit amet mi luctus ligula euismod lobortis ultricies et nibh.</p>
                </div>
            </div>
            <div class="flex justify-center pt-4 space-x-4 align-center">
                <!-- GitHub Icon -->
                <a rel="noopener noreferrer" href="#" aria-label="GitHub" class="p-2 rounded-md dark:text-gray-800 hover:dark:text-violet-600">
                    <i class="fab fa-github w-4 h-4"></i>
                </a>
                <!-- Dribbble Icon -->
                <a rel="noopener noreferrer" href="#" aria-label="Dribbble" class="p-2 rounded-md dark:text-gray-800 hover:dark:text-violet-600">
                    <i class="fab fa-dribbble w-4 h-4"></i>
                </a>
                <!-- Twitter Icon -->
                <a rel="noopener noreferrer" href="#" aria-label="Twitter" class="p-2 rounded-md dark:text-gray-800 hover:dark:text-violet-600">
                    <i class="fab fa-twitter w-4 h-4"></i>
                </a>
                <!-- Email Icon -->
                <a rel="noopener noreferrer" href="#" aria-label="Email" class="p-2 rounded-md dark:text-gray-800 hover:dark:text-violet-600">
                    <i class="fas fa-envelope w-4 h-4"></i>
                </a>
            </div>
          
        </div>
    </article>
    <?php 
include_once '../Layout/footer.php';
?>