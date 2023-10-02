@extends('layouts.app')

@section('content')


<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Teachers</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Subjects</li>
      </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
          <!-- Form Basic -->
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Assign subject to teacher</h6>
          </div>
            <div class="card-body">
                  <form method="post" action="{{ route('teacher-subjects.store') }}">
                      @csrf
                      <div class="form-group row mb-3">
                          <div class="col-xl-6">
                            <label class="form-control-label">Teacher<span class="text-danger ml-2">*</span></label>
                            <select name="teacher_id" class="form-control">
                                <option value="">choose teacher</option>
                                @forelse ($teachers as $teacher)
                                    @if ($teacher->subjects->count() < 1)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endif
                                @empty

                                @endforelse
                            </select>
                          </div>
                          <div class="col-xl-6">
                            <label class="form-control-label">Subjects<span class="text-danger ml-2">*</span></label>
                            <br>
                                @forelse ($subjects as $subject)
                                        <input type="checkbox" name="subject_id[]" value="{{ $subject->id }}" > {{ $subject->name }} &nbsp;
                                @empty

                                @endforelse
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
            <h6 class="m-0 font-weight-bold text-primary">Teachers and subjects</h6>
          </div>
          <div class="table-responsive p-3">
            <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                            <div id="dataTableHover_filter" class="dataTables_filter">
                                <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTableHover"></label>
                            </div>
                    </div>
                            <table class="table align-items-center table-flush table-hover dataTable no-footer" id="dataTableHover" role="grid" aria-describedby="dataTableHover_info">
              <thead class="thead-light">
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 115.383px;">#</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Teacher</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Subjects</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 223.68px;">Action</th>
              </thead>

                <tbody>
                    @forelse ($teachers as $teacher)
                        @if ($teacher->subjects->count() > 0)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{ $loop->index + 1 }}</td>
                                <td>{{ $teacher->name }}</td>
                                <td>
                                    @foreach ($teacher->subjects as $subject)
                                        {{ $subject->name }},
                                    @endforeach
                                </td>
                                <td>
                                    <button type="button" class="mx-3 btn btn-warning btn-sm" data-toggle="modal" data-target="#teacherClassroomEditModal-{{ $teacher->id }}">
                                        <i class="fas fa-fw fa-edit"></i> Edit
                                    </button>
                                    <a href="" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i>Delete</a>
                                </td>

                                <!-- Modal -->
                                <div class="modal fade" id="teacherClassroomEditModal-{{ $teacher->id }}" tabindex="-1" role="dialog" aria-labelledby="teacherClassroomEditModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="teacherClassroomEditModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form Basic -->
                                            <div class="card mb-4">
                                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-primary">Edit Teacher Subjects</h6>
                                            </div>
                                                <div class="card-body">
                                                    <form method="post" action="{{ route('teacher-subjects.update', $teacher->id) }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="form-group row mb-3">
                                                            <div class="col-xl-6">
                                                            <label class="form-control-label">Teacher<span class="text-danger ml-2">*</span></label>
                                                            <select name="teacher_id" class="form-control">
                                                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                                            </select>
                                                            </div>
                                                            <div class="col-xl-6">
                                                            <label class="form-control-label">Class<span class="text-danger ml-2">*</span></label>
                                                            <br>
                                                                @foreach ($subjects as $subject)
                                                                    <input type="checkbox" name="subject_id[]" value="{{ $subject->id }}"
                                                                        @foreach ($teacher->subjects as $item)
                                                                            {{ $item->id == $subject->id ? 'checked' : '' }}
                                                                        @endforeach
                                                                    > {{ $subject->name }} &nbsp;

                                                                @endforeach
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
                        @endif

                    @empty

                    @endforelse
                </tbody>
            </table>
        <div class="row">
            <div class="col-sm-12 col-md-5">
                {{ $teachers->links() }}
            </div>
        </div>
      </div>
      </div>
    </div>
    <!--Row-->

  </div>
  <!---Container Fluid-->
</div>
@endsection
