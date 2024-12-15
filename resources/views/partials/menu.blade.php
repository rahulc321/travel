<div class="main-sidebar" id="sidebar-scroll">

<!-- Start::nav -->
<nav class="main-menu-container nav nav-pills flex-column sub-open">
    <div class="slide-left" id="slide-left">
        <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
    </div>
    <ul class="main-menu">
        <!-- Start::slide__category -->
        <li class="slide__category"><span class="category-name">Dashboards</span></li>
        <!-- End::slide__category -->

        <li class="slide">
            <a href="/admin" class="side-menu__item {{ request()->is('admin') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24px" viewBox="0 0 24 24" width="24px" fill="#5f6368"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg>
                <span class="side-menu__label">Dashboard</span>
            </a>
        </li>

        

          

         <!-- Start::slide -->
         <li class="slide has-sub {{ request()->is('admin/permissions*') ? 'open' : '' }} {{ request()->is('admin/roles*') ? 'open' : '' }} {{ request()->is('admin/users*') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="side-menu__item {{ request()->is('admin/permissions*') ? 'active' : '' }} {{ request()->is('admin/roles*') ? 'active' : '' }} {{ request()->is('admin/users*') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24px" viewBox="0 0 24 24" width="24px" fill="#5f6368">
                    <path d="M0 0h24v24H0V0z" fill="none"/>
                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm8 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zM8 13c-2.33 0-7 1.17-7 3.5V19h7v-2.5c0-2.33 4.67-3.5 7-3.5H8z"/>
                </svg>
                <span class="side-menu__label">User Management</span>
                <i class="ri-arrow-right-s-line side-menu__angle"></i>
            </a>
            <ul class="slide-menu child1 pages-ul">
                 
                <!-- <li class="slide">
                    <a href='{{ route("admin.permissions.index") }}' class="side-menu__item {{ request()->is('admin/permissions*') ? 'active' : '' }}">Permissions</a>
                </li> -->

                <li class="slide">
                    <a href='{{ route("admin.roles.index") }}' class="side-menu__item {{ request()->is('admin/roles*') ? 'active' : '' }}">Roles</a>
                </li>

                <li class="slide">
                    <a href='{{ route("admin.users.index") }}' class="side-menu__item {{ request()->is('admin/users*') ? 'active' : '' }}">Users</a>
                </li>
                 
                  
                 
            </ul>
        </li>
        <!-- End::slide -->

         
          
 
           
       <!-- Start::slide -->
       <li class="slide">
        <a href='{{ route("admin.lead.index") }}' class="side-menu__item {{ request()->is('admin/lead*') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#5f6368"><g><rect fill="none" height="24" width="24"/></g><g><g/><g><path d="M6.44,9.86L7.02,5H5.05L4.04,9.36c-0.1,0.42-0.01,0.84,0.25,1.17C4.43,10.71,4.73,11,5.23,11 C5.84,11,6.36,10.51,6.44,9.86z" opacity=".3"/><path d="M9.71,11C10.45,11,11,10.41,11,9.69V5H9.04L8.49,9.52c-0.05,0.39,0.07,0.78,0.33,1.07 C9.05,10.85,9.37,11,9.71,11z" opacity=".3"/><path d="M14.22,11c0.41,0,0.72-0.15,0.96-0.41c0.25-0.29,0.37-0.68,0.33-1.07L14.96,5H13v4.69 C13,10.41,13.55,11,14.22,11z" opacity=".3"/><path d="M18.91,4.99L16.98,5l0.58,4.86c0.08,0.65,0.6,1.14,1.21,1.14c0.49,0,0.8-0.29,0.93-0.47 c0.26-0.33,0.35-0.76,0.25-1.17L18.91,4.99z" opacity=".3"/><path d="M21.9,8.89l-1.05-4.37c-0.22-0.9-1-1.52-1.91-1.52H5.05C4.15,3,3.36,3.63,3.15,4.52L2.1,8.89 c-0.24,1.02-0.02,2.06,0.62,2.88C2.8,11.88,2.91,11.96,3,12.06V19c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2v-6.94 c0.09-0.09,0.2-0.18,0.28-0.28C21.92,10.96,22.15,9.91,21.9,8.89z M13,5h1.96l0.54,4.52c0.05,0.39-0.07,0.78-0.33,1.07 C14.95,10.85,14.63,11,14.22,11C13.55,11,13,10.41,13,9.69V5z M8.49,9.52L9.04,5H11v4.69C11,10.41,10.45,11,9.71,11 c-0.34,0-0.65-0.15-0.89-0.41C8.57,10.3,8.45,9.91,8.49,9.52z M4.29,10.53c-0.26-0.33-0.35-0.76-0.25-1.17L5.05,5h1.97L6.44,9.86 C6.36,10.51,5.84,11,5.23,11C4.73,11,4.43,10.71,4.29,10.53z M19,19H5v-6.03C5.08,12.98,5.15,13,5.23,13 c0.87,0,1.66-0.36,2.24-0.95c0.6,0.6,1.4,0.95,2.31,0.95c0.87,0,1.65-0.36,2.23-0.93c0.59,0.57,1.39,0.93,2.29,0.93 c0.84,0,1.64-0.35,2.24-0.95c0.58,0.59,1.37,0.95,2.24,0.95c0.08,0,0.15-0.02,0.23-0.03V19z M19.71,10.53 C19.57,10.71,19.27,11,18.77,11c-0.61,0-1.14-0.49-1.21-1.14L16.98,5l1.93-0.01l1.05,4.37C20.06,9.78,19.97,10.21,19.71,10.53z"/></g></g></svg>
            <span class="side-menu__label">Leads</span>
        </a>
    </li>


    <li class="slide">
        <a href='{{ route("admin.card.index") }}' class="side-menu__item {{ request()->is('admin/card*') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24px" viewBox="0 0 24 24" width="24px" fill="#5f6368">
                <path d="M0 0h24v24H0V0z" fill="none"/>
                <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4v-4h16v4zm0-10H4V6h16v2z"/>
            </svg>
            <span class="side-menu__label">Cards</span>
        </a>
    </li>

    @if (Auth::user()->roles->contains('title', 'Admin'))
    <li class="slide">
        <a href='{{ route("admin.sales") }}' class="side-menu__item {{ request()->is('admin/sales*') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24px" viewBox="0 0 24 24" width="24px" fill="#5f6368">
                <path d="M0 0h24v24H0V0z" fill="none"/>
                <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4v-4h16v4zm0-10H4V6h16v2z"/>
            </svg>
            <span class="side-menu__label">Sales</span>
        </a>
    </li>

    <li class="slide">
        <a href='{{ route("admin.ip-whitelist.index") }}' class="side-menu__item {{ request()->is('admin/ip-whitelist*') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24px" viewBox="0 0 24 24" width="24px" fill="#5f6368">
                <path d="M0 0h24v24H0V0z" fill="none"/>
                <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4v-4h16v4zm0-10H4V6h16v2z"/>
            </svg>
            <span class="side-menu__label">Firewall</span>
        </a>
    </li>
    @endif

    <li class="slide">
        <a href='{{ route("admin.merchant.index") }}' class="side-menu__item {{ request()->is('admin/merchant*') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24px" viewBox="0 0 24 24" width="24px" fill="#5f6368">
                <path d="M0 0h24v24H0V0z" fill="none"/>
                <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4v-4h16v4zm0-10H4V6h16v2z"/>
            </svg>
            <span class="side-menu__label">Merchant</span>
        </a>
    </li>


    
    <!-- End::slide -->

        
    </ul>
    <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
</nav>
<!-- End::nav -->

</div>