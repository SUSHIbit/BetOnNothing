<!-- resources/views/bet/result.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bet Result') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="max-w-lg mx-auto text-center">
                        <div class="mb-8">
                            <div class="w-24 h-24 mx-auto bg-pink-600 rounded-full flex items-center justify-center mb-4">
                                <span class="text-white text-4xl">🎉</span>
                            </div>
                            <h3 class="text-2xl font-bold mb-2">You've Bet {{ $bet->coins_spent }} Coins on Nothing!</h3>
                            <p class="text-gray-500 dark:text-gray-400 mb-6">...and as expected, you got nothing in return.</p>
                        </div>
                        
                        <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg mb-8">
                            <p class="text-xl italic mb-2">"{{ $bet->message }}"</p>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4 mb-8">
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                <p class="text-sm mb-1">Coins Remaining</p>
                                <p class="text-2xl font-bold text-pink-600 dark:text-pink-400">{{ $bet->user->coins }}</p>
                            </div>
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                <p class="text-sm mb-1">Total Bets Made</p>
                                <p class="text-2xl font-bold text-pink-600 dark:text-pink-400">{{ $bet->user->total_bets }}</p>
                            </div>
                        </div>
                        
                        <div class="flex justify-center space-x-4">
                            <a href="{{ route('bet.index') }}" class="px-4 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-700 transition duration-150">
                                Bet Again
                            </a>
                            <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition duration-150">
                                Back to Dashboard
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>