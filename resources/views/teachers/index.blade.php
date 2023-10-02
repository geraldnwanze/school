@extends('layouts.app')

@section('content')


<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Teachers</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Teachers</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Create Teacher</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('teachers.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-3">
                            <div class="col-xl-4">
                                <label class="form-control-label">Name<span class="text-danger ml-2">*</span></label>
                                <input type="text" class="form-control" name="name" value="" id="exampleInputFirstName" placeholder="">
                            </div>
                            <div class="col-xl-4">
                                <label class="form-control-label">Phone<span class="text-danger ml-2">*</span></label>
                                <input type="tel" class="form-control" name="phone" value="" id="exampleInputFirstName" placeholder="">
                            </div>
                            <div class="col-xl-4">
                                <label class="form-control-label">residential address<span class="text-danger ml-2">*</span></label>
                                <textarea name="address" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-xl-4">
                                <label class="form-control-label">Passport<span class="text-danger ml-2">*</span></label>
                                <input type="file" class="form-control" name="passport" value="" id="exampleInputFirstName" placeholder="">
                            </div>
                            <div class="col-xl-4">
                                <label class="form-control-label">Marital Status<span class="text-danger ml-2">*</span></label>
                                <select name="marital_status" class="form-control">
                                    <option value="">choose marital status</option>
                                    @forelse ($maritalStatus as $status)
                                        <option value="{{ $status }}">{{ $status }}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>
                            <div class="col-xl-4">
                                <label class="form-control-label">date of employment<span class="text-danger ml-2">*</span></label>
                                <input type="date" class="form-control" name="date_of_employment" value="" id="exampleInputFirstName" placeholder="">
                            </div>
                        </div>

                        <button type="submit" name="save" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <!-- Input Group -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
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
                                        <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Phone</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Address</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Passport</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Marital Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Date of employment</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 223.68px;">Action</th>
                                </thead>

                                <tbody>
                                    @forelse ($teachers as $teacher)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{ $loop->index + 1 }}</td>
                                            <td>{{ $teacher->name }}</td>
                                            <td>{{ $teacher->phone }}</td>
                                            <td>{{ $teacher->address }}</td>
                                            <td>
                                                <img src="{{ asset($teacher->passport) }}" alt="" width="200">
                                            </td>
                                            <td>{{ $teacher->marital_status }}</td>
                                            <td>{{ $teacher->date_of_employment }}</td>
                                            <td>
                                                <button type="button" class="mx-3 btn btn-warning btn-sm" data-toggle="modal" data-target="#studentEditModal-{{ $teacher->id }}">
                                                    <i class="fas fa-fw fa-edit"></i> Edit
                                                </button>
                                                <a href="" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i>Delete</a>
                                            </td>

                                            <!-- Modal -->
                                            <div class="modal fade" id="studentEditModal-{{ $teacher->id }}" tabindex="-1" role="dialog" aria-labelledby="studentEditModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content" style="">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="studentEditModalLabel"></h5>
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
                                                                    <form method="post" action="{{ route('teachers.update', $teacher->id) }}" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PATCH')
                                                                        <div class="form-group row mb-3">
                                                                            <div class="col-xl-4">
                                                                                <label class="form-control-label">Name<span class="text-danger ml-2">*</span></label>
                                                                                <input type="text" class="form-control" name="name" value="{{ $teacher->name }}" id="exampleInputFirstName" placeholder="">
                                                                            </div>
                                                                            <div class="col-xl-4">
                                                                                <label class="form-control-label">Phone<span class="text-danger ml-2">*</span></label>
                                                                                <input type="text" class="form-control" name="phone" value="{{ $teacher->phone }}" id="exampleInputFirstName" placeholder="">
                                                                            </div>
                                                                            <div class="col-xl-4">
                                                                                <label class="form-control-label">residential address<span class="text-danger ml-2">*</span></label>
                                                                                <textarea name="address" class="form-control">{{ $teacher->address }}</textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row mb-3">
                                                                            <div class="col-xl-4">
                                                                                <label class="form-control-label">Passport<span class="text-danger ml-2">*</span></label>
                                                                                <input type="file" class="form-control" name="passport" value="" id="exampleInputFirstName" placeholder="">
                                                                            </div>
                                                                            <div class="col-xl-4">
                                                                                <label class="form-control-label">Marital Status<span class="text-danger ml-2">*</span></label>
                                                                                <select name="marital_status" class="form-control">
                                                                                    <option value="">choose marital status</option>
                                                                                    @forelse ($maritalStatus as $status)
                                                                                        <option value="{{ $status }}" @if ($status == $teacher->marital_status) selected @endif>{{ $status }}</option>
                                                                                    @empty

                                                                                    @endforelse
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-xl-4">
                                                                                <label class="form-control-label">date of employment<span class="text-danger ml-2">*</span></label>
                                                                                <input type="date" class="form-control" name="date_of_employment" value="{{ $teacher->date_of_employment }}" id="exampleInputFirstName" placeholder="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row mb-3">
                                                                            <div class="col-xl-4">
                                                                                <img src="{{ $teacher->passport }}" alt="" width="100">
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
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    {{ $teachers->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
