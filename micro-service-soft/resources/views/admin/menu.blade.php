<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="../../index3.html" class="brand-link">
    <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Micro Credit Soft</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">B.M. Rubel Islam</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Dashboard
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="../layout/top-nav.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Top Navigation</p>
              </a>
            </li>

          </ul>
        </li>


        <li class="nav-item {{ Route::is('branch.create') || Route::is('branch.index') || Route::is('branch.edit') ? 'menu-is-opening menu-open' : '' }} ">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Branches
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('branch.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Branch</p>
              </a>
            </li>
            
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('branch.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Branch Status</p>
              </a>
            </li>
            
          </ul>
        </li>


        <li class="nav-item {{ Route::is('member.create') || Route::is('member.index') || Route::is('member.edit') ? 'menu-is-opening menu-open' : '' }} ">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tree"></i>
            <p>
              Members
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('member.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Member Add</p>
              </a>
            </li>
            
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('member.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Member Status</p>
              </a>
            </li>
            
          </ul>
        </li>


        <li class="nav-item {{ Route::is('loans.index') || Route::is('pendingloan') || Route::is('approvedloan') || Request::is('calculator') ? 'menu-is-opening menu-open' : '' }}">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Loans
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('loans.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Loans</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('pendingloan')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pending Loans</p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('approvedloan')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Approved Loans</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('calculator')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Loan Calculator</p>
              </a>
            </li>
          </ul>
          <!-- //new Added -->
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('loan_products')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Loan Products</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item {{ Route::is('deposite.create') || Route::is('deposite.index') || Route::is('deposite.edit') ? 'menu-is-opening menu-open' : '' }}">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Deposit
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="{{route('deposite.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Deposite Entry</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('deposite.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Depositor List</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item {{ Route::is('withdrawn.create') || Route::is('withdrawn.index') || Route::is('withdrawn.edit') ? 'menu-is-opening menu-open' : '' }}">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Withdraw
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="{{route('withdrawn.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Withdrawl Entry</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('withdrawn.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Withdrawler List</p>
              </a>
            </li>
          </ul>
        </li>



         <li class="nav-item {{ Route::is('expense.create') || Route::is('expense.index') || Route::is('expense.edit') ? 'menu-is-opening menu-open' : '' }} ">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Expense
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
             
            <li class="nav-item">
              <a href="{{route('expense.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Expense Add</p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview">
             
            <li class="nav-item">
              <a href="{{route('expense.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Expense</p>
              </a>
            </li>
          </ul>
         
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('expense_category.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Expense Category Add</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('expense_category.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Expense Category</p>
              </a>
            </li>
          </ul>
        </li>



        <li class="nav-item {{ Route::is('user.create') || Route::is('user.index') || Route::is('user.edit') ? 'menu-is-opening menu-open' : '' }} ">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              User Management
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
             
            <li class="nav-item">
              <a href="{{route('user.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>User Add</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
             
            <li class="nav-item">
              <a href="{{route('user.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>User list</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="{{route('report.index')}}" class="nav-link">
            <i class="nav-icon fas fa-regular fa-user"></i>
            <p>
              Deposit Report

            </p>
          </a>
        </li>



         <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
          Reports
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
             
            <li class="nav-item">
              <a href="{{ route('exp.filter') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Expense Report</p>
              </a>
            </li>
          </ul>
       
        </li>


        <li class="nav-item">
           
            

            <form method="POST" action="{{ route('logout') }}">
                            @csrf
                             <a :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"  class="nav-link">
                              <i class="nav-icon fas fa-regular fa-user"></i>
                                {{-- {{ __('Log Out') }} --}}

                                
                          

              </form>
            <p>
           Log Out
             </p>
           </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>