@extends('layouts.app')

@section('content')


<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Offence Payments</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Offence Payments</li>
      </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
          <!-- Form Basic -->
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Search Offence Payment</h6>
          </div>
          <div class="card-body">
                <form method="post" action="{{ route('subjects.store') }}">
                    @csrf
                    <div class="form-group row mb-3">
                        <div class="col-xl-12">
                        <label class="form-control-label">Class<span class="text-danger ml-2">*</span></label>
                        <select name="classroom_id" class="form-control">
                            <option value="">choose class</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <button type="submit" name="save" class="btn btn-primary">Search</button>
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
            <h6 class="m-0 font-weight-bold text-primary">All Offence Payments</h6>
          </div>
          <div class="table-responsive p-3">
            <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                            <table class="table align-items-center table-flush table-hover dataTable no-footer" id="dataTableHover" role="grid" aria-describedby="dataTableHover_info">
              <thead class="thead-light">
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 115.383px;">#</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Student</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Class</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Offence</th>
              </thead>

                <tbody>
                    @forelse ($students as $student)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{ $loop->index + 1 }}</td>
                            <td>{{ $student->profile->last_name .' '. $student->profile->first_name .' '. $student->profile->other_names }}</td>
                            <td>{{ $student->profile->classroom->name }}</td>
                            <td>
                                @foreach ($student->offencePayments as $payment)
                                    {{ $payment->offence->name }} <hr>
                                @endforeach
                            </td>

                            <!-- Modal -->
                            <div class="modal fade" id="classroomEditModal-{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="classroomEditModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Basic -->
                                        <div class="card mb-4">
                                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Edit Offence</h6>
                                        </div>
                                            <div class="card-body">
                                                <form method="post" action="{{ route('offences.update', $student->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="form-group row mb-3">
                                                        <div class="col-xl-6">
                                                            <label class="form-control-label">Name<span class="text-danger ml-2">*</span></label>
                                                            <input type="text" class="form-control" name="name" id="exampleInputFirstName" placeholder="" value="{{ $student->name }}">
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <label class="form-control-label">Penalty<span class="text-danger ml-2">*</span></label>
                                                            <input type="number" class="form-control" name="penalty" id="exampleInputFirstName" placeholder="" value="{{ $student->penalty }}">
                                                        </div>
                                                    </div>
                                                    <button type="submit" name="save" class="btn btn-primary">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
      </div>
      {{ $students->links() }}
      </div>
    </div>
    <!--Row-->

  </div>
  <!---Container Fluid-->
</div>
@endsection
