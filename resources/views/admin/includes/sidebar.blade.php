<!-- sidebar -->
        <div class="sidebar px-4 py-4 py-md-4 me-0">
            <div class="d-flex flex-column h-100">
                <a href="{{ route('dashboard') }}" class="mb-0 brand-icon">
                    <span class="logo-icon">
                        <i class="bi bi-bag-check-fill fs-4"></i>
                    </span>
                    <span class="logo-text">Arc 3D</span>
                </a>
                <!-- Menu: main ul -->
                <ul class="menu-list flex-grow-1 mt-3">
                    <li><a class="m-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="icofont-home fs-5"></i> <span>Dashboard</span></a></li>

                   
                  
                    
                    
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('services') ? 'active' : '' }} {{ request()->routeIs('services.addServices') ? 'active' : '' }} {{ request()->routeIs('services.edit') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-service" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>Services</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu-service">
                                <li><a class="ms-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">List</a></li>
                                <li><a class="ms-link {{ request()->routeIs('services.addServices') ? 'active' : '' }}" href="{{ route('services.addServices') }}">Add</a></li>
                  
                            </ul>
                    </li>

                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('industries') ? 'active' : '' }} {{ request()->routeIs('industries.addIndustries') ? 'active' : '' }} {{ request()->routeIs('industries.edit') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-industries" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>Industries</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu-industries">
                                <li><a class="ms-link {{ request()->routeIs('industries') ? 'active' : '' }}" href="{{ route('industries') }}">List</a></li>
                                <li><a class="ms-link {{ request()->routeIs('industries.addIndustries') ? 'active' : '' }}" href="{{ route('industries.addIndustries') }}">Add</a></li>
                  
                            </ul>
                    </li>

                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('technologies') ? 'active' : '' }} {{ request()->routeIs('technologies.addTechnologies') ? 'active' : '' }} {{ request()->routeIs('technologies.edit') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-technologies" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>Technologies</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu-technologies">
                                <li><a class="ms-link {{ request()->routeIs('technologies') ? 'active' : '' }}" href="{{ route('technologies') }}">List</a></li>
                                <li><a class="ms-link {{ request()->routeIs('technologies.addTechnologies') ? 'active' : '' }}" href="{{ route('technologies.addTechnologies') }}">Add</a></li>
                  
                            </ul>
                    </li>
                    <li class="collapsed">  
                        <a class="m-link 
                            {{ request()->routeIs('client_revivew') ? 'active' : '' }} 
                            {{ request()->routeIs('client_revivew.addClient_revivew') ? 'active' : '' }} 
                            {{ request()->routeIs('client_revivew.edit') ? 'active' : '' }}" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#menu-client-reviews" 
                            href="#">
                            <i class="icofont-truck-loaded fs-5"></i> 
                            <span>Client Review</span> 
                            <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
                        </a>

                        <!-- Sub menu -->
                        <ul class="sub-menu collapse" id="menu-client-reviews">
                            <li>
                                <a class="ms-link {{ request()->routeIs('client_revivew') ? 'active' : '' }}" 
                                href="{{ route('client_revivew') }}">
                                    List
                                </a>
                            </li>
                            <li>
                                <a class="ms-link {{ request()->routeIs('client_revivew.addClient_revivew') ? 'active' : '' }}" 
                                href="{{ route('client_revivew.addClient_revivew') }}">
                                    Add
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('featureproject') ? 'active' : '' }} {{ request()->routeIs('featureproject.addFeatureproject') ? 'active' : '' }} {{ request()->routeIs('featureproject.edit') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-featureproject" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>Feature Project</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu-featureproject">
                                <li><a class="ms-link {{ request()->routeIs('featureproject') ? 'active' : '' }}" href="{{ route('featureproject') }}">List</a></li>
                                <li><a class="ms-link {{ request()->routeIs('featureproject.addFeatureproject') ? 'active' : '' }}" href="{{ route('featureproject.addFeatureproject') }}">Add</a></li>
                
                            </ul>
                    </li> 

                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('printing') ? 'active' : '' }} {{ request()->routeIs('printing.addprinting') ? 'active' : '' }} {{ request()->routeIs('printing.edit') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-printing" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>Printing</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu-printing">
                                <li><a class="ms-link {{ request()->routeIs('printing') ? 'active' : '' }}" href="{{ route('printing') }}">List</a></li>
                                <li><a class="ms-link {{ request()->routeIs('printing.addprinting') ? 'active' : '' }}" href="{{ route('printing.addprinting') }}">Add</a></li>
                
                            </ul>
                    </li> 
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('faq') ? 'active' : '' }} {{ request()->routeIs('faq.addfaq') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-faq" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>Faq</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu-faq">
                                <li><a class="ms-link {{ request()->routeIs('faq') ? 'active' : '' }}" href="{{ route('faq') }}">List</a></li>
                                <li><a class="ms-link {{ request()->routeIs('faq.addfaq') ? 'active' : '' }}" href="{{ route('faq.addfaq') }}">Add</a></li>
                  
                            </ul>
                    </li>
                    
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('blogs') ? 'active' : '' }} {{ request()->routeIs('blogs.addBlogs') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-blogs" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>Blogs</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu-blogs">
                                <li><a class="ms-link {{ request()->routeIs('blogs') ? 'active' : '' }}" href="{{ route('blogs') }}">Blogs List</a></li>
                                <li><a class="ms-link {{ request()->routeIs('blogs.addBlogs') ? 'active' : '' }}" href="{{ route('blogs.addBlogs') }}">Blogs Add</a></li>
                  
                            </ul> 
                    </li>
                   
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('trustedpartner') ? 'active' : '' }}" href="{{ route('trustedpartner') }}">
                            <i class="icofont-chart-flow fs-5"></i> <span>Trusted Partner</span></a>
                    </li>
                    
                    <li class="collapsed"> 
                        <a class="m-link {{ request()->routeIs('exceeds_expectations') ? 'active' : '' }}" href="{{ route('exceeds_expectations') }}">
                            <i class="icofont-chart-flow fs-5"></i> <span>Exceeds Expectations</span></a>
                    </li>

                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('howitworks') ? 'active' : '' }}" href="{{ route('howitworks') }}">
                            <i class="icofont-chart-flow fs-5"></i> <span>How It Works</span></a>
                    </li>
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('teams') ? 'active' : '' }}" href="{{ route('teams') }}">
                            <i class="icofont-chart-flow fs-5"></i> <span>Teams</span></a>
                    </li>

                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">
                            <i class="icofont-chart-flow fs-5"></i> <span>Gallery</span></a>
                    </li>
                    
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('career-applications') ? 'active' : '' }}" href="{{ route('career-applications') }}">
                            <i class="icofont-chart-flow fs-5"></i> <span>Career Applications</span></a>
                    </li>
                </ul>
                <!-- Menu: menu collepce btn -->
                <button type="button" class="btn btn-link sidebar-mini-btn text-light">
                    <span class="ms-2"><i class="icofont-bubble-right"></i></span>
                </button>
            </div>
        </div>                