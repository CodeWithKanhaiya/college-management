
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Payments</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Payment List</h2>

        <a href="{{ route('admin.payments.create') }}"
           class="btn btn-primary">

            + Add Payment

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

                    <thead>

                    <tr>

                        <th>ID</th>
                        <th>Student</th>
                        <th>Fee</th>
                        <th>Transaction ID</th>
                        <th>Amount</th>
                        <th>Payment Method</th>
                        <th>Payment Date</th>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th>Action</th>

                    </tr>

                    </thead>

                    <tbody>

                    @forelse($payments as $payment)

                        <tr>

                            <td>
                                {{ $payment->id }}
                            </td>

                            <td>
                                {{ $payment->student->user->name ?? 'N/A' }}
                            </td>

                            <td>
                                ₹{{ $payment->fee->total_amount ?? '0.00' }}
                            </td>

                            <td>
                                {{ $payment->transaction_id ?? '-' }}
                            </td>

                            <td>
                                ₹{{ $payment->amount }}
                            </td>

                            <td>
                                {{ ucfirst(str_replace('_', ' ', $payment->payment_method)) }}
                            </td>

                            <td>
                                {{ $payment->payment_date?->format('d-m-Y') }}
                            </td>

                            <td>

                                @if($payment->status == 'paid')

                                    <span class="badge bg-success">
                                        Paid
                                    </span>

                                @elseif($payment->status == 'pending')

                                    <span class="badge bg-warning text-dark">
                                        Pending
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Failed
                                    </span>

                                @endif

                            </td>

                            <td>
                                {{ $payment->remarks ?? '-' }}
                            </td>

                            <td>

                                <a href="{{ route('admin.payments.edit', $payment->id) }}"
                                   class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form action="{{ route('admin.payments.destroy', $payment->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this payment?')">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="10"
                                class="text-center">

                                No payments found.

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

