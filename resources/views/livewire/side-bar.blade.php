 <!-- Sidebar -->
 <div class="sidebar" data-background-color="dark">
     <div class="sidebar-logo">
         <!-- Logo Header -->
         <div class="logo-header" data-background-color="dark">
             <a href="index.html" class="logo">
                 <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" />
             </a>
             <div class="nav-toggle">
                 <button class="btn btn-toggle toggle-sidebar">
                     <i class="gg-menu-right"></i>
                 </button>
                 <button class="btn btn-toggle sidenav-toggler">
                     <i class="gg-menu-left"></i>
                 </button>
             </div>
             <button class="topbar-toggler more">
                 <i class="gg-more-vertical-alt"></i>
             </button>
         </div>
         <!-- End Logo Header -->
     </div>
     <div class="sidebar-wrapper scrollbar scrollbar-inner">
         <div class="sidebar-content">
             <ul class="nav nav-secondary">
                 <li class="nav-section">
                     <span class="sidebar-mini-icon">
                         <i class="fa fa-ellipsis-h"></i>
                     </span>
                     <h4 class="text-section">Navigation</h4>
                 </li>

                 @foreach ($menuData as $index => $menuItem)
                     @php
                         $subMenuId = 'submenu-' . $index;
                     @endphp
                     <li class="nav-item {{ $menuItem['title'] == 'Breached Monitoring' ? 'active' : '' }}">
                         <a @if ($menuItem['hasSubmenu']) data-bs-toggle="collapse" href="#{{ $subMenuId }}" @endif
                             href="{{ $menuItem['link'] }}">
                             <i class="{{ $menuItem['iconClass'] }}"></i>
                             <p>{{ $menuItem['title'] }}</p>
                             @if ($menuItem['hasSubmenu'])
                                 <span class="caret"></span>
                             @endif
                             @if ($menuItem['count'] > 0)
                                 <span class="badge {{ $menuItem['badgeClass'] }}">{{ $menuItem['count'] }}</span>
                             @endif
                         </a>

                         @if ($menuItem['hasSubmenu'])
                             <div class="collapse" id="{{ $subMenuId }}">
                                 <ul class="nav nav-collapse">
                                     @foreach ($menuItem['submenu'] as $submenuItem)
                                         <li>
                                             <a href="{{ $menuItem['link'] }}">
                                                 <span class="sub-item">{{ $submenuItem['title'] }}</span>
                                             </a>
                                         </li>
                                     @endforeach
                                 </ul>
                             </div>
                         @endif
                     </li>
                 @endforeach
             </ul>
         </div>
     </div>
 </div>
 <!-- End Sidebar -->
