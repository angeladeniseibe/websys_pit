<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | DreamHome</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="auth-body">

<div class="auth-container">

    <form method="POST" action="{{ route('login') }}" class="auth-card">
        @csrf

        <h2>Welcome Back</h2>

        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit" class="btn primary full">Login</button>

        <p>Don't have an account? <a href="/register">Register</a></p>

    </form>

</div>

</body>
</html>