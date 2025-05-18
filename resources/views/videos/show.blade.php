@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-4">
  <h1 class="text-2xl font-bold">{{ $video->title }}</h1>

  <!-- Video player -->
  @if($video->video_file)
    <video src="{{ asset('storage/' . $video->video_file) }}" controls class="w-full my-4"></video>
  @elseif($video->video_url)
    <iframe src="{{ $video->video_url }}" class="w-full h-64 my-4" frameborder="0" allowfullscreen></iframe>
  @endif

  <!-- Transcript -->
  <div class="bg-gray-100 p-4 my-4 rounded">
    <h2 class="font-semibold">Transcript</h2>
    <pre class="whitespace-pre-wrap">{{ $video->transcript }}</pre>
  </div>

  <!-- Discussion link -->
  <a href="{{ route('discussions.index', $video) }}"
     class="bg-green-600 text-white px-4 py-2 rounded">
    Go to Discussion
  </a>
</div>
@endsection
