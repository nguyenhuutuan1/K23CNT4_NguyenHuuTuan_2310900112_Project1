<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuyKeyBoard
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- Navbar Section -->
    <nav class="bg-gradient-to-r from-blue-500 to-purple-500 p-4 shadow-lg rounded-b-xl">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <h1 class="text-white text-3xl font-semibold">BUY NOW</h1>
            
            <!-- Navbar Links -->
            <ul class="flex space-x-6 text-white">
                <li class="nav-item">
                    <a class="nav-link hover:text-gray-300 transition duration-300 ease-in-out" href="{{ route('nhtuser.search', ['search' => 'iPhone']) }}">Fury</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover:text-gray-300 transition duration-300 ease-in-out" href="{{ route('nhtuser.search', ['search' => 'SamSung']) }}">Rainy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover:text-gray-300 transition duration-300 ease-in-out" href="{{ route('nhtuser.search', ['search' => 'Asus']) }}">Lucky</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover:text-gray-300 transition duration-300 ease-in-out" href="{{ route('nhtuser.search', ['search' => 'Samsung']) }}">Star</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover:text-gray-300 transition duration-300 ease-in-out" href="{{ route('nhtuser.search', ['search' => 'Huawei']) }}">Sugar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover:text-gray-300 transition duration-300 ease-in-out" href="/contact">Liên Hệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover:text-gray-300 transition duration-300 ease-in-out" href="/about">Giới Thiệu</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content Section (optional) -->
    <div class="container mx-auto p-6">
        <!-- Your content here -->
    </div>
</body>

</html>