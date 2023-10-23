<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css'])
    @livewireStyles
</head>

<body class="antialiased bg-gray-100 font-roboto">

    <!-- Nav Menu Section -->
    <nav class="bg-indigo-700 p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <a href="/" class="text-white text-lg font-bold">Chirpers</a>
            </div>
            <div class="flex items-center space-x-4">
                <a href="#features" class="text-white hover:text-indigo-100">Features</a>
                <a href="#pricing" class="text-white hover:text-indigo-100">Pricing</a>
                <a href="#faqs" class="text-white hover:text-indigo-100">FAQs</a>
                <a href="{{ route('login') }}" class="text-white hover:text-indigo-100">Login</a>
                <a href="{{ route('register') }}"
                    class="bg-indigo-100 text-indigo-800 py-2 px-4 rounded-full hover:bg-indigo-200 shadow-md transition duration-300 ease-in-out transform hover:-translate-y-1">Sign
                    Up</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-indigo-700 text-white py-24 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <!-- Content Column -->
        <div class="text-center md:text-left px-8">
            <h1 class="text-5xl mb-4 font-bold leading-tight">Welcome to Chirpers </h1>
            <p class="text-lg mb-8">Connect and Collaborate with Teams Effortlessly</p>
            <a href="#"
                class="bg-indigo-100 text-indigo-800 py-3 px-6 rounded-full hover:bg-indigo-200 shadow-md transition duration-300 ease-in-out transform hover:-translate-y-1">Get
                Started</a>
        </div>

        <!-- Image Column with Right Margin -->
        <div class="hidden md:block w-2/2 mr-8">
            <img src="app.png" alt="Background Image" class="w-full h-full object-cover rounded-lg shadow-lg">
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-gray-100" id="features">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div
                    class="bg-white p-8 card shadow-lg hover:shadow-xl rounded-lg transition-transform transform hover:-translate-y-1">
                    <div class="text-3xl mb-4 text-indigo-500">
                        <svg class="w-10 h-10 inline-block mr-2 feature-icon" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg> Feature 1
                    </div>
                    <div class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</div>
                </div>

                <!-- Feature 2 -->
                <div
                    class="bg-white p-8 card shadow-lg hover:shadow-xl rounded-lg transition-transform transform hover:-translate-y-1">
                    <div class="text-3xl mb-4 text-indigo-500">
                        <svg class="w-10 h-10 inline-block mr-2 feature-icon" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg> Feature 2
                    </div>
                    <div class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad minim
                        veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                </div>

                <!-- Feature 3 -->
                <div
                    class="bg-white p-8 card shadow-lg hover:shadow-xl rounded-lg transition-transform transform hover:-translate-y-1">
                    <div class="text-3xl mb-4 text-indigo-500">
                        <svg class="w-10 h-10 inline-block mr-2 feature-icon" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg> Feature 3
                    </div>
                    <div class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis aute irure
                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</div>
                </div>

                <!-- Feature 4 -->
                <div
                    class="bg-white p-8 card shadow-lg hover:shadow-xl rounded-lg transition-transform transform hover:-translate-y-1">
                    <div class="text-3xl mb-4 text-indigo-500">
                        <svg class="w-10 h-10 inline-block mr-2 feature-icon" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg> Feature 4
                    </div>
                    <div class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis aute irure
                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</div>
                </div>

                <!-- Feature 5 -->
                <div
                    class="bg-white p-8 card shadow-lg hover:shadow-xl rounded-lg transition-transform transform hover:-translate-y-1">
                    <div class="text-3xl mb-4 text-indigo-500">
                        <svg class="w-10 h-10 inline-block mr-2 feature-icon" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg> Feature 5
                    </div>
                    <div class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis aute irure
                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</div>
                </div>

                <!-- Feature 6 -->
                <div
                    class="bg-white p-8 card shadow-lg hover:shadow-xl rounded-lg transition-transform transform hover:-translate-y-1">
                    <div class="text-3xl mb-4 text-indigo-500">
                        <svg class="w-10 h-10 inline-block mr-2 feature-icon" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg> Feature 6
                    </div>
                    <div class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis aute irure
                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</div>
                </div>

            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="bg-gray-200 py-16 text-center" id="pricing" x-data="{ interval: 'Monthly' }">
        <div class="container mx-auto">
            <div class="mb-8">
                <h2 class="text-4xl font-bold mb-4 text-indigo-500">Pricing Plans</h2>
                <p class="text-gray-700">Choose a plan that works for you and get started today!</p>
            </div>
            <div class="flex justify-center mb-6">
                <button @click="interval = 'Monthly'"
                    :class="{
                        'bg-indigo-500 text-white': interval === 'Monthly',
                        'bg-gray-300 text-gray-800': interval !== 'Monthly'
                    }"
                    class="py-2 px-4 rounded-full mr-4 transition-transform transform hover:scale-105">
                    Monthly
                </button>
                <button @click="interval = 'Yearly'"
                    :class="{
                        'bg-indigo-500 text-white': interval === 'Yearly',
                        'bg-gray-300 text-gray-800': interval !== 'Yearly'
                    }"
                    class="py-2 px-4 rounded-full transition-transform transform hover:scale-105">
                    Yearly
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($plans as $plan)
                    <div
                        class="bg-white p-8 card shadow-lg transform transition duration-300 hover:scale-105 rounded-lg">
                        <div class="text-3xl mb-4 font-bold text-indigo-500">{{ $plan->name }}</div>
                        <div class="mb-4 block text-2xl font-bold text-indigo-600"
                            x-text="interval === 'Monthly' ? '${{ $plan->price->monthly }}/month' : '${{ $plan->price->yearly }}/year'">
                        </div>

                        <!-- Incentive Display -->
                        <div x-show="interval === 'Monthly' && '{{ $plan->monthlyIncentive }}'">
                            <div class="text-indigo-500 font-bold mb-2">
                                {{ $plan->monthlyIncentive }}
                            </div>
                        </div>
                        <div x-show="interval === 'Yearly' && '{{ $plan->yearlyIncentive }}'">
                            <div class="text-indigo-500 font-bold mb-2">
                                {{ $plan->yearlyIncentive }}
                            </div>
                        </div>

                        <ul class="text-gray-700 text-left mb-6">
                            @foreach ($plan->features as $feature)
                                <li class="mb-2 flex items-center">
                                    <svg class="w-6 h-6 mr-2 text-indigo-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg> {{ $feature }}
                                </li>
                            @endforeach
                        </ul>
                        <p class="text-gray-700 mb-9 text-[12px]">{{ $plan->description }}</p>
                        @if ($plan->trialDays)
                            <a href="/register"
                                class="bg-indigo-500 text-white py-3 px-6 rounded-full hover:bg-indigo-600 transition duration-300 ease-in-out transform hover:-translate-y-1">

                                Try for Now {{ $plan->trialDays }} days
                            </a>
                        @else
                            <a href="/register"
                                class="bg-indigo-500 text-white py-3 px-6 rounded-full hover:bg-indigo-600 transition duration-300 ease-in-out transform hover:-translate-y-1">
                                Subscribe Now
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- FAQ Section -->
    <section class="py-16 bg-gray-100" id="faqs">
        <div class="container mx-auto">
            <div class="mb-8 text-center">
                <h2 class="text-4xl font-bold mb-4 text-indigo-500">Frequently Asked Questions</h2>
                <p class="text-gray-700">Here are some common questions about our services</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- FAQ 1 -->
                <div class="bg-white p-8 card shadow-lg hover:shadow-xl rounded-lg">
                    <div class="text-3xl mb-4 font-bold text-indigo-500">FAQ 1</div>
                    <div class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                </div>

                <!-- FAQ 2 -->
                <div class="bg-white p-8 card shadow-lg hover:shadow-xl rounded-lg">
                    <div class="text-3xl mb-4 font-bold text-indigo-500">FAQ 2</div>
                    <div class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                </div>

                <!-- FAQ 3 -->
                <div class="bg-white p-8 card shadow-lg hover:shadow-xl rounded-lg">
                    <div class="text-3xl mb-4 font-bold text-indigo-500">FAQ 3</div>
                    <div class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                </div>

                <!-- FAQ 4 -->
                <div class="bg-white p-8 card shadow-lg hover:shadow-xl rounded-lg">
                    <div class="text-3xl mb-4 font-bold text-indigo-500">FAQ 4</div>
                    <div class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                </div>

                <!-- FAQ 5 -->
                <div class="bg-white p-8 card shadow-lg hover:shadow-xl rounded-lg">
                    <div class="text-3xl mb-4 font-bold text-indigo-500">FAQ 5</div>
                    <div class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                </div>

                <!-- FAQ 6 -->
                <div class="bg-white p-8 card shadow-lg hover:shadow-xl rounded-lg">
                    <div class="text-3xl mb-4 font-bold text-indigo-500">FAQ 6</div>
                    <div class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto flex flex-col items-center">
            <p class="text-lg mb-4">&copy; 2023 {{ config('app.name') }}. All Rights Reserved.</p>

            <div class="flex space-x-4 mb-8">
                <a href="#" class="text-indigo-500 hover:text-indigo-600 transition duration-300">Home</a>
                <a href="#" class="text-indigo-500 hover:text-indigo-600 transition duration-300">About Us</a>
                <a href="#" class="text-indigo-500 hover:text-indigo-600 transition duration-300">Services</a>
                <a href="#" class="text-indigo-500 hover:text-indigo-600 transition duration-300">Contact</a>
                <a href="#" class="text-indigo-500 hover:text-indigo-600 transition duration-300">Privacy</a>
                <a href="#" class="text-indigo-500 hover:text-indigo-600 transition duration-300">Terms</a>
            </div>
        </div>
    </footer>
    @livewireScripts

    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>
