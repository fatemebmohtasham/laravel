@extends('layouts.app')

@section('content')
<h1 class="mb-10 text-2xl">Add Review for {{ $book->title }}</h1>
<x-breadcrumbs class="mb-4"
    :links="['book'=> route('books.show',$book),'reviews'=>'#']" />
<form method="POST" action="{{ route('books.reviews.store', $book) }}">
  @csrf
  <label for="review">Review</label>
  <textarea name="review" id="review"  class="input mb-2"></textarea>
  @error('review')
  <div class=" mb-2 text-s text-red-500">
    {{ $message }}
  </div>
  @enderror
  <label for="rating">Rating</label>

  <select name="rating" id="rating" class="input mb-4" >
    <option value="">Select a Rating</option>
    @for ($i = 1; $i <= 5; $i++) <option value="{{ $i }}">{{ $i }}</option>
      @endfor
  </select>
  @error('rating')
    <div class="mb-2 text-s text-red-500">
      {{ $message }}
    </div>
  @enderror
  <button type="submit" class="btn">Add Review</button>
</form>
@endsection