@extends('layouts.mainDis')

@section('content')
<div class="serch">
    <input type="text" name="" id="" placeholder="search here">
    <button><i class="fa-solid fa-magnifying-glass"></i></button>
</div>
<div class="headds">
    <h2>Fee Transactions</h2>
    <span><a href="">fee structure &rarr;</a></span>
</div>
<div class="backGroundChange feesTrans">
    <table class="fees">
        <tr id="head">
            <th>Date</th>
            <th>Document number</th>
            <th>Document type</th>
            <th>Debit Amount</th>
            <th>Credit Amount</th>
        </tr>
        @forelse ($student->feetransaction as $feetransaction)
        <tr>
            <td>{{$feetransaction->Date}}</td>
            <td>{{$feetransaction->Document_number}}</td>
            <td>{{$feetransaction->Document_type}}</td>
            <td>{{$feetransaction->Debit_amount}}</td>
            <td>{{$feetransaction->Credit_amount}}</td>
        </tr>
        @empty
        <tr>
            <td>none</td>
            <td>none</td>
            <td>none</td>
            <td>none</td>
            <td>none</td>
        </tr>
        @endforelse
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <th>Balance</th>
            <td>{{$balance}}.00</td>
        </tr>
    </table>
</div>
@endsection