<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">

        <x-sidebar />

        <div class="flex-1 flex flex-col">

            <x-header />
            <x-breadcrumb />

            <main class="flex-1 p-6">
                @yield('content')
            </main>

            <x-footer />

        </div>
    </div>

</body>

</html>
