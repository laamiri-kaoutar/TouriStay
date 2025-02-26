<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proprietor Dashboard | Tourism Platform</title>
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
                            Dashboard
                        </a>
                        <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            My Properties
                        </a>
                        <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Reservations
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
                            <span class="ml-2 text-sm font-medium text-gray-700">John Smith</span>
                        </div>
                    </div>
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

    <!-- Page Content -->
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Page header -->
        <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">My Dashboard</h1>
                <p class="mt-1 text-sm text-gray-500">Manage your properties and track their performance.</p>
            </div>
            <div class="mt-4 md:mt-0">
                <button type="button" id="createAnnouncementBtn" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="fas fa-plus mr-2"></i>
                    Create New Announcement
                </button>
            </div>
        </div>

        <!-- Stats cards -->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-6">
            <!-- Card 1 -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                            <i class="fas fa-home text-white text-xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Total Properties
                                </dt>
                                <dd>
                                    <div class="text-lg font-medium text-gray-900">
                                        5
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                            <i class="fas fa-chart-line text-white text-xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Total Revenue
                                </dt>
                                <dd>
                                    <div class="text-lg font-medium text-gray-900">
                                        $12,450
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                            <i class="fas fa-calendar-check text-white text-xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Reservations
                                </dt>
                                <dd>
                                    <div class="text-lg font-medium text-gray-900">
                                        28
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                            <i class="fas fa-star text-white text-xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Average Rating
                                </dt>
                                <dd>
                                    <div class="text-lg font-medium text-gray-900">
                                        4.8/5.0
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- My Announcements Section -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
            <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">My Properties</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Manage your property listings and track their performance.</p>
                </div>
                <div>
                    <div class="relative">
                        <input type="text" placeholder="Search properties..." class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full pr-12 sm:text-sm border-gray-300 rounded-md">
                        <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">
                            <button class="inline-flex items-center border border-gray-200 rounded px-2 text-sm font-sans font-medium text-gray-400">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Property listings -->
            <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <!-- Property 1 -->
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 flex items-center">
                            <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Property image" class="h-16 w-16 rounded-md object-cover mr-4">
                            <div>
                                <p class="font-medium text-indigo-600">Beach Villa in Bali</p>
                                <p class="text-xs text-gray-500 mt-1"><i class="fas fa-map-marker-alt mr-1"></i>Bali, Indonesia</p>
                            </div>
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 flex flex-col justify-center">
                            <div class="flex items-center">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Active
                                </span>
                                <span class="ml-3 text-gray-500"><i class="fas fa-eye mr-1"></i> 482 views</span>
                                <span class="ml-3 text-gray-500"><i class="fas fa-heart mr-1"></i> 32 favorites</span>
                            </div>
                            <div class="mt-2 text-gray-500">
                                <span>$250/night <span class="mx-2">•</span> 3 bedrooms <span class="mx-2">•</span> 2 baths</span>
                            </div>
                        </dd>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 flex items-center justify-end">
                            <div class="relative inline-block text-left">
                                <button type="button" class="inline-flex items-center px-2 py-1 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="options-menu-1" aria-expanded="true" aria-haspopup="true">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <!-- Dropdown menu, show/hide based on menu state. -->
                                <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10 hidden" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-1">
                                    <div class="py-1" role="none">
                                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">
                                            <i class="fas fa-edit mr-2"></i> Edit Property
                                        </a>
                                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">
                                            <i class="fas fa-eye mr-2"></i> View Details
                                        </a>
                                        <a href="#" class="text-red-600 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">
                                            <i class="fas fa-trash mr-2"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </dd>
                    </div>

                    <!-- Property 2 -->
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 flex items-center">
                            <img src="https://images.unsplash.com/photo-1470252649378-9c29740c9fa8?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Property image" class="h-16 w-16 rounded-md object-cover mr-4">
                            <div>
                                <p class="font-medium text-indigo-600">Mountain Retreat in Colorado</p>
                                <p class="text-xs text-gray-500 mt-1"><i class="fas fa-map-marker-alt mr-1"></i>Aspen, Colorado</p>
                            </div>
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 flex flex-col justify-center">
                            <div class="flex items-center">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Active
                                </span>
                                <span class="ml-3 text-gray-500"><i class="fas fa-eye mr-1"></i> 358 views</span>
                                <span class="ml-3 text-gray-500"><i class="fas fa-heart mr-1"></i> 24 favorites</span>
                            </div>
                            <div class="mt-2 text-gray-500">
                                <span>$195/night <span class="mx-2">•</span> 2 bedrooms <span class="mx-2">•</span> 1 bath</span>
                            </div>
                        </dd>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 flex items-center justify-end">
                            <div class="relative inline-block text-left">
                                <button type="button" class="inline-flex items-center px-2 py-1 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="options-menu-2" aria-expanded="true" aria-haspopup="true">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <!-- Dropdown menu, show/hide based on menu state. -->
                                <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10 hidden" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-2">
                                    <div class="py-1" role="none">
                                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">
                                            <i class="fas fa-edit mr-2"></i> Edit Property
                                        </a>
                                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">
                                            <i class="fas fa-eye mr-2"></i> View Details
                                        </a>
                                        <a href="#" class="text-red-600 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">
                                            <i class="fas fa-trash mr-2"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </dd>
                    </div>

                    <!-- Property 3 -->
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 flex items-center">
                            <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Property image" class="h-16 w-16 rounded-md object-cover mr-4">
                            <div>
                                <p class="font-medium text-indigo-600">Modern Loft in New York</p>
                                <p class="text-xs text-gray-500 mt-1"><i class="fas fa-map-marker-alt mr-1"></i>New York, NY</p>
                            </div>
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 flex flex-col justify-center">
                            <div class="flex items-center">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Pending Review
                                </span>
                                <span class="ml-3 text-gray-500"><i class="fas fa-eye mr-1"></i> 0 views</span>
                                <span class="ml-3 text-gray-500"><i class="fas fa-heart mr-1"></i> 0 favorites</span>
                            </div>
                            <div class="mt-2 text-gray-500">
                                <span>$175/night <span class="mx-2">•</span> 1 bedroom <span class="mx-2">•</span> 1 bath</span>
                            </div>
                        </dd>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 flex items-center justify-end">
                            <div class="relative inline-block text-left">
                                <button type="button" class="inline-flex items-center px-2 py-1 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="options-menu-3" aria-expanded="true" aria-haspopup="true">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <!-- Dropdown menu, show/hide based on menu state. -->
                                <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10 hidden" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-3">
                                    <div class="py-1" role="none">
                                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">
                                            <i class="fas fa-edit mr-2"></i> Edit Property
                                        </a>
                                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">
                                            <i class="fas fa-eye mr-2"></i> View Details
                                        </a>
                                        <a href="#" class="text-red-600 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">
                                            <i class="fas fa-trash mr-2"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </dd>
                    </div>

                    <!-- Property 4 -->
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 flex items-center">
                            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Property image" class="h-16 w-16 rounded-md object-cover mr-4">
                            <div>
                                <p class="font-medium text-indigo-600">Lakeside Cottage in Nevada</p>
                                <p class="text-xs text-gray-500 mt-1"><i class="fas fa-map-marker-alt mr-1"></i>Lake Tahoe, Nevada</p>
                            </div>
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 flex flex-col justify-center">
                            <div class="flex items-center">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    Inactive
                                </span>
                                <span class="ml-3 text-gray-500"><i class="fas fa-eye mr-1"></i> 642 views</span>
                                <span class="ml-3 text-gray-500"><i class="fas fa-heart mr-1"></i> 31 favorites</span>
                            </div>
                            <div class="mt-2 text-gray-500">
                                <span>$220/night <span class="mx-2">•</span> 4 bedrooms <span class="mx-2">•</span> 3 baths</span>
                            </div>
                        </dd>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 flex items-center justify-end">
                            <div class="relative inline-block text-left">
                                <button type="button" class="inline-flex items-center px-2 py-1 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="options-menu-4" aria-expanded="true" aria-haspopup="true">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <!-- Dropdown menu, show/hide based on menu state. -->
                                <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10 hidden" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-4">
                                    <div class="py-1" role="none">
                                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">
                                            <i class="fas fa-edit mr-2"></i> Edit Property
                                        </a>
                                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">
                                            <i class="fas fa-eye mr-2"></i> View Details
                                        </a>
                                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">
                                            <i class="fas fa-power-off mr-2"></i> Activate
                                        </a>
                                        <a href="#" class="text-red-600 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">
                                            <i class="fas fa-trash mr-2"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </dd>
                    </div>
                    
                    <!-- Property 5 -->
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 flex items-center">
                            <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Property image" class="h-16 w-16 rounded-md object-cover mr-4">
                            <div>
                                <p class="font-medium text-indigo-600">Luxury Estate in Miami</p>
                                <p class="text-xs text-gray-500 mt-1"><i class="fas fa-map-marker-alt mr-1"></i>Miami, Florida</p>
                            </div>
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 flex flex-col justify-center">
                            <div class="flex items-center">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Rejected
                                </span>
                                <span class="ml-3 text-gray-500"><i class="fas fa-exclamation-circle mr-1"></i> Missing required documents</span>
                            </div>
                            <div class="mt-2 text-gray-500">
                                <span>$350/night <span class="mx-2">•</span> 5 bedrooms <span class="mx-2">•</span> 4 baths</span>
                            </div>
                        </dd>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 flex items-center justify-end">
                            <div class="relative inline-block text-left">
                                <button type="button" class="inline-flex items-center px-2 py-1 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="options-menu-5" aria-expanded="true" aria-haspopup="true">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <!-- Dropdown menu, show/hide based on menu state. -->
                                <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10 hidden" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-5">
                                    <div class="py-1" role="none">
                                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">
                                            <i class="fas fa-edit mr-2"></i> Edit Property
                                        </a>
                                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">
                                            <i class="fas fa-eye mr-2"></i> View Details
                                        </a>
                                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">
                                            <i class="fas fa-paper-plane mr-2"></i> Resubmit
                                        </a>
                                        <a href="#" class="text-red-600 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">
                                            <i class="fas fa-trash mr-2"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Performance Charts Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Monthly Earnings Chart -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Monthly Earnings</h3>
                <div class="h-64 bg-gray-100 rounded flex items-center justify-center">
                    <p class="text-gray-500">Monthly earnings chart will be displayed here</p>
                </div>
            </div>

            <!-- Performance Insights -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Property Performance</h3>
                <div class="h-64 bg-gray-100 rounded flex items-center justify-center">
                    <p class="text-gray-500">Property performance metrics will be displayed here</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Announcement Modal -->
    <div id="createAnnouncementModal" class="fixed z-20 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Modal panel -->
            <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full sm:p-6">
                <div class="absolute top-0 right-0 pt-4 pr-4">
                    <button type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none" id="closeModal">
                        <span class="sr-only">Close</span>
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <div>
                    <div class="mt-3 text-center sm:mt-0 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                            Create New Property Announcement
                        </h3>

                        <form class="space-y-6">
                            <!-- Basic Information Section -->
                            <div>
                                <h4 class="text-sm font-medium text-gray-700 mb-3">Basic Information</h4>
                                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                    <div class="sm:col-span-4">
                                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                        <div class="mt-1">
                                            <input type="text" name="title" id="title" placeholder="e.g. Beachfront Villa with Pool" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label for="property-type" class="block text-sm font-medium text-gray-700">Property Type</label>
                                        <div class="mt-1">
                                            <select id="property-type" name="property-type" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                <option>Villa</option>
                                                <option>Apartment</option>
                                                <option>House</option>
                                                <option>Cottage</option>
                                                <option>Cabin</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-6">
                                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                        <div class="mt-1">
                                            <textarea id="description" name="description" rows="3" placeholder="Describe your property in detail" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
                                        </div>
                                        <p class="mt-2 text-sm text-gray-500">Brief description for your property. HTML is not allowed.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Location Section -->
                            <div>
                                <h4 class="text-sm font-medium text-gray-700 mb-3">Location</h4>
                                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                        <div class="mt-1">
                                            <select id="country" name="country" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                <option value="US">United States</option>
                                                <option value="CA">Canada</option>
                                                <option value="MX">Mexico</option>
                                                <option value="FR">France</option>
                                                <option value="DE">Germany</option>
                                                <option value="GB">United Kingdom</option>
                                                <option value="IT">Italy</option>
                                                <option value="ES">Spain</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                        <div class="mt-1">
                                            <input type="text" name="city" id="city" placeholder="e.g. New York" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-6">
                                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                        <div class="mt-1">
                                            <input type="text" name="address" id="address" placeholder="Street address" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <p class="mt-2 text-sm text-gray-500">This address will not be shown to guests until after booking.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Details & Pricing Section -->
                            <div>
                                <h4 class="text-sm font-medium text-gray-700 mb-3">Details & Pricing</h4>
                                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                    <div class="sm:col-span-1">
                                        <label for="bedrooms" class="block text-sm font-medium text-gray-700">Bedrooms</label>
                                        <div class="mt-1">
                                            <select id="bedrooms" name="bedrooms" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5+</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-1">
                                        <label for="bathrooms" class="block text-sm font-medium text-gray-700">Bathrooms</label>
                                        <div class="mt-1">
                                            <select id="bathrooms" name="bathrooms" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5+</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-1">
                                        <label for="max-guests" class="block text-sm font-medium text-gray-700">Max Guests</label>
                                        <div class="mt-1">
                                            <select id="max-guests" name="max-guests" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="4">4</option>
                                                <option value="6">6</option>
                                                <option value="8">8</option>
                                                <option value="10">10+</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="price" class="block text-sm font-medium text-gray-700">Price per night ($)</label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500 sm:text-sm">$</span>
                                            </div>
                                            <input type="text" name="price" id="price" placeholder="0.00" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Amenities Section -->
                            <div>
                                <h4 class="text-sm font-medium text-gray-700 mb-3">Amenities</h4>
                                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                                    <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="wifi" name="amenities[]" value="wifi" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="wifi" class="font-medium text-gray-700">WiFi</label>
                                        </div>
                                    </div>

                                    <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="pool" name="amenities[]" value="pool" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="pool" class="font-medium text-gray-700">Swimming Pool</label>
                                        </div>
                                    </div>

                                    <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="ac" name="amenities[]" value="ac" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="ac" class="font-medium text-gray-700">Air Conditioning</label>
                                        </div>
                                    </div>

                                    <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="kitchen" name="amenities[]" value="kitchen" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="kitchen" class="font-medium text-gray-700">Kitchen</label>
                                        </div>
                                    </div>

                                    <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="parking" name="amenities[]" value="parking" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="parking" class="font-medium text-gray-700">Free Parking</label>
                                        </div>
                                    </div>

                                    <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="tv" name="amenities[]" value="tv" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="tv" class="font-medium text-gray-700">TV</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Photos Section -->
                            <div>
                                <h4 class="text-sm font-medium text-gray-700 mb-3">Photos</h4>
                                <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Upload files</span>
                                                <input id="file-upload" name="file-upload" type="file" class="sr-only" multiple>
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            PNG, JPG, GIF up to 10MB
                                        </p>
                                    </div>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">Add multiple photos to showcase your property. First photo will be used as cover.</p>
                            </div>

                            <!-- Availability Section -->
                            <div>
                                <h4 class="text-sm font-medium text-gray-700 mb-3">Availability</h4>
                                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <label for="available-from" class="block text-sm font-medium text-gray-700">Available From</label>
                                        <div class="mt-1">
                                            <input type="date" name="available-from" id="available-from" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="available-to" class="block text-sm font-medium text-gray-700">Available To</label>
                                        <div class="mt-1">
                                            <input type="date" name="available-to" id="available-to" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Buttons -->
                            <div class="flex justify-end">
                                <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-3" id="cancelModal">
                                    Cancel
                                </button>
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Create Announcement
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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

    <!-- JavaScript for Modal and Dropdowns -->
    <script>
        // Get modal elements
        const modal = document.getElementById('createAnnouncementModal');
        const createBtn = document.getElementById('createAnnouncementBtn');
        const closeBtn = document.getElementById('closeModal');
        const cancelBtn = document.getElementById('cancelModal');

        // Show modal function
        function showModal() {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        }

        // Hide modal function
        function hideModal() {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto'; // Re-enable scrolling
        }

        // Event listeners
        createBtn.addEventListener('click', showModal);
        closeBtn.addEventListener('click', hideModal);
        cancelBtn.addEventListener('click', hideModal);

        // Close modal when clicking outside
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                hideModal();
            }
        });

        // Handle the dropdown menus
        const dropdownButtons = document.querySelectorAll('[id^="options-menu-"]');
        
        dropdownButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Find the dropdown menu that belongs to this button
                const dropdownMenu = this.nextElementSibling;
                
                // Toggle the hidden class
                if (dropdownMenu.classList.contains('hidden')) {
                    // Close all other dropdowns first
                    document.querySelectorAll('[id^="options-menu-"]').forEach(btn => {
                        if (btn !== this) {
                            btn.nextElementSibling.classList.add('hidden');
                        }
                    });
                    
                    // Open this dropdown
                    dropdownMenu.classList.remove('hidden');
                } else {
                    // Close this dropdown
                    dropdownMenu.classList.add('hidden');
                }
            });
        });
        
        // Close all dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('[id^="options-menu-"]')) {
                document.querySelectorAll('[id^="options-menu-"]').forEach(button => {
                    const dropdownMenu = button.nextElementSibling;
                    if (!dropdownMenu.classList.contains('hidden')) {
                        dropdownMenu.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</body>
</html>