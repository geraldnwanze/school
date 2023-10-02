@extends('layouts.app')

@section('content')


<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Students</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Students</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Create Student</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('students.profile.store') }}">
                        @csrf
                        <div class="form-group row mb-3">
                            <div class="col-xl-3">
                                <label class="form-control-label">Class<span class="text-danger ml-2">*</span></label>
                                <select name="classroom_id" class="form-control">
                                    <option value="">choose class</option>
                                    @forelse ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>
                            <div class="col-xl-3">
                                <label class="form-control-label">Last Name<span class="text-danger ml-2">*</span></label>
                                <input type="text" class="form-control" name="last_name" value="" id="exampleInputFirstName" placeholder="">
                            </div>
                            <div class="col-xl-3">
                                <label class="form-control-label">First Name<span class="text-danger ml-2">*</span></label>
                                <input type="text" class="form-control" name="first_name" value="" id="exampleInputFirstName" placeholder="">
                            </div>
                            <div class="col-xl-3">
                                <label class="form-control-label">Other Names<span class="text-danger ml-2">*</span></label>
                                <input type="text" class="form-control" name="other_names" value="" id="exampleInputFirstName" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-xl-3">
                                <label class="form-control-label">Gender<span class="text-danger ml-2">*</span></label>
                                <select name="gender" class="form-control">
                                    <option value="">choose gender</option>
                                    @forelse ($genders as $gender)
                                        <option value="{{ $gender }}">{{ $gender }}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>
                            <div class="col-xl-3">
                                <label class="form-control-label">date of birth<span class="text-danger ml-2">*</span></label>
                                <input type="date" class="form-control" name="dob" value="" id="exampleInputFirstName" placeholder="">
                            </div>
                            <div class="col-xl-3">
                                <label class="form-control-label">residential address<span class="text-danger ml-2">*</span></label>
                                <textarea name="residential_address" class="form-control"></textarea>
                            </div>
                            <div class="col-xl-3">
                                <label class="form-control-label">permanent address<span class="text-danger ml-2">*</span></label>
                                <textarea name="permanent_address" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-xl-3">
                                <label class="form-control-label">father's name<span class="text-danger ml-2"></span></label>
                                <input type="text" class="form-control" name="fathers_name" value="" id="exampleInputFirstName" placeholder="">
                            </div>
                            <div class="col-xl-3">
                                <label class="form-control-label">father's phone<span class="text-danger ml-2"></span></label>
                                <input type="text" class="form-control" name="fathers_phone" value="" id="exampleInputFirstName" placeholder="">
                            </div>
                            <div class="col-xl-3">
                                <label class="form-control-label">mother's name<span class="text-danger ml-2"></span></label>
                                <input type="text" class="form-control" name="mothers_name" value="" id="exampleInputFirstName" placeholder="">
                            </div>
                            <div class="col-xl-3">
                                <label class="form-control-label">mother's phone<span class="text-danger ml-2"></span></label>
                                <input type="text" class="form-control" name="mothers_phone" value="" id="exampleInputFirstName" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-xl-3">
                                <label class="form-control-label">guardian's name<span class="text-danger ml-2"></span></label>
                                <input type="text" class="form-control" name="guardians_name" value="" id="exampleInputFirstName" placeholder="">
                            </div>
                            <div class="col-xl-3">
                                <label class="form-control-label">guardian's phone<span class="text-danger ml-2"></span></label>
                                <input type="text" class="form-control" name="guardians_phone" value="" id="exampleInputFirstName" placeholder="">
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
                                        <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Reg No</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Class</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 223.68px;">Action</th>
                                </thead>

                                <tbody>
                                    @forelse ($students as $student)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{ $loop->index + 1 }}</td>
                                            <td>{{ $student->reg_no }}</td>
                                            <td>{{ $student->profile->last_name .' '. $student->profile->first_name .' '. $student->profile->other_names }}</td>
                                            <td>{{ $student->profile->classroom->name }}</td>
                                            <td>
                                                <a href="{{ route('students.profile.show', $student->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-eye"></i> view profile</a>
                                                <button type="button" class="mx-3 btn btn-warning btn-sm" data-toggle="modal" data-target="#studentEditModal-{{ $student->id }}">
                                                    <i class="fas fa-fw fa-edit"></i> Edit
                                                </button>
                                                <a href="" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i>Delete</a>
                                            </td>

                                            <!-- Modal -->
                                            <div class="modal fade" id="studentEditModal-{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="studentEditModalLabel" aria-hidden="true">
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
                                                                    <form method="post" action="{{ route('students.profile.update', $student->profile->id) }}">
                                                                        @csrf
                                                                        @method('PATCH')
                                                                        <div class="form-group row mb-3">
                                                                            <div class="col-xl-3">
                                                                            <label class="form-control-label">Class<span class="text-danger ml-2">*</span></label>
                                                                            <select name="classroom_id" class="form-control">
                                                                                <option value="">choose class</option>
                                                                                @forelse ($classes as $class)
                                                                                    <option value="{{ $class->id }}" @if ($class->id == $student->profile->classroom_id) selected @endif>{{ $class->name }}</option>
                                                                                @empty

                                                                                @endforelse
                                                                            </select>
                                                                            </div>
                                                                            <div class="col-xl-3">
                                                                                <label class="form-control-label">Last Name<span class="text-danger ml-2">*</span></label>
                                                                                <input type="text" class="form-control" name="last_name" id="exampleInputFirstName" value="{{ $student->profile->last_name }}">
                                                                            </div>
                                                                            <div class="col-xl-3">
                                                                                <label class="form-control-label">First Name<span class="text-danger ml-2">*</span></label>
                                                                                <input type="text" class="form-control" name="first_name" id="exampleInputFirstName" value="{{ $student->profile->first_name }}">
                                                                            </div>
                                                                            <div class="col-xl-3">
                                                                                <label class="form-control-label">Other Names<span class="text-danger ml-2">*</span></label>
                                                                                <input type="text" class="form-control" name="other_names" id="exampleInputFirstName" value="{{ $student->profile->other_names }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row mb-3">
                                                                            <div class="col-xl-3">
                                                                                <label class="form-control-label">Gender<span class="text-danger ml-2">*</span></label>
                                                                                <select name="gender" class="form-control">
                                                                                    <option value="">choose gender</option>
                                                                                    @forelse ($genders as $gender)
                                                                                        <option value="{{ $gender }}" @if($gender == $student->profile->gender) selected @endif>{{ $gender }}</option>
                                                                                    @empty

                                                                                    @endforelse
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-xl-3">
                                                                            <label class="form-control-label">date of birth<span class="text-danger ml-2">*</span></label>
                                                                            <input type="date" class="form-control" name="dob" id="exampleInputFirstName" value="{{ $student->profile->dob }}">
                                                                            </div>
                                                                            <div class="col-xl-3">
                                                                            <label class="form-control-label">residential address<span class="text-danger ml-2">*</span></label>
                                                                            <textarea name="residential_address" class="form-control">{{ $student->profile->residential_address }}</textarea>
                                                                            </div>
                                                                            <div class="col-xl-3">
                                                                            <label class="form-control-label">permanent address<span class="text-danger ml-2">*</span></label>
                                                                            <textarea name="permanent_address" class="form-control">{{ $student->profile->permanent_address }}</textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row mb-3">
                                                                        <div class="col-xl-3">
                                                                            <label class="form-control-label">father's name<span class="text-danger ml-2"></span></label>
                                                                            <input type="text" class="form-control" name="fathers_name" id="exampleInputFirstName" value="{{ $student->profile->fathers_name }}">
                                                                        </div>
                                                                        <div class="col-xl-3">
                                                                            <label class="form-control-label">father's phone<span class="text-danger ml-2"></span></label>
                                                                            <input type="text" class="form-control" name="fathers_phone" id="exampleInputFirstName" value="{{ $student->profile->fathers_phone }}">
                                                                        </div>
                                                                        <div class="col-xl-3">
                                                                            <label class="form-control-label">mother's name<span class="text-danger ml-2"></span></label>
                                                                            <input type="text" class="form-control" name="mothers_name" id="exampleInputFirstName" value="{{ $student->profile->mothers_name }}">
                                                                        </div>
                                                                        <div class="col-xl-3">
                                                                            <label class="form-control-label">mother's phone<span class="text-danger ml-2"></span></label>
                                                                            <input type="text" class="form-control" name="mothers_phone" id="exampleInputFirstName" value="{{ $student->profile->mothers_phone }}">
                                                                        </div>
                                                                    </div>

                                                                        <div class="form-group row mb-3">
                                                                        <div class="col-xl-3">
                                                                            <label class="form-control-label">guardian's name<span class="text-danger ml-2"></span></label>
                                                                            <input type="text" class="form-control" name="guardians_name" id="exampleInputFirstName" value="{{ $student->profile->guardians_name }}">
                                                                        </div>
                                                                        <div class="col-xl-3">
                                                                            <label class="form-control-label">guardian's phone<span class="text-danger ml-2"></span></label>
                                                                            <input type="text" class="form-control" name="guardians_phone" id="exampleInputFirstName" value="{{ $student->profile->guardians_phone }}">
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
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
