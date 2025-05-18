@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-4">
  <h1 class="text-2xl font-bold mb-4">Discussion: {{ $video->title }}</h1>

  <!-- Sorting -->
  <div class="mb-4">
    <a href="?sort=popular" class="{{ $sort === 'popular' ? 'font-bold' : '' }}">Popular</a> |
    <a href="?sort=latest"  class="{{ $sort === 'latest'  ? 'font-bold' : '' }}">Latest</a>
  </div>

  <!-- Posts -->
  @foreach($posts as $post)
    <div class="mb-4 p-3 border rounded {{ $post->is_admin ? 'bg-gray-100' : '' }}">
      <strong>{{ $post->is_admin ? 'Admin' : $post->author_name }}</strong>
      <p>{{ $post->body }}</p>
      <small class="text-gray-500">{{ $post->created_at->diffForHumans() }}</small>
    </div>
  @endforeach

  <!-- New post form -->
  @if(session('success'))
    <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">
      {{ session('success') }}
    </div>
  @endif

  <form action="{{ route('discussions.store', $video) }}" method="POST">
    @csrf
    <div class="mb-2">
      <label>Your name (optional)</label>
      <input type="text" name="author_name" class="w-full border p-2" placeholder="Anonymous">
    </div>
    <div class="mb-2">
      <label>Your comment</label>
      <textarea name="body" rows="4" class="w-full border p-2" required></textarea>
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
      Post Comment
    </button>
  </form>
</div>
@endsection
