<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Enfant Admin</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        montserrat: ['Montserrat', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar -->
        <aside class="w-64 bg-slate-900 text-white flex flex-col shrink-0">
            <!-- Brand Logo -->
            <div class="p-5 border-b border-slate-800 flex items-center justify-between">
                <a href="{{ Route::has('admin.dashboard') ? route('admin.dashboard') : '#' }}" class="font-montserrat text-xl font-bold tracking-wider">
                    enfant<span class="text-red-500">.</span> <span class="text-xs uppercase text-gray-400 font-normal">admin</span>
                </a>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 p-4 space-y-2">
                @if(Route::has('admin.dashboard'))
                    <a href="{{ route('admin.dashboard') }}" 
                       class="flex items-center space-x-3 px-4 py-3 rounded-lg transition text-sm font-semibold {{ request()->routeIs('admin.dashboard') ? 'bg-slate-800 text-white' : 'text-gray-300 hover:bg-slate-800 hover:text-white' }}">
                        <i class="fa-solid fa-chart-line text-red-400"></i>
                        <span>Dashboard</span>
                    </a>
                @endif

                @if(Route::has('admin.posts.index'))
                    <a href="{{ route('admin.posts.index') }}" 
                       class="flex items-center space-x-3 px-4 py-3 rounded-lg transition text-sm font-semibold {{ request()->routeIs('admin.posts.*') ? 'bg-slate-800 text-white' : 'text-gray-300 hover:bg-slate-800 hover:text-white' }}">
                        <i class="fa-solid fa-newspaper text-red-400"></i>
                        <span>Manage Posts</span>
                    </a>
                @endif

                <div class="pt-6 border-t border-slate-800 mt-6">
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition text-sm font-semibold text-gray-400 hover:text-white">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        <span>View Website</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            <!-- Navbar Header -->
            <header class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center sticky top-0 z-10 shadow-sm">
                <h1 class="text-lg font-bold text-slate-800 font-montserrat">@yield('title', 'Dashboard')</h1>
                <div class="flex items-center space-x-3">
                    <div class="text-right hidden sm:block">
                        <span class="block text-sm font-semibold text-slate-800">Administrator</span>
                        <span class="block text-[10px] text-gray-400">Super Admin</span>
                    </div>
                    <div class="w-9 h-9 rounded-full bg-slate-900 text-white flex items-center justify-center font-bold text-sm shadow">
                        A
                    </div>
                </div>
            </header>

            <!-- Dynamic Body Content -->
            <main class="p-6">
                <!-- Success Flash Alert -->
                @if(session('success'))
                    <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-lg text-sm flex items-center gap-3 shadow-sm">
                        <i class="fa-solid fa-circle-check text-emerald-500 text-lg"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <!-- Error Flash Alert -->
                @if(session('error'))
                    <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-lg text-sm flex items-center gap-3 shadow-sm">
                        <i class="fa-solid fa-circle-exclamation text-rose-500 text-lg"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>

    </div>
</body>
</html>