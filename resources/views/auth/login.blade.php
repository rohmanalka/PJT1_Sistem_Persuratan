<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Sistem Persuratan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center bg-slate-200">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
        <div class="flex flex-col items-center mb-6">
            <img src="{{ asset('assets/LOGO_PJT.png') }}" alt="Logo" class="h-20 mb-3">
            <h1 class="text-xl font-bold text-gray-800">
                Sistem Persuratan
            </h1>
            <p class="text-sm text-gray-500">
                Perum Jasa Tirta I
            </p>
        </div>
        @if ($errors->any())
            <div class="mb-4 rounded-lg bg-red-50 p-3 text-sm text-red-600">
                {{ $errors->first() }}
            </div>
        @endif
        <form method="POST" action="/login" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>
                <input type="email" name="email" required
                    class="w-full rounded-lg border border-gray-300 px-3 py-2
                           focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500"
                    placeholder="email@gmail.com">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>
                <input type="password" name="password" required
                    class="w-full rounded-lg border border-gray-300 px-3 py-2
                           focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500"
                    placeholder="••••••••">
            </div>
            <button type="submit"
                class="w-full rounded-lg bg-indigo-600 py-2.5 text-white font-semibold
                       hover:bg-indigo-700 transition">
                Masuk
            </button>
        </form>
    </div>
</body>
</html>