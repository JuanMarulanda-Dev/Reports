@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="">{{ $titlePage }} <a class="btn btn-secondary" href="/expense_report">Back</a></h2>
            <br>
            <div class="row">
                <div class="col">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->errors as $error)
                                    <li>{{ $error }}</li>         
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ $urlAction }}" method="post" autocomplete="off">
                        @csrf   
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input id="title" class="form-control" type="text" name="title" placeholder="Enter a title by this expense report..." required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input id="description" class="form-control" type="text" name="description" placeholder="Enter a description by this expense report..." required>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ $actionbutton }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
