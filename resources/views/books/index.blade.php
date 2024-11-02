<h1>Book List</h1>
<a href="{{ route('books.create') }}">Add New Book</a>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table>
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Publication Year</th>
        <th>Genre</th>
        <th>Actions</th>
    </tr>
    @foreach($books as $book)
    <tr>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->publication_year }}</td>
        <td>{{ $book->genre }}</td>
        <td>
            <a href="{{ route('books.edit', $book->id) }}">Edit</a>
            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
