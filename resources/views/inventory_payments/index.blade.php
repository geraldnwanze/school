@extends('layouts.app')

@section('content')


<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Inventory</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Inventory</li>
      </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
          <!-- Form Basic -->
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Create Item</h6>
          </div>
            <div class="card-body">
                  <form method="post" action="{{ route('inventory-payments.store') }}">
                      @csrf
                      <div class="form-group row mb-3">
                          <div class="col-xl-3">
                            <label class="form-control-label">Items<span class="text-danger ml-2">*</span></label>
                            <select name="inventory_id" class="form-control">
                                <option value="">choose item</option>
                                @forelse ($inventories as $item)
                                    <option value="{{ $item->id }}">{{ $item->item }} - {{ number_format($item->price) }} - {{ $item->quantity }}</option>
                                @empty

                                @endforelse
                            </select>
                          </div>
                          <div class="col-xl-3">
                            <label class="form-control-label">Student<span class="text-danger ml-2">*</span></label>
                            <select name="student_id" class="form-control">
                                <option value="">choose student</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->profile->last_name .' '. $student->profile->first_name .' '. $student->profile->other_names }} - {{ $student->profile->classroom->name }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="col-xl-3">
                            <label class="form-control-label">quantity<span class="text-danger ml-2">*</span></label>
                            <input type="number" class="form-control" name="quantity" value="" placeholder="">
                          </div>
                          <div class="col-xl-3">
                            <label class="form-control-label">Amount Paid<span class="text-danger ml-2">*</span></label>
                            <input type="number" class="form-control" name="amount" value="" placeholder="">
                          </div>
                      </div>
                      <button type="submit" name="save" class="btn btn-primary">Save</button>
                  </form>
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
            <h6 class="m-0 font-weight-bold text-primary">All Inventory</h6>
          </div>
          <div class="table-responsive p-3">
            <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                            <table class="table align-items-center table-flush table-hover dataTable no-footer" id="dataTableHover" role="grid" aria-describedby="dataTableHover_info">
              <thead class="thead-light">
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 115.383px;">#</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Item</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Student</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Quantity</th>
              </thead>

                <tbody>
                    @forelse ($payments as $payment)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{ $loop->index + 1 }}</td>
                            <td>{{ $payment->inventory->item }}</td>
                            <td>{{ $payment->student->profile->last_name .' '. $payment->student->profile->first_name .' '. $payment->student->profile->other_names }}</td>
                            <td>{{ $payment->quantity }}</td>
                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
      </div>
      {{ $payments->links() }}
      </div>
    </div>
    <!--Row-->

  </div>
  <!---Container Fluid-->
</div>
@endsection
