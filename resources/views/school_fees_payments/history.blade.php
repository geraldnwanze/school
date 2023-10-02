@extends('layouts.app')

@section('content')


<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">School Fee Payment History</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">School Fee Payment History</li>
      </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
          <!-- Form Basic -->
          <div class="card mb-4">
            <div class="card-body">
                <button class="btn btn-secondary btn-sm"><i class="fas fa-fw fa-print"></i> print</button>
            </div>
          </div>
      </div>
      <!--Row-->
    </div>

    <div class="row">
      <div class="col-lg-12">
        <!-- Input Group -->
           <div class="row">
        <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">History</h6>
          </div>
          <div class="table-responsive p-3">
            <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <table class="table align-items-center table-flush table-hover dataTable no-footer" id="dataTableHover" role="grid" aria-describedby="dataTableHover_info">
                        <thead class="thead-light">
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 115.383px;">#</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Student</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Amount Paid</th>
                        </thead>

                        <tbody>
                            @forelse ($histories as $history)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $loop->index + 1 }}</td>
                                    <td>{{ $history->payment->student->profile->last_name .' '. $history->payment->student->profile->first_name .' '. $history->payment->student->profile->other_names }}</td>
                                    <td>{{ number_format($history->amount_paid) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%">no data</td>
                                </tr>
                            @endforelse
                            <tr>
                                <td colspan="2" class="text-center">Total</td>
                                <td>{{ number_format($histories->sum('amount_paid')) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!--Row-->

  </div>
  <!---Container Fluid-->
</div>
@endsection
