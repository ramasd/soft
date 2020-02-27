@include('inc.navbar')
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">

            <div class="col-sm-12">
                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}  
                    </div>
                @endif
            </div>

            <div class="col-sm-12">
                <h1 class="display-4">Customers</h1>

                <div>
                    <a style="margin: 19px;" href="{{ route('customers.create')}}" class="btn btn-primary">Add New Customer</a>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td colspan = 2>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td>{{$customer->id}}</td>
                                <td>{{$customer->first_name}} {{$customer->last_name}}</td>
                                <td>{{$customer->email}}</td>
                                <td>
                                    <a href="{{ route('customers.edit',$customer->id)}}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('customers.destroy', $customer->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection