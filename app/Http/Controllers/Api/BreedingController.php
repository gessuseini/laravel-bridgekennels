<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BreedingRequest;
use App\Http\Resources\BreedingListResource;
use App\Http\Resources\BreedingResource;
use App\Models\Api\Breeding;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class BreedingController extends Controller
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

        $query = Breeding::query();
        $query->orderBy($sortField, $sortDirection);
        if($search) {
            $query->where('breeding_male_dog_name', 'like', "%{$search}%")
                ->orWhere('breeding_female_dog_name', 'like', "%{$search}%")
            ->orWhere('breeding_price', 'like', "%{$search}%")
                ->orWhere('breeding_description', 'like', "%{$search}%");
        }
        return BreedingListResource::collection($query->paginate($perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BreedingRequest $request)
    {
        $data = $request->validated();
        $data['created_by'] = $request->user()->id;
        $data['updated_by'] = $request->user()->id;

        $image = $data['breeding_male_dog_image'] ?? null;
        $image2 = $data['breeding_female_dog_image'] ?? null;

        if($image) {
            $relativePathMale = $this->saveImage($image);
            $data['breeding_male_dog_image'] = URL::to(Storage::url($relativePathMale));
            $data['breeding_male_dog_image_mime'] = $image->getClientMimeType();
            $data['breeding_male_dog_image_size'] = $image->getSize();
        }

        if($image2) {
            $relativePathFemale = $this->saveImage($image2);
            $data['breeding_female_dog_image'] = URL::to(Storage::url($relativePathFemale));
            $data['breeding_female_dog_image_mime'] = $image2->getClientMimeType();
            $data['breeding_female_dog_image_size'] = $image2->getSize();
        }

        $breeding = Breeding::create($data);

        return new BreedingResource($breeding);
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Breeding $breeding
     * @return \Illuminate\Http\Response
     */
    public function show(Breeding $breeding)
    {
        return new BreedingResource($breeding);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Breeding      $breeding
     * @return \Illuminate\Http\Response
     */
    public function update(BreedingRequest $request, Breeding $breeding)
    {
        $data = $request->validated();
        $data['updated_by'] = $request->user()->id;

        /** @var \Illuminate\Http\UploadedFile $image */
        $image = $data['breeding_male_dog_image'] ?? null;
        $image2 = $data['breeding_female_dog_image'] ?? null;

        if ($image) {
            $relativePathMale = $this->saveImage($image);
            $data['breeding_male_dog_image'] = URL::to(Storage::url($relativePathMale));
            $data['breeding_male_dog_image_mime'] = $image->getClientMimeType();
            $data['breeding_male_dog_image_size'] = $image->getSize();

            // If there is an old image, delete it
            if ($breeding->breeding_male_dog_image) {
                Storage::deleteDirectory('/public/' . dirname($breeding->breeding_male_dog_image));
            }
        }

        if ($image2) {
            $relativePathFemale = $this->saveImage($image2);
            $data['breeding_female_dog_image'] = URL::to(Storage::url($relativePathFemale));
            $data['breeding_female_dog_image_mime'] = $image2->getClientMimeType();
            $data['breeding_female_dog_image_size'] = $image2->getSize();

            // If there is an old image, delete it
            if ($breeding->breeding_female_dog_image) {
                Storage::deleteDirectory('/public/' . dirname($breeding->breeding_female_dog_image));
            }
        }

        $breeding->update($data);

        return new BreedingResource($breeding);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Breeding $breeding
     * @return \Illuminate\Http\Response
     */
    public function destroy(Breeding $breeding)
    {
        $breeding->delete();

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
