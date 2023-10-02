@extends('layouts.app')

@section('content')
<div class="row mb-3">
    <!-- Students Card -->

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Students</div>
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <!-- <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                  <span>Since last month</span> -->
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-info"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Class Card -->

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Classes</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <!-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                  <span>Since last month</span> -->
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-chalkboard fa-2x text-primary"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Class Arm Card -->

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Class Arms</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <!-- <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                  <span>Since last years</span> -->
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-code-branch fa-2x text-success"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Std Att Card  -->

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Student Attendance</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <!-- <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                  <span>Since yesterday</span> -->
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-secondary"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Teachers Card  -->

                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Class Teachers</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                              <!-- <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                              <span>Since last years</span> -->
                            </div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-chalkboard-teacher fa-2x text-danger"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                   <!-- Session and Terms Card  -->

                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Session & Terms</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                              <!-- <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                              <span>Since last years</span> -->
                            </div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-warning"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                  <!-- Terms Card  -->

                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Terms</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                              <!-- <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                              <span>Since last years</span> -->
                            </div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-th fa-2x text-info"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
    <!--Row-->
</div>
@endsection
