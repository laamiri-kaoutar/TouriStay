<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Announcement | Tourism Platform</title>
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
                        <a href="dashboard.html" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Dashboard
                        </a>
                        <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            My Properties
                        </a>
                        <a href="#" class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Edit Announcement
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
        <div class="mb-6 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Edit Announcement</h1>
                <p class="mt-1 text-sm text-gray-500">Update your property listing information</p>
            </div>
            <div>
                <a href="{{ route('owner.dashboard') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Dashboard
                </a>
            </div>
        </div>

        <!-- Edit Form -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row sm:items-center">
                    <div class="flex-shrink-0 mb-4 sm:mb-0 sm:mr-6">
                        <img src="{{ asset('storage/' . $annonce->image) }}"  alt="Beach villa" class="h-24 w-24 rounded-md object-cover">
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900">Beach Villa in Bali</h2>
                        <p class="text-sm text-gray-500 mt-1">Created on: Jan 15, 2024 • Last updated: Feb 10, 2024</p>
                        <span class="mt-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Active
                        </span>
                    </div>
                </div>
            </div>
            
            <form class="p-4 sm:p-6 space-y-6"  method="POST" enctype="multipart/form-data" action="{{ route('annonce.update', $annonce->id) }}" >
                @csrf
                @method('PUT')
                <!-- Basic Information Section -->
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{ route('annonce.update', $annonce->id) }}</h3>
                    <div class="mt-5 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <div class="mt-1">
                                <input type="text" name="title" id="title" value="{{ $annonce->title}}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="type" class="block text-sm font-medium text-gray-700">Property Type</label>
                            <div class="mt-1">
                                <select id="type" name="type" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    <option value="villa" {{ $annonce->type == 'villa' ? 'selected' : '' }}>Villa</option>
                                    <option value="appartement" {{ $annonce->type == 'appartement' ? 'selected' : '' }}>Appartement</option>
                                    <option value="house" {{ $annonce->type == 'house' ? 'selected' : '' }}>House</option>
                                    <option value="studio" {{ $annonce->type == 'studio' ? 'selected' : '' }}>Studio</option>
                           
                                </select>
                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <div class="mt-1">
                                <textarea id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md">{{ $annonce->description}}.</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Location Section -->
                <div class="pt-6 border-t border-gray-200">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Location</h3>
                    <div class="mt-5 grid grid-cols-1 gap-y-6 sm:grid-cols-6">
                        <div class="sm:col-span-6">
                            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                            <div class="mt-1">
                                <input type="text" name="location" id="location" value="{{ $annonce->location}}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Details & Pricing Section -->
                <div class="pt-6 border-t border-gray-200">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Details & Pricing</h3>
                    <div class="mt-5 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-1">
                            <label for="rooms" class="block text-sm font-medium text-gray-700">Rooms</label>
                            <div class="mt-1">
                                <select id="rooms" name="rooms" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    <option value="1" {{ $annonce->rooms == 1 ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $annonce->rooms == 2 ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $annonce->rooms == 3 ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ $annonce->rooms == 4 ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ $annonce->rooms >= 5 ? 'selected' : '' }}>5+</option>
                           
                                </select>
                            </div>
                        </div>

                        <div class="sm:col-span-1">
                            <label for="bathrooms" class="block text-sm font-medium text-gray-700">Bathrooms</label>
                            <div class="mt-1">
                            <select id="bathrooms" name="bathrooms" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                <option value="1" {{ $annonce->bathrooms == 1 ? 'selected' : '' }}>1</option>
                                <option value="2" {{ $annonce->bathrooms == 2 ? 'selected' : '' }}>2</option>
                                <option value="3" {{ $annonce->bathrooms == 3 ? 'selected' : '' }}>3</option>
                                <option value="4" {{ $annonce->bathrooms == 4 ? 'selected' : '' }}>4</option>
                                <option value="5" {{ $annonce->bathrooms >= 5 ? 'selected' : '' }}>5+</option>
                            </select>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="price" class="block text-sm font-medium text-gray-700">Price per night ($)</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" name="price" id="price" value="{{ $annonce->price}}" min="0" step="0.01" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-3 sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Photo Section -->
                <div class="pt-6 border-t border-gray-200">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Property Photo</h3>
                    <div class="mt-5">
                        <div class="border rounded-md bg-gray-50 overflow-hidden">
                            <div class="relative">
                                <img src="{{ asset('storage/' . $annonce->image) }}" alt="Property preview" class="w-full h-64 object-cover">
                                <div class="absolute inset-0 bg-black bg-opacity-30 opacity-0 hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <button type="button" class="bg-red-600 text-white p-2 rounded-full mr-3">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                    <label for="image" class="bg-white text-gray-700 p-2 rounded-full cursor-pointer">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                        </svg>
                                        <input id="image" name="image" type="file" class="sr-only" accept="image/*">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Availability Section -->
                <div class="pt-6 border-t border-gray-200">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Availability</h3>
                    <div class="mt-5 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="available_from" class="block text-sm font-medium text-gray-700">Available From</label>
                            <div class="mt-1">
                                <input type="date" name="available_from" id="available_from" value="{{ $annonce->available_from}}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="available_to" class="block text-sm font-medium text-gray-700">Available To</label>
                            <div class="mt-1">
                                <input type="date" name="available_to" id="available_to" value="{{ $annonce->available_to}}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                    </div>
                </div>

             
                <!-- Action Buttons -->
                <div class="pt-6 border-t border-gray-200 flex justify-between">
                    <!-- <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Delete Announcement
                    </button>
                     -->
                    <div>
                        <button href="{{ route('owner.dashboard') }}" type="button" class="mr-3 inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancel
                        </button>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Update Announcement
                        </button>
                    </div>
                </div>
            </form>
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