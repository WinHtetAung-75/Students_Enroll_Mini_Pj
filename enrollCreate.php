<?php include("./template/header.php") ?>
<!-- Breadcrumb -->
<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="./genderCreate.php" class="inline-flex gap-2 items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                </svg>
                Enrollments
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
            </div>
        </li>
        <li class="inline-flex items-center">
            <a href="./genderCreate.php" class="inline-flex gap-2 items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                </svg>
                Enroll Create
            </a>
        </li>
    </ol>
</nav>
<?php
// print_r($_GET);
$id = $_GET['id'];

$studentSql = "SELECT * FROM students WHERE id = $id";
$studentQuery = mysqli_query($connect, $studentSql);
$student = mysqli_fetch_assoc($studentQuery);
// print_r($student);

?>
<div class=" mt-10 max-w-[600px] mx-auto">
    <h1 class=" mb-5 text-2xl font-bold text-slate-700">Student "<?= $student['name'] ?>" Enroll For</h1>

    <form action="enrollSave.php" method="post">
        <input type="hidden" name="id" value="<?= $student['id'] ?>">
        <div class=" mt-5 max-w-[600px] ">
            <label for="batch" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Batches</label>
            <select id="batch" name="batch" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Choose a Batch</option>
                <?php
                $batchSql = "SELECT * FROM batches WHERE is_register_open = 1";
                $batchQuery = mysqli_query($connect, $batchSql);
                while ($batches = mysqli_fetch_assoc($batchQuery)) :
                ?>
                    <option value="<?= $batches['id'] ?>"><?= $batches['name'] ?></option>
                <?php endwhile ?>
            </select>
    </form>
    <div class=" text-end mt-10 max-w-[600px]">
        <button type="submit" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Enroll</button>
    </div>
</div>