<?php

namespace App\Http\Controllers;

use App\Collections\ExpensesCollection;
use App\Http\Requests\CreateExpenseRequest;
use App\Models\Expense;
use App\Models\ExpenseType;
use App\Services\UploadImageServices;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        $expenses = ExpensesCollection::collection($request);
        $types = ExpenseType::pluck('name', 'id');
        return view('panel.accounting.expenses.index', compact(['expenses', 'types']));
    }


    public function create()
    {
        $types = ExpenseType::pluck('name', 'id');
        return view('panel.accounting.expenses.create', compact('types'));
    }
    public function store(CreateExpenseRequest $request)
    {
        $image = '';
        if ($request->file('image')) {
            $image = UploadImageServices::upload($request->file('image'), 'receipts');
        }
        $expense = Expense::create(array_merge($request->validated(), ['image' => $image]));
        return redirect()->route('admin.accounting.expenses');
    }
    public function edit(Expense $expense)
    {
        $types = ExpenseType::pluck('name', 'id');
        return view('panel.accounting.expenses.edit', compact(['expense', 'types']));
    }
    public function update(CreateExpenseRequest $request, Expense $expense)
    {
        if ($request->file('image')) {
            $image = UploadImageServices::upload($request->file('image'), 'receipts');
        }
        $expense->update(array_merge($request->validated(), ['image' => $image]));
        return redirect()->route('admin.accounting.expenses');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('admin.accounting.expenses');
    }
}
