<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Asset Management</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen flex">

    <!-- LEFT -->
    <div class="w-1/2 bg-gray-100 flex items-center justify-center">
        <img src="{{ asset('images/asset-login.png') }}" 
             class="w-[70%]">
    </div>

    <!-- RIGHT -->
    <div class="w-1/2 bg-[#5A78B8] flex items-center justify-center">
        <div class="w-96 text-white">

            <h1 class="text-3xl font-bold mb-1">
                Asset Management
            </h1>
            <h2 class="text-xl mb-8">
                Trinet Prima Solusi
            </h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label>Username</label>
                    <input type="email" name="email"
                        class="w-full p-3 rounded text-black"
                        required>
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label>Password</label>
                    <input type="password" name="password"
                        class="w-full p-3 rounded text-black"
                        required>
                </div>

                <!-- Remember -->
                <div class="flex justify-between items-center mb-6 text-sm">
                    <label>
                        <input type="checkbox" name="remember">
                        Keep me logged in
                    </label>

                    <a href="#" class="underline">
                        Forgot Password?
                    </a>
                </div>

                <!-- Button -->
                <button class="w-full bg-blue-300 hover:bg-blue-400 text-white font-semibold py-3 rounded">
                    Login
                </button>
            </form>

        </div>
    </div>

</body>
</html>