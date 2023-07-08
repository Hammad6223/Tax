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
               <a href="index.html" class="logo logo-light">
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
                              <img src="{{asset('storage/app/' . $user->image)}}" style="height:100px;width:100px;" 
                              class="img-thumbnail rounded-circle" />
                           </div>
                        </div>
                        <!--end col-->
                        <div class="col">
                           <div class="p-2">
                              <h3 class="text-white mb-1">{{$user->name}}</h3>
                              <p class="text-muted mb-0">{{$user->surname}}</p>
                              <div class="hstack text-white-50 gap-1">
                                 <div class="me-2"><i class="ri-mail-open-line me-1 text-white-75 fs-16 align-middle"></i>{{$user->email}}</div>
                              </div>
                           </div>
                        </div>
                        <!--end col-->
                        <!--end col-->
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
                                                         <p class="mb-1">Kontakt :</p>
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
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="card">
                           <div class="card-header">
                              <h5 class="card-title mb-0">Verzeichnisse anzeigen</h5>
                           </div>
                           <div class="card-body">
                              <div class="row gallery-wrapper">
                                 @foreach($dir as $dir)
                                 
                                 <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project designing development" data-category="designing development"
                                    data-bs-toggle="modal" data-bs-target=".test{{$dir->id}}">
                                    
                                      <!--  Large modal example -->
                                    
                                    <div class="modal fade test{{$dir->id}}"  id="" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                       <div class="modal-dialog modal-lg">
                                      
                                       <div class="modal-content">
                                             <div class="modal-header">
                                                <h5 class="modal-title" id="myLargeModalLabel">Dokumente anzeigen</h5>
                                               
                                               
                                                <a href="{{url('admin/download_directory/' . $dir->id)}}" style="margin-left:auto"> 
                                                 <i href="{{url('admin/delete_directory/' . $dir->id)}} "class="ri-chat-download-line" style="font-size:20px"></i>  </a> 
                              
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin:0px"></button>
                                             </div>
                                             <div class="modal-body">
                                                <div class="row">
                                             @foreach($dir->directory_docs as $doc)
                                                <div class="col-xxl-3 col-xl-4 col-sm-6 " >
                                                   <figure class="figure">
                                                      <a  href="{{asset('storage/app/' . $doc->file)}}"   target="blank">
                                                         <img src="{{asset('public/assets/images/docs.png')}}" class="figure-img img-fluid rounded" alt="..."> 
                                                         <figcaption class="figure-caption">{{$doc->name}}</figcaption>
                                                      </a>
                                                   </figure>
                                                </div>
                                                @endforeach
</div>
                                             </div>

                                          </div>
                                       </div>
                                       <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                   


                                    <div class="gallery-box card">
                                       <div class="gallery-container">
                                          <a  href="#" >
                                             <img class="gallery-img img-fluid mx-auto " src="{{asset('public/assets/images/floder.jpeg')}}" alt="" />
                                             <div class="gallery-overlay">
                                                <h5 class="overlay-caption">{{$dir->name}}</h5>
                                             </div>
                                          </a>
                                       </div>
                                       <div class="box-content">
                                          <div class="d-flex align-items-center mt-1">
                                             <div class="flex-grow-1 text-muted"><a href="#" class="text-body text-truncate">{{$dir->name}}</a></div>
                                          </div>
                                       </div>
</div>
                                  
                                 </div>
                                 <!-- /.modal -->
                            
                              @endforeach
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--end col-->
            </div>
         </div>
         <!-- container-fluid -->
      </div>
      <!-- End Page-content -->
      @include('admin.includes.footer')
   </body>
   <!-- Mirrored from themesbrand.com/velzon/html/default/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Feb 2023 15:33:32 GMT -->
</html>