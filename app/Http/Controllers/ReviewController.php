<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreReviewRequest;

class ReviewController extends Controller
{
    public function store(StoreReviewRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = Auth::id();

        Review::create($data);

        return redirect()
            ->route('courses.show', Review::find($data['course_id'])->course->slug)
            ->with('success', '¡Gracias por dejar tu reseña!');
    }
}
