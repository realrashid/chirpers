<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Billing') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="py-16">
                <div class="container mx-auto" x-data="{ showUpdatePaymentMethodModal: false, interval: 'Monthly', show: false }">
                    @if ($subscription)
                        <form action="{{ route('switchSubscription') }}" method="POST" class="flex">
                            @csrf
                            <div class="bg-white rounded-lg shadow-lg p-8 mb-8 w-1/2 mr-8">
                                <h2 class="text-4xl font-bold mb-4 text-indigo-500">Your Subscription</h2>
                                <h2 class="text-2xl font-bold mb-4 text-indigo-500">{{ $subscription->name }}</h2>
                                <p class="text-gray-700 text-lg mb-2">{{ $subscription->description }}</p>
                                <p class="text-indigo-600 text-xl font-bold">${{ $subscription->price->monthly }}/month
                                </p>
                                <p class="text-gray-600 text-sm mt-2 font-semibold">
                                    Default payment method: {{ $defaultPaymentMethod->card->brand }}
                                    ****{{ $defaultPaymentMethod->card->last4 }}
                                    <a class="text-indigo-600 ml-2 hover:underline focus:outline-none cursor-pointer"
                                        x-on:click="showUpdatePaymentMethodModal = true">
                                        Update Payment Method
                                    </a>
                                </p>

                            </div>
                            <div class="flex flex-col w-1/2">
                                <h2 class="text-3xl font-bold mb-4 text-indigo-500">Switch Plans</h2>
                                <div class="flex justify-center mb-4">
                                    <a x-on:click="interval = 'Monthly'"
                                        :class="{
                                            'bg-indigo-500 text-white': interval ===
                                                'Monthly',
                                            'bg-gray-200 text-gray-800': interval !== 'Monthly'
                                        }"
                                        class="py-2 px-4 rounded-full mr-4 cursor-pointer">
                                        Monthly
                                    </a>
                                    <a x-on:click="interval = 'Yearly'"
                                        :class="{
                                            'bg-indigo-500 text-white': interval ===
                                                'Yearly',
                                            'bg-gray-200 text-gray-800': interval !== 'Yearly'
                                        }"
                                        class="py-2 px-4 rounded-full cursor-pointer">
                                        Yearly
                                    </a>
                                </div>
                                <div class="space-y-4">
                                    @foreach ($plans as $plan)
                                        <div class="relative">
                                            <input type="hidden" name="interval" x-bind:value="interval">

                                            <input class="sr-only peer" type="radio" name="planKey"
                                                value="{{ $plan->key }}" id="{{ $plan->key }}"
                                                {{ $plan->key === $subscription->key ? 'checked' : '' }}>
                                            <label for="{{ $plan->key }}"
                                                class="flex items-center h-24 px-8 bg-white bg-opacity-50 border border-gray-300 rounded cursor-pointer transform transition duration-300 hover:scale-105 peer-checked:bg-indigo-100 ring-opacity-50 ring-indigo-600 peer-checked:ring-2 group">
                                                <div
                                                    class="flex items-center justify-center w-6 h-6 border border-gray-600 rounded-full peer-checked:group:bg-indigo-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="hidden w-4 h-4 text-indigo-200 fill-current peer-checked:group:visible"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                <div class="flex flex-col ml-6">
                                                    <span
                                                        class="text-xl font-medium text-gray-800">{{ $plan->name }}</span>
                                                    <span
                                                        class="text-sm font-light text-gray-600">{{ $plan->description }}</span>
                                                </div>
                                                <span class="ml-auto text-1xl font-bold text-indigo-600"
                                                    x-text="interval === 'Monthly' ? '${{ $plan->price->monthly }}/month' : '${{ $plan->price->yearly }}/year'">
                                                </span>
                                                <!-- Display the yearly incentive in top right corner -->
                                                <span
                                                    class="absolute -top-2 right-0 mt-2 p-2 bg-indigo-500 text-white text-sm font-medium rounded"
                                                    x-show="interval === 'Yearly' && '{{ $plan->yearlyIncentive }}'">
                                                    {{ $plan->yearlyIncentive }}
                                                </span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="submit"
                                    class="bg-indigo-600 text-white py-3 px-6 rounded-full hover:bg-indigo-700 transition duration-300 ease-in-out transform hover:-translate-y-1 self-end mt-6">
                                    Switch
                                </button>
                            </div>

                        </form>

                        <button class="bg-red-500 text-white py-2 px-4 rounded-full hover:bg-red-600"
                            x-on:click="show = true">
                            Cancel Subscription
                        </button>

                        <x-cancel-subscription-modal />

                        <x-update-payments-method-modal :intent="$intent" />
                    @else
                        <div class="mb-8">
                            <h2 class="text-4xl font-bold mb-4 text-indigo-500 text-center">Choose a Plan</h2>
                            <div class="flex justify-center mb-6">
                                <button x-on:click="interval = 'Monthly'"
                                    :class="{
                                        'bg-indigo-500 text-white': interval === 'Monthly',
                                        'bg-gray-200 text-gray-800': interval !== 'Monthly'
                                    }"
                                    class="py-2 px-4 rounded-full mr-4 transition-transform transform hover:scale-105">
                                    Monthly
                                </button>
                                <button x-on:click="interval = 'Yearly'"
                                    :class="{
                                        'bg-indigo-500 text-white': interval === 'Yearly',
                                        'bg-gray-200 text-gray-800': interval !== 'Yearly'
                                    }"
                                    class="py-2 px-4 rounded-full transition-transform transform hover:scale-105">
                                    Yearly
                                </button>
                            </div>
                            <form id="payment-form" class="flex" action="{{ route('subscribe') }}" method="POST">
                                @csrf
                                <div class="w-1/1 pr-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                        @foreach ($plans as $plan)
                                            <label
                                                class="relative block p-6 bg-white border border-gray-200 rounded-lg shadow-lg transform transition duration-300 hover:scale-105 cursor-pointer">

                                                <!-- The hidden input with name 'interval' -->
                                                <input type="hidden" name="interval" x-bind:value="interval">

                                                <input type="radio" name="planKey" value="{{ $plan->key }}"
                                                    {{ $plan->key == 'pro' ? 'checked' : '' }}
                                                    class="absolute -top-2 -left-2 h-5 w-5 text-indigo-600 border border-gray-300 focus:ring-indigo-500">

                                                <div class="text-center mb-4">
                                                    <h4 class="text-2xl font-bold text-indigo-600 mb-4">
                                                        {{ $plan->name }}</h4>
                                                    <div class="text-gray-700 mb-4 text-[12px]">
                                                        @if ($plan->trialDays)
                                                            <p class="text-indigo-600">Trial for {{ $plan->trialDays }}
                                                                days</p>
                                                        @endif
                                                    </div>
                                                    <p class="text-gray-600 text-sm">{{ $plan->description }}</p>
                                                </div>

                                                <ul class="text-gray-700 text-left mt-2">
                                                    @foreach ($plan->features as $feature)
                                                        <li class="flex items-center mb-2">
                                                            <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z">
                                                                </path>
                                                            </svg>
                                                            {{ $feature }}
                                                        </li>
                                                    @endforeach
                                                </ul>

                                                <div class="text-center mt-6">
                                                    <span class="block text-2xl font-bold text-indigo-600"
                                                        x-text="interval === 'Monthly' ? '${{ $plan->price->monthly }}/month' : '${{ $plan->price->yearly }}/year'">
                                                    </span>
                                                    <!-- Display the incentive (yearly) if interval is 'Yearly' -->
                                                    <span class="block text-sm text-indigo-500 font-bold mb-2 mt-2"
                                                        x-show="interval === 'Yearly' && '{{ $plan->yearlyIncentive }}'">
                                                        {{ $plan->yearlyIncentive }}
                                                    </span>
                                                </div>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Stripe Elements container -->
                                <div class="w-1/3">
                                    <div id="stripe-element-container" class="p-6 bg-white rounded-lg shadow-lg mb-4">
                                        <div>
                                            <label for="card-element" class="block text-sm font-medium text-gray-700">
                                                {{ __('Card Information') }}
                                            </label>
                                            <div id="card-element" class="mt-1 rounded-md border border-indigo-300 p-4">
                                                <!-- A Stripe Element will be inserted here. -->
                                            </div>

                                            <!-- Used to display form errors. -->
                                            <div id="card-errors" class="mt-2 text-sm text-red-600 space-y-1"
                                                role="alert"></div>
                                        </div>
                                    </div>

                                    <button type="submit" id="card-button" data-secret="{{ $intent->client_secret }}"
                                        class="bg-indigo-600 text-white py-3 px-6 rounded-full hover:bg-indigo-700 transition duration-300 ease-in-out transform hover:-translate-y-1 w-full">
                                        Subscribe Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endif

                </div>
            </section>
        </div>
    </div>


    @push('styles')
        <style>
            .peer:checked~.group .peer-checked\:group\:bg-indigo-600 {
                background-color: #4F46E5;
                border: none;
            }

            .peer:checked~.group .peer-checked\:group\:visible {
                display: block;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            var stripe = Stripe("{{ config('services.stripe.key') }}");
            var elements = stripe.elements();
            var cardBtn = document.getElementById('card-button');

            var card = elements.create('card', {
                style: {
                    base: {
                        color: '#32325d',
                        fontFamily: 'Arial, sans-serif',
                        fontSmoothing: 'antialiased',
                        fontSize: '16px',
                        '::placeholder': {
                            color: '#a0aec0',
                        },
                    },
                    invalid: {
                        color: '#fa755a',
                        iconColor: '#fa755a',
                    },
                },
            });

            card.mount('#card-element');

            var paymentIntentClientSecret; // This will be set by the server

            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Create a PaymentIntent when the form is submitted.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', async (e) => {
                e.preventDefault()

                cardBtn.disabled = true
                const {
                    setupIntent,
                    error
                } = await stripe.confirmCardSetup(
                    cardBtn.dataset.secret, {
                        payment_method: {
                            card: card
                        }
                    }
                )

                if (error) {
                    cardBtn.disable = false
                } else {
                    let token = document.createElement('input')
                    token.setAttribute('type', 'hidden')
                    token.setAttribute('name', 'token')
                    token.setAttribute('value', setupIntent.payment_method)
                    form.appendChild(token)
                    form.submit();
                }
            });
        </script>
    @endpush

</x-app-layout>
