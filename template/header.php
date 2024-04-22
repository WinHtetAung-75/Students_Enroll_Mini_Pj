<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend Miniprojects</title>
    <link rel="stylesheet" href="./app.css">
</head>

<body>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>

    <nav class="bg-gray-800 mt-5 max-w-[1000px] mx-auto text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <span class="text-xl font-semibold">Students Enroll</span>
            </div>
            <div class="hidden lg:block">
                <ul class="flex space-x-5">
                    <li><a href="./index.php" class="hover:text-blue-500">Home</a></li>
                    <li><a href="./studentsList.php" class="hover:text-blue-500">Students </a></li>
                    <li><a href="./courseCreate.php" class="hover:text-blue-500">Courses </a></li>
                    <li><a href="./batchCreate.php" class="hover:text-blue-500">Batches</a></li>
                    <li><a href="./genderCreate.php" class="hover:text-blue-500">Gender</a></li>
                    <li><a href="./nationalityCreate.php" class="hover:text-blue-500">Nationality</a></li>
                    <li><a href="./enrollList.php" class="hover:text-blue-500">Enroll</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Small Screen Sidebar (Hidden by default) -->
    <aside class="fixed inset-y-0 left-0 bg-gray-800 text-white w-64 px-8 py-4 transform -translate-x-full transition duration-200 ease-in-out z-50">
        <ul class="space-y-4">
            <li><a href="./index.php" class="hover:text-blue-500">Home</a></li>
            <li><a href="./studentsList.php" class="hover:text-blue-500">Students </a></li>
            <li><a href="./courseCreate.php" class="hover:text-blue-500">Courses </a></li>
            <li><a href="./batchCreate.php" class="hover:text-blue-500">Batches</a></li>
            <li><a href="./genderCreate.php" class="hover:text-blue-500">Gender</a></li>
            <li><a href="./nationalityCreate.php" class="hover:text-blue-500">Nationality</a></li>
            <li><a href="./enrollList.php" class="hover:text-blue-500">Enroll</a></li>
        </ul>
    </aside>

    <!-- Hamburger Menu (Visible on small screens) -->
    <div class=" mt-5 lg:hidden fixed top-4 right-4">
        <button id="sidebar-toggle" class="text-white focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>

    <script>
        // Toggle sidebar on small screens
        document.getElementById('sidebar-toggle').addEventListener('click', function() {
            document.querySelector('aside').classList.toggle('-translate-x-full');
        });
    </script>
    <?php
    //to connect sql
    $connect = mysqli_connect("localhost", "wha", "asdf", "sayar_test");
    ?>
    <div class=" rounded-lg max-w-[1000px] mt-0 mx-auto h-auto p-10 bg-gray-100 ">