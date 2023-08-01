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
    <div class="container mt-5">
        <div class="float-right">
             <!-- Withdrawn Button -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#withdrawn"> WithDrawn </button>
             <!-- Deposit Button -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deposit"> Deposit </button>

        </div>
    </div>
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


   
    <!-- Withdrawn Modal -->
    <div class="modal fade" id="withdrawn" tabindex="-1" aria-labelledby="withdrawnLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="withdrawnLabel">Withdrawn Money</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('withdrawn') }}" method="post"> @csrf
                    <div class="modal-body">
                        <input type="number" class="form-control" required min="1"
                            placeholder="Enter Amount for Withdrawn" max="{{$total_amount-1}}" name="withdrawn">
                            <input type="hidden" name="total_amount" value="{{$total_amount}}">
                        <div class="">
                            <b>Total Amount : <strong>{{$total_amount}}</strong></b>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                        <button type="submit" class="btn btn-primary">Proceed</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Deposited Modal -->
    <div class="modal fade" id="deposit" tabindex="-1" aria-labelledby="depositLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="depositLabel">Deposit Money</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('deposit') }}" method="post"> @csrf
                    <div class="modal-body">
                        <input type="number" class="form-control" required min="1"
                            placeholder="Enter Amount for Deposite" name="deposit">
                            <input type="hidden" name="total_amount" value="{{$total_amount}}">
                        <div class="">
                            <b>Total Amount : <strong>{{$total_amount}}</strong></b>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                        <button type="submit" class="btn btn-primary">Proceed</button>
                    </div>
                </form>
            </div>
        </div>
    </div>






@endsection
