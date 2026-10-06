<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | School Management System</title>

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
               class="flex items-center gap-3 rounded-xl bg-blue-600 px-4 py-3 text-sm font-semibold shadow-lg shadow-blue-900/20">
                <span class="text-lg">📊</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ url('/admin/students') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-white/10 hover:text-white">
                <span class="text-lg">👨‍🎓</span>
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
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-white/10 hover:text-white">
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
                        Admin Dashboard
                    </h2>

                    <p class="mt-1 hidden text-sm text-slate-500 sm:block">
                        Manage your school from one central dashboard.
                    </p>
                </div>

                <!-- User -->
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

            <!-- Welcome Banner -->
            <section class="mb-6 overflow-hidden rounded-2xl bg-gradient-to-r from-blue-700 via-blue-600 to-indigo-600 p-6 text-white shadow-soft">
                <div class="flex flex-col justify-between gap-5 md:flex-row md:items-center">
                    <div>
                        <p class="text-sm font-medium text-blue-100">Welcome back 👋</p>
                        <h3 class="mt-1 text-2xl font-bold">
                            School Administration Dashboard
                        </h3>
                        <p class="mt-2 max-w-2xl text-sm text-blue-100">
                            Monitor students, teachers, attendance, salaries and library activities.
                        </p>
                    </div>

                    <a href="{{ url('/admin/students/create') }}"
                       class="inline-flex w-fit items-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-bold text-blue-700 shadow transition hover:bg-blue-50">
                        <span>+</span>
                        Add Student
                    </a>
                </div>
            </section>


            <!-- Statistics -->
            <section class="mb-8 grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">

                <!-- Students -->
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-soft">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">Total Students</p>
                            <p class="mt-2 text-3xl font-bold text-slate-900">
                                {{ $totalStudents ?? 0 }}
                            </p>
                            <p class="mt-2 text-xs text-emerald-600">Registered students</p>
                        </div>

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-2xl">
                            👨‍🎓
                        </div>
                    </div>
                </div>

                <!-- Teachers -->
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-soft">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">Total Teachers</p>
                            <p class="mt-2 text-3xl font-bold text-slate-900">
                                {{ $totalTeachers ?? 0 }}
                            </p>
                            <p class="mt-2 text-xs text-emerald-600">Teaching staff</p>
                        </div>

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-2xl">
                            👨‍🏫
                        </div>
                    </div>
                </div>

                <!-- Classes -->
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-soft">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">Total Classes</p>
                            <p class="mt-2 text-3xl font-bold text-slate-900">
                                {{ $totalClasses ?? 0 }}
                            </p>
                            <p class="mt-2 text-xs text-violet-600">Active classes</p>
                        </div>

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-violet-50 text-2xl">
                            🏫
                        </div>
                    </div>
                </div>

                <!-- Books -->
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-soft">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">Library Books</p>
                            <p class="mt-2 text-3xl font-bold text-slate-900">
                                {{ $totalBooks ?? 0 }}
                            </p>
                            <p class="mt-2 text-xs text-orange-600">Books in library</p>
                        </div>

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-orange-50 text-2xl">
                            📚
                        </div>
                    </div>
                </div>

            </section>


            <!-- Quick Actions -->
            <section class="mb-8">
                <div class="mb-4">
                    <h3 class="text-xl font-bold text-slate-900">Quick Actions</h3>
                    <p class="mt-1 text-sm text-slate-500">
                        Frequently used school management functions.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

                    <a href="{{ url('/admin/students/create') }}"
                       class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-soft transition hover:-translate-y-1 hover:border-blue-300">
                        <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-2xl group-hover:bg-blue-100">
                            👨‍🎓
                        </div>
                        <h4 class="font-bold text-slate-900">Add Student</h4>
                        <p class="mt-1 text-sm text-slate-500">Register a new student.</p>
                    </a>

                    <a href="{{ url('/admin/teachers/create') }}"
                       class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-soft transition hover:-translate-y-1 hover:border-emerald-300">
                        <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-2xl group-hover:bg-emerald-100">
                            👨‍🏫
                        </div>
                        <h4 class="font-bold text-slate-900">Add Teacher</h4>
                        <p class="mt-1 text-sm text-slate-500">Register a new teacher.</p>
                    </a>

                    <a href="{{ url('/admin/attendance') }}"
                       class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-soft transition hover:-translate-y-1 hover:border-violet-300">
                        <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-violet-50 text-2xl group-hover:bg-violet-100">
                            📅
                        </div>
                        <h4 class="font-bold text-slate-900">Attendance</h4>
                        <p class="mt-1 text-sm text-slate-500">Manage daily attendance.</p>
                    </a>

                    <a href="{{ url('/admin/library') }}"
                       class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-soft transition hover:-translate-y-1 hover:border-orange-300">
                        <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-orange-50 text-2xl group-hover:bg-orange-100">
                            📚
                        </div>
                        <h4 class="font-bold text-slate-900">Library</h4>
                        <p class="mt-1 text-sm text-slate-500">Manage books and issues.</p>
                    </a>

                </div>
            </section>


            <!-- Recent Data -->
            <section class="grid grid-cols-1 gap-6 xl:grid-cols-2">

                <!-- Recent Students -->
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-soft">

                    <div class="flex items-center justify-between border-b border-slate-200 px-5 py-4">
                        <div>
                            <h3 class="font-bold text-slate-900">Recent Students</h3>
                            <p class="mt-1 text-xs text-slate-500">Latest registered students</p>
                        </div>

                        <a href="{{ url('/admin/students') }}"
                           class="text-sm font-semibold text-blue-600 hover:text-blue-800">
                            View All
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Name</th>
                                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Class</th>
                                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Status</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-slate-100">

                                @forelse($recentStudents ?? [] as $student)
                                    <tr class="transition hover:bg-slate-50">

                                        <td class="px-5 py-4">
                                            <div class="font-medium text-slate-800">
                                                {{ $student->name ?? 'N/A' }}
                                            </div>
                                            <div class="mt-1 text-xs text-slate-400">
                                                {{ $student->email ?? 'No email' }}
                                            </div>
                                        </td>

                                        <td class="px-5 py-4 text-sm text-slate-600">
                                            {{ $student->class->name ?? $student->class_name ?? 'N/A' }}
                                        </td>

                                        <td class="px-5 py-4">
                                            <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                                                Active
                                            </span>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-5 py-10 text-center text-sm text-slate-500">
                                            No students found.
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>


                <!-- Recent Teachers -->
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-soft">

                    <div class="flex items-center justify-between border-b border-slate-200 px-5 py-4">
                        <div>
                            <h3 class="font-bold text-slate-900">Recent Teachers</h3>
                            <p class="mt-1 text-xs text-slate-500">Latest registered teachers</p>
                        </div>

                        <a href="{{ url('/admin/teachers') }}"
                           class="text-sm font-semibold text-blue-600 hover:text-blue-800">
                            View All
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Name</th>
                                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Phone</th>
                                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Status</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-slate-100">

                                @forelse($recentTeachers ?? [] as $teacher)
                                    <tr class="transition hover:bg-slate-50">

                                        <td class="px-5 py-4">
                                            <div class="font-medium text-slate-800">
                                                {{ $teacher->name ?? 'N/A' }}
                                            </div>
                                            <div class="mt-1 text-xs text-slate-400">
                                                {{ $teacher->email ?? 'No email' }}
                                            </div>
                                        </td>

                                        <td class="px-5 py-4 text-sm text-slate-600">
                                            {{ $teacher->phone ?? 'N/A' }}
                                        </td>

                                        <td class="px-5 py-4">
                                            <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                                                Active
                                            </span>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-5 py-10 text-center text-sm text-slate-500">
                                            No teachers found.
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>

            </section>

        </div>


        <!-- Footer -->
        <footer class="border-t border-slate-200 bg-white px-4 py-5 text-center text-sm text-slate-500 sm:px-6 lg:px-8">
            © {{ date('Y') }} School Management System. All rights reserved.
        </footer>

    </main>
</div>

</body>
</html>