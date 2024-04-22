<?php include("./template/header.php") ?>
<?php

$countSql = "SELECT COUNT(enrollments.id) AS total_enrolls FROM enrollments LEFT JOIN students ON students.id = enrollments.student_id ";

$sql = "SELECT enrollments.id AS enrollment_id,students.name AS student_name,batches.name AS batch_name,enrollments.created_at AS enroll_created FROM enrollments LEFT JOIN students ON students.id = enrollments.student_id LEFT JOIN batches ON batches.id = enrollments.batch_id";

if (isset($_GET['q'])) {
    $q = $_GET['q'];
    $sql .= " WHERE students.name LIKE '%$q%'";
    $countSql .= " WHERE students.name LIKE '%$q%'";
}

$countQuery = mysqli_query($connect, $countSql);
$count_enroll = mysqli_fetch_assoc($countQuery);
// print_r($count_enroll);

//for pagination
$total_enrolls = $count_enroll['total_enrolls'];
$enrolls_per_page = 5;
$total_page = ceil($total_enrolls / $enrolls_per_page);
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
// print_r($currentPage);

//to show datas of each page we need offset
$offset = ($currentPage - 1) * $enrolls_per_page;

// $sql .= " ORDER BY enrollment_id DESC";
$sql .= " LIMIT $offset,$enrolls_per_page";

$query = mysqli_query($connect, $sql);
?>
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
    </ol>
</nav>

<div class=" mt-5 flex items-end justify-between ">
    <a href="./studentsList.php" class="text-white mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center gap-4 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
        </svg>
        To Enroll
    </a>
    <form action="./enrollList.php">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="default-search" name="q" value="<?= isset($_GET['q']) ? $_GET['q'] : '' ?>" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search.." required />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>
</div>
<div class=" mt-5 flex justify-end">
    <p class=" text-end inline-block bg-gray-700 px-2 py-1 text-gray-200 rounded-md">
        Showing Results (<?= $count_enroll['total_enrolls'] ?>) Students
    </p>
</div>
<?php
// print_r($_GET['q']);
if (isset($_GET['q'])) :
?>
    <div class=" mt-5 flex gap-2 justify-end">
        <p class=" bg-gray-700 px-2 py-1 text-gray-200 rounded-md">Search By Name "<?= $_GET['q'] ?>"</p>
        <a class="bg-red-600 px-2 py-1 rounded-md text-red-200 " href="./enrollList.php">Clear</a>
    </div>
<?php endif ?>

<h1 class=" mt-10 font-bold text-2xl text-slate-700 text-center">Enrollments List</h1>

<div class="relative overflow-x-auto mt-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Student Name
                </th>
                <th scope="col" class=" text-center px-6 py-3">
                    Batch
                </th>
                <th scope="col" class=" text-center px-6 py-3">
                    Created At
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($enrollments = mysqli_fetch_assoc($query)) :
            ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 text-center">
                        <?= $enrollments['enrollment_id'] ?>
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?= $enrollments['student_name'] ?>
                    </th>
                    <td class="px-6 py-4 text-center">
                        <?= $enrollments['batch_name'] ?>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <?= date("h:i:s A", strtotime($enrollments['enroll_created'])) ?>
                    </td>
                    <td class="px-6 py-4">
                        <div class="inline-flex shadow-sm" role="group">
                            <a href="./enrollDelete.php?id=<?= $enrollments["enrollment_id"] ?>" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
        </tbody>
    <?php endwhile ?>

    <?php
    // print_r($query->num_rows);
    if ($query->num_rows == 0) :
    ?>
        <tr class="">
            <td colspan="6" class="px-6 py-4 text-center font-bold text-2xl">There Is No Student Name By "<?= $_GET['q'] ?>"</td>
        </tr>
    <?php endif ?>
    </table>
</div>
<nav class=" mt-5" aria-label="Page navigation example">
    <ul class="inline-flex -space-x-px text-sm">
        <?php if ($currentPage - 1 > 0) : ?>
            <li>
                <a href="./enrollList.php?page=<?= $currentPage - 1 ?>" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
            </li>
        <?php endif ?>
        <?php

        //for looping three number previous and next of currentPage
        $start = $currentPage > 3 ? $currentPage - 3 : 1;
        $end = $currentPage + 3 < $total_page ? $currentPage + 3 : $total_page;

        for ($i = $start; $i <= $end; $i++) : ?>
            <li>
                <a href="./enrollList.php?page=<?= $i ?>&<?= isset($_GET['q']) ? 'q=' . $_GET['q'] : '' ?>" class="<?= $i == $currentPage ? ' bg-blue-700 text-blue-100 hover:bg-blue-700 hover:text-blue-100 ' : '' ?>flex items-center justify-center px-3 h-8 leading-tight  border border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><?= $i ?></a>
            </li>
        <?php endfor ?>
        <?php if ($currentPage + 1 <= $total_page) : ?>
            <li>
                <a href="./enrollList.php?page=<?= $currentPage + 1 ?>" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
            </li>
        <?php endif ?>
    </ul>
</nav>