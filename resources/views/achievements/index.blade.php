<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your Badges') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-6">Badges Earned: {{ $badges->count() }}</h3>
                    
                    @if($badges->isEmpty())
                        <div class="text-center py-8">
                            <p class="text-gray-500 dark:text-gray-400 mb-4">You haven't earned any badges yet.</p>
                            <p>Purchase coin packages or reach the leaderboard to earn badges!</p>
                            <div class="mt-6">
                                <a href="{{ route('coin-packages.index') }}" class="px-4 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-700 transition duration-150">
                                    View Coin Packages
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($badges as $badge)
                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                    <div class="flex items-center mb-4">
                                        <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mr-4">
                                            <span class="text-white text-xl">🏅</span>
                                        </div>
                                        <h4 class="font-bold">{{ $badge->name }}</h4>
                                    </div>
                                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">{{ $badge->description }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Earned: {{ $badge->pivot->created_at->format('M d, Y') }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Available Badges Section -->
            <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-6">Available Badges</h3>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg opacity-75">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-gray-500 rounded-full flex items-center justify-center mr-4">
                                    <span class="text-white text-xl">🏅</span>
                                </div>
                                <h4 class="font-bold">Void Supporter</h4>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Purchase the "Void Pro" package or higher.</p>
                        </div>
                        
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg opacity-75">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-gray-500 rounded-full flex items-center justify-center mr-4">
                                    <span class="text-white text-xl">🏅</span>
                                </div>
                                <h4 class="font-bold">Void Master</h4>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Purchase the "Void Master Pack".</p>
                        </div>
                        
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg opacity-75">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-gray-500 rounded-full flex items-center justify-center mr-4">
                                    <span class="text-white text-xl">🏅</span>
                                </div>
                                <h4 class="font-bold">Void Emperor</h4>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Reach the top position on the leaderboard.</p>
                        </div>
                        
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg opacity-75">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-gray-500 rounded-full flex items-center justify-center mr-4">
                                    <span class="text-white text-xl">🏅</span>
                                </div>
                                <h4 class="font-bold">Daily Devotee</h4>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Log in for 30 consecutive days.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>