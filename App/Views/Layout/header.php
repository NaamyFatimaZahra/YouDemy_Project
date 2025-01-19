

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
                
                <?php if(isset($_SESSION['user'])):?>
                      <?php if( $_SESSION['user']['role_id'] == '1'):?>
                     <li>
                        <a href="<?php echo BASE_PATH;?>/App/Views/admin/Dashboard.php" class="hover:text-[#d97706] transition">dashboard</a>
                    </li>               
                    <?php elseif( $_SESSION['user']['role_id'] == '2'):?>
                     <li>
                        <a href="<?php echo BASE_PATH;?>/App/Views/Teacher/Dashboard.php" class="hover:text-[#d97706] transition">dashboard</a>
                    </li>
                 <?php endif ?>   
                 <?php endif?> 



                      <?php if(isset($_SESSION['user'])):?>
                         <?php if( $_SESSION['user']['role_id'] == '1'):?>
                     <li>
                        <a href="<?php echo BASE_PATH;?>/App/Views/Admin/TagsPage.php"class="hover:text-[#d97706] transition">tags</a>
                    </li>
                    <li>
                        <a href="<?php echo BASE_PATH;?>/App/Views/Admin/CategoriesPage.php"class="hover:text-[#d97706] transition">categories</a>
                    </li>
                     <li>
                        <a href="<?php echo BASE_PATH;?>/App/Views/Admin/AllUsers.php"class="hover:text-[#d97706] transition">Users</a>
                    </li> 
                      <li>
                        <a href="<?php echo BASE_PATH;?>/App/Views/Admin/TeacherRequest.php"class="hover:text-[#d97706] transition relative">Teachers Requests </a>
                    </li>               
                    <?php elseif(  $_SESSION['user']['role_id'] == '2'):?>
                     <li>
                        <a href="<?php echo BASE_PATH;?>/App/Views/Teacher/MyCourses.php"class="hover:text-[#d97706] transition">My courses</a>
                    </li>
                 <?php endif?>
                 <?php endif?> 
                 
                    <li>
                        <a href="<?php echo BASE_PATH;?>/App/Views/Admin/AllCourses.php" class="hover:text-[#d97706] transition">All Courses</a>
                    </li>
                   
                </ul>
               
                <!-- Auth Buttons -->
              <?php if(isset($_SESSION['user'])):?>
                <a href="<?php echo BASE_PATH;?>/App/Controllers/CatchController/logout.php" class="text-[#f97316] "><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
               <?php elseif(!isset($_SESSION['user'])):?>
          <div class="flex items-center space-x-4">
                    <a href="<?php echo BASE_PATH;?>/App/views/Auth/logIn.php" class="text-[#f97316] bg-[#fff] px-7 py-[.4rem] rounded-[2rem] transition duration-300 shadow-md hover:shadow-lg font-medium">Login</a>
                    <a href="<?php echo BASE_PATH;?>/App/views/Auth/signUp.php" class="text-[#fff] bg-[#f97316] px-7 py-[.4rem] rounded-[2rem] transition duration-300 shadow-md hover:shadow-lg font-medium">Sign Up</a>
                </div>
                 <?php endif;?>
                
                
            </div>
        </nav>
    </header>
