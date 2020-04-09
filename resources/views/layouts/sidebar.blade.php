<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
         <li class="active">
             <a  href="{{url('/')}}">
              <i class="glyphicon glyphicon-briefcase"></i>
              <span class="mini-click-non">Dashboard</span>
             </a>
         </li>
          <li class="active">
             <a  href="{{url('product')}}">
              <i class="glyphicon glyphicon-shopping-cart"></i>
              <span class="mini-click-non">Product</span>
             </a>
         </li>
         <li class="active">
             <a  href="{{url('customer')}}">
              <i class="glyphicon glyphicon-user"></i>
              <span class="mini-click-non">Customer</span>
             </a>
         </li>
         <li class="active">
             <a  href="{{route('invoice.create')}}">
              <i class="glyphicon glyphicon-list-alt"></i>
              <span class="mini-click-non">Buat Invoice</span>
             </a>
         </li>
         <li class="active">
             <a  href="{{route('invoice.index')}}">
              <i class="glyphicon glyphicon-th-list"></i>
              <span class="mini-click-non">List Invoice</span>
             </a>
         </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>