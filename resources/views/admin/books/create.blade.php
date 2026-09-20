
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Add Book</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Add Book</h2>

        <a href="{{ route('admin.books.index') }}"
           class="btn btn-secondary">

            Back

        </a>

    </div>


    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="card">

        <div class="card-body">

            <form action="{{ route('admin.books.store') }}"
                  method="POST">

                @csrf


                <div class="mb-3">

                    <label class="form-label">
                        Book Title
                    </label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ old('title') }}"
                           required>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Author
                    </label>

                    <input type="text"
                           name="author"
                           class="form-control"
                           value="{{ old('author') }}"
                           required>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        ISBN
                    </label>

                    <input type="text"
                           name="isbn"
                           class="form-control"
                           value="{{ old('isbn') }}"
                           required>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Category
                    </label>

                    <input type="text"
                           name="category"
                           class="form-control"
                           value="{{ old('category') }}"
                           required>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Publisher
                    </label>

                    <input type="text"
                           name="publisher"
                           class="form-control"
                           value="{{ old('publisher') }}">

                </div>


                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Quantity
                        </label>

                        <input type="number"
                               name="quantity"
                               id="quantity"
                               class="form-control"
                               value="{{ old('quantity', 0) }}"
                               min="0"
                               required>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Available Quantity
                        </label>

                        <input type="number"
                               name="available_quantity"
                               id="available_quantity"
                               class="form-control"
                               value="{{ old('available_quantity', 0) }}"
                               min="0"
                               required>

                    </div>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Shelf No
                    </label>

                    <input type="text"
                           name="shelf_no"
                           class="form-control"
                           value="{{ old('shelf_no') }}">

                </div>


           <div class="mb-3">
    <label class="form-label">Status</label>

    <select name="status" class="form-select" required>

        <option value="">-- Select Status --</option>

        <option value="Active"
            {{ old('status') == 'Active' ? 'selected' : '' }}>
            Active
        </option>

        <option value="Inactive"
            {{ old('status') == 'Inactive' ? 'selected' : '' }}>
            Inactive
        </option>

    </select>

    @error('status')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>
                <button type="submit"
                        class="btn btn-primary">

                    Save Book

                </button>


                <a href="{{ route('admin.books.index') }}"
                   class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>
