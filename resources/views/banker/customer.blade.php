@extends('layouts.app')
@section('content')
@php
    $total_amount=0;
@endphp
    <div class="text-center h3">
        Transaction Details
    </div>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show container" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table container text-center">
        <thead>
            <tr>
                <th scope="col">Transaction ID</th>
                <th scope="col">Type</th>
                <th scope="col">Amount</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            @if (count($transctionDetails))
                @foreach ($transctionDetails as $customer)
                    <tr>
                        <td>{{ $customer->transaction_id ?? '234235435435' }}</td>
                        <td>{{ ucfirst($customer->transaction_type) }}</td>
                        <td>
                            @if ($customer->transaction_type == 'deposit')
                                <span class="text-success">+{{ $customer->amount }}</span>
                            @else
                                <span class="text-danger">-{{ $customer->amount }}</span>
                            @endif  
                        </td>
                        <td>
                            <span class="fw-bold">{{ $customer->total_amount }}</span>
                            @php $total_amount = $customer->total_amount @endphp
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">No Transaction Found </td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
