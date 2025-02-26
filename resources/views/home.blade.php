<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Tourism Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <!-- Navigation Bar -->
    <nav class="bg-white shadow-lg sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="text-indigo-600 text-lg font-bold">TourismApp</span>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="#" class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Home
                        </a>
                        <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Explore
                        </a>
                        <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Favorites
                        </a>
                        <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Messages
                        </a>
                    </div>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <button class="p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none">
                        <i class="fas fa-bell"></i>
                    </button>
                    <div class="ml-3 relative">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <span class="ml-2 text-sm font-medium text-gray-700">Sophie Taylor</span>
                        </div>
                    </div>
                               <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link 
                                    class="ml-4 px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                   :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    <!-- <a href="login.html" class="ml-4 px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Log out
                    </a> -->
                </div>
                <div class="-mr-2 flex items-center sm:hidden">
                    <!-- Mobile menu button -->
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Search Section -->
    <div class="relative bg-indigo-600">
        <div class="absolute inset-0">
            <img class="h-full w-full object-cover" src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1600&h=400&q=80" alt="Beach destination">
            <div class="absolute inset-0 bg-indigo-700 mix-blend-multiply"></div>
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">Find your perfect stay</h1>
            <p class="mt-6 text-xl text-indigo-100 max-w-3xl">Discover unique accommodations around the world for your next adventure.</p>
            
            <!-- Search Form -->
            <div class="mt-10 max-w-3xl">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-map-marker-alt text-gray-400"></i>
                                </div>
                                <input type="text" id="location" placeholder="Where are you going?" class="pl-10 block w-full pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        
                        <div>
                            <label for="dates" class="block text-sm font-medium text-gray-700">Dates</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-calendar text-gray-400"></i>
                                </div>
                                <input type="text" id="dates" placeholder="Add dates" class="pl-10 block w-full pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        
                        <div>
                            <label for="guests" class="block text-sm font-medium text-gray-700">Guests</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user-friends text-gray-400"></i>
                                </div>
                                <select id="guests" class="pl-10 block w-full pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="1">1 guest</option>
                                    <option value="2">2 guests</option>
                                    <option value="3">3 guests</option>
                                    <option value="4">4+ guests</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 flex">
                        <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="fas fa-search mr-2"></i> Search
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filters -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex flex-col md:flex-row items-center gap-4">
            <!-- Simple Search Bar -->
            <div class="w-full md:flex-1">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" placeholder="Search destinations, properties..." class="pl-10 block w-full border border-gray-300 rounded-md py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>
            
            <!-- Single Filter -->
            <div class="w-full md:w-auto">
                <select class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option>All Properties</option>
                    <option>Beachfront</option>
                    <option>Mountain View</option>
                    <option>City Center</option>
                    <option>Countryside</option>
                </select>
            </div>
            
            <!-- Items per page -->
            <div class="w-full md:w-auto">
                <select class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="8">Show 8 per page</option>
                    <option value="12">Show 12 per page</option>
                    <option value="16">Show 16 per page</option>
                    <option value="24">Show 24 per page</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Results -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Popular Places to Stay</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Property Card 1 -->
            <div class="rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="relative h-52">
                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Lakefront property" class="h-full w-full object-cover">
                    <button class="absolute top-3 right-3 p-1.5 rounded-full bg-white text-red-400 hover:text-red-600 focus:outline-none">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
                <div class="p-4">
                    <div class="flex justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Lakeside Cottage</h3>
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="text-sm font-medium">4.9</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Lake Tahoe, Nevada</p>
                    <div class="flex items-center mt-2 text-sm text-gray-500">
                        <i class="fas fa-bed mr-1"></i>
                        <span>4 beds</span>
                        <span class="mx-2">•</span>
                        <i class="fas fa-bath mr-1"></i>
                        <span>3 baths</span>
                    </div>
                    <div class="mt-4">
                        <span class="text-base font-semibold text-gray-900">$220</span>
                        <span class="text-sm text-gray-500"> / night</span>
                    </div>
                </div>
            </div>

            <!-- Property Card 2 -->
            <div class="rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="relative h-52">
                    <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Beach house" class="h-full w-full object-cover">
                    <button class="absolute top-3 right-3 p-1.5 rounded-full bg-white text-red-400 hover:text-red-600 focus:outline-none">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
                <div class="p-4">
                    <div class="flex justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Beach Villa</h3>
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="text-sm font-medium">4.8</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Malibu, California</p>
                    <div class="flex items-center mt-2 text-sm text-gray-500">
                        <i class="fas fa-bed mr-1"></i>
                        <span>3 beds</span>
                        <span class="mx-2">•</span>
                        <i class="fas fa-bath mr-1"></i>
                        <span>2 baths</span>
                    </div>
                    <div class="mt-4">
                        <span class="text-base font-semibold text-gray-900">$250</span>
                        <span class="text-sm text-gray-500"> / night</span>
                    </div>
                </div>
            </div>

            <!-- Property Card 3 -->
            <div class="rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="relative h-52">
                    <img src="https://images.unsplash.com/photo-1470252649378-9c29740c9fa8?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Mountain cabin" class="h-full w-full object-cover">
                    <button class="absolute top-3 right-3 p-1.5 rounded-full bg-white text-red-400 hover:text-red-600 focus:outline-none">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
                <div class="p-4">
                    <div class="flex justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Mountain Retreat</h3>
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="text-sm font-medium">4.7</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Aspen, Colorado</p>
                    <div class="flex items-center mt-2 text-sm text-gray-500">
                        <i class="fas fa-bed mr-1"></i>
                        <span>2 beds</span>
                        <span class="mx-2">•</span>
                        <i class="fas fa-bath mr-1"></i>
                        <span>1 bath</span>
                    </div>
                    <div class="mt-4">
                        <span class="text-base font-semibold text-gray-900">$195</span>
                        <span class="text-sm text-gray-500"> / night</span>
                    </div>
                </div>
            </div>

            <!-- Property Card 4 -->
            <div class="rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="relative h-52">
                    <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="City apartment" class="h-full w-full object-cover">
                    <button class="absolute top-3 right-3 p-1.5 rounded-full bg-white text-red-400 hover:text-red-600 focus:outline-none">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
                <div class="p-4">
                    <div class="flex justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">City Loft</h3>
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="text-sm font-medium">4.6</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">New York, NY</p>
                    <div class="flex items-center mt-2 text-sm text-gray-500">
                        <i class="fas fa-bed mr-1"></i>
                        <span>1 bed</span>
                        <span class="mx-2">•</span>
                        <i class="fas fa-bath mr-1"></i>
                        <span>1 bath</span>
                    </div>
                    <div class="mt-4">
                        <span class="text-base font-semibold text-gray-900">$175</span>
                        <span class="text-sm text-gray-500"> / night</span>
                    </div>
                </div>
            </div>

            <!-- Property Card 5 -->
            <div class="rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="relative h-52">
                    <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Luxury home" class="h-full w-full object-cover">
                    <button class="absolute top-3 right-3 p-1.5 rounded-full bg-white text-red-400 hover:text-red-600 focus:outline-none">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
                <div class="p-4">
                    <div class="flex justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Luxury Estate</h3>
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="text-sm font-medium">4.9</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Miami, Florida</p>
                    <div class="flex items-center mt-2 text-sm text-gray-500">
                        <i class="fas fa-bed mr-1"></i>
                        <span>5 beds</span>
                        <span class="mx-2">•</span>
                        <i class="fas fa-bath mr-1"></i>
                        <span>4 baths</span>
                    </div>
                    <div class="mt-4">
                        <span class="text-base font-semibold text-gray-900">$350</span>
                        <span class="text-sm text-gray-500"> / night</span>
                    </div>
                </div>
            </div>

            <!-- Property Card 6 -->
            <div class="rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="relative h-52">
                    <img src="https://images.unsplash.com/photo-1480074568708-e7b720bb3f09?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Suburban house" class="h-full w-full object-cover">
                    <button class="absolute top-3 right-3 p-1.5 rounded-full bg-white text-red-400 hover:text-red-600 focus:outline-none">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
                <div class="p-4">
                    <div class="flex justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Suburban Home</h3>
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="text-sm font-medium">4.7</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Austin, Texas</p>
                    <div class="flex items-center mt-2 text-sm text-gray-500">
                        <i class="fas fa-bed mr-1"></i>
                        <span>3 beds</span>
                        <span class="mx-2">•</span>
                        <i class="fas fa-bath mr-1"></i>
                        <span>2 baths</span>
                    </div>
                    <div class="mt-4">
                        <span class="text-base font-semibold text-gray-900">$185</span>
                        <span class="text-sm text-gray-500"> / night</span>
                    </div>
                </div>
            </div>

            <!-- Property Card 7 -->
            <div class="rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="relative h-52">
                    <img src="https://images.unsplash.com/photo-1523217582562-09d0def993a6?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Cottage" class="h-full w-full object-cover">
                    <button class="absolute top-3 right-3 p-1.5 rounded-full bg-white text-red-400 hover:text-red-600 focus:outline-none">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
                <div class="p-4">
                    <div class="flex justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Cozy Cottage</h3>
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="text-sm font-medium">4.8</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Portland, Oregon</p>
                    <div class="flex items-center mt-2 text-sm text-gray-500">
                        <i class="fas fa-bed mr-1"></i>
                        <span>2 beds</span>
                        <span class="mx-2">•</span>
                        <i class="fas fa-bath mr-1"></i>
                        <span>1 bath</span>
                    </div>
                    <div class="mt-4">
                        <span class="text-base font-semibold text-gray-900">$165</span>
                        <span class="text-sm text-gray-500"> / night</span>
                    </div>
                </div>
            </div>

            <!-- Property Card 8 -->
            <div class="rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="relative h-52">
                    <img src="https://images.unsplash.com/photo-1518780664697-55e3ad937233?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Historic apartment" class="h-full w-full object-cover">
                    <button class="absolute top-3 right-3 p-1.5 rounded-full bg-white text-red-400 hover:text-red-600 focus:outline-none">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
                <div class="p-4">
                    <div class="flex justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Historic Apartment</h3>
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="text-sm font-medium">4.6</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Boston, Massachusetts</p>
                    <div class="flex items-center mt-2 text-sm text-gray-500">
                        <i class="fas fa-bed mr-1"></i>
                        <span>2 beds</span>
                        <span class="mx-2">•</span>
                        <i class="fas fa-bath mr-1"></i>
                        <span>1 bath</span>
                    </div>
                    <div class="mt-4">
                        <span class="text-base font-semibold text-gray-900">$190</span>
                        <span class="text-sm text-gray-500"> / night</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Previous</span>
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a href="#" aria-current="page" class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                    1
                </a>
                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                    2
                </a>
                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                    3
                </a>
                <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                    ...
                </span>
                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                    10
                </a>
                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Next</span>
                    <i class="fas fa-chevron-right"></i>
                </a>
            </nav>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-12">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-1">
                    <h3 class="text-lg font-semibold mb-4">TourismApp</h3>
                    <p class="text-gray-300 text-sm">Find the perfect place for your next getaway. Explore our curated selection of vacation homes and hotels around the world.</p>
                </div>
                
                <div class="col-span-1">
                    <h3 class="text-lg font-semibold mb-4">Explore</h3>
                    <ul class="space-y-2 text-sm text-gray-300">
                        <li><a href="#" class="hover:text-white">Home</a></li>
                        <li><a href="#" class="hover:text-white">Destinations</a></li>
                        <li><a href="#" class="hover:text-white">Featured Properties</a></li>
                        <li><a href="#" class="hover:text-white">Special Offers</a></li>
                    </ul>
                </div>
                
                <div class="col-span-1">
                    <h3 class="text-lg font-semibold mb-4">Support</h3>
                    <ul class="space-y-2 text-sm text-gray-300">
                        <li><a href="#" class="hover:text-white">Help Center</a></li>
                        <li><a href="#" class="hover:text-white">Contact Us</a></li>
                        <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-white">Terms of Service</a></li>
                    </ul>
                </div>
                
                <div class="col-span-1">
                    <h3 class="text-lg font-semibold mb-4">Connect</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                    <div class="mt-4">
                        <h4 class="text-sm font-medium text-gray-300 mb-2">Subscribe to our newsletter</h4>
                        <div class="flex">
                            <input type="email" placeholder="Your email" class="px-3 py-2 text-sm text-gray-900 bg-white rounded-l-md focus:outline-none">
                            <button class="bg-indigo-600 px-3 py-2 rounded-r-md text-sm">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-sm text-gray-300">
                <p>&copy; 2024 TourismApp. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>