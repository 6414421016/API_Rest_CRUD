<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
</head>
<body>
    <nav class="bg-gray-800 p-6">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white">
                <a href="/" class="text-xl font-semibold">Your Logo</a>
            </div>
            <div class="flex space-x-4">
                <a href="/" class="text-white hover:text-gray-300">Home</a>
                <a href="/form" class="text-white hover:text-gray-300">Adddata</a>
                {{-- <a href="/services" class="text-white hover:text-gray-300">Services</a>
                <a href="/contact" class="text-white hover:text-gray-300">Contact</a> --}}
            </div>
        </div>
    </nav>
    
    @yield('content')
</body>
</html>