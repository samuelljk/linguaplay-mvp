<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function index(Video $video)
    {
        $sort = request('sort') === 'popular' ? 'popular' : 'latest';

        $posts = $video->discussions()
                       ->when($sort === 'popular', fn($q) => $q->orderByDesc('created_at'))
                       ->when($sort === 'latest',  fn($q) => $q->orderBy('created_at'))
                       ->get();

        return view('discussions.index', compact('video', 'posts', 'sort'));
    }

    public function store(Request $request, Video $video)
    {
        $data = $request->validate([
            'author_name' => 'nullable|string|max:50',
            'body'        => 'required|string',
        ]);

        $video->discussions()->create([
            'author_name' => $data['author_name'] ?: 'Anonymous',
            'body'        => $data['body'],
            'is_admin'    => false,
        ]);

        return back()->with('success', 'Posted successfully!');
    }
}
