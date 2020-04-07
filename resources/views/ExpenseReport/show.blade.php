@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Reports: {{ $report->title }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-1">
            <a href="/expense_report" class="btn btn-secondary">Back</a>
        </div>
        <div class="col-sm-2">
            <a href="/expense_report/{{$report->id}}/expense/create" class="btn btn-primary">Create Expense...</a>
        </div>
        <div class="col-sm-2">
            <a href="/expense_report/{{$report->id}}/confirmSendEmail" class="btn btn-primary">Send Email</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <table class="table">
                <th scope="col">Description</th>
                <th scope="col">Amount</th>
                <th scope="col">Created_at</th>
                <th scope="col">Updated_at</th>
                @foreach ($report->Expenses as $expense)
                    <tr>
                        <td>{{ $expense->description }}</td>
                        <td>$ {{ $expense->amount }}</td>
                        <td>{{ $expense->created_at }}</td>
                        <td>{{ $expense->updated_at }}</td>
                        <td><a href="/expense/{{$expense->id}}/edit">Edit</a></td>
                        <td><a href="/expense/{{$expense->id}}">Delete</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection