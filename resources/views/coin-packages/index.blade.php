<!-- resources/views/coin-packages/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Coin Packages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-bold mb-2">Get More Coins to Bet on Nothing!</h3>
                        <p class="text-gray-500 dark:text-gray-400">Your current balance: <span class="font-bold text-pink-600 dark:text-pink-400">{{ $user->coins }} coins</span></p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($coinPackages as $package)
                            <div class="bg-gray-100 dark:bg-gray-700 rounded-lg overflow-hidden {{ $package->has_badge || $package->has_achievement || $package->has_animation ? 'border-2 border-pink-500' : '' }}">
                                <div class="p-5">
                                    <h4 class="text-xl font-bold mb-2">{{ $package->name }}</h4>
                                    <p class="text-3xl font-bold text-pink-600 dark:text-pink-400 mb-4">{{ $package->coins }} coins</p>
                                    <p class="text-lg mb-4">RM {{ number_format($package->price, 2) }}</p>
                                    
                                    @if($package->description)
                                        <p class="text-sm mb-4">{{ $package->description }}</p>
                                    @endif
                                    
                                    <div class="mb-4">
                                        @if($package->has_badge)
                                            <div class="flex items-center mb-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                                <span class="text-sm">Includes exclusive badge</span>
                                            </div>
                                        @endif
                                        
                                        @if($package->has_achievement)
                                            <div class="flex items-center mb-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                                <span class="text-sm">Includes exclusive achievement</span>
                                            </div>
                                        @endif
                                        
                                        @if($package->has_animation)
                                            <div class="flex items-center mb-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                                <span class="text-sm">Includes exclusive animation</span>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div class="mt-auto">
                                        <a href="{{ route('coin-packages.show-purchase', $package->id) }}" class="block w-full py-2 px-4 bg-pink-600 hover:bg-pink-700 text-white text-center rounded-lg transition duration-150">
                                            Purchase
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-3 text-center py-8">
                                <p class="text-gray-500 dark:text-gray-400">No coin packages available at the moment.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Why Buy Coins?</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-6 w-6 text-pink-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-md font-medium">Bet More, Get Nothing More</h4>
                                <p class="text-gray-500 dark:text-gray-400">The more coins you have, the more you can bet on nothing!</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-6 w-6 text-pink-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-md font-medium">Unlock Exclusive Badges & Achievements</h4>
                                <p class="text-gray-500 dark:text-gray-400">Some badges and achievements are only available through purchases.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-6 w-6 text-pink-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-md font-medium">Climb the Leaderboard</h4>
                                <p class="text-gray-500 dark:text-gray-400">More coins = more bets = higher ranking on the leaderboard!</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-6 w-6 text-pink-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-md font-medium">Support Nothingness</h4>
                                <p class="text-gray-500 dark:text-gray-400">Your purchase helps us continue to provide you with absolutely nothing!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

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