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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="output.css">
        <script src="main.js" type="text/javascript"></script>
    </head>
    <body class="font-sans h-screen bg-gradient-to-r from-[#6e97d4] to-[#8f5fc9]">
        <header class="bg-[#00296b] h-28">
            <nav class="flex justify-between items-center w-[92%] h-28 mx-auto">
                <div>
                <img src="VITLogoEmblem.png" class="w-1/6 min-w-32" alt="Logo">
                </div>
                <div class="absolute left-1/2 transform -translate-x-1/2">
                <h1 class="flex text-2xl items-center text-white font-bold">Global Connect</h1>
                </div>
            </nav>
        </header>
        <div class="flex flex-col md:flex-row items-center justify-center mt-[10%] mx-[5%] space-y-6 md:space-y-0 md:space-x-[12%]">
            <div class="w-1/2 bg-white rounded-lg sm:max-w-md p-6 space-y-4 md:space-y-6 max-md:min-w-[95%] hover:scale-105 duration-200 hover:shadow-[rgba(0,_0,_0,_0.4)_0px_6px_12px]">
                <h2 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">Student Login</h2>
                <form action="studen_login.html" method="post" class="space-y-4 md:space-y-4">
                    <label for="studusername" class="block mb-2 text-base font-medium text-gray-900">Username:</label>
                    <input type="text" name="studusername" id="studusername" placeholder="Username" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5">
                    <label for="studpassword" class="block mb-2 text-base font-medium text-gray-900">Password</label>
                    <div class="relative">
                        <input type="password" name="studpassword" id="studpassword" placeholder="Password" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5">
                        <span id="showStudentPasswordButton" class="absolute right-3 top-3 cursor-pointer">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </span>
                    </div>
                    <a href="Studentforgot.php" class="text-sm font-medium text-gray-900 hover:text-blue-700">Forgotten Password?</a>
                    <button type="submit" value="Login" class="bg-[#002d74] text-white p-2.5 rounded-lg hover:scale-105 duration-300 hover:bg-[#206ab1] font-medium block w-full">Log In</button>
                </form>          
            </div>
            <div class="w-1/2 bg-white rounded-lg shadow sm:max-w-md p-6 space-y-4 md:space-y-6 max-md:min-w-[95%] hover:scale-105 duration-200 hover:shadow-[rgba(0,_0,_0,_0.4)_0px_6px_12px]">
                <h2 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">Faculty Login</h2>
                <form action="admin_details.html" method="post" class="space-y-4 md:space-y-4">
                    <label for="username" class="block mb-2 text-base font-medium text-gray-900">Username:</label>
                    <input type="text" name="username" id="username" placeholder="Username" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5">
                    <label for="password" class="block mb-2 text-base font-medium text-gray-900">Password:</label>
                    <div class="relative">
                        <input type="password" name="password" id="password" placeholder="Password" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5">
                        <span id="showFacultyPasswordButton" class="absolute right-3 top-3 cursor-pointer">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </span>
                    </div>
                    <a href="facultyforgot.php" class="text-sm font-medium text-gray-900 hover:text-blue-700">Forgotten Password?</a>
                    <button type="submit" value="Login"  class="bg-[#002d74] text-white p-2.5 rounded-lg hover:scale-105 duration-300 hover:bg-[#206ab1] font-medium block w-full">Log In</button>
                </form>
            </div>
        </div>
    </body>
</html>