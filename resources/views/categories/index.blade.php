@extends('layout')

@section('content')
    @if(session('success'))
        <div class="alert alert-success" id='successMessage'>
            {{ session('success') }}
        </div>
    @endif
    <h2>Categories</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add Category</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td><img src="{{ asset($category->image) }}" alt="{{ $category->name }}" width="100"></td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <button class="btn btn-info" data-bs-toggle="collapse" data-bs-target="#details{{$category->id}}" aria-expanded="false" aria-controls="details{{$category->id}}">
                            Show Childs
                        </button>
                    </td>
                </tr>
                <!-- Accordion row -->
                @foreach ($category->subcategories as $subcategory)
                <tr class="collapse" id="details{{$category->id}}">
                    
                    <td colspan="4">
                        <div class="accordion" id="accordionExample{{$subcategory->id}}">
                            <div class="accordion-item">

                                <h2 class="accordion-header" id="heading{{$subcategory->id}}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$subcategory->id}}" aria-expanded="true" aria-controls="collapseOne1">
                                        {{ $subcategory->name }}
                                    </button>
                                </h2>

                                <div id="collapse{{$subcategory->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$subcategory->id}}" data-bs-parent="#accordionExample{{$subcategory->id}}">
                                    <div class="accordion-body">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>{{ $subcategory->id }} </td>
                                                    <td>{{ $subcategory->name }} </td>
                                                    <td><img src="{{ asset($subcategory->image) }}" alt="{{ $subcategory->name }}" width="100"></td>
                                                    <td>
                                                        <a href="{{ route('categories.edit', $subcategory->id) }}" class="btn btn-warning">Edit</a>
                                                        <form action="{{ route('categories.destroy', $subcategory->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                        
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    
                </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
    <script>
        // Hide the success message after 5 seconds
        setTimeout(function () {
            var successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 3000); // 5000 milliseconds = 5 seconds
    </script>
    
@endsection




<!-- 

<div class="container">
    <h1>Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
    <ul>
        @foreach ($categories as $category)
            <li>
                {{ $category->name }}
                @if ($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" width="50">
                @endif
                <ul>
                    @foreach ($category->subcategories as $subcategory)
                        <li>{{ $subcategory->name }}</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div> -->