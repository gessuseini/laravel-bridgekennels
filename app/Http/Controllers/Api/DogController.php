<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DogRequest;
use App\Http\Resources\DogListResource;
use App\Http\Resources\DogResource;
use App\Models\Api\Dog;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class DogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request('search', false);
        $perPage = request('per_page', 10);
        $sortField = request('sort_field', 'updated_at');
        $sortDirection = request('sort_direction', 'desc');

        $query = Dog::query();
        $query->orderBy($sortField, $sortDirection);
        if($search) {
            $query->where('dog_name', 'like', "%{$search}%")
                ->orWhere('dog_id', 'like', "%{$search}%")
            ->orWhere('dog_breed', 'like', "%{$search}%")
                ->orWhere('dog_gender', 'like', "%{$search}%")
                ->orWhere('dog_price', 'like', "%{$search}%")
                ->orWhere('dog_color', 'like', "%{$search}%")
                ->orWhere('dog_description', 'like', "%{$search}%");
        }
        return DogListResource::collection($query->paginate($perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DogRequest $request)
    {
        $data = $request->validated();
        $data['created_by'] = $request->user()->id;
        $data['updated_by'] = $request->user()->id;

        $image = $data['dog_image'] ?? null;

        if($image) {
            $relativePath = $this->saveImage($image);
            $data['dog_image'] = URL::to(Storage::url($relativePath));
            $data['dog_image_mime'] = $image->getClientMimeType();
            $data['dog_image_size'] = $image->getSize();
        }

        $dog = Dog::create($data);

        return new DogResource($dog);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Dog $dog
     * @return \Illuminate\Http\Response
     */
    public function show(Dog $dog)
    {
        return new DogResource($dog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Dog      $dog
     * @return \Illuminate\Http\Response
     */
    public function update(DogRequest $request, Dog $dog)
    {
        $data = $request->validated();
        $data['updated_by'] = $request->user()->id;

        /** @var \Illuminate\Http\UploadedFile $image */
        $image = $data['dog_image'] ?? null;
        // Check if image was given and save on local file system
        if ($image) {
            $relativePath = $this->saveImage($image);
            $data['dog_image'] = URL::to(Storage::url($relativePath));
            $data['dog_image_mime'] = $image->getClientMimeType();
            $data['dog_image_size'] = $image->getSize();

            // If there is an old image, delete it
            if ($dog->dog_image) {
                Storage::deleteDirectory('/public/' . dirname($dog->dog_image));
            }
        }

        $dog->update($data);

        return new DogResource($dog);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Dog $dog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dog $dog)
    {
        $dog->delete();

        return response()->noContent();
    }

    private function saveImage(UploadedFile $image)
    {
        $path = 'images/' . Str::random();
        if (!Storage::exists($path)) {
            Storage::makeDirectory($path, 0755, true);
        }
        if (!Storage::putFileAS('public/' . $path, $image, $image->getClientOriginalName())) {
            throw new \Exception("Unable to save file \"{$image->getClientOriginalName()}\"");
        }

        return $path . '/' . $image->getClientOriginalName();
    }
}
