<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
   <!-- Mirrored from themesbrand.com/velzon/html/default/auth-signin-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Feb 2023 15:34:19 GMT -->
   <head>
      <meta charset="utf-8" />
      <title>Sign In | Heine & Gerlach </title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
      <meta content="Themesbrand" name="author" />
      @include('admin.includes.head')
   </head>
   <body>
      <div class="auth-page-wrapper pt-5">
      <!-- auth page bg -->
      <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
         <div class="bg-overlay"></div>
         <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
               <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
         </div>
      </div>
      <!-- auth page content -->
      <div class="auth-page-content">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="text-center mt-sm-5 mb-4 text-white-50">
                     <div>
                        <a href="#" class="d-inline-block auth-logo">
                      
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end row -->
            <div class="row justify-content-center">
               <div class="col-md-8 col-lg-6 col-xl-5">
                  <div class="card mt-4">
                     <div class="card-body p-4">
                        @if (session('error1'))
                        <div class="alert alert-danger mb-2" id="hi" role="alert">
                        Ungültige Anmeldeinformationen
                        </div>
                        @endif
                        <div class="text-center mt-2">
                           <h5 class="text-primary">Willkommen zurück !</h5>
                           <p class="text-muted">Melden Sie sich an, um mit Heine & Gerlach fortzufahren.</p>
                        </div>
                        <div class="p-2 mt-4">
                           <form action="{{url('admin/loginaction')}}" method="post">
                              @csrf
                              <div class="mb-3">
                                 <label for="username" class="form-label">Email</label>
                                 <input type="email" required name="email" class="form-control" id="username" placeholder="Geben sie ihre E-Mail Adresse ein">
                                 @error('email')
                                 <span class="text-danger">
                                 {{$message}}
                                 </span>
                                 @enderror
                              </div>
                              <div class="mb-3">
                                 <div class="float-end">
                                    <a href="{{url('admin/forget')}}" class="text-muted">Passwort vergessen?</a>
                                 </div>
                                 <label class="form-label" for="password-input">Passwort</label>
                                 <div class="position-relative auth-pass-inputgroup mb-3">
                                    <input type="password" required class="form-control pe-5 password-input" name="password" placeholder="Geben Sie Ihr Passwort ein" id="password-input">
                                    <a class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="submit" id="password-addon">
                                       <i class="ri-eye-fill align-middle"></i>
                                    </a>
                                    @error('email')
                                    <span class="text-danger">
                                    {{$message}}
                                    </span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="mt-4">
                                 <button class="btn btn-success w-100" type="submit">Anmelden </button>
                              </div>
                           </form>
                        </div>
                     </div>
                     <!-- end card body -->
                  </div>
                  <!-- end card -->
               </div>
            </div>
            <!-- end row -->
         </div>
         <!-- end container -->
      </div>
      <!-- end auth page content -->
      <!-- footer -->
      @include('admin.includes.footer')
      <script>
         $('#hi').delay(2000).slideUp(1200);
      </script>
   </body>
   <!-- Mirrored from themesbrand.com/velzon/html/default/auth-signin-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Feb 2023 15:34:20 GMT -->
</html>