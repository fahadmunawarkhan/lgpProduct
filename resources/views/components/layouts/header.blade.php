 <nav class="navbar navbar-fixed-top">
     <div class="container-fluid">
         <div class="navbar-btn">
             <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
         </div>

         <div class="navbar-brand">
             <a href="index.html"><img src="https://www.wrraptheme.com/templates/lucid/html/assets/images/logo.svg"
                     alt="Lucid Logo" class="img-responsive logo"></a>
         </div>

         <div class="navbar-right">
             <div id="navbar-menu">
                 <ul class="nav navbar-nav">

                     <li>
                         <a href="{{ route('admin.manage.chat') }}" class="icon-menu d-none d-sm-block"><i class="icon-bubbles"></i></a>
                     </li>
                     <li>
                         <a href="{{ route('') }}" class="icon-menu d-none d-sm-block"><i class="icon-envelope"></i><span
                                 class="notification-dot"></span></a>
                     </li>
                     <li class="dropdown">
                         <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                             <i class="icon-bell"></i>
                             <span class="notification-dot"></span>
                         </a>
                         <ul class="dropdown-menu notifications">
                             <li class="header"><strong>You have 4 new Notifications</strong></li>
                             <li>
                                 <a href="javascript:void(0);">
                                     <div class="media">
                                         <div class="media-left">
                                             <i class="icon-info text-warning"></i>
                                         </div>
                                         <div class="media-body">
                                             <p class="text">Campaign <strong>Holiday Sale</strong> is
                                                 nearly
                                                 reach budget limit.</p>
                                             <span class="timestamp">10:00 AM Today</span>
                                         </div>
                                     </div>
                                 </a>
                             </li>
                             <li>
                                 <a href="javascript:void(0);">
                                     <div class="media">
                                         <div class="media-left">
                                             <i class="icon-like text-success"></i>
                                         </div>
                                         <div class="media-body">
                                             <p class="text">Your New Campaign <strong>Holiday
                                                     Sale</strong> is
                                                 approved.</p>
                                             <span class="timestamp">11:30 AM Today</span>
                                         </div>
                                     </div>
                                 </a>
                             </li>
                             <li>
                                 <a href="javascript:void(0);">
                                     <div class="media">
                                         <div class="media-left">
                                             <i class="icon-pie-chart text-info"></i>
                                         </div>
                                         <div class="media-body">
                                             <p class="text">Website visits from Twitter is 27% higher than
                                                 last week.</p>
                                             <span class="timestamp">04:00 PM Today</span>
                                         </div>
                                     </div>
                                 </a>
                             </li>
                             <li>
                                 <a href="javascript:void(0);">
                                     <div class="media">
                                         <div class="media-left">
                                             <i class="icon-info text-danger"></i>
                                         </div>
                                         <div class="media-body">
                                             <p class="text">Error on website analytics configurations</p>
                                             <span class="timestamp">Yesterday</span>
                                         </div>
                                     </div>
                                 </a>
                             </li>
                             <li class="footer"><a href="javascript:void(0);" class="more">See all
                                     notifications</a></li>
                         </ul>
                     </li>
                     <li>
                         <a href="page-login.html" class="icon-menu"><i class="icon-login"></i></a>
                     </li>
                 </ul>
             </div>
         </div>
     </div>

     <script>
         $(".btn-toggle-fullwidth").on("click", function() {
             $("body").hasClass("layout-fullwidth") ? $("body").removeClass("layout-fullwidth") : $("body").addClass(
                 "layout-fullwidth"), $(this).find(".fa").toggleClass("fa-arrow-left fa-arrow-right")
         })
     </script>
 </nav>
