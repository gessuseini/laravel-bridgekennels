<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamMemberRequest;
use App\Http\Resources\TeamMemberListResource;
use App\Http\Resources\TeamMemberResource;
use App\Models\Api\TeamMember;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class TeamMemberController extends Controller
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

        $query = TeamMember::query();
        $query->orderBy($sortField, $sortDirection);
        if($search) {
            $query->where('member_name', 'like', "%{$search}%");
        }
        return TeamMemberListResource::collection($query->paginate($perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamMemberRequest $request)
    {
        $data = $request->validated();

        $image = $data['member_image'] ?? null;

        if($image) {
            $relativePath = $this->saveImage($image);
            $data['member_image'] = URL::to(Storage::url($relativePath));
            $data['member_image_mime'] = $image->getClientMimeType();
            $data['member_image_size'] = $image->getSize();
        }

        $teammember = TeamMember::create($data);

        return new TeamMemberResource($teammember);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\TeamMember $teammember
     * @return \Illuminate\Http\Response
     */
    public function show(TeamMember $teammember)
    {
        return new TeamMemberResource($teammember);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TeamMember      $teammember
     * @return \Illuminate\Http\Response
     */
    public function update(TeamMemberRequest $request, TeamMember $teammember)
    {
        $data = $request->validated();

        /** @var \Illuminate\Http\UploadedFile $image */
        $image = $data['member_image'] ?? null;
        // Check if image was given and save on local file system
        if ($image) {
            $relativePath = $this->saveImage($image);
            $data['member_image'] = URL::to(Storage::url($relativePath));
            $data['member_image_mime'] = $image->getClientMimeType();
            $data['member_image_size'] = $image->getSize();

            // If there is an old image, delete it
            if ($teammember->member_image) {
                Storage::deleteDirectory('/public/' . dirname($teammember->member_image));
            }
        }

        $teammember->update($data);

        return new TeamMemberResource($teammember);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TeamMember $teammember
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamMember $teammember)
    {
        $teammember->delete();

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
