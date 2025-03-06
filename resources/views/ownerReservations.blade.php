<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Property Reservations | Tourism Platform</title>
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
                        <a href="{{route('owner.dashboard')}}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Dashboard
                        </a>
                       
                        <a href="{{ route('owner.reservations') }}" class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Reservations
                        </a>
                        <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Messages
                        </a>
                    </div>
                </div>
                <!-- User Profile Section -->
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <!-- Notification Bell with Dropdown -->
                    <div class="relative mr-4">
                        <button id="notificationBell" class="relative p-1 rounded-full hover:bg-gray-100 focus:outline-none">
                            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 11-4 0v-.659A6.002 6.002 0 006 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0a3 3 0 01-6 0">
                                </path>
                            </svg>
                            
                            <!-- Show count if there are unread notifications -->
                            @if(auth()->user()->unreadNotifications->count() > 0)
                                <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">
                                    {{ auth()->user()->unreadNotifications->count() }}
                                </span>
                            @endif
                        </button>
                    </div>
                    
                    <!-- User Profile -->
                    <div class="flex items-center">
                        <img class="h-8 w-8 rounded-full object-cover" 
                            src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : 'https://t4.ftcdn.net/jpg/02/15/84/43/240_F_215844325_ttX9YiIIyeaR7Ne6EaLLjMAmy4GvPC69.jpg'}}" 
                            alt="Profile picture">
                        <span class="ml-2 text-sm font-medium text-gray-700">{{ auth()->user()->name}}</span>
                    </div>
                    
                    <!-- Logout Button -->
                    <form method="POST" action="{{ route('logout') }}" class="ml-4">
                        @csrf
                        <button type="submit" 
                                class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Log Out') }}
                        </button>
                    </form>
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

    <!-- Page Header -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">Property Reservations</h1>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Reservations List -->
        <div class="space-y-4">
            @forelse($reservations as $reservation)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-4 sm:p-6">
                        <div class="sm:flex sm:justify-between sm:items-start">
                            <!-- Property Info -->
                            <div class="mb-4 sm:mb-0">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <img class="h-12 w-12 object-cover rounded" 
                                            src="{{ $reservation->annonce->image ? asset('storage/' . $reservation->annonce->image) : 'https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60' }}" 
                                            alt="Property">
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold text-gray-900">{{ $reservation->annonce->title }}</h3>
                                        <div class="flex items-center text-sm text-gray-500 mt-1">
                                            <i class="fas fa-map-marker-alt text-red-500 mr-1"></i>
                                            <span>{{ $reservation->annonce->location }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Amount Info -->
                            <div class="text-right">
                                <span class="text-lg font-semibold text-gray-900">${{ number_format($reservation->amount, 2) }}</span>
                            </div>
                        </div>
                        
                        <div class="mt-6 grid grid-cols-1 md:grid-cols-4 gap-4 text-sm">
                            <!-- Guest Info -->
                            <div>
                                <div class="font-medium text-gray-500">Guest</div>
                                <div class="mt-1 flex items-center">
                                    <img class="h-6 w-6 rounded-full object-cover mr-2" 
                                        src="{{ $reservation->user->image ? asset('storage/' . $reservation->user->image) : 'https://t4.ftcdn.net/jpg/02/15/84/43/240_F_215844325_ttX9YiIIyeaR7Ne6EaLLjMAmy4GvPC69.jpg'}}" 
                                        alt="{{ $reservation->user->name }}">
                                    <span class="text-gray-900">{{ $reservation->user->name }}</span>
                                </div>
                            </div>
                            
                            <!-- Check-in -->
                            <div>
                                <div class="font-medium text-gray-500">Check-in</div>
                                <div class="mt-1 text-gray-900">{{ \Carbon\Carbon::parse($reservation->from)->format('M d, Y') }}</div>
                            </div>
                            
                            <!-- Check-out -->
                            <div>
                                <div class="font-medium text-gray-500">Check-out</div>
                                <div class="mt-1 text-gray-900">{{ \Carbon\Carbon::parse($reservation->to)->format('M d, Y') }}</div>
                            </div>
                            
                            <!-- Duration -->
                            <div>
                                <div class="font-medium text-gray-500">Duration</div>
                                <div class="mt-1 text-gray-900">
                                    {{ \Carbon\Carbon::parse($reservation->from)->diffInDays(\Carbon\Carbon::parse($reservation->to)) }} 
                                    {{ \Carbon\Carbon::parse($reservation->from)->diffInDays(\Carbon\Carbon::parse($reservation->to)) == 1 ? 'night' : 'nights' }}
                                </div>
                            </div>
                        </div>
                        
                        <!-- Reservation date and actions -->
                        <div class="mt-6 flex flex-col sm:flex-row sm:justify-between sm:items-center">
                            <div class="text-sm text-gray-500">
                                <i class="far fa-calendar-alt mr-1"></i> Reserved on {{ $reservation->created_at->format('M d, Y') }}
                            </div>
                            
                            <div class="mt-4 sm:mt-0">
                                <a href="#" class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <i class="fas fa-envelope mr-2"></i> Contact Guest
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-lg shadow-md p-8 text-center">
                    <div class="inline-block p-3 rounded-full bg-gray-100 mb-4">
                        <i class="fas fa-calendar-times text-3xl text-gray-400"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No reservations found</h3>
                    <p class="text-gray-500">There are no reservations for your properties yet.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $reservations->links() }}
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