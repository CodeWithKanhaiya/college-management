<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use App\Models\Student;
use App\Models\Fees;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // INDEX
    public function index()
    {
        $payments = Payments::with([
            'student.user',
            'fee'
        ])
        ->latest()
        ->get();

        return view(
            'admin.payments.index',
            compact('payments')
        );
    }


    // CREATE
    public function create()
    {
        $students = Student::with('user')
            ->where('status', true)
            ->latest()
            ->get();

        $fees = Fees::with([
            'student.user',
            'course'
        ])
        ->latest()
        ->get();

        return view(
            'admin.payments.create',
            compact('students', 'fees')
        );
    }


    // STORE
    public function store(Request $request)
    {
        $validated = $request->validate([

            'student_id' => [
                'required',
                'exists:students,id'
            ],

            'fee_id' => [
                'required',
                'exists:fees,id'
            ],

            'transaction_id' => [
                'nullable',
                'string',
                'max:255'
            ],

            'amount' => [
                'required',
                'numeric',
                'min:0.01'
            ],

            'payment_method' => [
                'required',
                'in:cash,upi,card,net_banking'
            ],

            'payment_date' => [
                'required',
                'date'
            ],

            'status' => [
                'required',
                'in:paid,pending,failed'
            ],

            'remarks' => [
                'nullable',
                'string',
                'max:500'
            ],
        ]);


        $fee = Fees::findOrFail(
            $validated['fee_id']
        );


        // Payment amount cannot exceed due amount
        if (
            $validated['amount']
            > $fee->due_amount
        ) {

            return back()
                ->withInput()
                ->withErrors([
                    'amount' =>
                    'Payment amount cannot be greater than due amount.'
                ]);
        }


        Payments::create($validated);


        // Update fee amounts only for successful/paid payment
        if ($validated['status'] === 'paid') {

            $fee->paid_amount =
                $fee->paid_amount + $validated['amount'];

            $fee->due_amount =
                $fee->total_amount - $fee->paid_amount;


            if ($fee->due_amount <= 0) {

                $fee->due_amount = 0;
                $fee->status = 'paid';

            } else {

                $fee->status = 'partial';
            }

            $fee->save();
        }


        return redirect()
            ->route('admin.payments.index')
            ->with(
                'success',
                'Payment added successfully.'
            );
    }


    // EDIT
    public function edit(Payments $payment)
    {
        $students = Student::with('user')
            ->where('status', true)
            ->latest()
            ->get();

        $fees = Fees::with([
            'student.user',
            'course'
        ])
        ->latest()
        ->get();

        return view(
            'admin.payments.edit',
            compact(
                'payment',
                'students',
                'fees'
            )
        );
    }


    // UPDATE
    public function update(
        Request $request,
        Payments $payment
    ) {

        $validated = $request->validate([

            'student_id' => [
                'required',
                'exists:students,id'
            ],

            'fee_id' => [
                'required',
                'exists:fees,id'
            ],

            'transaction_id' => [
                'nullable',
                'string',
                'max:255'
            ],

            'amount' => [
                'required',
                'numeric',
                'min:0.01'
            ],

            'payment_method' => [
                'required',
                'in:cash,upi,card,net_banking'
            ],

            'payment_date' => [
                'required',
                'date'
            ],

            'status' => [
                'required',
                'in:paid,pending,failed'
            ],

            'remarks' => [
                'nullable',
                'string',
                'max:500'
            ],
        ]);


        $payment->update($validated);


        return redirect()
            ->route('admin.payments.index')
            ->with(
                'success',
                'Payment updated successfully.'
            );
    }


    // DELETE
    public function destroy(Payments $payment)
    {
        $payment->delete();

        return redirect()
            ->route('admin.payments.index')
            ->with(
                'success',
                'Payment deleted successfully.'
            );
    }
}