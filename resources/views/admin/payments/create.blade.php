
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Add Payment</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Add Payment</h2>

        <a href="{{ route('admin.payments.index') }}"
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

            <form action="{{ route('admin.payments.store') }}"
                  method="POST">

                @csrf


                {{-- Student --}}

                <div class="mb-3">

                    <label class="form-label">
                        Student
                    </label>

                    <select name="student_id"
                            class="form-select"
                            required>

                        <option value="">
                            -- Select Student --
                        </option>

                        @foreach($students as $student)

                            <option value="{{ $student->id }}"
                                {{ old('student_id') == $student->id ? 'selected' : '' }}>

                                {{ $student->user->name ?? 'N/A' }}
                                - {{ $student->roll_no }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Fee --}}

                <div class="mb-3">

                    <label class="form-label">
                        Fee
                    </label>

                    <select name="fee_id"
                            class="form-select"
                            required>

                        <option value="">
                            -- Select Fee --
                        </option>

                        @foreach($fees as $fee)

                            <option value="{{ $fee->id }}"
                                {{ old('fee_id') == $fee->id ? 'selected' : '' }}>

                                {{ $fee->student->user->name ?? 'N/A' }}
                                -
                                Total: ₹{{ $fee->total_amount }}
                                -
                                Due: ₹{{ $fee->due_amount }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Transaction ID --}}

                <div class="mb-3">

                    <label class="form-label">
                        Transaction ID
                    </label>

                    <input type="text"
                           name="transaction_id"
                           class="form-control"
                           value="{{ old('transaction_id') }}">

                </div>


                {{-- Amount --}}

                <div class="mb-3">

                    <label class="form-label">
                        Amount
                    </label>

                    <input type="number"
                           name="amount"
                           class="form-control"
                           step="0.01"
                           min="0.01"
                           value="{{ old('amount') }}"
                           required>

                </div>


                {{-- Payment Method --}}

                <div class="mb-3">

                    <label class="form-label">
                        Payment Method
                    </label>

                    <select name="payment_method"
                            class="form-select"
                            required>

                        <option value="">
                            -- Select Payment Method --
                        </option>

                        <option value="cash">
                            Cash
                        </option>

                        <option value="upi">
                            UPI
                        </option>

                        <option value="card">
                            Card
                        </option>

                        <option value="net_banking">
                            Net Banking
                        </option>

                    </select>

                </div>


                {{-- Payment Date --}}

                <div class="mb-3">

                    <label class="form-label">
                        Payment Date
                    </label>

                    <input type="date"
                           name="payment_date"
                           class="form-control"
                           value="{{ old('payment_date', date('Y-m-d')) }}"
                           required>

                </div>


                {{-- Status --}}

                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                   <select name="status" class="form-select" required>

    <option value="">-- Select Status --</option>

    <option value="paid">
        Paid
    </option>

    <option value="pending">
        Pending
    </option>

    <option value="failed">
        Failed
    </option>

</select>

                </div>


                {{-- Remarks --}}

                <div class="mb-3">

                    <label class="form-label">
                        Remarks
                    </label>

                    <textarea name="remarks"
                              class="form-control"
                              rows="3">{{ old('remarks') }}</textarea>

                </div>


                <button type="submit"
                        class="btn btn-primary">

                    Save Payment

                </button>

                <a href="{{ route('admin.payments.index') }}"
                   class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

</div>

</body>

</html>

