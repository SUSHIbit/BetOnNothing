<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bet On Nothing</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-black text-white">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-center bg-dots-lighter bg-gray-900 dark:bg-dots-lighter selection:bg-pink-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-pink-600 hover:text-pink-400 dark:text-pink-400 dark:hover:text-pink-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-pink-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-pink-600 hover:text-pink-400 dark:text-pink-400 dark:hover:text-pink-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-pink-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-pink-600 hover:text-pink-400 dark:text-pink-400 dark:hover:text-pink-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-pink-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center">
                    <div class="text-center">
                        <h1 class="text-6xl font-bold text-pink-500 mb-2">BET ON NOTHING</h1>
                        <p class="text-xl text-gray-300">The most pointless betting game ever created.</p>
                    </div>
                </div>

                <div class="mt-16">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <div class="scale-100 p-6 bg-gray-800/50 dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-pink-500">
                            <div>
                                <div class="h-16 w-16 bg-pink-800/20 dark:bg-pink-500/20 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-pink-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-white">Get 5 Free Coins Daily</h2>

                                <p class="mt-4 text-gray-400 text-sm leading-relaxed">
                                    Sign up and receive 5 free coins every day. What can you do with these coins? Absolutely nothing! Just bet them away for your own amusement.
                                </p>
                            </div>
                        </div>

                        <div class="scale-100 p-6 bg-gray-800/50 dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-pink-500">
                            <div>
                                <div class="h-16 w-16 bg-pink-800/20 dark:bg-pink-500/20 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-pink-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-white">Collect Achievements & Badges</h2>

                                <p class="mt-4 text-gray-400 text-sm leading-relaxed">
                                    Unlock achievements and earn badges as you waste more coins. Show off your dedication to nothingness to your friends!
                                </p>
                            </div>
                        </div>

                        <div class="scale-100 p-6 bg-gray-800/50 dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-pink-500">
                            <div>
                                <div class="h-16 w-16 bg-pink-800/20 dark:bg-pink-500/20 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-pink-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-white">Compete on the Leaderboard</h2>

                                <p class="mt-4 text-gray-400 text-sm leading-relaxed">
                                    Rise through the ranks and become the ultimate "Void Emperor" by betting more than anyone else. Nothing says success like wasting virtual coins on nothing!
                                </p>
                            </div>
                        </div>

                        <div class="scale-100 p-6 bg-gray-800/50 dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-pink-500">
                            <div>
                                <div class="h-16 w-16 bg-pink-800/20 dark:bg-pink-500/20 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-pink-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-white">Daily Login Rewards</h2>

                                <p class="mt-4 text-gray-400 text-sm leading-relaxed">
                                    Keep coming back every day to maintain your streak and get more coins to waste. The longer your streak, the more prestigious your status!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                        <div class="flex items-center gap-4">
                            <a href="{{ route('register') }}" class="group inline-flex items-center hover:text-pink-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-pink-500 bg-pink-600 px-4 py-2 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="-mt-px mr-1 w-5 h-5 stroke-white group-hover:stroke-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                </svg>
                                <span class="text-white">Register Now</span>
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                        © 2025 Bet On Nothing - The most pointless betting game
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>