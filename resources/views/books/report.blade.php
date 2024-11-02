<h1>Book Report</h1>
<form action="{{ route('books.report') }}" method="POST">

@csrf
    <label>Filter by Publication Year:</label>
    <input type="number" name="publication_year" value="{{ request('publication_year') }}">
    <button type="submit">Filter</button>
</form>
<table>
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Publication Year</th>
        <th>Genre</th>
    </tr>
    @foreach($books as $book)
    <tr>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->publication_year }}</td>
        <td>{{ $book->genre }}</td>
    </tr>
    @endforeach
</table>
