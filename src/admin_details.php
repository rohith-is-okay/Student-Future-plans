<!DOCTYPE html>
<html>
    <head>
        <title>Staff Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="output.css">
    </head>
    <body class="font-sans h-screen bg-gradient-to-r from-[#6e97d4] to-[#8f5fc9]">
        <header class="bg-[#00296b] h-28">
            <nav class="flex justify-between items-center w-[92%] h-28 mx-auto">
                <div>
                <img src="VITLogoEmblem.png" class="w-1/6 min-w-32" alt="Logo">
                </div>
                <div class="absolute left-1/2 transform -translate-x-1/2">
                <h1 class="flex text-2xl items-center text-white font-bold">Faculty Page</h1>
                </div>
            </nav>
        </header>
        <div class="flex items-center justify-center my-[3%] mx-[5%]">
            <div class="w-full bg-white rounded-lg p-8">
                <h2 class=" mb-5 block font-bold text-gray-900 text-xl">Enter Student Details</h2>
                <form action="" method="GET" class="space-y-4">
                    <div class="-mx-3 flex flex-wrap items-end">
                        <div class="w-full px-3 sm:w-1/3">
                            <div class="mb-5">
                                <label for="search" class="mb-3 block text-base font-medium text-gray-900">Search on Registration Number</label>
                                <input type="text" name="search" id="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>" placeholder="Search Data" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5">
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/3">
                            <div class="mb-5">
                                <label for="passing_year" class="mb-3 block text-base font-medium text-gray-900">Search on Passing Year</label>
                                <select name="passing_year" id="passing_year" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5">
                                    <option value="">Select a Year</option>
                                    <?php
                                    $current_year = date("Y");
                                    for ($year = $current_year; $year >= $current_year - 20; $year--) {
                                        $selected = (isset($_GET['passing_year']) && $_GET['passing_year'] == $year) ? 'selected' : '';
                                        echo "<option value='$year' $selected>$year</option>";
                                    }

                                    $conn = new mysqli('localhost', 'root', '', 'newtest');
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }
                                    
                                    $year_query = "SELECT DISTINCT passing_year FROM student_info ORDER BY passing_year ASC";
                                    $year_result = $conn->query($year_query);

                                    if ($year_result->num_rows > 0) {
                                        $range_years = range($current_year - 20, $current_year);
                                        while ($year_row = $year_result->fetch_assoc()) {
                                            if (!in_array($year_row['passing_year'], $range_years)) {
                                                $selected = (isset($_GET['passing_year']) && $_GET['passing_year'] == $year_row['passing_year']) ? 'selected' : '';
                                                echo '<option value="'.$year_row['passing_year'].'" '.$selected.'>'.$year_row['passing_year'].'</option>';
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/3">
                            <div class="mb-5">
                                <button type="submit" class="bg-[#002d74] text-white rounded-lg hover:scale-105 duration-300 hover:bg-[#206ab1] font-medium block w-full p-2.5">Search</button>
                            </div>
                        </div>
                    </div>               
                </form>
            </div>
        </div>
        <div class="relative overflow-x-auto shadow-md rounded-lg mx-[5%]">    
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-m text-gray-700 uppercase bg-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">Registration Number</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Phone</th>
                        <th scope="col" class="px-6 py-3">First Name</th>
                        <th scope="col" class="px-6 py-3">Last Name</th>
                        <th scope="col" class="px-6 py-3">Passing Year</th>
                        <th scope="col" class="px-6 py-3">Course</th>
                        <th scope="col" class="px-6 py-3">College</th>
                        <th scope="col" class="px-6 py-3">LOR Provider</th>
                        <th scope="col" class="px-6 py-3">Application Month</th>
                        <th scope="col" class="px-6 py-3">Application Year</th>
                        <th scope="col" class="px-6 py-3">Entrance Exams</th>
                        <th scope="col" class="px-6 py-3">PDF LINK</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $conn = new mysqli('localhost', 'root', '', 'newtest');
                        if ($conn->connect_error){
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $records_per_page = 5;
                        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                        if ($current_page <= 0) $current_page = 1;
                        $start_from = ($current_page - 1) * $records_per_page;

                        $query="SELECT * FROM student_info WHERE 1=1";

                        if(isset($_GET['search']) && !empty($_GET['search'])){
                            $filtervalues = $_GET['search'];
                            $query .= " AND registration_number LIKE '%$filtervalues%'";
                        }

                        if(isset($_GET['passing_year'])&& !empty($_GET['passing_year'])){
                            $selected_year = $_GET['passing_year'];
                            $query .= " AND passing_year = '$selected_year'";
                        }
                        $query .= " LIMIT $start_from, $records_per_page";
                        $query_run = mysqli_query($conn,$query);

                        if(mysqli_num_rows($query_run)>0){
                            foreach($query_run as $items){
                                ?>
                                <tr class="bg-white border-b hover:bg-gray-100">
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><?=$items['registration_number'];?></td>
                                    <td class="px-6 py-4"><?=$items['email'];?></td>
                                    <td class="px-6 py-4"><?=$items['phone'];?></td>
                                    <td class="px-6 py-4"><?=$items['fname'];?></td>
                                    <td class="px-6 py-4"><?=$items['lname'];?></td>
                                    <td class="px-6 py-4"><?=$items['passing_year'];?></td>
                                    <td class="px-6 py-4"><?=$items['course'];?></td>
                                    <td class="px-6 py-4"><?=$items['college'];?></td>
                                    <td class="px-6 py-4"><?=$items['lor_provider'];?></td>
                                    <td class="px-6 py-4"><?=$items['application_month'];?></td>
                                    <td class="px-6 py-4"><?=$items['application_year'];?></td>
                                    <td class="px-6 py-4"><?=$items['entrance_exams'];?></td>
                                    <td class="px-6 py-4"><a href="uploads/<?=$items['uploaded_files'];?>" class="font-medium text-blue-600 hover:underline" download>Download</a></td>
                                </tr>
                                <?php
                            }
                        }
                        else{
                            ?>
                            <tr class="bg-white border-b hover:bg-gray-100">
                                <td colspan="13" class="px-6 py-4">No Record Found</td>
                            </tr>
                            <?php
                        }
                        $count_query = "SELECT COUNT(*) AS total FROM student_info WHERE 1=1";

                        if (isset($_GET['search']) && !empty($_GET['search'])) {
                            $filtervalues = $_GET['search'];
                            $count_query .= " AND registration_number LIKE '%$filtervalues%'";
                        }

                        if (isset($_GET['passing_year']) && !empty($_GET['passing_year'])) {
                            $selected_year = $_GET['passing_year'];
                            $count_query .= " AND passing_year = '$selected_year'";
                        }

                        $count_result = mysqli_query($conn, $count_query);
                        $total_records = mysqli_fetch_assoc($count_result)['total'];

                        // Calculate total pages
                        $total_pages = ceil($total_records / $records_per_page);
                        $conn->close();
                    ?>
                </tbody>
            </table>  
        </div>
        <footer class="flex items-center justify-center pt-4 mx-[5%]" aria-label="Table navigation">
            <span class="text-sm font-normal text-gray-500 mb-4 md:mb-4 block w-full md:inline md:w-auto">
                <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                    <li>
                        <?php if ($current_page > 1): ?>
                            <a href="?page=<?php echo $current_page - 1; ?>" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700">Previous</a>
                        <?php endif; ?>
                    </li>
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li>
                            <a href="?page=<?php echo $i; ?>" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700<?php if ($i == $current_page) echo ' bg-gray-300  text-blue-500 '; ?>">
                                <?php echo $i; ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                    <li>
                        <?php if ($current_page < $total_pages): ?>
                            <a href="?page=<?php echo $current_page + 1; ?>" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700">Next</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </span>
        </footer>
    </body>
</html>