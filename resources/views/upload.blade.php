<!DOCTYPE html>
<html>
<head>
    <title>Plant Identifier</title>
    <style>
       body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: url('images/image5.png') no-repeat center center fixed;
    background-size: cover;
    color: #333;
}


        nav {
            backdrop-filter: blur(10px);
            background-color: rgba(45, 87, 44, 0.6);
            padding: 15px 30px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }

        .container {
            max-width: 600px;
            margin: 100px auto;
            background: rgba(255, 255, 255, 0.5); /* Semi-transparent white */
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            backdrop-filter: blur(5px); /* Add a subtle blur */
        }

        h1 {
            color: #023e00;
            margin-bottom: 25px;
        }

        input[type="file"] {
            padding: 10px;
            margin: 15px 0;
            border-radius: 6px;
        }

        button {
            padding: 10px 25px;
            background-color: #2d572c;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #246d27;
        }
    </style>
</head>
<body>
    <nav>
        <div><a href="/">🌿 Identify Plant</a></div>
        <div><a href="/myplants">🌱 My Garden</a></div>
    </nav>
    <div class="container">
        <h1>🌿 Upload Plant Image</h1>
        <form action="/identify" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="plant_image" required><br>
            <button type="submit">🔍 Identify Plant</button>
        </form>
    </div>
</body>
</html>