<div x-show="show" style="display: none;" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0">
    <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false"
        x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-75"></div>
    </div>
    <div class="fixed inset-0 flex items-center justify-center z-50" x-trap.inert.noscroll="show"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
        <div
            class="modal-container mb-6 bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm sm:mx-auto max-w-screen-md mx-auto">
            <!-- Modal content -->
            <div class="modal-content py-4 text-left px-6">
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Cancel Subscription</p>
                    <button @click="show = false" class="text-gray-700 cursor-pointer focus:outline-none">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <p class="text-gray-800 mb-6">Are you sure you want to cancel your subscription?</p>
                <div class="flex justify-end">
                    <button @click="show = false"
                        class="bg-gray-200 text-gray-800 py-2 px-4 rounded-full mr-2 focus:outline-none">
                        Cancel
                    </button>
                    <form action="{{ route('cancelSubscription') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-red-500 text-white py-2 px-4 rounded-full hover:bg-red-600 focus:outline-none">
                            Confirm
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
