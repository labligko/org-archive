<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Organization Archive')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-zinc-950 text-white antialiased">

    <header class="border-b border-white/10">
        <nav class="mx-auto flex max-w-6xl items-center justify-between px-6 py-5">

            <a href="/" class="text-lg font-semibold tracking-tight">
                Organization Archive
            </a>

            <div class="flex items-center gap-6 text-sm text-zinc-400">

                <a href="/" class="transition hover:text-white">
                    Home
                </a>

                <a href="#" class="transition hover:text-white">
                    Organization
                </a>

                <a href="#" class="transition hover:text-white">
                    Documentation
                </a>

            </div>

        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="border-t border-white/10">
        <div class="mx-auto max-w-6xl px-6 py-8 text-sm text-zinc-500">
            © {{ date('Y') }} Organization Archive
        </div>
    </footer>

</body>
</html>