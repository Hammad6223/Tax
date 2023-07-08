<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
   <!-- Mirrored from themesbrand.com/velzon/html/default/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Feb 2023 15:33:31 GMT -->
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
            <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
            <img src="assets/images/logo-dark.png" alt="" height="17">
            </span>
            </a>
            <!-- Light Logo-->
            <a href="#" class="logo logo-light">
            <span class="logo-sm">
            <img src="assets/images/logo-sm.png" alt="" height="22">
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
            <div class="profile-foreground position-relative mx-n4 mt-n4">
               <div class="profile-wid-bg">
                  <img src="{{asset('public/assets/images/profile-bg.jpg')}}" alt="" class="profile-wid-img" />
               </div>
            </div>
            <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
               <div class="row g-4">
                  <div class="col-auto">
                     <div class="avatar-lg">
                        <img src="{{asset('storage/app/' . $user->image)}}" alt="user-img"  style="height:100px;width:100px;"  class="img-thumbnail rounded-circle" />
                     </div>
                  </div>
                  <!--end col-->
                  <div class="col">
                     <div class="p-2">
                        <h3 class="text-white mb-1">{{$user->name}}</h3>
                        <p class="text-muted mb-0">{{$user->surname}}</p>
                        <div class="hstack text-white-50 gap-1">
                           <div class="me-2"><i class="ri-mail-open-line me-1 text-white-75 fs-16 align-middle"></i> {{$user->email}}</div>
                        </div>
                     </div>
                  </div>
                  <!--end col-->
                  <div class="col-12 col-lg-auto order-last order-lg-0">
                     <div class="row text text-white-50 text-center">
                        <div class="col-lg-12 mt-2">
                           <a href="pages-profile-settings.html" class="btn btn-success" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><i class="ri-edit-box-line align-bottom"></i> Profil bearbeiten</a>
                        </div>
                     </div>
                  </div>
                  <!--end col-->
               </div>
               <!--end row-->
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <div>
                     <!--  Large modal example -->
                     <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="myLargeModalLabel">Profil bearbeiten</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                              <form  action="{{url('admin/profile_edit_action')}}" method="post" enctype="multipart/form-data">
                                 @csrf
                               <input type="hidden"  name="id"  value="{{$user->id}}">

                                    <div class="row">
                                       <div class="col-lg-4">
                                          <div class="mb-3">
                                             <label for="firstnameInput" class="form-label">Name</label>
                                             <input type="text" class="form-control"  name="name"  placeholder="Gib deinen Namen ein" value="{{$user->name}}">
                                          </div>
                                       </div>
                                       <div class="col-lg-4">
                                          <div class="mb-3">
                                             <label for="firstnameInput" class="form-label">Nachname</label>
                                             <input type="text" class="form-control"  name="surname"  placeholder="Geben Sie Ihren Nachnamen ein" value="{{$user->surname}}">
                                          </div>
                                       </div>
                                       <!--end col-->
                                       <div class="col-lg-4">
                                          <div class="mb-3">
                                             <label for="firstnameInput" class="form-label">Personalausweis</label>
                                             <input type="text" class="form-control"  name="id_card"  placeholder="Geben Sie Ihren Personalausweis ein" value="{{$user->id_card}}">
                                          </div>
                                       </div>
                                       <!--end col-->
                                       <div class="col-lg-4">
                                          <div class="mb-3">
                                             <label for="firstnameInput" class="form-label">Bild</label>
                                             <input type="file" class="form-control"  name="image" >
                                          </div>
                                       </div>
                                       <!--end col-->
                                       <div class="col-lg-4">
                                          <div class="mb-3">
                                             <label for="phonenumberInput" class="form-label">Kontakt </label>
                                             <input type="text" class="form-control"  placeholder="Geben Sie Ihren Kontakt ein" name="contact" value="{{$user->contact}}">
                                          </div>
                                       </div>
                                       <!--end col-->
                                       <div class="col-lg-4">
                                          <div class="mb-3">
                                             <label for="emailInput" class="form-label">Email</label>
                                             <input type="email" class="form-control" id="emailInput" name="email" placeholder="Geben sie ihre E-Mail Adresse ein" value="{{$user->email}}">
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="mb-3">
                                             <label for="firstnameInput" class="form-label">Adresse</label>
                                             <input type="text" class="form-control" name="address"  placeholder="Geben Sie Ihre Adresse ein" value="{{$user->address}}">
                                          </div>
                                       </div>
                                       <!--end col-->
                                       <div class="col-lg-12">
                                          <div class="mb-3 pb-2">
                                             <label for="exampleFormControlTextarea" class="form-label">Beschreibung</label>
                                             <textarea class="form-control"  name="description" id="exampleFormControlTextarea" placeholder="Geben Sie Ihre Beschreibung ein" rows="3">
                                             {{$user->description}}
                                             </textarea>
                                          </div>
                                       </div>
                                       <!--end col-->
                                       <div class="col-lg-12">
                                          <div class="hstack gap-2 justify-content-end">
                                             <button type="submit" class="btn btn-primary">aktualisieren</button>
                                             <button type="button" class="btn btn-soft-success" data-bs-dismiss="modal">stornieren</button>
                                          </div>
                                       </div>
                                       <!--end col-->
                                    </div>
                                    <!--end row-->
                                 </form>
                              </div>
                           </div>
                           <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                     </div>
                     <!-- /.modal -->
                     <!-- Tab panes -->
                     <div class="tab-content pt-4 text-muted">
                        <div class="tab-pane active" id="overview-tab" role="tabpanel">
                           <div class="row">
                              <!--end col-->
                              <div class="col-xxl-12">
                                 <div class="card">
                                    <div class="card-body">
                                       <h5 class="card-title mb-3">um</h5>
                                     <p>{{$user->description}}</p> 
                                       <div class="row">
                                          <div class="col-sm-12 col-md-4">
                                             <div class="d-flex mt-4">
                                                <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                   <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                      <i class="ri-user-location-fill"></i>
                                                   </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                   <p class="mb-1">Adresse:</p>
                                                   <h6 class="text-truncate mb-0"> {{$user->address}}</h6>
                                                </div>
                                             </div>
                                          </div>
                                          <!--end col-->
                                          <div class="col-sm-12 col-md-4">
                                             <div class="d-flex mt-4">
                                                <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                   <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                      <i class=" ri-phone-line"></i>
                                                   </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                   <p class="mb-1">Kontakt :</p>
                                                   <a href="#" class="fw-semibold">{{$user->contact}}</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-sm-12 col-md-4">
                                             <div class="d-flex mt-4">
                                                <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                   <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                      <i class="ri-bank-card-line"></i>
                                                   </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                   <p class="mb-1">Personalausweis :</p>
                                                   <a href="#" class="fw-semibold">{{$user->id_card}}</a>
                                                </div>
                                             </div>
                                          </div>
                                          <!--end col-->
                                       </div>
                                       <!--end row-->
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
         <!-- container-fluid -->
      </div>
      <!-- End Page-content -->
      @include('admin.includes.footer')
      @if (session('message1'))
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
   <!-- Mirrored from themesbrand.com/velzon/html/default/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Feb 2023 15:33:32 GMT -->
</html>