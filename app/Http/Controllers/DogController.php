<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use Illuminate\Http\Request;
use App\Notifications\DogRequest;
use App\Models\User;
use Illuminate\Support\Facades\Notification;

class DogController extends Controller
{
    public function index()
    {
        $dogs = Dog::where('dog_type', 'adult')
            ->orderBy('updated_at', 'desc')->get();
        return view('dog.index', compact('dogs'));
    }

    public function filterDogs(Request $request)
    {
        $gender = $request->gender;
        $type = 'adult'; // Assuming this is how you identify adult dogs

        if($gender === 'all') {
            $dogs = Dog::where('dog_type', $type)
                ->orderBy('updated_at', 'desc')
                ->get();

            // Return partial view without layout
            return view('dog.dogs-list', compact('dogs'));
        }
        else {
            $dogs = Dog::where('dog_gender', $gender)
                ->where('dog_type', $type)
                ->orderBy('updated_at', 'desc')
                ->get();

            // Return partial view without layout
            return view('dog.dogs-list', compact('dogs'));
        }
    }

    public function pindex()
    {
        $dogs = Dog::where('dog_type', 'puppy')
            ->orderBy('updated_at', 'desc')->get();
        return view('puppy.index', compact('dogs'));
    }

    public function filterPuppies(Request $request)
    {
        $gender = $request->gender;
        $type = 'puppy'; // Assuming this is how you identify adult dogs

        if($gender === 'all') {
            $dogs = Dog::where('dog_type', $type)
                ->orderBy('updated_at', 'desc')
                ->get();

            // Return partial view without layoutS
            return view('puppy.puppies-list', compact('dogs'));
        }
        else {
            $dogs = Dog::where('dog_gender', $gender)
                ->where('dog_type', $type)
                ->orderBy('updated_at', 'desc')
                ->get();

            // Return partial view without layout
            return view('puppy.puppies-list', compact('dogs'));
        }
    }

    public function showRequestForm($id)
    {
        $dog = Dog::findOrFail($id);
        return view('request-dog', compact('dog'));
    }


    public function sendRequest(Request $request)
    {
        $data = $request->validate([
            'dog_id' => 'required|exists:dogs,id',
            'client_name' => 'required|string|max:255',
            'client_surname' => 'required|string|max:255',
            'client_email' => 'required|email|max:255',
            'client_phone' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        // Fetch dog details
        $dog = Dog::findOrFail($data['dog_id']);

        // Fetch all admin users
        $adminUsers = User::where('is_admin', true)->get();

        // Send notification to all admin users
        Notification::sendNow($adminUsers, new DogRequest($dog, $data));

        return redirect()->route('home')->with('success', 'Your request has been sent successfully!');
    }

    public function latestDogs()
    {
        $dogs = Dog::orderBy('created_at', 'desc')->paginate(5);
        return view('welcome', compact('dogs'));
    }

    public function view(Dog $dog)
    {
        return view('dog.view', ['dog' => $dog]);
    }
}
