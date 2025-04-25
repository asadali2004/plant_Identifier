<!DOCTYPE html>
<html>
<head>
    <title>My Plants</title>
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
            max-width: 900px;
            margin: auto;
            background: rgba(255, 255, 255, 0.7); 
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2d572c;
        }
        .plant {
            border-bottom: 1px solid #eee;
            padding: 15px 0;
        }
        .plant:last-child {
            border-bottom: none;
        }
        .image {
            max-height: 100px;
            border-radius: 8px;
        }
        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 10px 20px;
            background-color: #2d572c;
            color: white;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            font-size: 16px;
        }
        .btn:hover {
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
    <h1>My Garden</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @foreach($plants as $plant)
        <div class="plant">
            <h3>{{ $plant->name }}</h3>

            @if ($plant->image && file_exists(public_path('storage/temp/' . $plant->image)))
                <img class="image" src="{{ asset('storage/temp/' . $plant->image) }}" alt="{{ $plant->name }}">
            @endif

            <p><strong>Care Info:</strong> {{ $plant->care_info }}</p>
            {{-- <p><strong>Water every:</strong> {{ $plant->watering }} days</p> --}}
            {{-- <p><strong>Pests Advice:</strong> {{ $plant->pests_advice }}</p> --}}
            <p><strong>Next Watering:</strong> {{ \Carbon\Carbon::parse($plant->next_watering)->format('F j, Y') }}</p>
        </div>

        <!-- Delete Form -->
        <form action="{{ url('/plants/' . $plant->id) }}" method="POST" style="display:inline-block; margin-top: 10px;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn" style="background-color: #d9534f;">❌ Remove from Garden</button>
        </form>
    @endforeach
        <br><br>
    <a href="{{ url('/') }}" class="btn">🔍 New Identification</a>
</div>
</body>
</html>
