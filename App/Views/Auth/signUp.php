
<?php
 include_once "../../config/config.php";
include_once "../Layout/header.php";
?>

<?php if (isset($_SESSION['error'])): ?>
         <div id="error-message" class="absolute right-2 top-2 z-8  mt-4 p-4 rounded-md bg-red-100 text-red-700 border-solid border-[1px] border-red-300"> <?= $_SESSION['error'] ?></div>
 <?php endif;
 unset($_SESSION['error']);?>
   <!-- gestion des erreur en js -->  
 <!-- <div id="message" class="absolute right-2 top-2 z-8 hidden mt-4 p-4 rounded-md bg-red-100 text-red-700 border-solid border-[1px] border-red-300"></div> -->
 <!-- gestion des erreur en php -->
<?php if (isset($_SESSION['messagesRegisterErrors'])): ?>
            <?php foreach ($_SESSION['messagesRegisterErrors'] as $message): ?>
                <div class="mb-4 p-4 <?= strpos($message, 'succès') !== false ? 'bg-green-100 text-green-700 border border-green-300' : 'bg-red-100 text-red-700 border border-red-300' ?> rounded-md">
                    <?= htmlspecialchars($message); ?>
                </div>
            <?php endforeach; ?>
          
            <?php unset($_SESSION['messagesRegisterErrors']); ?>
        <?php endif; ?>

    <div class=" h-[120vh] w-[100%] flex items-center justify-center">
     
        <!-- Right Section -->
        <div class="w-[30%] flex items-center justify-center p-8 bg-white border-0 shadow-lg sm:rounded-3xl">
            <div class=" max-w-md">
                <!-- Sign Up Form -->
                <form name="userForm" class="space-y-4" action="../../controllers/catchInfoSignUp.php" method="POST" onsubmit="return validateForm()">
                    <div>
                        <label for='username' class="block text-sm font-medium text-gray-700 mb-1">Full name</label>
                        <input id="username" name="username" type="text" placeholder="Enter your full name" class="w-full p-3 border rounded-lg focus:outline-solid focus:outline-[1rem] focus:outline-[#97b6e7] "/>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                        <input type="tel" name="phone" placeholder="Enter phone number" class="w-full p-3 border rounded-lg focus:outline-solid focus:outline-[1rem] focus:outline-[#97b6e7] "/>
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
                        <label class="block text-sm font-medium text-gray-700 mb-1">Account Type</label>
                        <select name="account_type" class="w-full p-3 border rounded-lg focus:outline-solid focus:outline-[1rem] focus:outline-[#97b6e7] ">
                          
                            <option value="candidate" selected>Student</option>
                            <option value="recruiter">Teacher</option>
                        </select>
                    </div>

                    <input name="submit" type="submit" value="Continue" class="w-full bg-[#9592e9d6] text-white rounded-lg p-3 hover:bg-indigo-700"/>

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
    </div>
     <script>
        function validateForm() {
            const username = document.forms["userForm"]["username"].value;
            const email = document.forms["userForm"]["email"].value;
            const phone = document.forms["userForm"]["phone"].value;
            const password = document.forms["userForm"]["password"].value;
            const accountType = document.forms["userForm"]["account_type"].value;

            const messageDiv = document.getElementById("message");
            if (!username || !email || !phone || !password || !accountType) {
                messageDiv.innerHTML = "Tous les champs sont obligatoires !";
                messageDiv.style.display = "block"; // Affiche le message
                setTimeout(() => {
                    messageDiv.style.display = "none"; // Masque le message après 2 secondes
                }, 3000); // 2000 ms = 2 secondes
                return false; // Empêche l'envoi du formulaire
            }
            return true;
        }
         setTimeout(function() {
            document.getElementById('error-message').style.display = 'none';
        }, 4000);
    </script>
<?php
include_once "../Layout/footer.php";?>