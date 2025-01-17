
    <?php 
     include_once "../../config/config.php";

    include_once "../Layout/header.php";?>

    <?php 
    if (isset($_SESSION['error'])): ?>
         <div id="error-message" class="absolute right-2 top-16 z-14  mt-4 p-4 rounded-md bg-red-100 text-red-700 border-solid border-[1px] border-red-300"> <?= $_SESSION['error'] ?></div>
 <?php endif;
 unset($_SESSION['error']);?>
   <!-- gestion des erreur en js -->  
 <!-- <div id="message" class="absolute right-6 top-16  hidden mt-4 p-4 rounded-md bg-red-100 text-red-700 border-solid border-[1px] border-red-300"></div> -->
 <!-- gestion des erreur en php --> 
<?php if (isset($_SESSION['messagesSignUpErrors'])): ?>
           <div class="absolute top-16 z-20 ">
             <?php foreach ($_SESSION['messagesSignUpErrors'] as $message): ?>
                <div class="mb-4 mt-4 p-4 rounded-md bg-red-100 text-red-700 border-solid border-[1px] border-red-300">
                    <?= htmlspecialchars($message); ?>
                </div>
            <?php endforeach; ?> 
           </div>
          
            <?php unset($_SESSION['messagesSignUpErrors']); ?>
        <?php endif; ?>

    <section  class=" h-[120vh] w-[100%] flex items-center justify-center">
     
        <!-- Right Section -->
        <div class="w-[30%] flex items-center justify-center p-8 bg-white border-0  shadow-2xl sm:rounded-3xl">
            <div class=" max-w-md">
                <!-- Sign Up Form -->
                <form name="userForm" class="space-y-4" action="../../Controllers/catchInfoSignUp.php" method="POST" onsubmit="return validateForm()">
                    <div>
                        <label for='username' class="block text-sm font-medium text-gray-700 mb-1">Full name</label>
                        <input id="username" name="username" type="text" placeholder="Enter your full name" class="w-full p-3 border rounded-lg focus:outline-solid focus:outline-[1rem] focus:outline-[#97b6e7] "/>
                    </div> 
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input type="email" name="email" placeholder="Enter email address" class="w-full p-3 border rounded-lg focus:outline-solid focus:outline-[1rem] focus:outline-[#97b6e7] "/>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" name="password" placeholder="Enter password" class="w-full p-3 border rounded-lg focus:outline-solid focus:outline-[1rem] focus:outline-[#97b6e7] "/>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                        <input type="password" name="password_copy" placeholder="Confirm password " class="w-full p-3 border rounded-lg focus:outline-solid focus:outline-[1rem] focus:outline-[#97b6e7] "/>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Account Type</label>
                        <select name="account_type" class="w-full p-3 border rounded-lg focus:outline-solid focus:outline-[1rem] focus:outline-[#97b6e7] ">
                            <option value="" selected>Select option</option>
                            <option value="student">Student</option>
                            <option value="teacher">Teacher</option>
                        </select>
                    </div>

                    <input name="submit" type="submit" value="Submit" class="w-full bg-[#f97316] text-white rounded-lg p-3 hover:bg-indigo-700"/>

                    <div class="text-sm text-center">
                        <span class="text-gray-500">Already have an account? </span>
                        <a href="../Auth/login.php" class="text-indigo-600 font-medium">Login</a>
                    </div>

                    <div class="text-xs text-gray-500 text-center">
                        By clicking 'Continue', you acknowledge that you have read and accept the 
                        <a href="#" class="text-indigo-600">Terms of Service</a> and 
                        <a href="#" class="text-indigo-600">Privacy Policy</a>.
                    </div>
                </form>
            </div>
        </div>
            </section>
     <script>
        function validateForm() {
            const username = document.forms["userForm"]["username"].value;
            const email = document.forms["userForm"]["email"].value;
            const password = document.forms["userForm"]["password_copy"].value;
            const password_copy = document.forms["userForm"]["password"].value;
            const accountType = document.forms["userForm"]["account_type"].value;

            const messageDiv = document.getElementById("message");
            if (!username || !email || !password || !password_copy || !accountType) {
                messageDiv.innerHTML = "Tous les champs sont obligatoires !";
                messageDiv.style.display = "block"; 
                setTimeout(() => { 
                    messageDiv.style.display = "none";
                }, 3000); 
                return false; 
            }
            return true;
        }
         setTimeout(function() {
            document.getElementById('error-message').style.display = 'none';
        }, 4000);
    </script>
<?php include_once "../Layout/footer.php";?>


