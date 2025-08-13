
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
</head>
<body class="bg-black">
    <h1>Dashboard</h1>
    @auth
    <form action="{{ route('logout') }}" method="POST" class="inline">
        @csrf
        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
            Cerrar sesión
        </button>
    </form>
@endauth
</body>
</html>