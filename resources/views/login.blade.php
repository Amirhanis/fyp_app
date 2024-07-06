<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        img {
            width: 130px;
        }
        .navbar .logo img,
        .profile-icon img {
            width: 30px; /* Adjust the width of the icons */
            height: auto; /* Maintain aspect ratio */
        }
        .navbar .logo {
            font-size: 24px;
        }
        .profile-icon {
            padding: 10px;
            background-color: #555;
            border: none;
            color: #fff;
            border-radius: 50%;
            cursor: pointer;
        }
        .profile-icon:hover {
            background-color: #777;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        .login-button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        .login-button:hover {
            background-color: #555;
        }
        .login-form {
            margin-top: 20px;
        }
        .login-form input[type="text"], 
        .login-form input[type="password"] {
            width: 25%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
        }
        .login-form input[type="submit"] {
            background-color: #0d89d1;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        .login-form input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo"><img src="{{ asset('images/navbar.png') }}"></div>
        <button class="profile-icon"><img src="{{ asset('images/user.png') }}"></button>
    </div>
    <div class="content">
        <h2>Hello, Guests</h2>
        <img src="{{ asset('images/homestay.png') }}" alt="Placeholder Image">
        <div class="login-form">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <input type="text" name="username" placeholder="Username" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
</body>
</html>
