<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white h-screen">
            <div class="p-4">
                <img src="{{asset('images/logo')}}" alt="Logo" class="w-32 mx-auto">
            </div>
            <nav>
                <ul class="space-y-2 mt-4">
                    <li><a href="/" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Inicio</a></li>
                    <li><a href="/entrada" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Entrada</a></li>
                    <li><a href="/ajustes" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Ajustes</a></li>
                    <li><a href="/sobre" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Sobre</a></li>
                    <li><a href="/comentarios" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Comentarios</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="bg-white shadow-lg rounded-lg border border-gray-300">
                <div class="p-4 border-b border-gray-300">
                    <h1 class="text-xl font-semibold">@yield('subtitle')</h1>
                </div>
                <div class="p-4">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

</body>
</html>