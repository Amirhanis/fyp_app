<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        .search-container {
            margin: 20px auto;
            width: 300px;
            position: relative;
        }
        .search-input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .search-button {
            position: absolute;
            top: 0;
            right: 0;
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }
        .search-button:hover {
            background-color: #555;
        }

        .content {
            text-align: center;
            margin: 20px auto;
        }
        .image-group {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .image-group img {
            width: 100px; /* Adjust image width as needed */
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <h3>Welcome back, Guests</h3>
    <br>
    <div class="search-container">
        <input type="text" class="search-input" placeholder="Search...">
        <button type="submit" class="search-button">Search</button>
    </div>

    <div class="content">
        <br><p>Choose your place</p>
        <div class="image-group">
            <img src="{{ asset('images/pahang.png') }}" alt="Image 1">
            <img src="{{ asset('images/selangor.png') }}" alt="Image 2">
            <img src="{{ asset('images/johor.png') }}" alt="Image 3">
            <img src="{{ asset('images/kl.png') }}" alt="Image 4">
            <img src="{{ asset('images/terengganu.png') }}" alt="Image 5">
        </div>
        <div class="image-group">
            <img src="{{ asset('images/about.png') }}" alt="Image 6">
            <img src="{{ asset('images/image7.jpg') }}" alt="Image 7">
        </div>
    </div>
</body>
</html>
