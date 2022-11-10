<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExpenseTypeRequest;
use App\Models\ExpenseType;
use Illuminate\Http\Request;

class ExpenseTypeController extends Controller
{
    public function index()
    {
        $expenses = ExpenseType::all();
        return view('panel.accounting.expenses.typeindex', compact('expenses'));
    }


    public function create()
    {
        return view('panel.accounting.expenses.typecreate');
    }
    public function store(CreateExpenseTypeRequest $request)
    {
        $expense = ExpenseType::create($request->validated());
        return redirect()->route('admin.accounting.expensetypes');
    }
    public function edit($id)
    {
        $expense = ExpenseType::find($id);
        return view('panel.accounting.expenses.typeedit', compact(['expense']));
    }
    public function update(CreateExpenseTypeRequest $request, $id)
    {
        $expense = ExpenseType::find($id);
        $expense->update($request->validated());
        return redirect()->route('admin.accounting.expensetypes');
    }

    public function destroy($id)
    {
        $expense = ExpenseType::find($id);
        $expense->delete();
        return redirect()->route('admin.accounting.expensetypes');
    }
}
