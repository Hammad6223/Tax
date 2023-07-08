
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<!-- Mirrored from themesbrand.com/velzon/html/default/auth-pass-reset-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Feb 2023 15:34:20 GMT -->
<head>

    <meta charset="utf-8" />
    <title>Heine & Gerlach | Admin </title>
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
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="assets/images/logo-light.png" alt="" height="20">
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
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Passwort vergessen?</h5>
                                    <p class="text-muted">Passwort zurücksetzen bei Heine & Gerlach</p>

                                    <lord-icon src="https://cdn.lordicon.com/rhvddzym.json" trigger="loop" colors="primary:#0ab39c" class="avatar-xl"></lord-icon>

                                </div>

                                <div class="alert alert-borderless alert-warning text-center mb-2 mx-2" role="alert">
                                Geben Sie Ihre E-Mail-Adresse ein und die Anweisungen werden Ihnen zugesandt!
                                </div>
                                <div class="p-2">
                                <form  method="post" action="{{url('admin/forget_action')}}">
                               @csrf

                               @if (session('message1'))
               <div class="alert alert-success mb-2" id="hi">
               Sie haben Ihr Passwort per E-Mail erhalten
               </div>
               @endif

               @if (session('message2'))
               <div class="alert alert-success mb-2" id="hi">
               Etwas stimmt nicht Versuchen Sie es erneut
               </div>
               @endif

                @if (session('message'))
               <div class="alert alert-success mb-2" id="hi">
               E-Mail stimmt nicht überein, versuchen Sie es erneut
               </div>
               @endif
               

                                        <div class="mb-4">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" required id="email" placeholder="Geben sie ihre E-Mail Adresse ein">
                                       
                                            @error('email')
                      <span class="text-danger">
                      {{$message}}
                      </span>
                    @enderror
                    
                      @if (session('message'))
              <span class="text-danger">
                     Email does not exist try again!!
                      </span>
               @endif
                      
                                        </div>

                                        <div class="text-center mt-4">
                                            <button class="btn btn-success w-100" type="submit">Zurücksetzen-Link senden</button>
                                        </div>
                                    </form><!-- end form -->
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            <p class="mb-0">Moment, ich erinnere mich an mein Passwort... <a href="{{url('/')}}" class="fw-semibold text-primary text-decoration-underline">klicken Sie hier </a> </p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        @include('admin.includes.footer')
</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/auth-pass-reset-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Feb 2023 15:34:20 GMT -->
</html>