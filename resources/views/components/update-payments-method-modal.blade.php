@props(['intent'])

<div x-show="showUpdatePaymentMethodModal" id="showUpdatePaymentMethodModal"
    class="jetstream-modal fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50" style="display: none;">
    <div x-show="showUpdatePaymentMethodModal" class="fixed inset-0 transform transition-all"
        x-on:click="showUpdatePaymentMethodModal = false" x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
        <div class="absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-75"></div>
    </div>

    <div x-show="showUpdatePaymentMethodModal"
        class="mb-6 bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm sm:mx-auto max-w-screen-md mx-auto"
        x-trap.inert.noscroll="showUpdatePaymentMethodModal" x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
        <form id="payment-form" action="{{ route('updatePaymentMethod') }}" method="POST">
            <div class="px-6 py-4">
                <div class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Update Payment Method
                </div>

                @csrf
                <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
                    <!-- Include the Stripe Element container here -->
                    <div>
                        <label for="card-element" class="block text-sm font-medium text-gray-700">
                            {{ __('Card Information') }}
                        </label>
                        <div id="card-element" class="mt-1 rounded-md border border-indigo-300 p-4">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors. -->
                        <div id="card-errors" class="mt-2 text-sm text-red-600 space-y-1" role="alert"></div>
                    </div>
                </div>

            </div>

            <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 dark:bg-gray-800 text-right">
                <button id="card-button" data-secret="{{ $intent->client_secret }}"
                    class="bg-indigo-600 text-white py-3 px-6 rounded-full hover:bg-indigo-700 transition duration-300 ease-in-out transform hover:-translate-y-1">
                    Update Payment Method
                </button>

            </div>
        </form>
    </div>
</div>
