<?php

namespace App\Http\Controllers;

use App\Models\ExpenseReport;
use Illuminate\Http\Request;

class ExpenseReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ExpenseReport.index',[
            'reports' => ExpenseReport::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ExpenseReport.createEdit', [
            'titlePage' => 'Create new report',
            'actionbutton' => 'Registrar',
            'urlAction' => '/expense_report',
            'action' => '0' //0 = POST, 1 = PUT
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valiData = $request->validate([
            'title' => "required|min:5|max:60",
            'description' => "required|min:5|max:60"
        ]);

        $report = new ExpenseReport();
        $report->title = $valiData['title'];
        $report->description = $valiData['description'];
        $report->save();
        
        return redirect('/expense_report');
        //Pending Notify
        //return redirect()->route('expense_report', ['notificacion' => 'El reporte fue registrado correctamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExpenseReport  $expenseReport
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseReport $expenseReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExpenseReport  $expenseReport
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenseReport $expenseReport)
    {
        return view('ExpenseReport.createEdit', [
            'titlePage' => 'Edit Expense Report',
            'actionbutton' => 'Actualzar',
            'urlAction' => "/expense_report/$expenseReport->id",
            'action' => '1', //0 = POST, 1 = PUT
            'report' => $expenseReport
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExpenseReport  $expenseReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpenseReport $expenseReport)
    {
        $valiData = $request->validate([
            'title' => "required|min:5|max:60",
            'description' => "required|min:5|max:60"
        ]);

        $expenseReport->title = $valiData['title'];
        $expenseReport->description = $valiData['description'];
        $expenseReport->save();

        return redirect('/expense_report');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExpenseReport  $expenseReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseReport $expenseReport)
    {
        $expenseReport->delete();

        return json_encode(true);
    }
}
