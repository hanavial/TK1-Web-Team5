@extends('layouts.web')

@section('content')
  <div class="container py-5">
    {{-- <a href="{{ route('index') }}" class="btn btn-outline-secondary mb-3">Kembali ke Home</a> --}}
    <div class="row justify-content-center">
      <div class="card" style="width: 28rem">
        <video class="card-img-top" src="{{ url('storage/upload/' . $video->video) }}" autoplay controls></video>
        <div class="card-body">
          <h3 class="card-title">{{ $video->title }}</h3>
          <p class="card-text">Uploaded at {{ $video->created_at->format("j F, Y")}}</p>
          {{-- <p class="card-text">{{ $video->created_at->format("j F, Y")}} <br> Updated {{ $video->updated_at->diffForHumans() }}</p> --}}
        </div>
        <div class="card-footer">
          <div class="row px-3 align-items-center justify-content-end">
            <a href="{{ route('edit', $video->id) }}" class="btn btn-sm btn-secondary mr-1">Edit</a>
            <form action="{{ route('destroy', $video->id) }}" method="post">
              @csrf
              @method('delete')
              <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus video ini?')">Hapus</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
