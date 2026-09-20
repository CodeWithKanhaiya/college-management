
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Books</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Library Books</h2>

        <a href="{{ route('admin.books.create') }}"
           class="btn btn-primary">
            + Add Book
        </a>

    </div>


    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    <div class="card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped">

                    <thead class="table-dark">

                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>ISBN</th>
                            <th>Category</th>
                            <th>Publisher</th>
                            <th>Quantity</th>
                            <th>Available</th>
                            <th>Shelf</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($books as $book)

                            <tr>

                                <td>
                                    {{ $book->id }}
                                </td>

                                <td>
                                    {{ $book->title }}
                                </td>

                                <td>
                                    {{ $book->author }}
                                </td>

                                <td>
                                    {{ $book->isbn }}
                                </td>

                                <td>
                                    {{ $book->category }}
                                </td>

                                <td>
                                    {{ $book->publisher ?? 'N/A' }}
                                </td>

                                <td>
                                    {{ $book->quantity }}
                                </td>

                                <td>
                                    {{ $book->available_quantity }}
                                </td>

                                <td>
                                    {{ $book->shelf_no ?? 'N/A' }}
                                </td>

                                <td>

                                    @if($book->status)

                                        <span class="badge bg-success">
                                            Active
                                        </span>

                                    @else

                                        <span class="badge bg-danger">
                                            Inactive
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <a href="{{ route('admin.books.edit', $book->id) }}"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>


                                    <form action="{{ route('admin.books.destroy', $book->id) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf

                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this book?')">

                                            Delete

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="11"
                                    class="text-center">

                                    No books found.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>
</html>
