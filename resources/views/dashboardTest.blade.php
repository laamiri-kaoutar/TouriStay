<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Tourism Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Top Navigation Bar -->
        <nav class="bg-indigo-600 text-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <span class="text-xl font-bold">Tourism Admin</span>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <button class="p-1 rounded-full text-white hover:bg-indigo-700 focus:outline-none">
                            <i class="fas fa-bell text-lg"></i>
                        </button>
                        <div class="ml-4 relative flex items-center">
                            <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image)  : 'https://t4.ftcdn.net/jpg/02/15/84/43/240_F_215844325_ttX9YiIIyeaR7Ne6EaLLjMAmy4GvPC69.jpg'}}" alt="">
                            <span class="ml-2 text-sm font-medium text-gray-700">{{ auth()->user()->name}}</span>
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
                    </div>
                </div>
            </div>
        </nav>

        <div class="flex flex-1">
            <!-- Sidebar Navigation -->
            <div class="w-64 bg-white shadow-md">
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-gray-800">Dashboard</h2>
                </div>
                <nav class="mt-5">
                    <a href="#" class="flex items-center py-3 px-6 bg-indigo-50 text-indigo-700 border-l-4 border-indigo-600">
                        <i class="fas fa-home mr-3"></i>
                        <span>Overview</span>
                    </a>
                    <a href="#" class="flex items-center py-3 px-6 text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                        <i class="fas fa-users mr-3"></i>
                        <span>Users</span>
                    </a>
                    <a href="#" class="flex items-center py-3 px-6 text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                        <i class="fas fa-building mr-3"></i>
                        <span>Properties</span>
                    </a>
                    <a href="{{'annonces'}}" class="flex items-center py-3 px-6 text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                        <i class="fas fa-bullhorn mr-3"></i>
                        <span>Announcements</span>
                    </a>
                    <a href="#" class="flex items-center py-3 px-6 text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                        <i class="fas fa-chart-bar mr-3"></i>
                        <span>Reports</span>
                    </a>
                    <a href="#" class="flex items-center py-3 px-6 text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                        <i class="fas fa-cog mr-3"></i>
                        <span>Settings</span>
                    </a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="flex-1 p-6">
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-900">Dashboard Overview</h1>
                    <p class="mt-1 text-gray-600">Welcome to your admin dashboard.</p>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-indigo-100 rounded-full p-3">
                                <i class="fas fa-users text-indigo-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-sm font-medium text-gray-500">Total touristes</h2>
                                <p class="text-2xl font-semibold text-gray-900">{{$totalTouristes}}</p>
                            </div>
                        </div>
                        <div class="mt-3 text-green-500 text-sm font-medium flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i>
                            <span>12% increase</span>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-100 rounded-full p-3">
                                <i class="fas fa-building text-green-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-sm font-medium text-gray-500">Properties</h2>
                                <p class="text-2xl font-semibold text-gray-900">{{$totalOwners}}</p>
                            </div>
                        </div>
                        <div class="mt-3 text-green-500 text-sm font-medium flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i>
                            <span>8% increase</span>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-100 rounded-full p-3">
                                <i class="fas fa-bullhorn text-blue-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-sm font-medium text-gray-500">Announcements</h2>
                                <p class="text-2xl font-semibold text-gray-900">{{$totalAnnonces}}</p>
                            </div>
                        </div>
                        <div class="mt-3 text-green-500 text-sm font-medium flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i>
                            <span>5% increase</span>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-purple-100 rounded-full p-3">
                                <i class="fas fa-comments text-purple-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-sm font-medium text-gray-500">Messages</h2>
                                <p class="text-2xl font-semibold text-gray-900">187</p>
                            </div>
                        </div>
                        <div class="mt-3 text-red-500 text-sm font-medium flex items-center">
                            <i class="fas fa-arrow-down mr-1"></i>
                            <span>3% decrease</span>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity and User List -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Recent Activity -->
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">Recent Activity</h3>
                        </div>
                        <div class="p-6">
                            <ul class="divide-y divide-gray-200">
                                <li class="py-3">
                                    <div class="flex items-center">
                                        <div class="bg-blue-500 rounded-full h-8 w-8 flex items-center justify-center text-white">
                                            <i class="fas fa-user-plus"></i>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">New user registration</p>
                                            <p class="text-sm text-gray-500">Sophia Taylor joined as a tourist</p>
                                        </div>
                                        <div class="ml-auto">
                                            <p class="text-xs text-gray-500">30 min ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-3">
                                    <div class="flex items-center">
                                        <div class="bg-green-500 rounded-full h-8 w-8 flex items-center justify-center text-white">
                                            <i class="fas fa-home"></i>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">New property listed</p>
                                            <p class="text-sm text-gray-500">Beach Villa in Bali added by John Doe</p>
                                        </div>
                                        <div class="ml-auto">
                                            <p class="text-xs text-gray-500">2 hours ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-3">
                                    <div class="flex items-center">
                                        <div class="bg-yellow-500 rounded-full h-8 w-8 flex items-center justify-center text-white">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">User report</p>
                                            <p class="text-sm text-gray-500">Property reported for inaccurate information</p>
                                        </div>
                                        <div class="ml-auto">
                                            <p class="text-xs text-gray-500">5 hours ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-3">
                                    <div class="flex items-center">
                                        <div class="bg-purple-500 rounded-full h-8 w-8 flex items-center justify-center text-white">
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">New review</p>
                                            <p class="text-sm text-gray-500">Mountain Cabin received a 5-star review</p>
                                        </div>
                                        <div class="ml-auto">
                                            <p class="text-xs text-gray-500">1 day ago</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- User List -->
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                            <h3 class="text-lg font-medium text-gray-900">Latest Users</h3>
                            <a href="#" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">View all</a>
                        </div>
                        <div class="p-6">
                            <ul class="divide-y divide-gray-200">
                                <li class="py-3 flex items-center">
                                    <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-user text-gray-500"></i>
                                    </div>
                                    <div class="ml-3 flex-1">
                                        <p class="text-sm font-medium text-gray-900">Sophia Taylor</p>
                                        <p class="text-sm text-gray-500">Tourist</p>
                                    </div>
                                    <div class="flex">
                                        <button class="text-gray-400 hover:text-gray-500 mr-2">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                        <button class="text-gray-400 hover:text-gray-500">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </li>
                                <li class="py-3 flex items-center">
                                    <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-user text-gray-500"></i>
                                    </div>
                                    <div class="ml-3 flex-1">
                                        <p class="text-sm font-medium text-gray-900">John Doe</p>
                                        <p class="text-sm text-gray-500">Property Owner</p>
                                    </div>
                                    <div class="flex">
                                        <button class="text-gray-400 hover:text-gray-500 mr-2">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                        <button class="text-gray-400 hover:text-gray-500">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </li>
                                <li class="py-3 flex items-center">
                                    <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-user text-gray-500"></i>
                                    </div>
                                    <div class="ml-3 flex-1">
                                        <p class="text-sm font-medium text-gray-900">Emma Wilson</p>
                                        <p class="text-sm text-gray-500">Tourist</p>
                                    </div>
                                    <div class="flex">
                                        <button class="text-gray-400 hover:text-gray-500 mr-2">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                        <button class="text-gray-400 hover:text-gray-500">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </li>
                                <li class="py-3 flex items-center">
                                    <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-user text-gray-500"></i>
                                    </div>
                                    <div class="ml-3 flex-1">
                                        <p class="text-sm font-medium text-gray-900">Michael Brown</p>
                                        <p class="text-sm text-gray-500">Property Owner</p>
                                    </div>
                                    <div class="flex">
                                        <button class="text-gray-400 hover:text-gray-500 mr-2">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                        <button class="text-gray-400 hover:text-gray-500">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>