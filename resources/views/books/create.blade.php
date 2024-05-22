<div class="container">
    <h1>Add a New Book</h1>
    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <select name="genre" class="form-select" required>
                @foreach($genres as $genre)
                    <option value="{{ $genre }}">{{ $genre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="publication_year" class="form-label">Publication Year</label>
            <select name="publication_year" class="form-select" required>
                @for($year = date('Y'); $year >= 1901; $year--)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endfor
            </select>
        </div>
        <div class="mb-3">
            <label for="cover_image" class="form-label">Cover Image</label>
            <input type="file" name="cover_image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
</div>
