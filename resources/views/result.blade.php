<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Plant Result</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: url('images/image2.jpg') no-repeat center center fixed;
    background-size: cover;
    color: #333;
}
        nav {
            backdrop-filter: blur(10px);
            background-color: rgba(45, 87, 44, 0.8);
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
            max-width: 700px;
            margin: auto;
            background: rgba(255, 255, 255, 0.5); 
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
        }
        h1 {
            color: #02220b;
        }
        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        strong {
            color: #444;
        }
        p {
            margin: 10px 0;
        }
        .btn {
            display: inline-block;
            background-color: #2d8f3a;
            color: white;
            padding: 10px 20px;
            margin: 10px 5px;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
        }
        .btn-blue:hover {
    background-color: #2c62b1;
}
.btn-blue1:hover {
    background-color: #77abf9;
}
        .btn:hover {
            background-color: #246f2e;
        }
        .btn-outline {
            background-color: transparent;
            color: #2d8f3a;
            border: 2px solid #2d8f3a;
        }
        .btn-outline:hover {
            background-color: #e6f5ea;
        }
        .plant-details {
            text-align: left;
            margin-top: 20px;
        }

        .plant-details p {
            margin: 8px 0;
        }
    </style>
</head>
<body>
    <nav>
        <div><a href="/">🌿 Identify Plant</a></div>
        <div><a href="/myplants">🌱 My Garden</a></div>
    </nav>
<div class="container">
    <h1>🌿 Plant Identified: {{ $plantName }}</h1>

    @if (!empty($imageName) && file_exists(public_path('storage/temp/' . $imageName)))
        <img src="{{ asset('storage/temp/' . $imageName) }}" alt="Plant Image">
    @else
        <p><em>Image not available.</em></p>
    @endif

   <div class="plant-details">
     <h3>Plant Details</h3>
    @if ($plantInfo)
        <p><strong>Common Names:</strong> {{ implode(', ', $plantInfo['common_names'] ?? ['N/A']) }}</p>
    @endif

    <p><strong>Care Required:</strong> {{ $careInfo }}</p>
    <p><strong>Watering:</strong> {{ $wateringSchedule }}</p>
    <p><strong>Pests Advice:</strong> {{ $pestAdvice }}</p>

   </div>
   <form action="{{ url('/plants/save') }}" method="POST">
    @csrf
    <input type="hidden" name="name" value="{{ $plantName }}">
    <input type="hidden" name="image" value="{{ $imageName }}">
    <input type="hidden" name="care_info" value="{{ $careInfo }}">
    <input type="hidden" name="watering_schedule" value="{{ $wateringSchedule }}">
    <input type="hidden" name="pest_control" value="{{ $pestAdvice }}">
    <button type="submit" class="btn btn-blue1">Add to My Garden</button>
</form>



<a href="https://en.wikipedia.org/wiki/{{ strtok(str_replace('+', ' ', $plantName), ' ') }}" target="_blank" class="btn btn-blue">🌐 More Info</a>

<a href="{{ url('/') }}" class="btn btn-outline">🔁 Identify Another Plant</a>
</div>

</body>
</html>
