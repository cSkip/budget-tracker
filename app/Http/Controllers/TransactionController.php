<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function all()
    {
        $transactions = Transaction::all();
        return response()->json($transactions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'description' => 'required',
        ]);
        $transaction = Transaction::create($request->all());

        return response()->json(['message' => 'expense created',
            'transaction' => $transaction]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Transaction $transaction
     * @return Transaction
     */
    public function show(Transaction $transaction)
    {
        return $transaction;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Transaction $transaction
     * @return JsonResponse
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'description' => 'required'
        ]);
        $transaction->name = $request->get('name');
        $transaction->amount = $request->get('amount');
        $transaction->description = $request->get('description');
        $transaction->save();

        return response()->json([
            'message' => 'transaction updated!',
            'transaction' => $transaction
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Transaction $transaction
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return response()->json([
            'message' => 'transaction deleted'
        ]);

    }
}
