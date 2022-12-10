@extends('layouts.web')

@section('content')
  <div class="container py-5">
    <div class="row mb-3 px-3 align-items-center justify-content-between">
      <h4>Video List</h4>
      <a class="btn btn-primary" href="{{ route('upload') }}">Upload Video</a>
    </div>
    @foreach ($video as $item)
    <div class="card mb-3">
      <div class="card-body">
        <h4 class="card-title">{{ $item->title }}</h4>
        <p class="card-text">Uploaded at {{ $item->created_at->format("j F, Y")}}</p>
      </div>
      <div class="card-footer">
        <a href="{{ route('show', $item->id) }}" class="btn btn-sm btn-primary mr-1">Lihat Video</a>
      </div>
    </div>
    @endforeach
  </div>
@endsection
