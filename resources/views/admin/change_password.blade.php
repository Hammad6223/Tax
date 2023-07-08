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
               <div class="row">
                  <div class="col-12">
                     <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                     </div>
                  </div>
               </div>
               <div class="position-relative mx-n4 mt-n4">
                  <div class="profile-wid-bg profile-setting-img">
                     <img src="{{asset('public/assets/images/profile-bg.jpg')}}" class="profile-wid-img" alt="">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xxl-3">
                  <div class="card mt-n5">
                     <div class="card-body p-4">
                        <div class="text-center">
                           <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                              <img src="{{asset('storage/app/'.Auth::user()->image)}}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                           </div>
                           <h5 class="fs-16 mb-1"> {{Auth::user()->name }}</h5>
                        </div>
                     </div>
                  </div>
               </div>
               <!--end col-->
               <div class="col-xxl-9">
                  <div class="card mt-xxl-n5">
                     <div class="card-header">
                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                              <i class="fas fa-home"></i> Kennwort ändern
                              </a>
                           </li>
                        </ul>
                     </div>
                     <div class="card-body p-4">
                        <div class="tab-content">
                           <div class="tab-pane active" id="personalDetails" role="tabpanel">
                              <form  method="post" action="{{url('admin/update_password_action')}}">
                                 @csrf
                                 @if (session('error'))
                                 <div class="alert  mb-2" style="color:red;" role="alert">
                                 Geben Sie ein gültiges Passwort ein und versuchen Sie es erneut
                                 </div>
                                 @endif
                                 <div class="row g-2">
                                    <div class="col-lg-4">
                                       <div>
                                          <label for="oldpasswordInput" class="form-label">Altes Kennwort*</label>
                                          <input  class="form-control" id="oldpasswordInput" placeholder="Enter current password" type="password" required name="oldpassword" >
                                       </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                       <div>
                                          <label for="newpasswordInput" class="form-label">Neues Kennwort*</label>
                                          <input  class="form-control" id="password" type="password" required name="newpassword"  placeholder="Neues Passwort eingeben">
                                       </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                       <div>
                                          <label for="confirmpasswordInput" class="form-label">Bestätige das Passwort*</label>
                                          <input class="form-control"id="confirm_password" type="password" name="confirmpassword" placeholder="Geben Sie das Kennwort bestätigen ein">
                                       </div>
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="text-end">
                                          <button type="submit" class="btn btn-success">Kennwort ändern</button>
                                       </div>
                                    </div>
                                    <!--end col-->
                                 </div>
                                 <!--end row-->
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--end col-->
            </div>
            <!--end row-->
         </div>
         <!-- container-fluid -->
      </div>
      <!-- End Page-content -->
      <!-- End Page-content -->
      @include('admin.includes.footer')
      <script>
         var password = document.getElementById("password")
         , confirm_password = document.getElementById("confirm_password");
         
         function validatePassword(){
           if(password.value != confirm_password.value) {
             confirm_password.setCustomValidity("Sie müssen dasselbe neue Passwort eingeben und das Passwort bestätigen");
           } else {
             confirm_password.setCustomValidity(''); }
         }
         password.onchange = validatePassword;
         confirm_password.onkeyup = validatePassword;
      </script>
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