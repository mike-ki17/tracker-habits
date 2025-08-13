

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-500 to-emerald-600 px-4">
    <form method="POST" action="{{ route('register') }}" class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        @csrf
        <h3 class="text-2xl font-bold text-gray-800 text-center mb-6">Register</h3>

        <!-- Nombre -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter your name" required
                   value="{{ old('name') }}"
                   class="w-full px-4 py-2 mb-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" required
                   value="{{ old('email') }}"
                   class="w-full px-4 py-2 mb-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-6">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" required
                   class="w-full px-4 py-2 mb-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

         <!-- Confirm Password -->
        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Enter your password" required
                   class="w-full px-4 py-2 mb-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
        </div>

        <!-- Botón -->
        <button type="submit"
                class="w-full bg-green-500 text-white font-semibold py-2 rounded-lg hover:bg-green-600 transition">
            Register
        </button>

        <!-- Link login -->
        <p class="text-sm text-gray-600 text-center mt-4">
            Already have an account?
            <a href="/login" class="text-green-500 hover:underline">Login</a>
        </p>
    </form>
</div>


</body>
</html>