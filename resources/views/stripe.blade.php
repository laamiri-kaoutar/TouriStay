<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Reservation</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">

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
                        <a  href="{{ route('favorites') }}"  class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
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


    <!-- Main Content -->
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Reservation Summary -->
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Complete Your Reservation</h2>
                    
                    <div class="flex flex-col md:flex-row gap-6">
                        <!-- Property Image -->
                        <div class="md:w-1/3">
                            {{-- @if($annonce->image)
                            <img src="{{ asset('storage/' . $annonce->image) }}" alt="{{ $annonce->image }}" class="w-full h-40 object-cover rounded-lg">
                        @else
                            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Property image" class="w-full h-40 object-cover rounded-lg">
                        @endif --}}
                            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Property image" class="w-full h-40 object-cover rounded-lg">
                        </div>
                        
                        <!-- Reservation Details -->
                        <div class="md:w-2/3">
                            <h3 class="text-xl font-semibold text-gray-800">{{ $annonce->title }}</h3>
                            
                            <div class="flex items-center mt-2 text-sm text-gray-600">
                                <i class="fas fa-map-marker-alt text-red-500 mr-1"></i>
                                <span>{{ $annonce->location }}</span>
                            </div>
                            
                            <div class="mt-3 grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-500">Check-in</p>
                                    <p class="font-medium">{{ \Carbon\Carbon::parse($start)->format('M d, Y') }} </p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Check-out</p>
                                    <p class="font-medium">{{ \Carbon\Carbon::parse($end)->format('M d, Y') }}</p>
                                </div>
                            </div>
                            
                            <div class="mt-4 pt-4 border-t border-gray-100">
                                <div class="flex justify-between mb-2">
                                    <span class="text-gray-600">${{ $annonce->price }} x {{ $days }} nights</span>
                                    <span>${{ $subtotal  ?? ''}}</span>
                                </div>
                                <div class="flex justify-between mb-2">
                                    <span class="text-gray-600">Service fee</span>
                                    <span>${{ $service_fee ?? 'kkkk' }}</span>
                                </div>
                                <div class="flex justify-between font-bold text-lg mt-2 pt-2 border-t border-gray-100">
                                    <span>Total</span>
                                    <span>${{ $amount }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Payment Form -->
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Payment Details</h3>
                    
                    <form id="payment-form" action="{{ route('reservation.payement')}}" method="POST">
                        @csrf
                        
                        <!-- Hidden fields for reservation data -->
                        <input type="hidden" name="annonce_id" value="{{ $annonce->id }}">
                        <input type="hidden" name="start_date" value="{{ $start }}">
                        <input type="hidden" name="end_date" value="{{ $end }}">
                        <input type="hidden" name="days" value="{{ $days }}">
                        <input type="hidden" name="amount" value="{{ $amount }}">
                        {{-- <input type="hidden" name="stripeToken" value="{{ $stripe_key }}"> --}}

                        
                        <!-- Card Element Container -->
                        <div class="mb-4">
                            <label for="card-element" class="block text-sm font-medium text-gray-700 mb-2">
                                Credit or debit card
                            </label>
                            <div id="card-element" class="p-3 border border-gray-300 rounded-md shadow-sm">
                                <!-- Stripe Card Element will be inserted here -->
                            </div>
                            <!-- Used to display form errors -->
                            <div id="card-errors" class="mt-2 text-sm text-red-600" role="alert"></div>
                        </div>
                        
                        <!-- Cardholder Name -->
                        <div class="mb-4">
                            <label for="cardholder-name" class="block text-sm font-medium text-gray-700 mb-2">
                                Cardholder Name
                            </label>
                            <input type="text" id="cardholder-name" name="cardholder_name" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        
                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email for Receipt
                            </label>
                            <input type="email" id="email" name="email" value="{{ auth()->user()->email ?? '' }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        
                   
                        
                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" id="submit-button"
                                class="inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span id="button-text">Pay ${{ $amount }}</span>
                                <span id="spinner" class="hidden ml-2">
                                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER PLACEHOLDER: Replace this section with your footer -->
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
    <!-- END FOOTER PLACEHOLDER -->

    <!-- Stripe JS -->
    {{-- <script src="https://js.stripe.com/v3/"></script> --}}

    <script src="https://js.stripe.com/v3/"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // console.log('{{ $stripe_key }}');

            // Create a Stripe client
            const stripe = Stripe('{{ $stripe_key }}');
            const elements = stripe.elements();

            
            
            // Create an instance of the card Element
            const cardElement = elements.create('card', {
                style: {
                    base: {
                        color: '#32325d',
                        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                        fontSmoothing: 'antialiased',
                        fontSize: '16px',
                        '::placeholder': {
                            color: '#aab7c4'
                        }
                    },
                    invalid: {
                        color: '#fa755a',
                        iconColor: '#fa755a'
                    }
                }
            });
            
            // Add an instance of the card Element into the `card-element` div
            cardElement.mount('#card-element');
            
            // Handle real-time validation errors from the card Element
            cardElement.addEventListener('change', function(event) {
                const displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });
            
            // Handle form submission
            const form = document.getElementById('payment-form');
            const submitButton = document.getElementById('submit-button');
            const spinner = document.getElementById('spinner');
            const buttonText = document.getElementById('button-text');
            
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                
                // Disable the submit button to prevent repeated clicks
                submitButton.disabled = true;
                spinner.classList.remove('hidden');
                buttonText.textContent = 'Processing...';
                
                // Create a token 
                stripe.createToken(cardElement, {
                    name: document.getElementById('cardholder-name').value
                }).then(function(result) {
                    if (result.error) {
                        // Show error in the form
                        const errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                        
                        // Re-enable the submit button
                        submitButton.disabled = false;
                        spinner.classList.add('hidden');
                        buttonText.textContent = 'Pay ${{ $amount }}';
                    } else {
                        // Send the token to your server
                        const hiddenInput = document.createElement('input');
                        hiddenInput.setAttribute('type', 'hidden');
                        hiddenInput.setAttribute('name', 'stripeToken');
                        hiddenInput.setAttribute('value', result.token.id);
                        form.appendChild(hiddenInput);
                        
                        // Submit the form
                        form.submit();
                    }
                });
            });
        });
    </script>
</body>
</html>