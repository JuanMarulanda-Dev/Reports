@extends('layouts.app')

@section('content')
<div class="container">
    @isset($notificacion)
    <div id="notificaciones" class="alert alert-success alert-dismissible fade show position-absolute" style="right: 15px;" role="alert">
        <strong>Genial!</strong> {{ $notificacion }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endisset
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="">Expense Reports 
                <a class="btn btn-primary" href="/expense_report/create">Create new report...</a>
            </h2>
            <br>
            <div class="row">
                <div class="col">
                    <table class="table table-light">
                        <thead>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td><a href="/expense_report/{{ $report->id }}">{{ $report->title }}</a></td>
                                    <td>{{ $report->description }}</td>
                                    <td>{{ $report->created_at }}</td>
                                    <td>{{ $report->updated_at }}</td>
                                    <td>
                                        <a href="/expense_report/{{ $report->id }}/edit">Edit</a> |
                                        <a class="confirmD" data-id="{{ $report->id }}" href="#">Delete</a><!-- Confirm delete with js -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
 
<script>
    $(document).ready(() => {
        let id = 0;
        $('.confirmD').on('click', (event) => {
            event.preventDefault();
            id = $(event.target).data('id');
            $('#ConfirmDelete').modal('show');
        });

        $('#confirm').submit((event) => {
            event.preventDefault();
            $.ajax({
                type: "DELETE",
                url: `/expense_report/${id}`,
                data: $('#confirm').serialize(),
                dataType: "json",
                success: function (response) {
                    if(response){
                        $('.confirmD').modal('hide');
                        setTimeout(() => {window.location.href = "/expense_report"}, 2000);
                    }
                }
            });
        });

    });
</script>

@include('ExpenseReport.confirmDelete')

@endsection
