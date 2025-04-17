<!-- resources/views/bet/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Place a Bet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="max-w-lg mx-auto">
                        <h3 class="text-2xl font-bold mb-6 text-center">Ready to Bet on Nothing?</h3>
                        
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg mb-6">
                            <p class="text-center mb-2">Your Current Coins</p>
                            <p class="text-4xl font-bold text-center text-pink-600 dark:text-pink-400">{{ $user->coins }}</p>
                        </div>
                        
                        <div class="mb-6">
                            <p class="text-center mb-4">What happens when you bet? <span class="font-bold text-pink-600 dark:text-pink-400">Absolutely nothing!</span></p>
                            <p class="text-center mb-4">But hey, you'll get a funny message and maybe an achievement if you're lucky.</p>
                        </div>
                        
                        <form action="{{ route('bet.place') }}" method="POST" class="mb-6">
                            @csrf
                            
                            <div class="mb-4">
                                <label for="coins" class="block text-sm font-medium mb-2">How many coins to waste?</label>
                                <input type="range" name="coins" id="coins" min="1" max="{{ min($user->coins, 100) }}" value="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                                <div class="flex justify-between mt-2">
                                    <span>1</span>
                                    <span class="font-bold text-pink-600 dark:text-pink-400" id="coinsDisplay">1</span>
                                    <span>{{ min($user->coins, 100) }}</span>
                                </div>
                            </div>
                            
                            <div class="mt-8 flex justify-center">
                                <button type="submit" class="px-6 py-3 bg-pink-600 text-white font-bold rounded-lg hover:bg-pink-700 transition duration-150 text-xl">
                                    Bet on Nothing!
                                </button>
                            </div>
                        </form>
                        
                        <p class="text-center text-sm text-gray-500 dark:text-gray-400">
                            Remember: The more you bet, the more nothing you get!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const coinsInput = document.getElementById('coins');
        const coinsDisplay = document.getElementById('coinsDisplay');
        
        coinsInput.addEventListener('input', function() {
            coinsDisplay.textContent = this.value;
        });
    </script>
</x-app-layout>

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