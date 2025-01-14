<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouDemy - Navigation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#fff8f2]">
    <header class="py-4 px-6 bg-white">
        <nav class="max-w-7xl mx-auto flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="#" class="flex items-center ">
                    <div class="w-8 h-8 rounded bg-[#4CC9F0] flex items-center justify-center">
                        <span class="text-white font-bold">Y</span>
                    </div>
                    <span class="text-xl font-bold text-[#4CC9F0]">youdemy</span>
                </a>
            </div>
            
            <!-- Navigation Links -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="#" class="text-gray-700 hover:text-gray-900">Home</a>
                <a href="#" class="text-gray-700 hover:text-gray-900">Careers</a>
                <a href="#" class="text-gray-700 hover:text-gray-900">Blog</a>
                <a href="#" class="text-gray-700 hover:text-gray-900">About Us</a>
            </div>
            
            <!-- Auth Buttons -->
            <div class="flex items-center space-x-4">
                <a href="#" class="text-gray-700 hover:text-gray-900">Login</a>
                <a href="#" class="bg-[#F48C06] text-white px-4 py-2 rounded-lg hover:bg-[#e07c00] transition duration-200">
                    Sign Up
                </a>
            </div>
        </nav>
    </header>
</body>
</html>