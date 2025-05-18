@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
  <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-6">Upload a Lecture</h1>
    <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf

      <div>
        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
        <input
          type="text"
          name="title"
          id="title"
          required
          class="block w-full border border-gray-300 rounded-lg p-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition"
          placeholder="Enter lecture title"
        >
      </div>

      <div>
        <label for="video_url" class="block text-sm font-medium text-gray-700 mb-1">Video URL</label>
        <input
          type="url"
          name="video_url"
          id="video_url"
          class="block w-full border border-gray-300 rounded-lg p-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition"
          placeholder="https://example.com/lecture"
        >
      </div>

      <div>
        <label for="video_file" class="block text-sm font-medium text-gray-700 mb-1">Or Upload File</label>
        <input
          type="file"
          name="video_file"
          id="video_file"
          class="block w-full text-gray-600"
        >
      </div>

      <div class="text-right">
        <button
            type="submit"
            class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-200 transition"
        >
            Upload Lecture
        </button>
      </div>
    </form>
  </div>

  <div>
    <h2 class="text-2xl font-bold text-gray-800 mb-4">All Lectures</h2>
    <ul class="space-y-2">
      @foreach($videos as $video)
        <li>
          <a
            href="{{ route('videos.show', $video) }}"
            class="block bg-white shadow rounded-lg p-4 hover:bg-indigo-50 transition"
          >
            <h3 class="text-lg font-medium text-indigo-600">{{ $video->title }}</h3>
            <p class="text-sm text-gray-500">{{ $video->created_at->format('M d, Y') }}</p>
          </a>
        </li>
      @endforeach
    </ul>
  </div>
</div>
@endsection
