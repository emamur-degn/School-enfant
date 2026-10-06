<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Management | School Management System</title>
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
                <span class="text-lg">👨‍🎓</span>
                <span>Students</span>
            </a>

            <a href="{{ url('/admin/teachers') }}"
               class="flex items-center gap-3 rounded-xl bg-blue-600 px-4 py-3 text-sm font-semibold shadow-lg shadow-blue-900/20">
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
                        Teachers Management
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

            <!-- Header Action Card -->
            <section class="mb-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-soft flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h3 class="text-lg font-bold text-slate-900">Teacher Directory</h3>
                    <p class="text-sm text-slate-500 mt-0.5">Manage and view all registered faculty members.</p>
                </div>

                <button onclick="document.getElementById('addTeacherModal').classList.remove('hidden')"
                        class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-bold text-white shadow transition hover:bg-blue-700">
                    <span>+</span>
                    Add New Teacher
                </button>
            </section>

            <!-- Teachers List Table -->
            <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-soft">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left">
                        <thead class="bg-slate-50 border-b border-slate-200">
                            <tr>
                                <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">Teacher Name</th>
                                <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">Contact</th>
                                <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">Designation & Dept</th>
                                <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">Subject</th>
                                <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">Salary</th>
                                <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">Status</th>
                                <th class="px-5 py-4 text-center text-xs font-semibold uppercase tracking-wide text-slate-500">Action</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100">
                            @forelse($teachers ?? [] as $teacher)
                                <tr class="transition hover:bg-slate-50">
                                    <td class="px-5 py-4">
                                        <div class="font-bold text-slate-800">{{ $teacher->name }}</div>
                                        <div class="text-xs text-slate-400">{{ $teacher->email }}</div>
                                    </td>
                                    <td class="px-5 py-4 text-sm text-slate-600">
                                        {{ $teacher->phone }}
                                    </td>
                                    <td class="px-5 py-4">
                                        <div class="text-sm font-semibold text-slate-800">{{ $teacher->designation }}</div>
                                        <div class="text-xs text-slate-500">{{ $teacher->department }}</div>
                                    </td>
                                    <td class="px-5 py-4 text-sm text-slate-700 font-medium">
                                        {{ $teacher->subject }}
                                    </td>
                                    <td class="px-5 py-4 text-sm font-bold text-slate-900">
                                        ৳ {{ number_format($teacher->salary, 2) }}
                                    </td>
                                    <td class="px-5 py-4">
                                        <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                                            {{ $teacher->status ?? 'Active' }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-4 text-center">
                                        <form action="{{ route('admin.teachers.destroy', $teacher->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this teacher?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-lg p-2 text-red-500 hover:bg-red-50 hover:text-red-700 transition">
                                                🗑️
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-5 py-10 text-center text-sm text-slate-500">
                                        No teachers registered yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if(isset($teachers) && method_exists($teachers, 'hasPages') && $teachers->hasPages())
                    <div class="p-4 border-t border-slate-200">
                        {{ $teachers->links() }}
                    </div>
                @endif
            </section>

        </div>

        <!-- Add Teacher Modal -->
        <div id="addTeacherModal" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/50 backdrop-blur-sm hidden">
            <div class="w-full max-w-lg rounded-2xl bg-white p-6 shadow-xl relative">
                <div class="flex items-center justify-between border-b border-slate-200 pb-4 mb-4">
                    <h3 class="text-lg font-bold text-slate-900">Add New Teacher</h3>
                    <button onclick="document.getElementById('addTeacherModal').classList.add('hidden')" class="text-slate-400 hover:text-slate-600">
                        ✕
                    </button>
                </div>

                <form action="{{ route('admin.teachers.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Full Name</label>
                        <input type="text" name="name" required class="w-full rounded-xl border border-slate-200 p-3 text-sm focus:border-blue-500 focus:outline-none">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Email</label>
                            <input type="email" name="email" required class="w-full rounded-xl border border-slate-200 p-3 text-sm focus:border-blue-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Phone</label>
                            <input type="text" name="phone" required class="w-full rounded-xl border border-slate-200 p-3 text-sm focus:border-blue-500 focus:outline-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Designation</label>
                            <input type="text" name="designation" placeholder="e.g. Senior Teacher" required class="w-full rounded-xl border border-slate-200 p-3 text-sm focus:border-blue-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Department</label>
                            <input type="text" name="department" placeholder="e.g. Science" required class="w-full rounded-xl border border-slate-200 p-3 text-sm focus:border-blue-500 focus:outline-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Subject</label>
                            <input type="text" name="subject" placeholder="e.g. Mathematics" required class="w-full rounded-xl border border-slate-200 p-3 text-sm focus:border-blue-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Salary</label>
                            <input type="number" step="0.01" name="salary" required class="w-full rounded-xl border border-slate-200 p-3 text-sm focus:border-blue-500 focus:outline-none">
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 pt-4 border-t border-slate-200">
                        <button type="button" onclick="document.getElementById('addTeacherModal').classList.add('hidden')" class="rounded-xl border border-slate-200 px-5 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-50">
                            Cancel
                        </button>
                        <button type="submit" class="rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-bold text-white shadow hover:bg-blue-700">
                            Save Teacher
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <footer class="border-t border-slate-200 bg-white px-4 py-5 text-center text-sm text-slate-500 sm:px-6 lg:px-8">
            © {{ date('Y') }} School Management System. All rights reserved.
        </footer>

    </main>
</div>

</body>
</html>