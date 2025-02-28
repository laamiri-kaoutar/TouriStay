<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Favorites | Tourism Platform</title>
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
                        <a href="home.html" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Home
                        </a>
                        <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Explore
                        </a>
                        <a href="favorites.html" class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
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
                    <a href="login.html" class="ml-4 px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Log out
                    </a>
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
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">My Favorites</h1>
            <p class="mt-1 text-sm text-gray-500">Properties you've saved to revisit later.</p>
        </div>

        <!-- Favorites List -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

@foreach ($user->favorite->annonces as $annonce)
    <div class="rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
        <div class="relative h-52">
            @if($annonce->image)
                <img src="{{ asset('storage/' . $annonce->image) }}" alt="{{ $annonce->title }}" class="h-full w-full object-cover">
            @else
                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Property image" class="h-full w-full object-cover">
            @endif
            <button class="absolute top-3 right-3 p-1.5 rounded-full bg-white text-red-400 hover:text-red-600 focus:outline-none">
                <i class="fas fa-heart"></i>
            </button>
            <div class="absolute top-3 left-3">
                <span class="px-2 py-1 rounded-md bg-gray-900 bg-opacity-70 text-white text-xs font-medium uppercase">
                    {{ ucfirst($annonce->type) }}
                </span>
            </div>
        </div>
        <div class="p-4">
            <div class="flex justify-between">
                <h3 class="text-lg font-semibold text-gray-900">{{ Str::limit($annonce->title, 35) }}</h3>
                <div class="flex items-center">
                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                    <span class="text-sm font-medium">4.9</span>
                </div>
            </div>
            
            <div class="flex items-center mt-1 text-sm text-gray-500">
                <i class="fas fa-map-marker-alt text-red-500 mr-1"></i>
                <span>{{ Str::limit($annonce->location, 40) }}</span>
            </div>
            
            <p class="text-sm text-gray-500 mt-2 line-clamp-2">{{ $annonce->image }}</p>
            
            <div class="flex items-center mt-3 text-sm text-gray-500">
                <i class="fas fa-bed mr-1"></i>
                <span>{{ $annonce->rooms }} {{ Str::plural('room', $annonce->rooms) }}</span>
                <span class="mx-2">•</span>
                <i class="fas fa-bath mr-1"></i>
                <span>{{ $annonce->bathrooms }} {{ Str::plural('bathroom', $annonce->bathrooms) }}</span>
            </div>
            
            @if($annonce->available_from && $annonce->available_to)
                <div class="mt-2 text-xs text-gray-500">
                    <i class="far fa-calendar-alt mr-1"></i>
                    <span>Available: {{ \Carbon\Carbon::parse($annonce->available_from)->format('M d') }} - {{ \Carbon\Carbon::parse($annonce->available_to)->format('M d, Y') }}</span>
                </div>
            @endif
            
            <div class="mt-4 flex justify-between items-center">
                <div>
                    <span class="text-base font-semibold text-gray-900">${{ number_format($annonce->price, 2) }}</span>
                    <span class="text-sm text-gray-500"> / night</span>
                </div>
                {{-- <a href="{{ route('annonces.show', $annonce->id) }}" class="inline-flex items-center px-3 py-1.5 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    View details
                </a> --}}
            </div>
        </div>
    </div>
@endforeach
            <!-- Favorite Item 1 -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="relative h-48">
                    <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Beach villa" class="h-full w-full object-cover">
                    <button class="absolute top-3 right-3 p-1.5 rounded-full bg-white text-red-500 hover:text-red-600 focus:outline-none">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
                <div class="p-4">
                    <div class="flex justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Beach Villa</h3>
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="text-sm font-medium">4.9</span>
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
                    <div class="mt-4 flex justify-between items-center">
                        <span class="text-base font-semibold text-gray-900">$250 / night</span>
                        <a href="#" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">View details</a>
                    </div>
                </div>
            </div>

            <!-- Favorite Item 2 -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="relative h-48">
                    <img src="https://images.unsplash.com/photo-1470252649378-9c29740c9fa8?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Mountain retreat" class="h-full w-full object-cover">
                    <button class="absolute top-3 right-3 p-1.5 rounded-full bg-white text-red-500 hover:text-red-600 focus:outline-none">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
                <div class="p-4">
                    <div class="flex justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Mountain Retreat</h3>
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="text-sm font-medium">4.8</span>
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
                    <div class="mt-4 flex justify-between items-center">
                        <span class="text-base font-semibold text-gray-900">$195 / night</span>
                        <a href="#" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">View details</a>
                    </div>
                </div>
            </div>

            <!-- Favorite Item 3 -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="relative h-48">
                    <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="City loft" class="h-full w-full object-cover">
                    <button class="absolute top-3 right-3 p-1.5 rounded-full bg-white text-red-500 hover:text-red-600 focus:outline-none">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
                <div class="p-4">
                    <div class="flex justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">City Loft</h3>
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="text-sm font-medium">4.7</span>
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
                    <div class="mt-4 flex justify-between items-center">
                        <span class="text-base font-semibold text-gray-900">$175 / night</span>
                        <a href="#" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">View details</a>
                    </div>
                </div>
            </div>

            <!-- Favorite Item 4 -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="relative h-48">
                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Lakeside cottage" class="h-full w-full object-cover">
                    <button class="absolute top-3 right-3 p-1.5 rounded-full bg-white text-red-500 hover:text-red-600 focus:outline-none">
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
                    <div class="mt-4 flex justify-between items-center">
                        <span class="text-base font-semibold text-gray-900">$220 / night</span>
                        <a href="#" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">View details</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Empty state (hidden by default, would show when no favorites) -->
        <div class="hidden bg-white rounded-lg shadow-sm p-8 text-center mt-6">
            <div class="mx-auto h-24 w-24 text-gray-400">
                <i class="fas fa-heart text-6xl"></i>
            </div>
            <h3 class="mt-2 text-lg font-medium text-gray-900">No favorites yet</h3>
            <p class="mt-1 text-sm text-gray-500">
                When you find properties you love, click the heart icon to save them here for easy access.
            </p>
            <div class="mt-6">
                <a href="home.html" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Explore properties
                </a>
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
</body>
</html>