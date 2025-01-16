
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_PATH;?>/Public/assets/CSS/output.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>YOUDEMY</title>
</head>
<body class="w-[100%] text-[#595959]">
    <header class=" w-[100%] h-[4rem] flex items-center absolute top-0 z-10 bg-[#fbebcc]">
        <nav class="mx-auto w-[80%]  flex items-center justify-between">
            <!-- Logo -->
            <div>
                <a href="../Public/index.php">
                    <img class="w-[4.9rem] h-[3rem]" src="<?php echo BASE_PATH;?>/Public/assets/Images/logo_header.png" alt="logo youdemy">
                </a>
            </div>
            <div class="flex items-center justify-between gap-[7rem]">
                <!-- Navigation Links -->
                <ul class="hidden md:flex items-center font-semibold space-x-[4rem] capitalize text-[#f97316]">
                    <li>
                        <a href="<?php echo BASE_PATH;?>/Public/index.php"lass="hover:text-[#d97706] transition">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo BASE_PATH;?>/Public/index.php" class="hover:text-[#d97706] transition">Courses</a>
                    </li>
                    <li>
                        <a href="<?php echo BASE_PATH;?>/Public/index.php" class="hover:text-[#d97706] transition">About Us</a>
                    </li>
                </ul>
                
                <!-- Auth Buttons -->
                <div class="flex items-center space-x-4">
                    <a href="<?php echo BASE_PATH;?>/App/views/Auth/logIn.php" class="text-[#f97316] bg-[#fff] px-7 py-[.4rem] rounded-[2rem] transition duration-300 shadow-md hover:shadow-lg font-medium">Login</a>
                    <a href="<?php echo BASE_PATH;?>/App/views/Auth/signUp.php" class="text-[#fff] bg-[#f97316] px-7 py-[.4rem] rounded-[2rem] transition duration-300 shadow-md hover:shadow-lg font-medium">Sign Up</a>
                </div>
            </div>
        </nav>
    </header>
