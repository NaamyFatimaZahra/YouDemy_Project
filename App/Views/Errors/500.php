

<?php 
include_once "../../config/config.php";
include_once "../Layout/header.php";?>
 <section class=" h-[100vh] flex flex-col justify-center items-center">
    <h1 class="mb-4 text-6xl font-semibold text-[#f97316]">500</h1>
    <p class="mb-4 text-lg text-gray-600">Oops! Looks like you're lost.</p>
    <div class="animate-bounce">
      <svg class="mx-auto h-16 w-16 text-[#f97316]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
      </svg>
    </div>
    <p class="mt-4 text-gray-600">Let's get you back .</p>
   <a href="<?php echo BASE_PATH;?>/Public/index.php" class="text-[#fff] bg-[#f97316] px-7 py-[.4rem] mt-[3rem] rounded-[2rem] transition duration-300 shadow-md hover:shadow-lg font-medium">HOME</a>

  </div>
</section>


<?php

include_once "../Layout/footer.php";?>
