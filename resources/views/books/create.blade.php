<h1>Add New Book</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('books.store') }}" method="POST">
    @csrf
    <label>Title:</label>
    <input type="text" name="title"><br>
    <label>Author:</label>
    <input type="text" name="author"><br>
    <label>Publication Year:</label>
    <input type="number" name="publication_year"><br>
    <label>Genre:</label>
    <input type="text" name="genre"><br>
    <button type="submit">Add Book</button>
</form>
