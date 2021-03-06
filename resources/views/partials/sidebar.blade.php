
        <!--**********************************
            Sidebar start
        ***********************************-->

        @if(Auth::check() && Auth::user()->role  == "admin")
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a class="has-arrow1 nav-link active" href="{{ url('dashboard') }}" aria-expanded="false">
                            <i class="icon icon-single-04"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li><a class="has-arrow1 nav-link" href="{{ url('volunteer-types') }}" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Volunteer Types</span></a>
                    </li>
                    <li><a class="has-arrow1 nav-link" href="{{ url('task-status') }}" aria-expanded="false"><i
                                class="icon icon-chart-bar-33"></i><span class="nav-text">Task Status</span></a>
                    </li>
                    <li><a class="has-arrow1 nav-link" href="{{ url('update-task-status') }}" aria-expanded="false"><i
                                class="icon icon-world-2"></i><span class="nav-text">Update Task Status</span></a>
                    </li>

                    <li><a class="has-arrow1 nav-link" href="{{ url('messaging') }}" aria-expanded="false"><i
                                class="icon icon-plug"></i><span class="nav-text">Messaging</span></a>
                        
                    </li>
                    <li><a href="{{ url('house-data') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span
                                class="nav-text">House Data</span></a></li>
                   
                    <li><a class="has-arrow1 nav-link" href="{{ url('contacts') }}" aria-expanded="false"><i
                                class="icon icon-form"></i><span class="nav-text">Contacts</span></a>
                       
                    </li>
                    
                    <li><a class="has-arrow1 nav-link" href="{{ url('hierarchy') }}" aria-expanded="false"><i
                                class="icon icon-layout-25"></i><span class="nav-text">Hierarchy</span></a>
                        
                    </li>

                   
                    <li><a class="has-arrow1 nav-link" href="{{ url('pending-approval') }}" aria-expanded="false"><i
                                class="icon icon-single-copy-06"></i><span class="nav-text">Pending Approval</span></a>
                    </li>
                </ul>
            </div>


        </div>

        <!-- manager menu -->
        @elseif (Auth::check() && Auth::user()->role  == "manager")
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li><a class="has-arrow1 nav-link" href="{{ url('task-status') }}" aria-expanded="false"><i
                                class="icon icon-chart-bar-33"></i><span class="nav-text">Task Status</span></a>
                    </li>
                    <li><a class="has-arrow1 nav-link" href="{{ url('update-task-status') }}" aria-expanded="false"><i
                                class="icon icon-world-2"></i><span class="nav-text">Update Task Status</span></a>
                    </li>

                    <li><a class="has-arrow1 nav-link" href="{{ url('messaging') }}" aria-expanded="false"><i
                                class="icon icon-plug"></i><span class="nav-text">Messaging</span></a>
                        
                    </li>
                    <li><a href="widget-basic.html" aria-expanded="false"><i class="icon icon-globe-2"></i><span
                                class="nav-text">House Data</span></a></li>
                   
                    <li><a class="has-arrow1 nav-link" href="{{ route('register') }}" aria-expanded="false"><i
                                class="icon icon-form"></i><span class="nav-text">Contacts</span></a>
                       
                    </li>
                    
                    <li><a class="has-arrow1 nav-link" href="{{ route('register') }}" aria-expanded="false"><i
                                class="icon icon-layout-25"></i><span class="nav-text">Hierarchy</span></a>
                        
                    </li>
                </ul>
            </div>


        </div>
        <!-- manager menu -->

        <!-- user menu -->

        @elseif (Auth::check() && Auth::user()->role  == "user")
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    
                    <li><a class="has-arrow1 nav-link" href="{{ url('update-task-status') }}" aria-expanded="false"><i
                                class="icon icon-world-2"></i><span class="nav-text">Update Task Status</span></a>
                    </li>

                    <li><a class="has-arrow1 nav-link" href="{{ url('messaging') }}" aria-expanded="false"><i
                                class="icon icon-plug"></i><span class="nav-text">Messaging</span></a>
                        
                    </li>
                    <li><a href="widget-basic.html" aria-expanded="false"><i class="icon icon-globe-2"></i><span
                                class="nav-text">House Data</span></a></li>
                   
                    <li><a class="has-arrow1 nav-link" href="{{ route('register') }}" aria-expanded="false"><i
                                class="icon icon-form"></i><span class="nav-text">Contacts</span></a>
                       
                    </li>
                </ul>
            </div>


        </div>

        <!-- user menu -->

        @endif
        <!--**********************************
            Sidebar end
        ***********************************-->