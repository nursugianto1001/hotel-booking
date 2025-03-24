<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to HotelBookin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="flex flex-col min-h-screen bg-blue-50">
    <nav class="bg-white shadow-md px-6 py-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-2xl font-bold text-blue-600">HotelBooking</div>
            <div class="space-x-2">
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 px-3 py-2">Login</a>
                <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition duration-300">Register</a>
            </div>
        </div>
    </nav>

    <main class="flex-grow container mx-auto px-4 py-12">
        <div class="flex flex-col lg:flex-row items-center justify-between">
            <div class="lg:w-1/2 mb-10 lg:mb-0">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">Find Your Perfect <span class="text-blue-600">Room</span></h1>
                <p class="text-lg text-gray-600 mb-8">Experience seamless booking with premium accommodations <br>tailored to your needs.</p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-center text-white font-medium py-3 px-6 rounded-lg shadow-md transition duration-300">
                        Sign In
                    </a>
                    <a href="{{ route('register') }}" class="border border-blue-600 text-center text-blue-600 hover:bg-blue-50 font-medium py-3 px-6 rounded-lg transition duration-300">
                        Create Account
                    </a>
                </div>
            </div>
            
            <div class="lg:w-1/2">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <!-- Replace the "Why Choose" section with an image -->
                    <img src="https://images.pexels.com/photos/594077/pexels-photo-594077.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Hotel Luxury" class="w-full h-64 object-cover" />
                    
                    <div class="p-6">
                        <div class="flex items-start mb-4">
                            <div class="bg-blue-100 p-2 rounded-full mr-4">
                                <i class="fas fa-search text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Easy Search</h4>
                                <p class="text-gray-600">Find accommodations that match your preferences effortlessly</p>
                            </div>
                        </div>
                        <div class="flex items-start mb-4">
                            <div class="bg-blue-100 p-2 rounded-full mr-4">
                                <i class="fas fa-percent text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Best Rates</h4>
                                <p class="text-gray-600">Competitive prices with exclusive discounts for members</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-blue-100 p-2 rounded-full mr-4">
                                <i class="fas fa-shield-alt text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Secure Booking</h4>
                                <p class="text-gray-600">Your data and transactions are always protected</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-white py-8 mt-auto">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <div class="text-xl font-bold mb-2">HotelBooking</div>
                    <p class="text-gray-400">Your gateway to premium accommodations</p>
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-6 pt-6 text-center text-gray-400">
                <p>&copy; 2025 HotelBooking. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>