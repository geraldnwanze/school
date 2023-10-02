@extends('layouts.app')

@section('content')


<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Profile for {{ $student->reg_no }}</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Profile</li>
      </ol>
    </div>


    <div class="row">
      <div class="col-lg-12">

        <!-- Input Group -->
           <div class="row">
        <div class="col-lg-12">
        <div class="card mb-4">
          <div class="table-responsive p-3">
            <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                            <table class="table align-items-center table-flush table-hover dataTable no-footer" id="dataTableHover" role="grid" aria-describedby="dataTableHover_info">
              <thead class="thead-light">
                <tr role="row">
                    <th>reg no</th>
                    <th>last name</th>
                    <th>first name</th>
                    <th>other names</th>
                    <th>gender</th>
                    <th>dob</th>
                    <th>age</th>
                    <th>father's name</th>
                    <th>father's phone</th>
                    <th>mother's name</th>
                    <th>mother's name</th>
                    <th>guardian's name</th>
                    <th>guardian's phone</th>
              </thead>

                <tbody>
                        <tr>
                            <td>{{ $student->reg_no }}</td>
                            <td>{{ $student->profile->last_name }}</td>
                            <td>{{ $student->profile->first_name }}</td>
                            <td>{{ $student->profile->other_names }}</td>
                            <td>{{ $student->profile->gender }}</td>
                            <td>{{ $student->profile->dob }}</td>
                            <td>{{ $student->profile->age }}</td>
                            <th>{{ $student->profile->fathers_name }}</th>
                            <th>{{ $student->profile->fathers_phone }}</th>
                            <th>{{ $student->profile->mothers_name }}</th>
                            <th>{{ $student->profile->mothers_phone }}</th>
                            <th>{{ $student->profile->guardians_name }}</th>
                            <th>{{ $student->profile->guardians_phone }}</th>
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

