@extends('layout')

@section('content')
    <h2>Create Category</h2>
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" name="image" id="image" class="form-control" onchange="previewImage(event)">
        </div>

        <div class="mb-3">
            <img id="imagePreview" src="#" alt="Image Preview" style="display: none; max-width: 300px; max-height: 300px;" />
        </div>
         
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script>
        function previewImage(event) {
            const fileInput = event.target;
            const preview = document.getElementById('imagePreview');

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
@endsection
