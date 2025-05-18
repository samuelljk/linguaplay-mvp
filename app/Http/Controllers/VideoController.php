<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::latest()->get();
        return view('videos.index', compact('videos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'video_url'  => 'nullable|url',
            'video_file' => 'nullable|file|mimetypes:video/mp4,video/quicktime|max:51200',
            'title'      => 'required|string|max:255',
            'lang_target'=> 'nullable|string|max:10',
        ]);

        if ($request->hasFile('video_file')) {
            $data['video_file'] = $request->file('video_file')
                                        ->store('videos', 'public');
        }

        $video = Video::create($data);

        return redirect()->route('videos.show', $video);
    }

    public function show(Video $video)
    {
        return view('videos.show', compact('video'));
    }
}
