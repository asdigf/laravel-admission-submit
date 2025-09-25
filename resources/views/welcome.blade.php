<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admission System</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN (cho nhanh) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-gray-100">

    <!-- Header -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Admission System
            </h1>
        </div>
    </header>

    <!-- Main -->
    <main class="flex flex-col items-center justify-center min-h-[70vh]">
        <h2 class="text-4xl font-extrabold text-gray-800 mb-6">
            Welcome to the Admission System
        </h2>
        <p class="text-lg text-gray-600 mb-8 text-center max-w-2xl">
            Đây là hệ thống quản lý hồ sơ ứng tuyển. Hãy chọn trang bạn muốn truy cập.
        </p>
        
        <!-- Button group -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Applications -->
            <a href="{{ route('applications.index') }}"
               class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition duration-200 text-center">
                Applications
            </a>

            <!-- Registrations -->
            <a href="{{ route('registrations.index') }}"
               class="px-6 py-3 bg-green-600 text-white font-semibold rounded-lg shadow hover:bg-green-700 transition duration-200 text-center">
                Registrations
            </a>

            <!-- Communication Logs -->
            <a href="{{ route('communication_logs.index') }}"
               class="px-6 py-3 bg-purple-600 text-white font-semibold rounded-lg shadow hover:bg-purple-700 transition duration-200 text-center">
                Communication Logs
            </a>

            <!-- Status Logs -->
            <a href="{{ route('application_status_logs.index') }}"
               class="px-6 py-3 bg-orange-600 text-white font-semibold rounded-lg shadow hover:bg-orange-700 transition duration-200 text-center">
                Status Logs
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-12">
        <div class="max-w-7xl mx-auto py-4 px-6 flex justify-between text-sm text-gray-500">
            <span>&copy; {{ date('Y') }} Admission System</span>
            <span>Laravel Project</span>
        </div>
    </footer>

</body>
</html>
