<!DOCTYPE html>
<html>
    <head>
        <title>Student Application Form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="output.css">
        <script src="student.js" type="text/javascript"></script>
        <script src='https://cdn.jsdelivr.net/npm/pdf-lib/dist/pdf-lib.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/pdf-lib/dist/pdf-lib.min.js'></script>
    </head>
    <body class="font-sans h-screen bg-gradient-to-r from-[#6e97d4] to-[#8f5fc9]">
        <header class="bg-[#00296b] h-28">
            <nav class="flex justify-between items-center w-[92%] h-28 mx-auto">
                <div>
                <img src="VITLogoEmblem.png" class="w-1/6 min-w-32" alt="Logo">
                </div>
                <div class="absolute left-1/2 transform -translate-x-1/2">
                <h1 class="flex text-2xl items-center text-white font-bold">Student Page</h1>
                </div>
            </nav>
        </header>
        <div class="flex items-center justify-center my-[3%] mx-[5%]">
            <div class="w-full bg-white rounded-lg p-8">
                <form action="process_form.php" method="post" enctype="multipart/form-data" onsubmit="return confirmSubmission()" class="space-y-4">
                    
                    <h2 class="mb-5 block font-bold text-[#07074d] text-xl">Vit Register Number</h2>
                    <div class="mb-5">                       
                        <label for="registration_number" class="block mb-2 text-base font-medium text-gray-900">Registration Number:</label>
                        <input type="text" id ="registration_number" name="registration_number" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 outline-none focus:border-[#6a64f1] focus:shadow-md">
                    </div>

                    <h2 class="mb-5 block font-bold text-gray-900 text-xl"> Contact Info</h2>
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                
                                <label for="email" class="mb-3 block text-base font-medium text-[#07074d]">Email:</label>
                                <input type="text" id="email" name="email"required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 outline-none focus:border-[#6a64f1] focus:shadow-md">
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">    
                                <label for="phone" class="mb-3 block text-base font-medium text-[#07074d]">Phone Number:</label>
                                <input type="text" id="phone" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 outline-none focus:border-[#6a64f1] focus:shadow-md" maxlength="10" oninput="validatePhoneNumber(this)" onkeypress="return isNumberKey(event)">
                                <span id="PhoneError" style="color:red;"></span>
                            </div>
                        </div>
                    </div>

                    <h2 class="mb-5 block font-bold text-gray-900 text-xl">Name</h2>
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="fname" class="mb-3 block text-base font-medium text-[#07074d]">First Name:</label>
                                <input type="text" id="fname" name="fname" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 outline-none focus:border-[#6a64f1] focus:shadow-md">
                            </div>
                        </div>    
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="lname" class="mb-3 block text-base font-medium text-[#07074d]">Last Name:</label>
                                <input type="text" id="lname" name="lname" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 outline-none focus:border-[#6a64f1] focus:shadow-md">
                            </div>
                        </div>
                    </div>

                    <h2 class="mb-5 block font-bold text-gray-900 text-xl">Vit Passing</h2>
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="passing_year" class="mb-3 block text-base font-medium text-[#07074d]">Year of Passing:</label>
                                <select name="passing_year" id="passing_year" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 outline-none focus:border-[#6a64f1] focus:shadow-md">
                                    <option value="--Select--">--Select--</option>
                                    <?php
                                    $current_year = date("Y");
                                    for ($year = $current_year; $year >= $current_year - 20; $year--) {
                                        echo "<option value='$year'>$year</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="course" class="mb-3 block text-base font-medium text-[#07074d]">Course Name:</label>
                                <input type="text" id ="course" name="course" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 outline-none focus:border-[#6a64f1] focus:shadow-md">
                            </div>
                        </div>
                    </div>
                    

                    <h2 class="mb-5 block font-bold text-gray-900 text-xl">College Applying</h2>
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="universities" class="mb-3 block text-base font-medium text-[#07074d]">College Name:</label>
                                <select id="universities" name="universities" onchange="toggleTextBox()" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 outline-none focus:border-[#6a64f1] focus:shadow-md">
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="otheruni" class="mb-3 block text-base font-medium text-[#07074d]">Other (if selected):</label>
                                <input type="text" id="otheruni" name="otheruni" disabled class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 outline-none focus:border-[#6a64f1] focus:shadow-md">
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="lor_provider" class="mb-3 block text-base font-medium text-[#07074d]">LOR Provider:</label>
                                <input type="text" id="lor_provider" name="lor_provider" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 outline-none focus:border-[#6a64f1] focus:shadow-md">
                            </div>
                        </div>
                    </div>

                    <h2 class="mb-5 block font-bold text-gray-900 sm:text-xl">Application Month and Year:</h2>
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="application_month" class="mb-3 block text-base font-medium text-[#07074d]">month</label>
                                <select id="application_month" name="application_month" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 outline-none focus:border-[#6a64f1] focus:shadow-md">
                                <option value="--Select--">--Select--</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <Option value="December">December</Option>
                                </select>
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="application_year" class="mb-3 block text-base font-medium text-[#07074d]">Year</label>
                                <select id="application_year" name="application_year" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 outline-none focus:border-[#6a64f1] focus:shadow-md">
                                    <option value="--Select--">--Select--</option>
                                    <?php
                                    $current_year = date("Y");
                                    for ($year = $current_year; $year <= $current_year + 5; $year++) {
                                        echo "<option value='$year'>$year</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <h2 class="mb-5 block font-bold text-gray-900 text-xl">Exams Written</h2>
                    <div class="px-3 sm:w-1/2 mb-5">
                        <input type="checkbox" name="entrance_exams[]" value="GRE" checked=""> GRE<br>
                        <input type="checkbox" name="entrance_exams[]" value="TOEFL"> TOEFL<br>
                        <input type="checkbox" name="entrance_exams[]" value="GMAT"> GMAT<br>
                        <input type="checkbox" name="entrance_exams[]" value="SAT"> SAT<br>
                        <input type="checkbox" name="entrance_exams[]" value="ACT"> ACT<br>
                        <input type="checkbox" name="entrance_exams[]" value="IELTS"> IELTS<br>
                    </div>

                    <h2 class="mb-5 block font-bold text-gray-900 text-xl">Upload Scorecards(PDF Only):</h2>
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/3">
                            <div class="mb-5">
                                <input type="file" id="pdfFiles" name ="pdfFiles" accept=".pdf" multiple required class="p-2.5 text-base">
                                <div id="fileList" class="p-2.5 "></div>
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/3">
                            <div class="mb-5">
                                <button id="createButton" onclick="createPDF()" class="block w-10/12 rounded-lg bg-[#205d9f] p-2.5 font-semibold text-white hover:shadow-lg">Combine PDF</button>
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/3">
                            <div class="mb-5">
                            <a id="downloadLink" name="downloadLink"style="display: none;" class="block w-10/12 rounded-lg bg-[#205d9f] p-2.5 font-semibold text-white hover:shadow-lg text-center">Download Combined PDF</a>
                            </div>
                        </div>
                    </div>

                    <button type="submit" value="Submit Application" class="bg-[#0042cf] text-white p-3 rounded-lg hover:scale-105 duration-300 hover:bg-[#1650ff] font-semibold block w-full">Submit</button>
                </form>
            </div>
        </div>
    </body>
</html>