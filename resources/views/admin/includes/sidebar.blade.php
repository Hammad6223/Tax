<div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">SPEISEKARTE</span></li>
                      
                            <li class="nav-item">
                            <a class="nav-link menu-link" href="{{url('admin/dashboard')}}">
                            <i class="ri-honour-line"></i> <span data-key="t-widgets">Armaturenbrett</span>
                            </a>
                        </li>

                        </li> <!-- end Dashboard Menu -->

                       
                      <li class="nav-item">
                      <a class="nav-link menu-link" href="{{url('admin/profile')}}">
                      <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Profil</span>
                 
                      </a>
                  </li>
    
                  <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarApps2" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps1">
                                <i class="ri-team-fill"></i> <span data-key="t-apps">Kunden</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarApps2">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{url('admin/active_client')}}" class="nav-link" data-key="t-calendar">Aktiv</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('admin/block_client')}}"class="nav-link" data-key="t-chat"> verstopft </a>
                                    </li>
                                   
                               
                                </ul>
                            </div>
                        </li>

              



                  <!--<li class="nav-item">-->
                  <!--    <a class="nav-link menu-link" href="{{url('admin/profile')}}">-->
                  <!--    <i class=" ri-message-3-line"></i> <span data-key="t-authentication">Appointments</span>-->
                 
                  <!--    </a>-->
                  <!--</li>-->

                  
                  <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarApps1" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps1">
                                <i class="ri-question-fill"></i> <span data-key="t-apps">Abfragen</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarApps1">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{url('admin/active_query')}}" class="nav-link" data-key="t-calendar">Aktiv</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('admin/solve_query')}}"class="nav-link" data-key="t-chat"> Gelöst</a>
                                    </li>
                                   
                               
                                </ul>
                            </div>
                        </li>

              


                  <li class="nav-item">
                      <a class="nav-link menu-link" href="{{url('admin/update_password')}}">
                      <i class="mdi mdi-cog-outline "></i> <span data-key="t-authentication">Kennwort ändern</span>
                 
                      </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link menu-link" href="{{url('admin/logout')}}">
                      <i class="mdi mdi-logout"></i> <span data-key="t-authentication">Ausloggen</span>
                 
                      </a>
                  </li>


                  </li> <!-- end Dashboard Menu -->
               


                   


                    </ul>
                </div>