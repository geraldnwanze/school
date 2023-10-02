@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Classes and Sub Classes</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Classes and Sub Classes</li>
      </ol>
    </div>

    <div class="row">
      <div class="col-lg-12">

        <!-- Input Group -->
           <div class="row">
        <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">All Classes and Sub Classes</h6>
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
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Class Name: activate to sort column ascending" style="width: 328.922px;">Class Name</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 223.68px;">Action</th>
              </thead>

                <tbody>
                    @forelse ($sub_classrooms as $class)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{ $loop->index + 1 }}</td>
                            <td>{{ $class->name }}</td>
                            <td>
                                <a href=""><i class="fas fa-fw fa-eye"></i> View Sub Classes</a>
                                <a href="" class="mx-3"><i class="fas fa-fw fa-edit"></i>Edit</a>
                                <a href=""><i class="fas fa-fw fa-trash"></i>Delete</a>
                            </td>
                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        <div class="row">
            <div class="col-sm-12 col-md-5">
                {{ $sub_classrooms->links() }}
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
