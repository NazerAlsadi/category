@extends('layout')

@section('content')
    <h2>Edit Category</h2>
    <form action="{{ route('categories.update' , $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type='hidden' value = '{{$category->id}}' >
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" required value='{{$category->name}}'>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" name="image" id="image" class="form-control" onchange="previewImage(event)">
        </div>
        <div class="mt-3">
            <p>Current Image:</p>
            <img id="existingImage" src="{{asset($category->image) }}" alt="Existing Image" style="max-width: 300px; max-height: 300px;">
        </div>

        <div class="mt-3" id="newImagePreview" style="display: none;">
            <p>New Image Preview:</p>
            <img id="imagePreview" src="#" alt="New Image Preview" style="max-width: 300px; max-height: 300px;">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script>
        function previewImage(event) {
            const fileInput = event.target;
            const preview = document.getElementById('imagePreview');
            const previewContainer = document.getElementById('newImagePreview');

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    previewContainer.style.display = 'block'; 
                    // Show the preview container
                    document.getElementById('existingImage').style.display='none';
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
@endsection
