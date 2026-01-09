<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">
        <x-sidebar />

        <div class="flex-1 flex flex-col">
            <x-header :pageTitle="$pageTitle ?? 'Dashboard'" />
            <x-breadcrumb />

            <main class="flex-1 p-6">
                {{ $slot }}
            </main>

            <x-footer />
        </div>
    </div>

    @livewireScripts
</body>

</html>
