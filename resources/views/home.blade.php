<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Tourism Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

     <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

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
                        <a href="{{ route('touriste.dashboard') }}" class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Home
                        </a>
                        <a href="{{ route('tourist.reservations') }}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
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
                <!-- HTML for the header component -->
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
        
        <div id="notificationList" class="hidden bg-white p-2 shadow-lg absolute right-0 mt-2 w-64 border rounded-md z-10">
            <h3 class="text-sm font-semibold mb-2 px-2">Notifications</h3>
            
            @if(auth()->user()->unreadNotifications->count() > 0)
                @foreach(auth()->user()->unreadNotifications as $notification)
                    <div class="p-2 border-b text-sm text-gray-700 hover:bg-gray-50">
                        {{ $notification->data['message_tourist'] }}
                    </div>
                @endforeach
                
                <a href="{{route('notifications.read')}}" class="block text-blue-500 text-sm mt-2 px-2 hover:underline">Mark all as read</a>
            @else
                <div class="p-2 text-sm text-gray-500">No new notifications</div>
            @endif
        </div>
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
    <form action="{{ route('touriste.dashboard') }}" method="GET" class="bg-white rounded-lg shadow-sm p-4">
       
        <div class="flex flex-wrap md:flex-nowrap items-center gap-4">
            <!-- Search Bar -->
            <div class="w-full relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="Search by location, type, price..." 
                    class="pl-10 block w-full border border-gray-300 rounded-md py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            
            <!-- Right side controls: wrapped in a flex container -->
            <div class="flex items-center gap-3 flex-shrink-0">
                <!-- Per Page Dropdown -->
                <select 
                    name="per_page"
                    class="pl-3 pr-8 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="3" {{ request('per_page') == 3 || !request('per_page') ? 'selected' : '' }}>3 per page</option>
                    <option value="4" {{ request('per_page') == 4 ? 'selected' : '' }}>4 per page</option>
                    <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5 per page</option>
                </select>
                
                <!-- Search Button -->
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Search
                </button>
                
                <!-- Reset Button -->
                <a href="{{ route('touriste.dashboard') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Reset
                </a>
            </div>
        </div>
    </form>
</div>

    <!-- Results -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Popular Places to Stay</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Property Card 1 -->
      


@foreach ($annonces as $annonce)
    <div class="rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
        <div class="relative h-52">
            @if($annonce->image)
            <img src="{{ asset('storage/' . $annonce->image) }}" alt="Property image" class="h-full w-full object-cover">

                {{-- <img src="{{ asset('storage/' . $annonce->image) }}" alt="{{ $annonce->title }}" class="h-full w-full object-cover"> --}}
            @else
                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Property image" class="h-full w-full object-cover">
            @endif
            <form method="POST" action="{{ route('favorite.toggle') }}" class="absolute top-3 right-3">
                @csrf
                <input type="hidden" name="annonce_id" id="annonce_id" value ="{{$annonce->id}}">
                
                <button type="submit" class="p-1.5 rounded-full bg-white
                @if( $favoriteAnnonces->contains('annonce_id', $annonce->id))
                     text-red-600 hover:text-red-400 
                @else
                    text-red-400 hover:text-red-600 
                @endif
                 focus:outline-none">
                    <i class="fas fa-heart"></i>
                </button>
            </form>
            {{-- <button class="absolute top-3 right-3 p-1.5 rounded-full bg-white text-red-400 hover:text-red-600 focus:outline-none">
                <i class="fas fa-heart"></i>
            </button> --}}
            <div class="absolute top-3 left-3">
                <span class="px-2 py-1 rounded-md bg-gray-900 bg-opacity-70 text-white text-xs font-medium uppercase">
                    {{ ucfirst($annonce->type) }}
                </span>
            </div>
        </div>
        <div class="p-4">
            <div class="flex justify-between">
                <h3 class="text-lg font-semibold text-gray-900">
                    {{ Str::limit($annonce->title, 35) }}</h3>
                {{-- <div class="flex items-center">
                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                    <span class="text-sm font-medium">    @if( $favoriteAnnonces->contains('annonce_id', $annonce->id))
                        yyyesss 
                   @else
                      noooo
                   @endif</span>
                </div> --}}
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
                    <span>Available: {{ \Carbon\Carbon::parse($annonce->available_from)->format('M d, Y') }} - {{ \Carbon\Carbon::parse($annonce->available_to)->format('M d, Y') }}</span>
                </div>
            @endif
            
            <div class="mt-4 flex justify-between items-center">
                <div>
                    <span class="text-base font-semibold text-gray-900">${{ number_format($annonce->price, 2) }}</span>
                    <span class="text-sm text-gray-500"> / night</span>
                </div>
                <div class="flex space-x-2">
                    <button 
                        class="open-reservation-modal inline-flex items-center px-3 py-1.5 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                        data-annonce-id="{{ $annonce->id }}"
                    >
                        <i class="fas fa-calendar-check mr-1"></i> Reserve
                    </button>
                    {{-- <a href="{{ route('annonces.show', $annonce->id) }}" class="inline-flex items-center px-3 py-1.5 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        View details
                    </a> --}}
                </div>
            </div>
        </div>
    </div>
@endforeach

<!-- Reservation Modal -->
<div id="reservationModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        
        <!-- Modal content -->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Make a Reservation
                        </h3>
                        <div class="mt-4">
                            <form method="POST" action="{{ route('reservation.complete') }}" class="space-y-4">
                                @csrf
                                <input type="hidden" name="annonceId" id="annonceId" value="">
                                
                                <div>
                                    <label for="from" class="block text-sm font-medium text-gray-700">From Date</label>
                                    <input type="text" name="from" id="from" required 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                
                                <div>
                                    <label for="to" class="block text-sm font-medium text-gray-700">To Date</label>
                                    <input type="text" name="to" id="to" required 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                
                                <div class="flex justify-end mt-4">
                                    <button type="button" class="close-modal mr-3 inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                                        Cancel
                                    </button>
                                    <button type="submit" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                                        Reserve Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



   
        </div>

        <div class="mt-12 ">
            {{ $annonces->links() }}
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

    <!-- JavaScript for Modal Functionality -->
<script>

document.addEventListener('DOMContentLoaded', function() {
    const openModalButtons = document.querySelectorAll('.open-reservation-modal');
    const modal = document.getElementById('reservationModal');
    const closeModalButtons = document.querySelectorAll('.close-modal');
    const annonceIdInput = document.getElementById('annonceId');
    const fromDateInput = document.getElementById('from');
    const toDateInput = document.getElementById('to');


    openModalButtons.forEach(button => {
        button.addEventListener('click', function() {
            const annonceId = this.getAttribute('data-annonce-id');
            
            // here i put the annonce id in a hidden input
            annonceIdInput.value = annonceId;

            fetch(`/annonce/${annonceId}/available-dates`)
                .then(response => response.json())
                .then(data => {
                    // console.log("Reserved Dates:", data.reserved_dates);
                    

                    initFlatpickr(data.available_from, data.available_to, data.reserved_dates);
                });

            // Show modal
            modal.classList.remove('hidden');
        });
    });

    closeModalButtons.forEach(button => {
        button.addEventListener('click', function() {
            modal.classList.add('hidden');
        });
    });

    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
    });

    function initFlatpickr(minDate, maxDate, disabledDates) {
                    // console.log("Reserved Dates:", disabledDates);

        flatpickr(fromDateInput, {
            dateFormat: "Y-m-d",
            minDate: minDate,
            maxDate: maxDate,
            disable: disabledDates,
            onChange: function(selectedDates) {
                let selectedDate = selectedDates[0]; 
                if (selectedDate) {
                    toDateInput._flatpickr.set("minDate", selectedDate); 
                }
            }
        });

        flatpickr(toDateInput, {
            dateFormat: "Y-m-d",
            minDate: minDate,
            maxDate: maxDate,
            disable: disabledDates
        });
    }
});


document.addEventListener('DOMContentLoaded', function() {
    const notificationBell = document.getElementById('notificationBell');
    const notificationList = document.getElementById('notificationList');
    
    // Toggle notification list on bell click
    notificationBell.addEventListener('click', function(e) {
        e.stopPropagation();
        notificationList.classList.toggle('hidden');
    });
    
    // Close notification list when clicking elsewhere
    document.addEventListener('click', function(e) {
        if (!notificationBell.contains(e.target) && !notificationList.contains(e.target)) {
            notificationList.classList.add('hidden');
        }
    });
});



</script>
</body>
</html>