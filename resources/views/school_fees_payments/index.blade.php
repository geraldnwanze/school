@extends('layouts.app')

@section('content')


<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">School Fees Payments</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">School Fees Payments</li>
      </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
          <!-- Form Basic -->
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Create New Payment</h6>
          </div>
            <div class="card-body">
                  <form method="post" action="{{ route('school-fee-payments.store') }}">
                      @csrf

                      <div class="form-group row mb-3">
                          <div class="col-xl-6">
                            <label class="form-control-label">Class<span class="text-danger ml-2">*</span></label>
                            <select name="class_id" class="form-control" id="classes">
                                <option value="">choose class</option>
                                @forelse ($classrooms as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @empty
                                    <option value="">no data</option>
                                @endforelse
                            </select>
                          </div>
                          <div class="col-xl-6">
                            <label class="form-control-label">Student<span class="text-danger ml-2">*</span></label>
                            <select name="student_id" class="form-control" id="students-list">

                            </select>
                          </div>
                      </div>
                      <div class="form-group row mb-3">
                        <div class="col-xl-12">
                            <label class="form-control-label" >Attributes<span class="text-danger ml-2">*</span></label>
                            <div id="attributes"></div>
                          </div>
                      </div>
                      <div class="form-group row mb-3">
                        <div class="col-xl-12">
                            <label class="form-control-label">Discount<span class="text-danger ml-2">*</span></label>
                            <input type="number" placeholder="Discount" class="form-control">
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
            <h6 class="m-0 font-weight-bold text-primary">All School Fees</h6>
          </div>
          <div class="table-responsive p-3">
            <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                            <table class="table align-items-center table-flush table-hover dataTable no-footer" id="dataTableHover" role="grid" aria-describedby="dataTableHover_info">
              <thead class="thead-light">
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 115.383px;">#</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Session</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Term</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Student</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Class</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Amount Paid</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Balance</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Status</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 223.68px;">Action</th>
              </thead>

                <tbody>
                    @forelse ($schoolFeesPayments as $fee)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{ $loop->index + 1 }}</td>
                            <td>{{ $fee->session->from .'/'. $fee->session->to }}</td>
                            <td>{{ $fee->term->name }}</td>
                            <td>{{ $fee->student->profile->last_name .' '. $fee->student->profile->first_name .' '. $fee->student->profile->other_names }}</td>
                            <td>{{ $fee->class->name }}</td>
                            <td>{{ number_format($fee->amount_paid) }}</td>
                            <td>{{ number_format($fee->schoolFee->amount - $fee->amount_paid) }}</td>
                            <td>{{ $fee->status }}</td>
                            <td>
                                @if ($fee->status != 'completed')
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#classroomEditModal-{{ $fee->id }}">
                                        <i class="fas fa-fw fa-edit"></i> Add Payment
                                    </button>
                                @endif
                                <a href="{{ route('school-fee-payments.print-receipt', $fee->id) }}" target="_blank" class="btn btn-secondary btn-sm"><i class="fas fa-fw fa-print"></i> Print Receipt</a>
                                <a href="{{ route('school-fee-payments.show', $fee->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-eye"></i> view history</a>
                            </td>

                            <!-- Modal -->
                            <div class="modal fade" id="classroomEditModal-{{ $fee->id }}" tabindex="-1" role="dialog" aria-labelledby="classroomEditModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
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
                                            <h6 class="m-0 font-weight-bold text-primary">Add Payment</h6>
                                        </div>
                                            <div class="card-body">
                                                <form method="post" action="{{ route('school-fee-payments.update', $fee->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="form-group row mb-3">
                                                        <div class="col-xl-12">
                                                            <label class="form-control-label">Amount Paid<span class="text-danger ml-2">*</span></label>
                                                            <input type="number" class="form-control" name="amount_paid" id="exampleInputFirstName" placeholder="" value="">
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
      </div>
    </div>
    <!--Row-->

  </div>
  <!---Container Fluid-->
</div>

<script>
    $('#classes').change((e) => {
        let self = e.target;
        let value = self.value;
        if (value === '' || value === ' ' || value === undefined || value === null) {
            $('#students-list').empty();
            $('#attributes').empty();
            return;
        }

        const studentUrl = "{{ route('students.profile.search-by-class') }}";
        const schoolFeeUrl = "{{ route('school-fees.search-by-class') }}";

        $.ajax({
            url: studentUrl,
            data: {class_id: value},
            success: (response) => {
                appendStudents(response)
            },
            error: (error) => {
                $('#students-list').empty();
            }
        });

        $.ajax({
            url: schoolFeeUrl,
            data: {class_id: value},
            success: (response) => {
                appendAttributes(response);
            },
            error: (error) => {
                $('#attributes').empty();
            }
        });
    })

    function appendStudents(data) {
        if (data.length < 1) {
            $('#students-list').empty();
        } else {
            let option = '';
            for (let i = 0; i < data.length; i++) {
                const element = data[i];
                option += `<option value="${element.id}">${element.last_name} ${element.first_name} ${element.other_names}</option>`;
            }
            $('#students-list').append(option);
        }
    }

    function appendAttributes(data) {
        if (data.length < 1) {
            $('#attributes').empty();
        } else {
            let checkBox = '';
            for (let i = 0; i < data.length; i++) {
                const element = data[i];
                checkBox += `<input type="checkbox" value="${element.id}" /> ${element.attribute.name} - ${(element.amount).toLocaleString()} &nbsp;`
            }
            $('#attributes').append(checkBox);
        }
    }
</script>
@endsection
