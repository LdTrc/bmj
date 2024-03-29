 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon " >
        <img src="{{ asset('img/logo-icon.png') }}"  style="width:40px; height:40px" alt="">
      </div>
      <div class="sidebar-brand-text mx-3">BMJ</div>
    </a>

    <li class="nav-item active">
      <a class="nav-link" href="/">
        <i class="fas fa-home"></i>
        <span>Home</span></a
      >
     
    </li>
   
    <!-- Divider -->
    <hr class="sidebar-divider my-0" />

    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
      <a class="nav-link" href="/home ">
        <i class="fas fa-solid fa-bookmark"></i>
        <span>Best Items</span></a
      >
      <a class="nav-link" href="/datasupp">
        <i class="fas fa-solid fa-handshake"></i>
        <span>Best Supplier</span></a
      >
    </li>
    {{-- <hr class="sidebar-divider " />
    <div class="sidebar-heading">REMINDER</div>

    
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <i class="fas fa-solid fa-bell"></i>
        <span>Reminder</span>
      </a>
      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
         
          <a class="collapse-item" href="{{ url('reminder') }}">Write to Remind</a>
          <a class="collapse-item" href="{{ url('') }}">Reminder Data</a>
        </div>
      </div>
    </li> --}}
    <hr class="sidebar-divider  my-0" />

    <li class="nav-item ">
  <a class="nav-link" href="/addunits">
    <i class="fas fa-cube"></i>
    <span>Add Unit</span></a
  >
</li>
<li class="nav-item ">
  <a class="nav-link" href="/listunits">
    <i class="fas fa-cubes"></i>
    <span>List Units</span></a
  >
</li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">ITEMS MANAGEMENT</div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fa fa-shopping-bag"></i>
        <span>Items</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          {{-- <h6 class="collapse-header">Custom Items:</h6> --}}
          <a class="collapse-item" href="{{ url('/regisproduct') }}">Add Items</a>
          <a class="collapse-item" href="{{ url('/listproducts') }}">List Items</a>
        </div>
      </div>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link" href="{{ url('addsupplier') }}">
        <i class="fas fa fa-plus-circle"></i>
        <span>Add Items</span></a
      >
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
      <a class="nav-link" href="{{ url('listproducts') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>List Items</span></a
      >
    </li> --}}

    {{-- <li class="nav-item">
      <a class="nav-link" href="{{ url('data') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Data List</span></a
      >
    </li> --}}


    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    {{-- <div class="sidebar-heading">SUPPLIER MANAGEMENTS</div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
        <i class="fas fa-fw fa-table"></i>
        <span>Supplier</span>
      </a>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
         
          <a class="collapse-item" href="{{ url('/addsupplier') }}">Add Supplier</a>
          <a class="collapse-item" href="{{ url('/listsupplier') }}">List Suppliers</a>
        </div>
      </div>
    </li> --}}


    <div class="sidebar-heading">SUPPLIER MANAGEMENTS</div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
        <i class="fas fa-fw fa-table"></i>
        <span>Supplier</span>
      </a>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ url('/addsupp') }}">Add Supplier</a>
          <a class="collapse-item" href="{{ url('/listsupp') }}">List Suppliers</a>
        </div>
      </div>
    </li>

    {{-- <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="{{ url('addsupplier') }}">
        <i class="fas fa fa-plus-circle"></i>
        <span>Add Supplier</span></a
      >
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/listsupplier') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>List Supplier</span></a
      >
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" />

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    
  </ul>
  <!-- End of Sidebar -->