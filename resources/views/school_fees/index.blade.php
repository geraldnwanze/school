@extends('layouts.app')

@section('content')


<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">School Fees</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">School Fees</li>
      </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
          <!-- Form Basic -->
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Create School Fees</h6>
          </div>
            <div class="card-body">
                  <form method="post" action="{{ route('school-fees.store') }}">
                      @csrf
                      <div class="form-group row mb-3">
                        <div class="col-xl-6">
                            <label class="form-control-label">Session<span class="text-danger ml-2">*</span></label>
                            <select name="session_id" class="form-control">
                                @foreach ($sessions as $session)
                                    <option value="{{ $session->id }}" {{ $session->status === 'active' ? 'selected' : '' }}>{{ $session->from .'/'. $session->to }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-6">
                            <label class="form-control-label">Term<span class="text-danger ml-2">*</span></label>
                            <select name="term_id" class="form-control">
                                @foreach ($terms as $term)
                                    <option value="{{ $term->id }}" {{ $term->status === 'active' ? 'selected' : '' }}>{{ $term->name }}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="form-group row mb-3">
                          <div class="col-xl-4">
                            <label class="form-control-label">Class<span class="text-danger ml-2">*</span></label>
                            <select name="classroom_id" class="form-control">
                                <option value="">select class</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="col-xl-4">
                            <label class="form-control-label">Attribute<span class="text-danger ml-2">*</span></label>
                            <select name="school_fee_attribute_id" class="form-control">
                                <option value="">choose attribute</option>
                                @foreach ($attributes as $attribute)
                                    <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="col-xl-4">
                            <label class="form-control-label">Amount<span class="text-danger ml-2">*</span></label>
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
          <div class="card-header py-3 align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Filter</h6>

            <div class="row">
                <div class="col-xl-12">
                    <form method="get" >
                        <div class="form-group row mb-3">
                          <div class="col-xl-6">
                              <label class="form-control-label">By<span class="text-danger ml-2">*</span></label>
                              <select name="filter" class="form-control" id="filter">
                                <option value=""></option>
                                <option value="session">session</option>
                                <option value="term">term</option>
                                <option value="class">class</option>
                                <option value="attribute">attribute</option>
                              </select>
                          </div>
                          <div class="col-xl-6">
                              <label class="form-control-label">Select<span class="text-danger ml-2">*</span></label>
                              <select name="data" class="form-control" id="filter-data">

                              </select>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
          </div>

          <div class="table-responsive p-3">
            <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                            <table class="table align-items-center table-flush table-hover dataTable no-footer" id="dataTableHover" role="grid" aria-describedby="dataTableHover_info">
              <thead class="thead-light">
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 115.383px;">#</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Class</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Attribute</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Amount</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 223.68px;">Action</th>
              </thead>

                <tbody>
                    @forelse ($fees as $fee)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{ $loop->index + 1 }}</td>
                            <td>{{ $fee->classroom->name }}</td>
                            <td>{{ $fee->attribute->name }}</td>
                            <td>{{ number_format($fee->amount) }}</td>
                            <td>
                                <button type="button" class="mx-3 btn btn-warning btn-sm" data-toggle="modal" data-target="#classroomEditModal-{{ $fee->id }}">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </button>
                                <a href="" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i>Delete</a>
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
                                            <h6 class="m-0 font-weight-bold text-primary">Edit School Fee</h6>
                                        </div>
                                            <div class="card-body">
                                                <form method="post" action="{{ route('school-fees.update', $fee->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="form-group row mb-3">
                                                        <div class="col-xl-4">
                                                          <label class="form-control-label">Class<span class="text-danger ml-2">*</span></label>
                                                          <select name="classroom_id" class="form-control">
                                                              <option value="">select class</option>
                                                              @foreach ($classes as $class)
                                                                  <option value="{{ $class->id }}" {{ $class->id == $fee->classroom_id ? 'selected' : '' }}>{{ $class->name }}</option>
                                                              @endforeach
                                                          </select>
                                                        </div>
                                                        <div class="col-xl-4">
                                                          <label class="form-control-label">Name<span class="text-danger ml-2">*</span></label>
                                                          <input type="text" class="form-control" name="name" value="{{ $fee->name }}">
                                                        </div>
                                                        <div class="col-xl-4">
                                                          <label class="form-control-label">Amount<span class="text-danger ml-2">*</span></label>
                                                          <input type="number" class="form-control" name="amount" value="{{ $fee->amount }}">
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
    $('#filter').change(() => {
        let value = $('#filter').val()
        let url = "{{ route('school-fees.get-filter-data') }}";

        if (value !== '' && value !== null && value != undefined && value !== '') {
            $.ajax({
                url: url,
                data: {filter: value},
                success: (response) => {
                    appendData(response, value)
                },
                error: (error) => {
                    $('#filter-data').empty();
                }
            });
        }
    })

    function appendData(data, type) {
        $('#filter-data').empty();
        if (data.length < 1) {
            $('#filter-data').empty();
        } else {
            let option = '';
            switch (type) {
                case 'session':
                    for (let i = 0; i < data.length; i++) {
                        const element = data[i];
                        option += `<option value="${element.id}">${element.from} / ${element.to}</option>`;
                    }
                    $('#filter-data').append(option);
                    break;

                case 'term':
                    for (let i = 0; i < data.length; i++) {
                        const element = data[i];
                        option += `<option value="${element.id}">${element.name}</option>`;
                    }
                    $('#filter-data').append(option);
                    break;

                case 'class':
                    for (let i = 0; i < data.length; i++) {
                        const element = data[i];
                        option += `<option value="${element.id}">${element.name}</option>`;
                    }
                    $('#filter-data').append(option);
                    break;

                case 'attribute':
                    for (let i = 0; i < data.length; i++) {
                        const element = data[i];
                        option += `<option value="${element.id}">${element.name}</option>`;
                    }
                    $('#filter-data').append(option);
                    break;
            }
        }
    }
</script>
@endsection
