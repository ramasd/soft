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
                @if(session()->get('danger'))
                    <div class="alert alert-danger">
                        {{ session()->get('danger') }}  
                    </div>
                @endif
            </div>

            <div class="col-sm-12">
                <h1 class="display-4">Customers</h1>


                <form method="post">
                    @csrf
                    <a style="margin: 19px;" href="{{ route('customers.create')}}" class="btn btn-primary">Add New Customer</a>
                    
                    <button style="margin: 19px;" type="submit" formaction="{{ route('sendEmails') }}" class="btn btn-success mt-3 mr-3">Send Emails</button>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td colspan = 2>Actions</td>
                                <td>Checkbox</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>
                                        <a href="{{ route('customers.edit',$customer->id) }}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        {{-- <form action="{{ route('customers.destroy', $customer->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form> --}}
                                    </td>
                                    <td><input type="checkbox" name="selected_customers[]" value="{{ $customer->id }}"></td>
                                {{-- <td><input type="checkbox" name="selected_customers[]" id="checkbox-{{ $customer->id }}" onclick="alert()" value="{{ $customer->id }}"></td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection