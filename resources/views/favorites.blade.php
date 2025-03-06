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
                        <a href="{{ route('touriste.dashboard') }}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Home
                        </a>
                        <a href="{{ route('tourist.reservations') }}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Reservations
                        </a>
                        <a  href="{{ route('favorites') }}"  class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
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
                            <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image)  : 'https://t4.ftcdn.net/jpg/02/15/84/43/240_F_215844325_ttX9YiIIyeaR7Ne6EaLLjMAmy4GvPC69.jpg'}}" alt="">
                            <span class="ml-2 text-sm font-medium text-gray-700">{{ auth()->user()->name}}</span>
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

            
@foreach ($favorites as $favorite)
<div class="rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
    <div class="relative h-52">
        @if($favorite->annonce->image)
            <img src="{{ asset('storage/' . $favorite->annonce->image) }}" alt="{{ $favorite->annonce->title }}" class="h-full w-full object-cover">
        @else
            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Property image" class="h-full w-full object-cover">
        @endif
        <form method="POST" action="{{ route('favorite.toggle') }}" class="absolute top-3 right-3">
           
            <input type="hidden" name="annonce_id" id="annonce_id" value ="{{$favorite->annonce->id}}">
            
            <button type="submit" class="p-1.5 rounded-full bg-white text-red-700 hover:text-red-400  focus:outline-none">
                <i class="fas fa-heart"></i>
            </button>
        </form>
      
        <div class="absolute top-3 left-3">
            <span class="px-2 py-1 rounded-md bg-gray-900 bg-opacity-70 text-white text-xs font-medium uppercase">
                {{ ucfirst($favorite->annonce->type) }}
            </span>
        </div>
    </div>
    <div class="p-4">
        <div class="flex justify-between">
            <h3 class="text-lg font-semibold text-gray-900">
                {{ Str::limit($favorite->annonce->title, 35) }}</h3>
        
        </div>
        
        <div class="flex items-center mt-1 text-sm text-gray-500">
            <i class="fas fa-map-marker-alt text-red-500 mr-1"></i>
            <span>{{ Str::limit($favorite->annonce->location, 40) }}</span>
        </div>
        
        <p class="text-sm text-gray-500 mt-2 line-clamp-2">{{ $favorite->annonce->image }}</p>
        
        <div class="flex items-center mt-3 text-sm text-gray-500">
            <i class="fas fa-bed mr-1"></i>
            <span>{{ $favorite->annonce->rooms }} {{ Str::plural('room', $favorite->annonce->rooms) }}</span>
            <span class="mx-2">•</span>
            <i class="fas fa-bath mr-1"></i>
            <span>{{ $favorite->annonce->bathrooms }} {{ Str::plural('bathroom', $favorite->annonce->bathrooms) }}</span>
        </div>
        
        @if($favorite->annonce->available_from && $favorite->annonce->available_to)
            <div class="mt-2 text-xs text-gray-500">
                <i class="far fa-calendar-alt mr-1"></i>
                <span>Available: {{ \Carbon\Carbon::parse($favorite->annonce->available_from)->format('M d') }} - {{ \Carbon\Carbon::parse($favorite->annonce->available_to)->format('M d, Y') }}</span>
            </div>
        @endif
        
        <div class="mt-4 flex justify-between items-center">
            <div>
                <span class="text-base font-semibold text-gray-900">${{ number_format($favorite->annonce->price, 2) }}</span>
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
        </div>
        <div class="mt-12 ">
            {{ $favorites->links() }}
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