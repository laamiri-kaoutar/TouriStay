<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements Management | Tourism Platform</title>
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
                            <div class="h-8 w-8 rounded-full bg-indigo-700 flex items-center justify-center">
                                <i class="fas fa-user"></i>
                            </div>
                            <span class="ml-2">Admin User</span>
                        </div>
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
                    <a href="/admin" class="flex items-center py-3 px-6 text-gray-600 hover:bg-gray-50 hover:text-gray-900">
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
                    <a href="#" class="flex items-center py-3 px-6 bg-indigo-50 text-indigo-700 border-l-4 border-indigo-600">
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
                <div class="mb-6 flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Announcements Management</h1>
                        <p class="mt-1 text-gray-600">View, approve, edit, or delete announcement listings.</p>
                    </div>
                    <div>
                        <button class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="fas fa-plus mr-2"></i> Add New Announcement
                        </button>
                    </div>
                </div>

                <!-- Filters and Search -->
                <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div class="flex-1">
                            <div class="relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-gray-400"></i>
                                </div>
                                <input type="text" placeholder="Search announcements by title, location, or owner..." class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md py-2">
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <select class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option>All Status</option>
                                <option>Active</option>
                                <option>Pending</option>
                                <option>Expired</option>
                            </select>
                            <select class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option>Sort By: Newest</option>
                                <option>Sort By: Oldest</option>
                                <option>Sort By: Price High-Low</option>
                                <option>Sort By: Price Low-High</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Announcements List -->
                <div class="bg-white shadow overflow-hidden sm:rounded-md">
                    <ul class="divide-y divide-gray-200">

                        @foreach ($annonces as $annonce)

                        <li>
                            <div class="px-4 py-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <div class="flex flex-col sm:flex-row sm:items-center">
                                        <p class="text-sm font-medium text-indigo-600 truncate">{{ Str::limit($annonce->title, 35) }}</p>
                                        <div class="mt-2 sm:mt-0 sm:ml-2 flex-shrink-0 flex">
                                            <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                {{ ucfirst($annonce->type) }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex flex-shrink-0 ml-2">
                                        <button class="p-1 rounded-full text-gray-400 hover:text-indigo-600 mr-2" title="View">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="p-1 rounded-full text-gray-400 hover:text-yellow-600 mr-2" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        {{-- <form action="{{ route('annonce.delete', $annonce->id) }}" method="post">
                                            @csrf 
                                            @method('Delete')
                                            <button type="submit" class="p-1 rounded-full text-gray-400 hover:text-red-600" title="Delete" role="menuitem">
                                                <i class="fas fa-trash"> </i> 
                                                
                                            </button>

                                        </form> --}}



                                        <button onclick="toggleModal({{ $annonce->id }})" class="p-1 rounded-full text-gray-400 hover:text-red-600" title="Delete" onclick="document.getElementById('deleteModal').classList.remove('hidden')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-2 sm:flex sm:justify-between">
                                    <div class="sm:flex">
                                        <p class="flex items-center text-sm text-gray-500">
                                            <i class="fas fa-map-marker-alt flex-shrink-0 mr-1.5 text-gray-400"></i>
                                            {{ Str::limit($annonce->location, 40) }}
                                        </p>
                                        <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                            <i class="fas fa-dollar-sign flex-shrink-0 mr-1.5 text-gray-400"></i>
                                            ${{ number_format($annonce->price, 2) }} / night
                                        </p>
                                        <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                            <i class="fas fa-bed flex-shrink-0 mr-1.5 text-gray-400"></i>
                                            <span>{{ $annonce->bathrooms }} {{ Str::plural('bathroom', $annonce->bathrooms) }}</span>
                                            
                                        </p>
                                        <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                            <i class="fas fa-door-open flex-shrink-0 mr-1.5 text-gray-400"></i>
                                            <span>{{ $annonce->rooms }} {{ Str::plural('room', $annonce->rooms) }}</span>                           
                                        </p>
                                    </div>
                                    <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                        <i class="fas fa-calendar flex-shrink-0 mr-1.5 text-gray-400"></i>
                                        <p>
                                            Posted on <time datetime="2024-01-15">{{ \Carbon\Carbon::parse($annonce->created_at)->format('M d, Y') }}</time>
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-2 sm:flex sm:justify-between">
                                    <div class="sm:flex">
                                        <p class="flex items-center text-sm text-gray-500">
                                            <i class="fas fa-user flex-shrink-0 mr-1.5 text-gray-400"></i>
                                            {{ $annonce->owner->name }} (Property Owner)
                                        </p>
                                    </div>
                                    <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                        <i class="fas fa-star flex-shrink-0 mr-1.5 text-yellow-400"></i>
                                        <p>
                                            4.9 (128 reviews)
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>


                        @endforeach
                        <!-- Announcement Item 1 -->

                        
                    </ul>
                </div>

                <!-- Pagination -->
                <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6 mt-4 rounded-lg shadow-sm">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Previous
                        </a>
                        <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Next
                        </a>
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span class="font-medium">36</span> results
                            </p>
                        </div>
                        <div>
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
                                    9
                                </a>
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Next</span>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <i class="fas fa-exclamation-triangle text-red-600"></i>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Delete Announcement
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Are you sure you want to delete this announcement? This action cannot be undone and all data associated with this listing will be permanently removed from our servers.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    {{-- <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Delete
                    </button> --}}
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="annonce_id" name="annonce_id">
                        <button type="submit" class="bg-red-500 mx-3 text-white px-4 py-2 rounded">Confirmer</button>
                    </form>
            

                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="document.getElementById('deleteModal').classList.add('hidden')">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simple JavaScript to handle the modal toggle
        const inputId = document.getElementById('annonce_id');
        const form = document.getElementById('deleteForm'); // Récupère le formulaire


        function toggleModal(id='') {
            const modal = document.getElementById('deleteModal');
            if (modal.classList.contains('hidden')) {
                inputId.value = id || '';
                form.action = `/annonce/${id}`;

                modal.classList.remove('hidden');
            } else {
                modal.classList.add('hidden');
            }
        }
    </script>
</body>
</html>