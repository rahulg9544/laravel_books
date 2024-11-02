<h1>Edit Book</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Title:</label>
    <input type="text" name="title" value="{{ $book->title }}"><br>
    <label>Author:</label>
    <input type="text" name="author" value="{{ $book->author }}"><br>
    <label>Publication Year:</label>
    <input type="number" name="publication_year" value="{{ $book->publication_year }}"><br>
    <label>Genre:</label>
    <input type="text" name="genre" value="{{ $book->genre }}"><br>
    <button type="submit">Update Book</button>
</form>
