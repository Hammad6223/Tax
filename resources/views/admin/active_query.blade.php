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
            <a href="" class="logo logo-light">
            <span class="logo-sm">
            <img src="{{asset('public/assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
            <img class="rounded avatar-lg mt-3" alt="200x200" src="{{asset('public/assets/images/logo-light.png')}}"  >
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
               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-header">
                        <h5 class="card-title mb-0">Aktive Abfragen</h5>
                     </div>
                     <div class="card-body">
                        <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                           <thead>
                              <tr>
                                 <th>SR-Nr</th>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Thema</th>
                                 <th>Aktion</th>
                              </tr>
                           </thead>
                           <tbody>
                              @php $count=1; @endphp 
                              @foreach($query as $query)
                              <tr>
                                 <td>{{$count++}}</td>
                                 <td>{{$query->user->name}}</td>
                                 <td>{{$query->user->email}}</td>
                                 <td>{{$query->subject}}</td>
                                 <td>
                                    <a data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">   <i class=" ri-information-fill" style="color:green; font-size:18px"></i> </a> 
                                    <a href="{{url('admin/delete_query/' . $query->id)}}" onClick="return confirm('Are you sure?')">  <i class="ri-delete-bin-fill" style="color:red; font-size:18px"> </i> </a>
                                 </td>
                              </tr>
                              <!--  Large modal example -->
                              <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h5 class="modal-title" id="myLargeModalLabel">Abfragen anzeigen</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                       </div>
                                       <div class="modal-body mt-5">
                                          <div class="container-fluid">
                                             <div class="profile-foreground position-relative mx-n4 mt-n4">
                                                <div class="profile-wid-bg">
                                                   <img src="{{asset('public/assets/images/profile-bg.jpg')}}" alt="" class="profile-wid-img" />
                                                </div>
                                             </div>
                                             <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
                                                <div class="row g-4">
                                                   <div class="col-auto">
                                                      <div class="avatar-lg">
                                                         <img src="{{asset('storage/app/' .  $query->user->image)}}"  style="height:100px;width:100px;" class="img-thumbnail rounded-circle" />
                                                      </div>
                                                   </div>
                                                   <!--end col-->
                                                   <div class="col">
                                                      <div class="p-2">
                                                         <h3 class="text-white mb-1">{{$query->user->name}}</h3>
                                                         <p class="text-muted mb-0">{{$query->user->surname}}</p>
                                                         <div class="hstack text-white-50 gap-1">
                                                            <div class="me-2"><i class="ri-mail-open-line me-1 text-white-75 fs-16 align-middle"></i> {{$query->user->email}}</div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <!--end row-->
                                             </div>
                                             <div class="row">
                                                <div class="col-lg-12">
                                                   <div>
                                                      <!-- Tab panes -->
                                                      <div class="tab-content pt-4 text-muted">
                                                         <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                                            <div class="row">
                                                               <!--end col-->
                                                               <div class="col-xxl-12">
                                                                  <div class="card">
                                                                     <div class="card-body">
                                                                        <h5 class="card-title mb-3">{{$query->subject}}</h5>
                                                                        <p>{{$query->message}}</p>
                                                                        <br> <br>
                                                                        @if(!empty($query->file))
                                                                        <div class="row">
                                                                           <div class="col-xxl-3 col-xl-4 col-sm-6 " >
                                                                              <figure class="figure">
                                                                                 <a  href="{{asset('storage/app/'.$query->file)}}"   target="blank">
                                                                                    <img src="{{asset('public/assets/images/docs.png')}}" class="figure-img img-fluid rounded" alt="..."> 
                                                                                    <!--<figcaption class="figure-caption">name</figcaption>-->
                                                                                 </a>
                                                                              </figure>
                                                                           </div>
                                                                        </div>
                                                                        @endif
                                                                     </div>
                                                                     <!--end card-body-->
                                                                  </div>
                                                                  <!-- end card -->
                                                               </div>
                                                               <!--end col-->
                                                            </div>
                                                            <!--end row-->
                                                         </div>
                                                      </div>
                                                      <!--end tab-content-->
                                                   </div>
                                                </div>
                                                <!--end col-->
                                             </div>
                                             <!--end row-->
                                          </div>
                                       </div>
                                    </div>
                                    <!-- /.modal-content -->
                                 </div>
                                 <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->
                              @endforeach
                        </table>
                     </div>
                  </div>
               </div>
               <!--end col-->
            </div>
            <!--end row-->
            <!--end row-->
         </div>
         <!-- container-fluid -->
      </div>
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