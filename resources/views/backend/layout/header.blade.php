<header class="header" id="#head-nav-backend">
  <span href="index.html" class="logo">
    <big>DASHBOARD</big>
  </span>
  <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="fa fa-bars fa-lg"></span>
    </a>
    <div class="navbar-right">
      <ul class="nav navbar-nav">
        <li class="dropdown profile-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-cog fa-lg"></i>
            <span class="username">Me</span>
            <i class="caret"></i>
          </a>
          <ul class="dropdown-menu box profile">
            <li><div class="up-arrow"></div></li> 
            <li>
              <a href="{{ route('logout') }}"><i class="fa fa-power-off"></i>Log Out</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
  <aside class="left-side sidebar-offcanvas">
    <section class="sidebar">
      <div class="user-panel">
        <div class="image" align="center">        
          <img src="{{asset('resources/assets/image')}}/<?php echo Auth::user()->avatar ?>" class="img-circle" alt="User Image" style="height:75px;width:75px;">
        </div>
        <div class="pull-left info" style="margin-top:15px;">
          <p>Email : <?php echo Auth::user()->email ?></p>
          <span>level : Admin </span>
        </div>  
      </div>
      <ul class="sidebar-menu">
        <li class="active">
          <a href="{{ route('backend/dashboard') }}">
            <i class="fa fa-home"></i><span>Dashboard</span>
          </a>
        </li>
        <li class="active">
          <a href="{{ route('backend/profile') }}">
            <i class="fa fa-users"></i><span>Profile</span>
          </a>
        </li>
        <li class="menu">
          <a href="#">
            <i class="fa fa-folder-open"></i><span>Skill</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="sub-menu">
            <li><a  href="{{ route('backend/skill/create') }}">New</a></li>
            <li><a  href="{{ route('backend/skill') }}">List</a></li>
          </ul>
        </li>
        <li class="menu">
          <a href="#">
            <i class="fa fa-folder-open"></i><span>Content</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="sub-menu">
            <li><a  href="{{ route('backend/content/create') }}">New</a></li>
            <li><a  href="{{ route('backend/content') }}">List</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>
  <aside class="right-side">
    <section class="content">
      <div class="row">
        <div class="col-md-12" id="content_backend_ajax" style="margin-top:25px;"></div>