<?php include("./template/header.php") ?>
<!-- Breadcrumb -->
<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="./batchCreate.php" class="inline-flex gap-2 items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3" />
                </svg>

                Create Batches
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
            </div>
        </li>
    </ol>
</nav>

<form action="./batchSave.php
" method="post" class=" mt-5">
    <div class="mb-6 ">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Batch Name</label>
        <input required type="text" id="name" name="name" class="bg-gray-50 border w-full lg:w-80 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <div class="mb-6 ">
        <label for="course_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Courses</label>
        <select id="course_id" name="course_id" class="bg-gray-50 lg:w-80 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">Select Course</option>
            <?php
            $sql = "SELECT * FROM courses";
            $query = mysqli_query($connect, $sql);
            while ($courses = mysqli_fetch_assoc($query)) :
            ?>
                <option value="<?= $courses['id']?>"><?= $courses['title'] ?></option>
            <?php endwhile ?>
        </select>
    </div>

    <div class="mb-6 ">
        <label for="student_limit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Student Limit</label>
        <input required type="number" name="student_limit" id="default-input" class="bg-gray-50 border lg:w-80 w-full  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <div class="mb-6 ">
        <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start Date</label>
        <input required type="date" id="start_date" name="start_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full lg:w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </input>
    </div>

    <div class="flex gap-3 w-full lg:w-80 ">
        <div class=" w-full">
            <label for="start_time" class="block text-sm font-medium mb-2 dark:text-white">Start Time</label>
            <input id="start_time" required type="time" name="start_time" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="Start Time">
        </div>

        <div class=" w-full">
            <label for="end_time" class="block text-sm font-medium mb-2 dark:text-white">End Time</label>
            <input id="end_time" required type="time" name="end_time" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="End Time">
        </div>
    </div>

    <div class="flex mt-5">
        <input type="checkbox" name="is_register_open" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-default-checkbox" value="1">
        <label for="hs-default-checkbox" class="text-sm text-gray-500 ms-3 dark:text-gray-400">
            Register Open
        </label>
    </div>

    <div class=" flex justify-between w-full lg:w-80">
        <div>
            <button type="submit" class="text-white mt-10 bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Create Batch</button>
        </div>
        <a href="./batchList.php" class="text-white mt-10 bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Batch Lists</a>
    </div>
</form>

<?php require_once("./template/footer.php");
