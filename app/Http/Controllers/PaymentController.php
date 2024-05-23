<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Payment;
use App\Models\Enrollment;
use Illuminate\View\View;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():view
    {
        $payments = Payment::all();
        return view ('payment.index')->with('payments', $payments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():view
    {
        $enrollments=Enrollment::pluck('enroll_no','id');
        return view('payment.create',compact('enrollments'));
        // return view('batch.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $input = $request->all();
        Payment::create($input);
        return redirect('payments')->with('flash_message', 'payments Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):view
    {
        $payments = Payment::find($id);
        return view('payment.show')->with('payments', $payments);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):view
    {
        $payments = Payment::find($id);
        $enrollments=Enrollment::pluck('enroll_no','id');
        return view('payment.edit',compact('payments', 'enrollments'));
        // return view('payment.edit')->with('payments', $enrollments);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):RedirectResponse
    {
        $payments = Payment::find($id);
        $input = $request->all();
        $payments->update($input);
        return redirect('payments')->with('flash_message', 'payments Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        Payment::destroy($id);
        return redirect('payments')->with('flash_message', 'payments deleted!'); 
    }
}
