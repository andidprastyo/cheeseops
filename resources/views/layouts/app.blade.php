<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CheeseOps - @yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('cheese_icon.png') }}">
    <link rel="apple-touch-icon" href="https://cdn-icons-png.flaticon.com/512/2271/2271068.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Flowbite CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @stack('styles')

    <style>
        /* Custom color palette */
        .bg-primary {
            background-color: #8B5A2B;
            /* Rich brown */
        }

        .bg-secondary {
            background-color: #F5DEB3;
            /* Wheat (light yellow-brown) */
        }

        .bg-accent {
            background-color: #FFD700;
            /* Gold */
        }

        .text-primary {
            color: #5D4037;
            /* Dark brown */
        }

        .text-secondary {
            color: #8B5A2B;
            /* Medium brown */
        }

        .text-accent {
            color: #FFD700;
            /* Gold */
        }

        .hover\:bg-primary:hover {
            background-color: #6D4C41;
            /* Darker brown */
        }

        .border-primary {
            border-color: #8B5A2B;
        }

        .bg-success {
            background-color: #DCE5C2;
            /* Light olive (for alerts) */
        }
    </style>
</head>

<body class="bg-secondary">
    <!-- Navbar with custom colors -->
    <nav class="bg-primary border-b border-primary">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('cheese_icon.png') }}" class="h-8" alt="CheeseOps Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">CheeseOps</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-accent focus:outline-none focus:ring-2 focus:ring-accent"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                    <li>
                        <a href="/"
                            class="py-2 px-3 text-white rounded hover:bg-accent md:hover:bg-transparent md:hover:text-accent md:p-0 {{ request()->is('/') ? 'md:text-accent font-bold' : '' }}"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="/preparation"
                            class="py-2 px-3 text-white rounded hover:bg-accent md:hover:bg-transparent md:hover:text-accent md:p-0 {{ request()->is('preparation*') ? 'md:text-accent font-bold' : '' }}">Persiapan</a>
                    </li>
                    <li>
                        <a href="/history"
                            class="py-2 px-3 text-white rounded hover:bg-accent md:hover:bg-transparent md:hover:text-accent md:p-0 {{ request()->is('history*') ? 'md:text-accent font-bold' : '' }}">History</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-6">
        @if(session('success'))
        <div id="alert-success" class="flex items-center p-4 mb-4 text-white rounded-lg bg-success" role="alert">
            <div class="ms-3 text-sm font-medium">
                {{ session('success') }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-success text-white rounded-lg focus:ring-2 focus:ring-accent p-1.5 hover:bg-accent inline-flex items-center justify-center h-8 w-8"
                data-dismiss-target="#alert-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
        @endif

        @yield('content')
    </div>

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    @stack('scripts')
</body>

</html>
