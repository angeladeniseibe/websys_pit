<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | DreamHome</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="auth-body">

<div class="auth-container">

    <form method="POST" action="/register" class="auth-card">
        @csrf

        <h2>Create Account</h2>

        <!-- ADDED FIRST NAME -->
        <input type="text" name="first_name" placeholder="First Name" required>

        <!-- ADDED LAST NAME -->
        <input type="text" name="last_name" placeholder="Last Name" required>

        <!-- ADDED ADDRESS -->
        <input type="text" name="address" placeholder="Address" required>

        <!-- ADDED PHONE -->
        <input type="text" name="phone" placeholder="Phone Number" required>

        <!-- ORIGINAL FIELDS (kept, but updated name field removed) -->

        <input type="email" name="email" placeholder="Email" required>

        <input type="password" name="password" placeholder="Password" required>

        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

        <button type="submit" class="btn primary full">Register</button>

        <p>Already have an account? <a href="/login">Login</a></p>

    </form>

</div>

</body>
</html>