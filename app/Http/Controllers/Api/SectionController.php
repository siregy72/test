<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Http\Resources\SectionResource;
use App\Http\Requests\Api\ListSectionsRequest;

class SectionController extends Controller
{
    public function __invoke(ListSectionsRequest $request)
    {
        $classId = $request->validated()['class_id'];
        $sections = Section::where('class_id', $classId)->get();
        return SectionResource::collection($sections);
    }
}
