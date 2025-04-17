<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if($coinsUpdated)
                <div class="mb-4 bg-indigo-100 border border-indigo-400 text-indigo-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">Your 5 daily coins have been added! Keep logging in daily to maintain your streak.</span>
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold mb-2">Your Coins</h3>
                            <p class="text-3xl font-bold text-pink-600 dark:text-pink-400">{{ $stats['coins'] }}</p>
                            <div class="mt-2">
                                <a href="{{ route('coin-packages.index') }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">Get more coins</a>
                            </div>
                        </div>
                        
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold mb-2">Total Bets</h3>
                            <p class="text-3xl font-bold text-pink-600 dark:text-pink-400">{{ $stats['total_bets'] }}</p>
                        </div>
                        
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold mb-2">Coins Wasted</h3>
                            <p class="text-3xl font-bold text-pink-600 dark:text-pink-400">{{ $stats['total_coins_spent'] }}</p>
                        </div>
                        
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold mb-2">Login Streak</h3>
                            <p class="text-3xl font-bold text-pink-600 dark:text-pink-400">{{ $stats['consecutive_days'] }} days</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Quick Bet Section -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-4">Ready to Bet on Nothing?</h3>
                        <p class="mb-4">Place a bet and watch your coins disappear into the void!</p>
                        <div class="flex justify-center">
                            <a href="{{ route('bet.index') }}" class="px-4 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-700 transition duration-150">
                                Place a Bet
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Recent Bets Section -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-4">Recent Bets</h3>
                        @if($recentBets->isEmpty())
                            <p class="text-gray-500 dark:text-gray-400">You haven't placed any bets yet.</p>
                        @else
                            <div class="space-y-3">
                                @foreach($recentBets as $bet)
                                    <div class="bg-gray-100 dark:bg-gray-700 p-3 rounded-lg">
                                        <div class="flex justify-between items-center">
                                            <span class="font-semibold">{{ $bet->coins_spent }} coins</span>
                                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ $bet->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p class="text-sm italic mt-1">{{ $bet->message }}</p>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-4 text-right">
                                <a href="{{ route('profile.bet-history') }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">View all bets</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Achievements and Badges Section -->
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-4">Your Achievements</h3>
                        @if($achievements->isEmpty())
                            <p class="text-gray-500 dark:text-gray-400">You haven't earned any achievements yet.</p>
                        @else
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                                @foreach($achievements->take(6) as $achievement)
                                    <div class="bg-gray-100 dark:bg-gray-700 p-3 rounded-lg text-center">
                                        <div class="w-12 h-12 mx-auto bg-purple-600 rounded-full flex items-center justify-center mb-2">
                                            <span class="text-white">🏆</span>
                                        </div>
                                        <h4 class="font-semibold text-sm">{{ $achievement->name }}</h4>
                                    </div>
                                @endforeach
                            </div>
                            @if($achievements->count() > 6)
                                <div class="mt-4 text-right">
                                    <a href="{{ route('achievements.index') }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">View all achievements</a>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-4">Your Badges</h3>
                        @if($badges->isEmpty())
                            <p class="text-gray-500 dark:text-gray-400">You haven't earned any badges yet.</p>
                        @else
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                                @foreach($badges->take(6) as $badge)
                                    <div class="bg-gray-100 dark:bg-gray-700 p-3 rounded-lg text-center">
                                        <div class="w-12 h-12 mx-auto bg-green-600 rounded-full flex items-center justify-center mb-2">
                                            <span class="text-white">🏅</span>
                                        </div>
                                        <h4 class="font-semibold text-sm">{{ $badge->name }}</h4>
                                    </div>
                                @endforeach
                            </div>
                            @if($badges->count() > 6)
                                <div class="mt-4 text-right">
                                    <a href="{{ route('badges.index') }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">View all badges</a>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>