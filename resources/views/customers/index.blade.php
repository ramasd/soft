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
                    
                    <button style="margin: 19px;" type="submit" formaction="{{ route('sendDiscountEmails') }}" class="btn btn-success mt-3 mr-3">Send Emails</button>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td colspan = 2>Actions</td>
                                <td><input type="checkbox" class="checkbox_all"></td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($customers as $customer)
                                <tr id="customer-{{ $customer->id }}">
                                    <td>{{ $customer->id }}</td>
                                    <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>
                                        <a href="{{ route('customers.edit',$customer->id) }}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <button class="deleteRecord btn btn-danger delete_user" data-token="{{ csrf_token() }}" id="{{ $customer->id }}">Delete</button>
                                    </td>
                                    <td><input type="checkbox" class="selected_customers" name="selected_customers[]" value="{{ $customer->id }}"></td>
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

@section('scripts')

<script>
    $(document).ready(function(){
        $(".checkbox_all").click(function(){
            $('input.selected_customers').prop('checked', this.checked);
        });

        $(".deleteRecord").click(function(){
            if(confirm('Are you sure?') ){
                var id = $(this).attr("id");
                var token = $("meta[name='csrf-token']").attr("content");
    
                $.ajax(
                {
                    url: "customers/"+id,
                    type: 'post',
                    data: {
                        _method: 'delete',
                        _token :token
                    },
                    success: function (){
                        $('#customer-' + id).remove();
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
@endsection