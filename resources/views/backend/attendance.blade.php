<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Management | School Management System</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    boxShadow: {
                        soft: '0 10px 30px rgba(15, 23, 42, 0.08)'
                    }
                }
            }
        }
    </script>
</head>

<body class="min-h-screen bg-slate-50 text-slate-800">

<div class="flex min-h-screen">

    <!-- ================= SIDEBAR ================= -->
    <aside class="hidden w-72 shrink-0 bg-slate-950 text-white lg:flex lg:flex-col">

        <!-- Logo -->
        <div class="border-b border-white/10 px-6 py-6">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-600 text-xl font-bold">
                    S
                </div>
                <div>
                    <h1 class="text-lg font-bold">School Management</h1>
                    <p class="text-xs text-slate-400">Administrator Panel</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 space-y-1 px-4 py-6">
            <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-slate-500">
                Main Menu
            </p>

            <a href="{{ url('/admin/dashboard') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-white/10 hover:text-white">
                <span class="text-lg">📊</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ url('/admin/students') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-white/10 hover:text-white">
                <span class="text-lg">👨‍‍🎓</span>
                <span>Students</span>
            </a>

            <a href="{{ url('/admin/teachers') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-white/10 hover:text-white">
                <span class="text-lg">👨‍🏫</span>
                <span>Teachers</span>
            </a>

            <a href="{{ url('/admin/classes') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-white/10 hover:text-white">
                <span class="text-lg">🏫</span>
                <span>Classes</span>
            </a>

            <a href="{{ url('/admin/attendance') }}"
               class="flex items-center gap-3 rounded-xl bg-blue-600 px-4 py-3 text-sm font-semibold shadow-lg shadow-blue-900/20">
                <span class="text-lg">📅</span>
                <span>Attendance</span>
            </a>

            <a href="{{ url('/admin/salaries') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-white/10 hover:text-white">
                <span class="text-lg">💰</span>
                <span>Teacher Salary</span>
            </a>

            <a href="{{ url('/admin/library') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-white/10 hover:text-white">
                <span class="text-lg">📚</span>
                <span>Library</span>
            </a>

            <div class="my-5 border-t border-white/10"></div>

            <a href="{{ url('/admin/settings') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-white/10 hover:text-white">
                <span class="text-lg">⚙️</span>
                <span>Settings</span>
            </a>
        </nav>

        <!-- Logout -->
        <div class="border-t border-white/10 p-4">
            @if (Route::has('logout'))
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-red-300 transition hover:bg-red-500 hover:text-white">
                        <span class="text-lg">🚪</span>
                        <span>Logout</span>
                    </button>
                </form>
            @else
                <a href="{{ url('/logout') }}"
                   class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-red-300 transition hover:bg-red-500 hover:text-white">
                    <span class="text-lg">🚪</span>
                    <span>Logout</span>
                </a>
            @endif
        </div>
    </aside>


    <!-- ================= MAIN AREA ================= -->
    <main class="min-w-0 flex-1">

        <!-- Top Header -->
        <header class="sticky top-0 z-20 border-b border-slate-200 bg-white/95 backdrop-blur">
            <div class="flex items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-blue-600">
                        School Management System
                    </p>
                    <h2 class="mt-1 text-xl font-bold text-slate-900 sm:text-2xl">
                        Attendance Management
                    </h2>
                </div>

                <!-- User Profile -->
                <div class="flex items-center gap-3">
                    <div class="hidden text-right sm:block">
                        <p class="text-sm font-semibold text-slate-800">
                            @auth
                                {{ auth()->user()->name }}
                            @else
                                Administrator
                            @endauth
                        </p>
                        <p class="text-xs text-slate-500">
                            Administrator
                        </p>
                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-full bg-blue-600 font-bold text-white shadow-md">
                        @auth
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        @else
                            A
                        @endauth
                    </div>
                </div>
            </div>
        </header>


        <!-- Page Content -->
        <div class="px-4 py-6 sm:px-6 lg:px-8">

            <!-- Success Alert -->
            @if(session('success'))
                <div class="mb-6 rounded-xl bg-emerald-50 p-4 border border-emerald-200 text-emerald-800 text-sm font-medium">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Error Alert -->
            @if(session('error'))
                <div class="mb-6 rounded-xl bg-red-50 p-4 border border-red-200 text-red-800 text-sm font-medium">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Date & Type Filter Form -->
            <section class="mb-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-soft">
                <form method="GET" action="{{ route('admin.attendance.index') }}" class="flex flex-wrap items-center gap-4">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Select Date</label>
                        <input type="date" name="date" value="{{ $selectedDate ?? date('Y-m-d') }}" class="rounded-xl border border-slate-200 p-2.5 text-sm focus:border-blue-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Attendance Type</label>
                        <select name="type" class="rounded-xl border border-slate-200 p-2.5 text-sm focus:border-blue-500 focus:outline-none">
                            <option value="teacher" {{ ($type ?? '') == 'teacher' ? 'selected' : '' }}>Teachers</option>
                            <option value="student" {{ ($type ?? '') == 'student' ? 'selected' : '' }}>Students</option>
                        </select>
                    </div>

                    <div class="self-end">
                        <button type="submit" class="rounded-xl bg-slate-900 px-5 py-2.5 text-sm font-bold text-white shadow hover:bg-slate-800 transition">
                            Filter
                        </button>
                    </div>
                </form>
            </section>

            <!-- Main Attendance Table Form -->
            <form id="attendanceForm" action="{{ route('admin.attendance.store') }}" method="POST">
                @csrf
                <input type="hidden" name="date" value="{{ $selectedDate ?? date('Y-m-d') }}">
                <input type="hidden" name="type" value="{{ $type ?? 'teacher' }}">

                <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-soft">
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-left">
                            <thead class="bg-slate-50 border-b border-slate-200">
                                <tr>
                                    <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">ID</th>
                                    <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">Name</th>
                                    <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">Role / Department</th>
                                    <th class="px-5 py-4 text-center text-xs font-semibold uppercase tracking-wide text-slate-500">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse($records ?? [] as $item)
                                    <tr class="transition hover:bg-slate-50">
                                        <td class="px-5 py-4 text-sm font-bold text-slate-800">
                                            #{{ $item->id }}
                                        </td>
                                        <td class="px-5 py-4">
                                            <div class="font-bold text-slate-800">{{ $item->name }}</div>
                                            <div class="text-xs text-slate-400">{{ $item->email ?? 'N/A' }}</div>
                                        </td>
                                        <td class="px-5 py-4 text-sm text-slate-600">
                                            {{ $item->department ?? $item->designation ?? 'Member' }}
                                        </td>
                                        <td class="px-5 py-4">
                                            <div class="flex justify-center space-x-4">
                                                <label class="inline-flex items-center gap-2 text-sm font-medium text-emerald-700 cursor-pointer">
                                                    <input type="radio" name="attendance[{{ $item->id }}]" value="present" class="accent-emerald-600" checked>
                                                    Present
                                                </label>
                                                <label class="inline-flex items-center gap-2 text-sm font-medium text-red-700 cursor-pointer">
                                                    <input type="radio" name="attendance[{{ $item->id }}]" value="absent" class="accent-red-600">
                                                    Absent
                                                </label>
                                                <label class="inline-flex items-center gap-2 text-sm font-medium text-amber-700 cursor-pointer">
                                                    <input type="radio" name="attendance[{{ $item->id }}]" value="late" class="accent-amber-600">
                                                    Late
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-5 py-10 text-center text-sm text-slate-500">
                                            No records found for the selected filter.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="p-4 border-t border-slate-200 flex justify-end">
                        <button type="submit" class="rounded-xl bg-blue-600 px-6 py-3 text-sm font-bold text-white shadow hover:bg-blue-700 transition">
                            Save Attendance
                        </button>
                    </div>
                </section>
            </form>

        </div>

        <!-- Footer -->
        <footer class="border-t border-slate-200 bg-white px-4 py-5 text-center text-sm text-slate-500 sm:px-6 lg:px-8">
            © {{ date('Y') }} School Management System. All rights reserved.
        </footer>

    </main>
</div>

</body>
</html>