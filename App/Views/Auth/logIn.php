 <?php
  include_once "../../config/config.php";
include_once '../Layout/header.php';
?> 
     <section class=" w-[100%] h-[100vh] py-6 flex flex-col justify-center items-center sm:py-12">
		
<?php
if (isset($_SESSION['messagesLoginErrors'])): ?>
		 <div id="messagesLoginErrors" class=" absolute right-4 top-20 z-30   p-4 rounded-md bg-red-100 text-red-700 border-solid border-[1px] border-red-300"> <?= $_SESSION['messagesLoginErrors'] ?></div>
<?php endif;
 unset($_SESSION['messagesLoginErrors']);?>
	<div class=" w-[60%]  relative py-3 sm:max-w-xl sm:mx-auto">
		<div
			class="absolute inset-0 bg-gradient-to-r from-[#fbebcc] to-[#f97316] shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
		</div>
		<div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
			<div class="max-w-md mx-auto">
				<div> 
					<h1 class="text-2xl font-semibold">Login Form with Floating Labels</h1>
				</div>
				<form action="../../Controllers/catchInfoLogIn.php" method="POST" class="divide-y divide-gray-200">
					<div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
						 <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input type="email" name="email" placeholder="Enter email address" class="w-full p-3 border rounded-lg focus:outline-solid focus:outline-[1rem] focus:outline-[#97b6e7] "/>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" name="password" placeholder="Enter password" class="w-full p-3 border rounded-lg focus:outline-solid focus:outline-[1rem] focus:outline-[#97b6e7] "/>
                    </div>
						<input name="submit" type="submit" value="submit" class="bg-[#f97316] text-white rounded-md px-2 py-1">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<script>  
 setTimeout(function() {
            document.getElementById('messagesLoginErrors').style.display = 'none';
        }, 4000);
		</script>
<?php include_once '../Layout/footer.php';?>