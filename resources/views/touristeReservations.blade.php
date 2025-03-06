<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reservations | Tourism Platform</title>
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
                        <a href="{{ route('touriste.dashboard') }}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Home
                        </a>
                        <a href="{{ route('tourist.reservations') }}" class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Reservations
                        </a>
                        <a  href="{{ route('favorites') }}"  class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Favorites
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
            <h1 class="text-3xl font-bold text-gray-900">My Reservations</h1>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Reservations List -->
        <div class="space-y-6">
            <!-- Example of a single reservation card - this would be repeated for each reservation -->
            @foreach($reservations as $reservation)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="flex flex-col md:flex-row">
                    <!-- Property Image -->
                    <div class="md:w-1/4 h-48 md:h-auto">
                        <img
                                    src="{{ asset('storage/' . $reservation->annonce->image) }}"

                         {{-- src="{{ $reservation->annonce->image ? asset('storage/' . $reservation->annonce->image) : 'https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60' }}"  --}}
                             alt="Property image" 
                             class="h-full w-full object-cover">
                    </div>
                    
                    <!-- Reservation Info -->
                    <div class="p-4 md:p-6 md:w-3/4">
                        <div class="flex flex-wrap justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $reservation->annonce->title }}</h3>
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="fas fa-map-marker-alt text-red-500 mr-1"></i>
                                    <span>{{ $reservation->annonce->location }}</span>
                                </div>
                            </div>
                            <div class="mt-2 md:mt-0">
                                <span class="text-lg font-semibold text-gray-900">${{ number_format($reservation->amount, 2) }}</span>
                            </div>
                        </div>

                        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <div class="flex items-center text-sm">
                                    <i class="far fa-calendar-alt text-indigo-600 mr-2"></i>
                                    <div>
                                        <div class="font-medium text-gray-700">Check In</div>
                                        <div>{{ \Carbon\Carbon::parse($reservation->from)->format('M d, Y') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="flex items-center text-sm">
                                    <i class="far fa-calendar-check text-indigo-600 mr-2"></i>
                                    <div>
                                        <div class="font-medium text-gray-700">Check Out</div>
                                        <div>{{ \Carbon\Carbon::parse($reservation->to)->format('M d, Y') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-bed text-indigo-600 mr-2"></i>
                                    <div>
                                        <div class="font-medium text-gray-700">Property Type</div>
                                        <div>{{ ucfirst($reservation->annonce->type) }}</div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-history text-indigo-600 mr-2"></i>
                                    <div>
                                        <div class="font-medium text-gray-700">Reserved On</div>
                                        <div>{{ $reservation->created_at->format('M d, Y') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Duration -->
                        <div class="mt-4 text-sm text-gray-500">
                            <i class="fas fa-clock text-indigo-600 mr-1"></i>
                            <span>Duration: 
                                {{ \Carbon\Carbon::parse($reservation->from)->diffInDays(\Carbon\Carbon::parse($reservation->to)) }} 
                                {{ \Carbon\Carbon::parse($reservation->from)->diffInDays(\Carbon\Carbon::parse($reservation->to)) == 1 ? 'night' : 'nights' }}
                            </span>
                        </div>
                        
                        <!-- Reservation Actions -->
                        <div class="mt-5 flex flex-wrap gap-2">
                            <a href="" class="inline-flex items-center px-3 py-1.5 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <i class="fas fa-eye mr-1"></i> View Property
                            </a>
                            
                            @if(\Carbon\Carbon::parse($reservation->from)->isFuture())
                                <form method="POST" action="">
                                    @csrf
                                    <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                                    <button type="submit" class="inline-flex items-center px-3 py-1.5 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                        <i class="fas fa-times mr-1"></i> Cancel
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Empty state when no reservations -->
            @if(count($reservations) === 0)
            <div class="bg-white rounded-lg shadow-md p-8 text-center">
                <div class="inline-block p-3 rounded-full bg-gray-100 mb-4">
                    <i class="fas fa-calendar-times text-3xl text-gray-400"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No reservations found</h3>
                <p class="text-gray-500 mb-4">You don't have any reservations yet. Start exploring properties to book your next stay!</p>
                <a href="{{ route('touriste.dashboard') }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="fas fa-search mr-2"></i> Explore Properties
                </a>
            </div>
            @endif
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