<!--
************************************************************************************************
                        Book for Fix
                        Development Date : 14-03-2024
                        Development Date   : 16-03-2024
************************************************************************************************
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('assets/image/logo.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('assets/image/logo.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/image/logo.png') }}">
    <link rel="manifest" href="{{ url('backend/images/favicon/site.webmanifest') }}">
    <link href="{{ url('backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ url('backend/css/admin.min.css') }}" rel="stylesheet">
    <script src="{{ url('backend/vendor/sweetalert/sweetalert.min.js') }}"></script>
    <link href="{{ url('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        /* Modern Premium Styling Overrides */
        .bg-gradient-info {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%) !important;
        }
        .sidebar {
            box-shadow: 4px 0 15px rgba(0,0,0,0.1);
        }
        .sidebar-dark .nav-item .nav-link {
            transition: all 0.3s ease;
        }
        .sidebar-dark .nav-item .nav-link:hover {
            background-color: rgba(255,100,0,0.1);
            border-radius: 10px;
            margin: 0 10px;
            width: auto;
            color: #f97316 !important;
        }
        .sidebar-dark .nav-item .nav-link i {
            transition: color 0.3s;
        }
        .sidebar-dark .nav-item .nav-link:hover i {
            color: #f97316 !important;
        }
        body {
            background-color: #f1f5f9;
        }
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.025) !important;
            transition: transform 0.2s ease-in-out;
        }
        .card-header {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            border-top-left-radius: 16px !important;
            border-top-right-radius: 16px !important;
            padding: 1.25rem 1.5rem;
        }
        .btn {
            border-radius: 8px;
            transition: all 0.2s;
        }
        .btn-info, .btn-primary {
            background: linear-gradient(135deg, #f97316 0%, #dc2626 100%) !important;
            border: none !important;
            color: white !important;
            box-shadow: 0 4px 6px -1px rgba(249, 115, 22, 0.4);
        }
        .btn-info:hover, .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 8px -1px rgba(249, 115, 22, 0.6);
        }
        .btn-success {
            background: linear-gradient(135deg, #34d399 0%, #059669 100%) !important;
            border: none !important;
            box-shadow: 0 4px 6px -1px rgba(5, 150, 105, 0.4);
        }
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 8px -1px rgba(5, 150, 105, 0.6);
        }
        .btn-danger {
            background: linear-gradient(135deg, #fb7185 0%, #e11d48 100%) !important;
            border: none !important;
            box-shadow: 0 4px 6px -1px rgba(225, 29, 72, 0.4);
        }
        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 8px -1px rgba(225, 29, 72, 0.6);
        }
        .table {
            color: #334155;
        }
        .table thead th {
            border-bottom: 2px solid #e2e8f0;
            color: #64748b;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            padding: 1rem;
            background-color: #f8fafc;
        }
        .table td, .table th {
            vertical-align: middle;
            border-color: #f1f5f9;
        }
        .table tbody tr:hover {
            background-color: #f8fafc;
        }
        .topbar {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05), 0 1px 2px 0 rgba(0, 0, 0, 0.025) !important;
            border-bottom: 4px solid #f97316;
        }
        .form-control, .form-control-file {
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            padding: 0.6rem 1rem;
            transition: all 0.2s;
        }
        .form-control:focus {
            border-color: #f97316;
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.2);
        }
        /* Top Navbar active accents */
        .text-info {
            color: #f97316 !important;
        }
        a.text-info:hover {
            color: #dc2626 !important;
        }
    </style>
</head>
<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
            <br>
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/admin')}}">
                <div class="sidebar-brand-icon ">
                    <img src="{{ url('assets/image/logo.png') }}" alt="logo" style="max-height: 80px; max-width: 100%;" />
                </div>
            </a>
            <br>
            <hr class="sidebar-divider my-0">
            <li class="nav-item  {{ Request::is('admin') ? 'active':''}}">
                <a class="nav-link" href="{{url('/admin')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Main Menu
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAuth" aria-expanded="true" aria-controls="collapseAuth">
                    <i class="fas fa-fw fa-fingerprint"></i>
                    <span>Authentication & Roles</span>
                </a>
                <div id="collapseAuth" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('/admin/register')}}">Add an Admin</a>
                        <a class="collapse-item" href="{{url('/admin/admins-list')}}">Admin List</a>
                        <a class="collapse-item" href="{{ route('admin.roles-permission.index') }}">Roles & Permissions</a>
                    </div>
                </div>
            </li>
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCompany" aria-expanded="true" aria-controls="collapseCompany">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Company & Staff</span>
                </a>
                <div id="collapseCompany" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.staff-management.index') }}">Staff Management</a>
                        <a class="collapse-item" href="{{ route('admin.branch.index') }}">Branches Initiative</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBrand" aria-expanded="true" aria-controls="collapseBrand">
                    <i class="fas fa-fw fa-truck"></i>
                    <span>Branding & Supply Chain</span>
                </a>
                <div id="collapseBrand" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.supplier.index') }}">Suppliers</a>
                        <a class="collapse-item" href="{{ route('admin.manufacturing-partner.index') }}">Manufacturing Partners</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCMS" aria-expanded="true" aria-controls="collapseCMS">
                    <i class="fas fa-fw fa-desktop"></i>
                    <span>Content Management</span>
                </a>
                <div id="collapseCMS" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.site-setting.index') }}">Site Settings/CMS</a>
                        <a class="collapse-item" href="{{url('/admin/team')}}">Team Details</a>
                        <a class="collapse-item" href="{{url('/admin/faqs')}}">FAQs</a>
                        <a class="collapse-item" href="{{url('/admin/projects')}}">Projects Management</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCatalog" aria-expanded="true" aria-controls="collapseCatalog">
                    <i class="fas fa-fw fa-boxes"></i>
                    <span>Catalog Operations</span>
                </a>
                <div id="collapseCatalog" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.category.index') }}">Categories</a>
                        <a class="collapse-item" href="{{ route('admin.products-inventory.index') }}">Products & Inventory</a>
                        <a class="collapse-item" href="{{ route('admin.stock-management.index') }}">Stock Management</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders" aria-expanded="true" aria-controls="collapseOrders">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Customer & Orders</span>
                </a>
                <div id="collapseOrders" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.customer.index') }}">Customers</a>
                        <a class="collapse-item" href="{{ route('admin.orders-transaction.index') }}">Orders</a>
                        <a class="collapse-item" href="{{ route('admin.shipping-detail.index') }}">Shipping</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEngagement" aria-expanded="true" aria-controls="collapseEngagement">
                    <i class="fas fa-fw fa-star"></i>
                    <span>Engagement & Innovation</span>
                </a>
                <div id="collapseEngagement" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.video-profile.index') }}">Video Profiles</a>
                        <a class="collapse-item" href="{{ route('admin.quiz-competition.index') }}">Quiz Competitions</a>
                        <a class="collapse-item" href="{{ route('admin.group-purchase.index') }}">Group Purchases</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/admin/logout')}}">
                    <i class="fas fa-power-off"></i>
                    <span>Logout</span></a>
            </li>
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-0 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $Name ?? session('first_name') . ' ' . session('last_name') }}</span>
                                <img class="img-profile rounded-circle" src="{{ url('backend/images/profile.svg')}}" alt="{{config('app.name')}}">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="admins.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="admin-update-password.php">
                                    <i class="fas fa-fingerprint fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{url('/admin/logout')}}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
