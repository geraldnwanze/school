@extends('layouts.app')

@section('content')

<style>

</style>

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">School Fees Receipt</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">School Fees Receipt</li>
      </ol>
    </div>

    <div class="row" id="receipt">
        <div class="col-lg-6 offset-lg-3">
          <!-- Form Basic -->
          <div class="card mb-4" id="card">
            <div class="card-body">
                <h1 class="text-center" id="school_name">{{ config('app.name') }}</h1>
                <p class="text-center">school fees receipt</p>
                <table class="table">
                    <tr>
                        <th>Student Name</th>
                        <th>{{ $payment->student->profile->last_name .' '. $payment->student->profile->first_name .' '. $payment->student->profile->other_names }}</th>
                    </tr>
                    <tr>
                        <th>Class</th>
                        <th>{{ $payment->class->name }}</th>
                    </tr>
                    <tr>
                        <th>Session</th>
                        <th>{{ $payment->session->from .'/'. $payment->session->to }}</th>
                    </tr>
                    <tr>
                        <th>Term</th>
                        <th>{{ $payment->term->name }}</th>
                    </tr>
                    <tr>
                        <th>Fee Type</th>
                        <th>{{ $payment->schoolFee->name }}</th>
                    </tr>
                    <tr>
                        <th>Expected Amount</th>
                        <th>{{ number_format($payment->schoolFee->amount) }}</th>
                    </tr>
                    <tr>
                        <th>Amount Paid</th>
                        <th>{{ number_format($payment->amount_paid) }}</th>
                    </tr>
                    <tr>
                        <th>Balance</th>
                        <th>{{ number_format($payment->schoolFee->amount - $payment->amount_paid) }}</th>
                    </tr>
                    <tr>
                        <th>Discount</th>
                        <th>0</th>
                    </tr>
                </table>
            </div>
          </div>

          <button class="btn btn-secondary btn-sm mb-5" onclick="printReceipt()" id="printBtn"><i class="fas fa-fw fa-print"></i> print</button>

      </div>
      <!--Row-->

    </div>

</div>

<script>
    function printReceipt(){
        var printContent = document.getElementById('card').innerHTML;
        var originalContent = document.body.innerHTML;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = originalContent;
    }
</script>

@endsection
