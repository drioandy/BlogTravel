<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-secondary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link d-flex flex-column align-items-center">
        <img src="{{asset('image/logo.png')}}" alt="BLOG TRAVEL" class="brand-image mt-2 img-circle ">
        <span class="brand-text mt-2 ">BLOG TRAVEL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="{{route('dashboard')}}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">MANAGE</li>
                <li class="nav-item {{ Route::is('category.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('category.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Category
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('category.index')}}"
                               class="nav-link {{ Route::is('category.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('category.create')}}"
                               class="nav-link {{ Route::is('category.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item {{ Route::is('post.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('post.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Post
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('post.wait')}}"
                               class="nav-link {{ Route::is('post.wait') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Waiting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('post.approve')}}"
                               class="nav-link {{ Route::is('post.approve') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Approve</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('post.reject')}}"
                               class="nav-link {{ Route::is('post.reject') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Reject</p>
                            </a>
                        </li>


                    </ul>
                </li>

                <li class="nav-item {{ Route::is('account.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('account.*') ? 'menu-open' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Account
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item {{ !Route::is('account.user.*') && Route::is('account.*')  ? 'menu-open' : '' }}">
                            <a href="#"
                               class="nav-link {{ !Route::is('account.user.*') && Route::is('account.*') ? 'active bg-secondary' : '' }}">
                                <i class="fas fa-user-cog nav-icon"></i>
                                <p>Admin</p>
                                <i class="fas fa-angle-left right"></i>

                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{route('account.index')}}"
                                       class="nav-link {{ Route::is('account.index') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('account.create')}}"
                                       class="nav-link {{ Route::is('account.create') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Add New</p>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        <li class="nav-item {{ Route::is('account.user.*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ Route::is('account.user.*') ? 'active bg-secondary' : '' }}">
                                <i class="fas fa-user nav-icon"></i>
                                <p>User</p>
                                <i class="fas fa-angle-left right"></i>

                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{route('account.user.index')}}"
                                       class="nav-link {{ Route::is('account.user.index') ? 'active ' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('account.user.create')}}"
                                       class="nav-link {{ Route::is('account.user.create') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Add New</p>
                                    </a>
                                </li>


                            </ul>
                        </li>


                    </ul>

                </li>
                <li class="nav-item {{ Route::is('comment.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('comment.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>
                            Comment
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('comment.index')}}"
                               class="nav-link {{ Route::is('comment.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--                 <li class="nav-item {{ Route::is('role.*') ? 'menu-open' : '' }}">--}}
                {{--                     <a href="#" class="nav-link {{ Route::is('role.*') ? 'active' : '' }}">--}}
                {{--                         <i class="nav-icon fas fa-key"></i>--}}
                {{--                         <p>--}}
                {{--                             Role--}}
                {{--                             <i class="fas fa-angle-left right"></i>--}}
                {{--                         </p>--}}
                {{--                     </a>--}}
                {{--                     <ul class="nav nav-treeview">--}}
                {{--                         <li class="nav-item">--}}
                {{--                             <a href="{{route('role.index')}}" class="nav-link {{ Route::is('role.index') ? 'active' : '' }}">--}}
                {{--                                 <i class="far fa-circle nav-icon"></i>--}}
                {{--                                 <p>List</p>--}}
                {{--                             </a>--}}
                {{--                         </li>--}}
                {{--                         <li class="nav-item">--}}
                {{--                             <a href="{{route('role.create')}}" class="nav-link {{ Route::is('role.create') ? 'active' : '' }}">--}}
                {{--                                 <i class="far fa-circle nav-icon"></i>--}}
                {{--                                 <p>Add New</p>--}}
                {{--                             </a>--}}
                {{--                         </li>--}}


                {{--                     </ul>--}}
                </li>
                <li class="nav-item {{ Route::is('contact.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('contact.*') ? 'active' : '' }}">
                        <i class="fas fa-address-book nav-icon"></i>
                        <p>
                            Contact
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('contact.index')}}"
                               class="nav-link {{ Route::is('contact.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>


                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
