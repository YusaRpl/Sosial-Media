@extends('layout.main')
@section('main_content')
<style>
  img {
    max-width: 400px;
}

input[type=file] {
    padding: 10px;
}
</style>
            <div class="container m-auto pt-5">
                <h1 class="font-semibold lg:mb-6 mb-3 text-2xl">Create New Post</h1>
                    <form method="post" action="/posting" enctype="multipart/form-data">
                     @csrf
                 <div class="mb-3">
                   <label for="image" class="form-label @error('image') is-invalid @enderror">Post image</label>
                   <img src="" alt="" class="img-preview image-fluid mb-3 col-sm-6">
                   <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
                   @error ('image')
                   <div class="invalid-feedback">
                     {{$message}}
                   </div>
                   @enderror
                 </div>
                 <div class="mb-3">
                   <label for="video" class="form-label @error('video') is-invalid @enderror">Post video</label>
                   <input class="form-control" type="file" id="video" name="video" onchange="previewvideo()">
                   @error ('video')
                   <div class="invalid-feedback">
                     {{$message}}
                   </div>
                   @enderror
                 </div>
                 <div class="mb-3">
                  <textarea class="p-3" name="keterangan" id="keterangan" cols="30" rows="10" placeholder="keterangan"></textarea>
                    @error ('keterangan')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                 </div>
                 <button type="submit" class="btn btn-primary">Create Post</button>
               </form>
            </div>
        @endsection

        <script>
          function previewImage(){
          const image = document.querySelector('#image');
          const imgPreview = document.querySelector('.img-preview');
          imgPreview.style.display = 'block';
          const oFReader = new FileReader();
          oFReader.readAsDataURL(image.files[0]);
          oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
          }
          }
        </script>