 <div id="left-sidebar" class="sidebar border">
     <style>
         .user-account .dropdown .dropdown-menu {
             transform: none !important;
             border: none;
             box-shadow: 2px 0px 5px 0px rgba(0, 0, 0, 0.2);
             padding: 15px;
             background: #fff;
             border-radius: .55rem;
         }

         rgb(14, 14, 14)r-account .dropdown .dropdown-menu a:hover {
             color: #fff;
         }
     </style>
     <div class="sidebar-scroll">
         <div class="user-account">
             <img src="../assets/images/user.png" class="rounded-circle user-photo" alt="User Profile Picture">
             <div class="dropdown">
                 <span>Welcome,</span>
                 <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown">
                     <strong>{{ auth()->user()->name }}</strong></a>
                 <ul class="dropdown-menu dropdown-menu-right account">
                     <li>
                         <a href="page-profile2.html" style="color: black">
                             <i class="icon-user " style="color: black"></i>
                             My Profile
                         </a>
                     </li>
                     <li>
                         <a href="app-inbox.html" style="color: black">
                             <i class="icon-envelope-open" style="color: black"></i>
                             Messages
                         </a>
                     </li>
                     <li class="divider"></li>
                     <li>
                         <a href="page-login.html" style="color: black">
                             <i class="icon-power" style="color: black"></i>
                             Logout
                         </a>
                     </li>
                 </ul>
             </div>
             <hr>
             <ul class="row list-unstyled">
                 <li class="col-4">
                     <small>Sales</small>
                     <h6>456</h6>
                 </li>
                 <li class="col-4">
                     <small>Order</small>
                     <h6>1350</h6>
                 </li>
                 <li class="col-4">
                     <small>Revenue</small>
                     <h6>$2.13B</h6>
                 </li>
             </ul>
         </div>
         <!-- Nav tabs -->
         <ul class="nav nav-tabs">
             <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu">Menu</a>
             </li>
             <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Chat"><i
                         class="icon-book-open"></i></a></li>
             <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#setting"><i
                         class="icon-settings"></i></a></li>
         </ul>

         <!-- Tab panes -->
         <div class="tab-content p-l-0 p-r-0">
             <div class="tab-pane active" id="menu">
                 <nav id="left-sidebar-nav" class="sidebar-nav">
                     <ul id="main-menu" class="metismenu" wire:ignore>

                         @canany(['manage.product.category', 'manage.product.list'])
                             <li
                                 class="{{ request()->routeIs('admin.product.category', 'admin.list.product') ? 'active' : '' }}">
                                 <a href="#Dashboard" class="has-arrow">
                                     <i class="icon-home"></i>
                                     <span>Products Info</span>
                                 </a>
                                 <ul>
                                     @can('manage.product.category')
                                         <li class="{{ request()->routeIs('admin.product.category') ? 'active' : '' }}">
                                             <a wire:navigate href="{{ route('admin.product.category') }}">
                                                 Products Category
                                             </a>
                                         </li>
                                     @endcan

                                     @can('manage.product.list')
                                         <li class="{{ request()->routeIs('admin.list.product') ? 'active' : '' }}">
                                             <a wire:navigate href="{{ route('admin.list.product') }}">
                                                 Products/Stocks
                                             </a>
                                         </li>
                                     @endcan
                                 </ul>
                             </li>
                         @endcanany


                         @canany(['create.customers', 'view.customers'])
                             <li
                                 class="{{ request()->routeIs('admin.create.customers', 'admin.customers') ? 'active' : '' }}">
                                 <a href="#Dashboard" class="has-arrow">
                                     <i class="icon-home"></i>
                                     <span>Customer Info</span>
                                 </a>
                                 <ul>
                                     @can('create.customers')
                                         <li class="{{ request()->routeIs('admin.create.customers') ? 'active' : '' }}">
                                             <a wire:navigate href="{{ route('admin.create.customers') }}">
                                                 Create Customer
                                             </a>
                                         </li>
                                     @endcan
                                     @can('view.customers')
                                         <li class="{{ request()->routeIs('admin.customers') ? 'active' : '' }}">
                                             <a wire:navigate href="{{ route('admin.customers') }}">
                                                 Manage Customer
                                             </a>
                                         </li>
                                     @endcan
                                 </ul>
                             </li>
                         @endcanany

                         @canany(['create.employee', 'manage.employees'])
                             <li
                                 class="{{ request()->routeIs('admin.create.employee', 'admin.employee') ? 'active' : '' }}">
                                 <a href="#Dashboard" class="has-arrow">
                                     <i class="icon-home"></i>
                                     <span>Employee</span>
                                 </a>
                                 <ul>
                                     @can('create.employee')
                                         <li class="{{ request()->routeIs('admin.create.employee') ? 'active' : '' }}">
                                             <a wire:navigate href="{{ route('admin.create.employee') }}">
                                                 Create Employee
                                             </a>
                                         </li>
                                     @endcan
                                     @can('manage.employees')
                                         <li class="{{ request()->routeIs('admin.employee') ? 'active' : '' }}">
                                             <a wire:navigate href="{{ route('admin.employee') }}">
                                                 Manage Employee
                                             </a>
                                         </li>
                                     @endcan
                                 </ul>
                             </li>
                         @endcanany


                         @can('manage.roles')
                             <li class="{{ request()->routeIs('admin.manage.role') ? 'active' : '' }}">
                                 <a href="#Dashboard" class="has-arrow">
                                     <i class="icon-home"></i>
                                     <span>HRM</span>
                                 </a>
                                 <ul>
                                     <li class="{{ request()->routeIs('admin.add.role') ? 'active' : '' }}">
                                         <a wire:navigate href="{{ route('admin.add.role') }}">
                                             Add Roles
                                         </a>
                                     </li>
                                      <li class="{{ request()->routeIs('admin.manage.role') ? 'active' : '' }}">
                                         <a wire:navigate href="{{ route('admin.manage.role') }}">
                                             Manage Roles
                                         </a>
                                     </li>
                                 </ul>
                             </li>
                         @endcan

                     </ul>
                 </nav>
             </div>
             <div class="tab-pane p-l-15 p-r-15" id="Chat">
                 <form>
                     <div class="input-group m-b-20">
                         <div class="input-group-prepend">
                             <span class="input-group-text"><i class="icon-magnifier"></i></span>
                         </div>
                         <input type="text" class="form-control" placeholder="Search...">
                     </div>
                 </form>
                 <ul class="right_chat list-unstyled">
                     <li class="online">
                         <a href="javascript:void(0);">
                             <div class="media">
                                 <img class="media-object " src="../assets/images/xs/avatar4.jpg" alt="">
                                 <div class="media-body">
                                     <span class="name">Chris Fox</span>
                                     <span class="message">Designer, Blogger</span>
                                     <span class="badge badge-outline status"></span>
                                 </div>
                             </div>
                         </a>
                     </li>
                 </ul>
             </div>
             <div class="tab-pane p-l-15 p-r-15" id="setting">
                 <h6>Choose Skin</h6>
                 <ul class="choose-skin list-unstyled">
                     <li data-theme="purple">
                         <div class="purple"></div>
                         <span>Purple</span>
                     </li>
                     <li data-theme="blue">
                         <div class="blue"></div>
                         <span>Blue</span>
                     </li>
                     <li data-theme="cyan" class="active">
                         <div class="cyan"></div>
                         <span>Cyan</span>
                     </li>
                     <li data-theme="green">
                         <div class="green"></div>
                         <span>Green</span>
                     </li>
                     <li data-theme="orange">
                         <div class="orange"></div>
                         <span>Orange</span>
                     </li>
                     <li data-theme="blush">
                         <div class="blush"></div>
                         <span>Blush</span>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
 </div>
