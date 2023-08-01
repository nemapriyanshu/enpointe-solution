@extends('layouts.app')
@section('content')
    <div class="text-center h3">
        Customers Details 
    </div>

    <table class="table container text-center">
        <thead>
          <tr>
            <th scope="col">Customer Name</th>
            <th scope="col">Email Id</th>
            <th scope="col">Check Transaction Details</th>
          </tr>
        </thead>
        <tbody>
            @if (count($customerDetails))
                @foreach ($customerDetails as $customer)
                    <tr>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->email}}</td>
                        <td>
                            <a href="{{ route('customerDetail', ['id'=>$customer->id]) }}" class="btn btn-primary btn-sm">Transaction Details</a>
                            
                        </td>
                    </tr>
                @endforeach
            @else
                <tr><td colspan="3">No Customers Found </td></tr>
            @endif
          
         
        </tbody>
      </table>
@endsection