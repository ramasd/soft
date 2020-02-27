@include('inc.navbar')
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Create New Customer</h1>
        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form action="{{ $customer->id == null ? route('customers.store') :  route('customers.update', $customer->id) }}" method="POST">
                @isset($customer->id)
                    {{ method_field('PATCH')}}
                @endisset
                @csrf
                <div class="form-group">    
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $customer->first_name) }}" />
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $customer->last_name) }}" />
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email', $customer->email) }}" />
                </div>                        
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection