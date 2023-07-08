<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
   <!-- Mirrored from themesbrand.com/velzon/html/default/dashboard-analytics.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Feb 2023 15:33:36 GMT -->
   <head>
      <meta charset="utf-8" />
      <title>Heine & Gerlach | Admin </title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
      <meta content="Themesbrand" name="author" />
      @include('admin.includes.head')
   </head>
   <body>
      <!-- Begin page -->
      <div id="layout-wrapper">
      @include('admin.includes.topbar')
      <!-- removeNotificationModal -->
      <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
               </div>
               <div class="modal-body">
                  <div class="mt-2 text-center">
                     <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                     <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                     </div>
                  </div>
                  <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                     <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                     <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                  </div>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <!-- ========== App Menu ========== -->
      <div class="app-menu navbar-menu">
         <!-- LOGO -->
         <div class="navbar-brand-box">
            <!-- Dark Logo-->
            <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
            <img src="{{asset('public/assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
            <img src="{{asset('public/assets/images/logo-dark.png')}}" alt="" height="17">
            </span>
            </a>
            <!-- Light Logo-->
            <a href="#" class="logo logo-light">
            <span class="logo-sm">
            <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
            <img class="rounded avatar-lg mt-3" alt="200x200" src="{{asset('public/assets/images/logo-light.png')}}"  >


                        <!-- <img src="{{asset('public/assets/images/logo-light.png')}}" alt="" height="22" class="profile-wid-img" /> -->
                    
            <!-- <img src="{{asset('public/assets/images/logo-light.png')}}" alt="" height="19"> -->
            </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
            </button>
         </div>
         <div id="scrollbar">
            @include('admin.includes.sidebar')
            <!-- Sidebar -->
         </div>
         <div class="sidebar-background"></div>
      </div>
      <!-- Left Sidebar End -->
      <!-- Vertical Overlay-->
      <div class="vertical-overlay"></div>
      <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      <div class="main-content">
      <div class="page-content">
         <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
               <div class="col-12">
                  <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  </div>
               </div>
            </div>
            <!-- end page title -->
            <div class="row">
               <div class="col">
                  <div class="h-100">
                     <div class="row mb-3 pb-1">
                        <div class="col-12">
                           <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                              <div class="flex-grow-1">
                                 <h4 class="fs-16 mb-1">Willkommen zurück, {{Auth::user()->name}} !</h4>
                                 <p class="text-muted mb-0">Das passiert heute bei Heine & Gerlach.</p>
                              </div>
                          
                           </div>
                           <!-- end card header -->
                        </div>
                        <!--end col-->
                     </div>
                     <!--end row-->
                     <div class="row">
                        <div class=" col-md-4">
                           <!-- card -->
                           <div class="card card-animate">
                              <div class="card-body">
                                 <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                       <p class="text-uppercase fw-medium text-muted text-truncate mb-0">AKTIVE KUNDEN</p>
                                    </div>
                                 </div>
                                 <div class="d-flex align-items-end justify-content-between mt-2">
                                    <div>
                                       <h4 class="fs-22 fw-semibold ff-secondary mb-2"><span class="counter-value" data-target="{{$active_clients}}"> </span></h4>
                                       <a href="{{url('admin/active_client')}}" class="text-decoration-underline">Siehe Einzelheiten</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                       <span class="avatar-title bg-soft-success rounded fs-3">
                                       <i class="bx ri-team-fill text-success " ></i>
                                       </span> 
                                    </div>
                                 </div>
                              </div>
                              <!-- end card body -->
                           </div>
                           <!-- end card -->
                        </div>
                        <!-- end col -->
                         <div class=" col-md-4">
                           <!-- card -->
                           <div class="card card-animate">
                              <div class="card-body">
                                 <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                       <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> AKTIVE ABFRAGEN</p>
                                    </div>
                                 </div>
                                 <div class="d-flex align-items-end justify-content-between mt-2">
                                    <div>
                                       <h4 class="fs-22 fw-semibold ff-secondary mb-2"><span class="counter-value" data-target="{{$active_queries}}">0</span></h4>
                                       <a href="{{url('admin/active_query')}}" class="text-decoration-underline">Siehe Einzelheiten</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                       <span class="avatar-title bg-soft-danger rounded fs-3">
                                       <i class="ri-question-fill text-danger"></i>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                              <!-- end card body -->
                           </div>
                           <!-- end card -->
                        </div>
                        <!-- end col -->
                        <div class=" col-md-4">
                           <!-- card -->
                           <div class="card card-animate">
                              <div class="card-body">
                                 <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                       <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> GELÖSTE FRAGEN</p>
                                    </div>
                                 </div>
                                 <div class="d-flex align-items-end justify-content-between mt-2">
                                    <div>
                                       <h4 class="fs-22 fw-semibold ff-secondary mb-2"><span class="counter-value" data-target="{{$solve_queries}}">0</span></h4>
                                       <a href="{{url('admin/solve_query')}}" class="text-decoration-underline">Siehe Einzelheiten</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                       <span class="avatar-title bg-soft-danger rounded fs-3">
                                       <i class="ri-question-fill text-danger"></i>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                              <!-- end card body -->
                           </div>
                           <!-- end card -->
                        </div>
                        <!-- end col -->
                     </div>
                     <!-- end row-->
                 
                     <div class="row">
                     <div class="col-lg-12">
                  <div class="card">
                     <div class="card-header">
                        <h5 class="card-title mb-0">Aktuelle Kunden</h5>
                     </div>
                     <div class="card-body">
                        <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                           <thead>
                              <tr>
                              <th>SR-Nr</th>
                                 <th>Name</th>
                                 <th>Nachname</th>
                                 <th>Email</th>
                                 <th>Kontakt </th>
                                 <th>Personalausweis </th>
                                 <th>Aktion</th>
                              </tr>
                           </thead>
                           <tbody>
                           @php $count=1; @endphp 
                           @foreach($user as $user)
                              <tr>
                                 <td>{{$count++}}</td>
                                 <td>{{$user->name}}</td>
                                 <td>{{$user->surname}}</td>
                                 <td>{{$user->email}}</td>
                                 <td>{{$user->contact}}</td>
                                 <td>{{$user->id_card}}</td>
                                 <td>
                                    <a href="{{url('admin/client_profile/' . $user->id)}}">   <i class=" ri-information-fill" style="color:green; font-size:18px"></i> </a> 
                                    <a href="{{url('admin/delete_client/' . $user->id)}}" onClick="return confirm('Are you sure?')">  <i class="ri-delete-bin-fill" style="color:red; font-size:18px"> </i> </a>
                                 </td>
                              </tr>
                              @endforeach
                        </table>
                     </div>
                  </div>
               </div>
               <!--end col-->
            </div>
                     <!-- end row-->
                  </div>
                  <!-- end .h-100-->
               </div>
               <!-- end col -->
            </div>
         </div>
         <!-- container-fluid -->
      </div>
      <!-- End Page-content -->
      <!-- End Page-content -->
      @include('admin.includes.footer')
      @if (session('message'))
      <script>
         Swal.fire({
           position: 'top-end',
           icon: 'success',
           title: 'Erfolgreich',
           showConfirmButton: false,
           timer: 2500
         })
      </script>
      @endif
   </body>
   <!-- Mirrored from themesbrand.com/velzon/html/default/dashboard-analytics.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Feb 2023 15:33:36 GMT -->
</html>