@extends('layouts.app')

@section('content')


<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Classes</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Classes</li>
      </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
          <!-- Form Basic -->
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Create Class</h6>
          </div>
            <div class="card-body">
                  <form method="post" action="{{ route('classrooms.store') }}">
                      @csrf
                      <div class="form-group row mb-3">
                          <div class="col-xl-6">
                            <label class="form-control-label">Class Name<span class="text-danger ml-2">*</span></label>
                            <input type="text" class="form-control" name="name" value="" id="exampleInputFirstName" placeholder="Class Name">
                          </div>
                          <div class="col-xl-6">
                            <label class="form-control-label">Sub Class Name<span class="text-danger ml-2">*</span></label>
                            <input type="text" class="form-control" name="sub_class" value="" id="exampleInputFirstName" placeholder="a,b,c">
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
            <h6 class="m-0 font-weight-bold text-primary">All Classes</h6>
          </div>
          <div class="table-responsive p-3">
            <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">

                            <table class="table align-items-center table-flush table-hover dataTable no-footer" id="dataTableHover" role="grid" aria-describedby="dataTableHover_info">
              <thead class="thead-light">
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 115.383px;">#</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Class Name</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Sub Classes</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 223.68px;">Action</th>
              </thead>

                <tbody>
                    @forelse ($classrooms as $class)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{ $loop->index + 1 }}</td>
                            <td>{{ $class->name }}</td>
                            <td>
                                @forelse ($class->subClassrooms as $sub)
                                    {{ $sub->name . ',' }}
                                @empty

                                @endforelse
                            </td>
                            <td>
                                <button type="button" class="mx-3 btn btn-warning btn-sm" data-toggle="modal" data-target="#classroomEditModal-{{ $class->id }}">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </button>
                                <a href="" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i>Delete</a>
                            </td>

                            <!-- Modal -->
                            <div class="modal fade" id="classroomEditModal-{{ $class->id }}" tabindex="-1" role="dialog" aria-labelledby="classroomEditModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="classroomEditModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Basic -->
                                        <div class="card mb-4">
                                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Edit Class</h6>
                                        </div>
                                            <div class="card-body">
                                                <form method="post" action="{{ route('classrooms.update', $class->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="form-group row mb-3">
                                                        <div class="col-xl-6">
                                                            <label class="form-control-label">Class Name<span class="text-danger ml-2">*</span></label>
                                                            <input type="text" class="form-control" name="name" id="exampleInputFirstName" placeholder="Class Name" value="{{ $class->name }}">
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <label class="form-control-label">Sub Class Name<span class="text-danger ml-2">*</span></label>
                                                            <input type="text" class="form-control" name="sub_class" value="" id="exampleInputFirstName" placeholder="a,b,c">
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
        {{ $classrooms->links() }}
      </div>
      </div>
    </div>
    <!--Row-->

  </div>
  <!---Container Fluid-->
</div>
@endsection
