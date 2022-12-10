@extends('layouts.web')

@section('content')
   <div class="container py-5">
      <div class="card">
         <h4 class="card-header">Upload Video</h4>
         <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
               <div class="form-group">
                  <label>Judul</label>
                  <input type="text" name="title" class="form-control"/>
               </div>
               <div class="form-group">
                  <label>Pilih Video</label>
                  <input type="file" name="video" class="form-control-file"/>
                  @if($errors->has('video'))
                     {{ $errors->first('video') }}
                  @endif
               </div>
            </div>
            <div class="card-footer">
               <div class="form-group mb-0">
                  <div class="row px-3 align-items-center justify-content-end">
                     <a href="{{ route('index') }}" class="btn btn-secondary mr-2">Kembali</a>
                     <button type="submit" class="btn btn-success">Upload</button>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
@endsection

