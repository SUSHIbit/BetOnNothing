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