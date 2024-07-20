<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

            // Return partial view without layout
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

    public function latestDogs()
    {
        $dogs = Dog::orderBy('created_at', 'desc')->paginate(5);
        return view('welcome', compact('dogs'));
    }

    public function view(Dog $dog)
    {
        return view('dog.view', compact('dog'));
    }
}
