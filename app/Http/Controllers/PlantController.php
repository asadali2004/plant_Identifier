<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Plant;
use Carbon\Carbon;


class PlantController extends Controller
{
    public function index()
    {
        return view('upload');
    }
public function identify(Request $request)
{
    $request->validate([
        'plant_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $image = $request->file('plant_image');

    // ✅ Move image to public/storage/temp manually
    $imageName = time() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('storage/temp'), $imageName);

    // ✅ Read and encode the image for API
    $imagePath = public_path('storage/temp/' . $imageName);
    $imageData = base64_encode(file_get_contents($imagePath));

    // ✅ Send to Plant.id API
    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'Api-Key' => config('services.plant_id.key')
    ])->post('https://api.plant.id/v2/identify', [
        'images' => [$imageData],
        'modifiers' => ['crops_fast', 'similar_images'],
        'plant_language' => 'en',
        'plant_details' => ['common_names', 'url', 'watering', 'sunlight', 'propagation'],
    ]);

    $result = $response->json();

    if (isset($result['suggestions'][0])) {
        $suggestion = $result['suggestions'][0];
        $plantName = $suggestion['plant_name'];

        // Optional: Try finding plant data in your DB for extended care info
        $plant = \App\Models\Plant::where('name', $plantName)->first();
    } else {
        return back()->with('error', 'Could not identify the plant.');
    }

    // Add this inside your identify() method after getting $plantName

$careOptions = [
    'Requires full sunlight and well-drained soil.',
    'Needs moderate watering and occasional pruning.',
    'Thrives in indirect light, water weekly.',
    'Low maintenance, perfect for beginners.',
    'Keep soil moist and mist leaves regularly.'
];

$pestAdviceOptions = [
    'Watch for aphids and spider mites.',
    'Use neem oil spray for pest prevention.',
    'Regularly inspect for whiteflies.',
    'Avoid overwatering to prevent fungus gnats.',
    'Natural predators like ladybugs help with aphids.'
];

// Pick random ones
$randomCare = $careOptions[array_rand($careOptions)];
$randomPests = $pestAdviceOptions[array_rand($pestAdviceOptions)];
$randomWatering = rand(1, 10); // days


 // ✅ Return result view with all data
    return view('result', [
    'plant' => $plant,
    'plantName' => $plantName,
    'imageName' => $imageName,
    'plantInfo' => $suggestion['plant_details'] ?? [],
    'careInfo' => $randomCare,
    'pestAdvice' => $randomPests,
    'wateringSchedule' => $randomWatering . ' days'
]);
}


public function save(Request $request)
{
    $plant = new \App\Models\Plant();
    $plant->name = $request->input('name');
    $plant->image = $request->input('image');
    $plant->care_info = $request->input('care_info');
    $plant->watering_schedule = $request->input('watering_schedule');
    $plant->pest_control = $request->input('pest_control');
    $plant->next_watering = now()->addDays(rand(1,7)); // Can make this dynamic too
    $plant->save();

    return redirect()->route('myplants.index')->with('success', 'Plant added to your collection!');
}

public function destroy($id)
{
    $plant = Plant::findOrFail($id);
    $plant->delete();

    return redirect('/myplants')->with('success', 'Plant removed from garden.');
}
}

