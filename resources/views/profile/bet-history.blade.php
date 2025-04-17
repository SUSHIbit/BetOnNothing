<!-- resources/views/profile/bet-history.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bet History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-6">Your Betting History</h3>
                    
                    @if($bets->isEmpty())
                        <div class="text-center py-8">
                            <p class="text-gray-500 dark:text-gray-400 mb-4">You haven't placed any bets yet.</p>
                            <div class="mt-4">
                                <a href="{{ route('bet.index') }}" class="px-4 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-700 transition duration-150">
                                    Place Your First Bet
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Date</th>
                                        <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Coins Spent</th>
                                        <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Message</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($bets as $bet)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $bet->created_at->format('M d, Y H:i:s') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-pink-600 dark:text-pink-400">{{ $bet->coins_spent }}</td>
                                            <td class="px-6 py-4 text-sm">{{ $bet->message }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-6">
                            {{ $bets->links() }}
                        </div>
                        
                        <div class="mt-6 text-center">
                            <a href="{{ route('bet.index') }}" class="px-4 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-700 transition duration-150">
                                Place Another Bet
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Bet Statistics -->
            <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Betting Statistics</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                            <h4 class="text-sm font-medium mb-2">Total Bets</h4>
                            <p class="text-2xl font-bold text-pink-600 dark:text-pink-400">{{ $user->total_bets }}</p>
                        </div>
                        
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                            <h4 class="text-sm font-medium mb-2">Total Coins Spent</h4>
                            <p class="text-2xl font-bold text-pink-600 dark:text-pink-400">{{ $user->total_coins_spent }}</p>
                        </div>
                        
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                            <h4 class="text-sm font-medium mb-2">Average Bet Size</h4>
                            <p class="text-2xl font-bold text-pink-600 dark:text-pink-400">
                                {{ $user->total_bets > 0 ? number_format($user->total_coins_spent / $user->total_bets, 1) : 0 }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- resources/views/profile/purchase-history.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Purchase History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-6">Your Purchase History</h3>
                    
                    @if($purchases->isEmpty())
                        <div class="text-center py-8">
                            <p class="text-gray-500 dark:text-gray-400 mb-4">You haven't made any purchases yet.</p>
                            <div class="mt-4">
                                <a href="{{ route('coin-packages.index') }}" class="px-4 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-700 transition duration-150">
                                    View Coin Packages
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Date</th>
                                        <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Package</th>
                                        <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Coins</th>
                                        <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Amount</th>
                                        <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($purchases as $purchase)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $purchase->created_at->format('M d, Y H:i:s') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $purchase->coinPackage->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-pink-600 dark:text-pink-400">{{ $purchase->coins_credited }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">RM {{ number_format($purchase->amount_paid, 2) }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    {{ ucfirst($purchase->status) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-6">
                            {{ $purchases->links() }}
                        </div>
                        
                        <div class="mt-6 text-center">
                            <a href="{{ route('coin-packages.index') }}" class="px-4 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-700 transition duration-150">
                                Buy More Coins
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Purchase Statistics -->
            <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Purchase Statistics</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                            <h4 class="text-sm font-medium mb-2">Total Purchases</h4>
                            <p class="text-2xl font-bold text-pink-600 dark:text-pink-400">{{ $purchases->total() }}</p>
                        </div>
                        
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                            <h4 class="text-sm font-medium mb-2">Total Spent</h4>
                            <p class="text-2xl font-bold text-pink-600 dark:text-pink-400">
                                RM {{ number_format($user->purchases->sum('amount_paid'), 2) }}
                            </p>
                        </div>
                        
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                            <h4 class="text-sm font-medium mb-2">Total Coins Purchased</h4>
                            <p class="text-2xl font-bold text-pink-600 dark:text-pink-400">
                                {{ $user->purchases->sum('coins_credited') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>