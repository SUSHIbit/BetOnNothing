<!-- resources/views/coin-packages/purchase.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Purchase Coins') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="max-w-md mx-auto">
                        <h3 class="text-2xl font-bold mb-6 text-center">Purchase Confirmation</h3>
                        
                        <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg mb-6">
                            <h4 class="text-xl font-bold mb-4">{{ $coinPackage->name }}</h4>
                            
                            <div class="flex justify-between mb-2">
                                <span>Coins:</span>
                                <span class="font-bold text-pink-600 dark:text-pink-400">{{ $coinPackage->coins }}</span>
                            </div>
                            
                            <div class="flex justify-between mb-4">
                                <span>Price:</span>
                                <span class="font-bold">RM {{ number_format($coinPackage->price, 2) }}</span>
                            </div>
                            
                            @if($coinPackage->has_badge || $coinPackage->has_achievement || $coinPackage->has_animation)
                                <div class="border-t border-gray-300 dark:border-gray-600 pt-4 mt-4">
                                    <h5 class="font-semibold mb-2">Package Includes:</h5>
                                    <ul class="space-y-1">
                                        @if($coinPackage->has_badge)
                                            <li class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                                <span>Exclusive Badge</span>
                                            </li>
                                        @endif
                                        
                                        @if($coinPackage->has_achievement)
                                            <li class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                                <span>Exclusive Achievement</span>
                                            </li>
                                        @endif
                                        
                                        @if($coinPackage->has_animation)
                                            <li class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                                <span>Exclusive Animation</span>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            @endif
                        </div>
                        
                        <p class="text-center mb-6">Your current balance: <span class="font-bold text-pink-600 dark:text-pink-400">{{ $user->coins }} coins</span></p>
                        
                        <form action="{{ route('coin-packages.purchase', $coinPackage->id) }}" method="POST">
                            @csrf
                            
                            <!-- Note: In a real application, you would integrate with a payment gateway here -->
                            <div class="mb-6">
                                <label class="block text-sm font-medium mb-2">Payment Method</label>
                                <div class="bg-gray-100 dark:bg-gray-700 p-3 rounded-lg">
                                    <div class="flex items-center">
                                        <input type="radio" name="payment_method" id="payment_method_demo" value="demo" checked class="mr-2">
                                        <label for="payment_method_demo">Demo Payment (for testing)</label>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Note: This is a demo application. No actual payment will be processed.</p>
                            </div>
                            
                            <div class="flex justify-between">
                                <a href="{{ route('coin-packages.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition duration-150">
                                    Cancel
                                </a>
                                <button type="submit" class="px-4 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-700 transition duration-150">
                                    Confirm Purchase
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>