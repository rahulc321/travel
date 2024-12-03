@extends('layouts.admin')
@section('title', 'CRM - Dashboard')
@section('content')

<div class="main-content app-content">
            <div class="container-fluid">

                 <!-- Start::page-header -->
                 <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2 my-4">
                    <div>
                        <p class="fw-medium fs-20 mb-0">Hi, {{\Auth::user()->name}} &#128075;</p>
                        <p class="fs-13 text-muted mb-0">Welcome Back To Your CRM Dashboard</p>
                    </div>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <div class="form-group">
                            <div class="input-group border">
                                <div class="input-group-text bg-white border-0 pe-0"> <i class="ri-calendar-line lh-1"></i> </div>
                                <input type="text" class="form-control breadcrumb-input border-0" id="daterange" placeholder="Search By Date Range">
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-white btn-wave border-0 me-0 fw-normal">
                                <i class="ri-filter-3-fill me-2"></i>Filter
                            </button>
                            <button type="button" class="btn btn-primary btn-wave"> 
                                <i class="ri-upload-2-line me-2"></i> Export report
                            </button> 
                        </div>
                    </div>
                </div>
                <!-- End::page-header -->

                <!-- Start:: row-1 -->
                <div class="row">
                    <div class="col-xxl-9"> 
                        <div class="row">
                            <div class="col-xxl-3 col-xl-3 col-sm-6">
                                <div class="card custom-card  primary overflow-hidden card1">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start justify-content-between sales-main-cards">
                                            <div>
                                                <div class="mb-1 text-muted">Total Leads</div>
                                                <h4 class="fw-semibold mb-0">
                                                    {{$user_count}}
                                                </h4>
                                                <div class="d-flex align-items-center mt-4">
                                                    <span class="text-success fw-medium"><i class="ti ti-trending-up me-1 fs-12 align-middle d-inline-flex"></i>0.75%</span>
                                                    <span class="ms-2 fs-13">this year</span>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="avatar avatar-md avatar-rounded bg-primary">
                                                    <i class="ti ti-shopping-bag fs-5"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div id="total-products"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-sm-6">
                                <div class="card custom-card  secondary overflow-hidden card2">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start justify-content-between sales-main-cards">
                                            <div>
                                                <div class="mb-1 text-muted">Total Cards</div>
                                                <h4 class="fw-semibold mb-0">
                                                    {{$card_count}}
                                                </h4>
                                                <div class="d-flex align-items-center mt-4">
                                                    <span class="text-danger fw-medium"><i class="ti ti-trending-down me-1 fs-12 align-middle d-inline-flex"></i>1.63%</span>
                                                    <span class="ms-2 fs-13">this year</span>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="avatar avatar-md avatar-rounded bg-primary">
                                                    <i class="ti ti-user fs-5"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div id="total-users"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-sm-6">
                                <div class="card custom-card success overflow-hidden card3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start justify-content-between sales-main-cards">
                                            <div>
                                                <div class="mb-1 text-muted">Total Revenue</div>
                                                <h4 class="fw-semibold mb-0">
                                                    {{$total_revenue}}
                                                </h4>
                                                <div class="d-flex align-items-center mt-4">
                                                    <span class="text-success fw-medium"><i class="ti ti-trending-up me-1 fs-12 align-middle d-inline-flex"></i>0.94%</span>
                                                    <span class="ms-2 fs-13">this year</span>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="avatar avatar-md avatar-rounded bg-primary">
                                                    <i class="ti ti-currency-dollar fs-5"></i>
                                                </span>
                                            </div>
                                        </div>   
                                        <div id="total-revenue"></div> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-sm-6">
                                <div class="card custom-card info overflow-hidden card4">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start justify-content-between sales-main-cards">
                                            <div>
                                                <div class="mb-1 text-muted">Total Sales</div>
                                                <h4 class="fw-semibold mb-0">
                                                    6,23,783
                                                </h4>
                                                <div class="d-flex align-items-center mt-4">
                                                    <span class="text-success fw-medium"><i class="ti ti-trending-up me-1 fs-12 align-middle d-inline-flex"></i>2.38%</span>
                                                    <span class="ms-2 fs-13">this year</span>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="avatar avatar-md avatar-rounded bg-primary">
                                                    <i class="ti ti-chart-bar fs-5"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div id="total-sales"></div>  
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-xxl-7 col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header justify-content-between">
                                        <div class="card-title">
                                            Sales Revenue
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div>Sort By :</div>
                                            <div class="dropdown ms-1"> 
                                                <a href="javascript:void(0);" class="py-2 fs-12 text-muted" data-bs-toggle="dropdown" aria-expanded="false"> Month <i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i> </a> 
                                                <ul class="dropdown-menu" role="menu"> 
                                                    <li><a class="dropdown-item" href="javascript:void(0);">This Week</a></li>
                                                     <li><a class="dropdown-item" href="javascript:void(0);">Last Week</a></li> 
                                                     <li><a class="dropdown-item" href="javascript:void(0);">This Month</a></li> 
                                                </ul> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pb-0">
                                        <div id="salerevenue"></div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="col-xxl-5 col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            Weekly Sales
                                        </div>
                                    </div>
                                    <div class="card-body pb-0">
                                        <div id="weekly-sales"></div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-xl-4">
                                <div class="card custom-card">
                                    <div class="card-header justify-content-between">
                                        <div class="card-title">Total Details</div>
                                        <a href="javascript:void(0)" class="text-muted fs-12 tag-link">View All<i class="ti ti-arrow-narrow-right ms-1"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled top-countries-list">
                                            @foreach($users as $user)
                                            <li>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="avatar avatar-sm">
                                                        <img src="../assets/images/flags/us_flag.jpg" alt="">
                                                    </div>
                                                    <div class="flex-fill">
                                                        <span class="d-block fw-medium">{{$user->name}}</span>
                                                       
                                                    </div>
                                                    <div class="text-end w-25">
                                                        <span class="d-block fw-medium fs-14 mb-1">{{$user->total_lead_amount}}</span>
                                                         
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-header justify-content-between">
                                        <div class="card-title">
                                            Top Selling Products
                                        </div>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example"> 
                                            <button type="button" class="btn btn-primary btn-wave">Day</button> 
                                            <button type="button" class="btn btn-primary-light btn-wave">Week</button> 
                                            <button type="button" class="btn btn-primary-light btn-wave">Month</button> 
                                            <button type="button" class="btn btn-primary-light btn-wave">Year</button> 
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Product
                                                        </th>
                                                        <th>
                                                            Stock
                                                        </th>
                                                        <th class="text-center">
                                                            Price
                                                        </th>
                                                        <th>
                                                            Sales
                                                        </th>
                                                        <th class="text-end">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-3">
                                                                <div class="lh-1">
                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                        <img src="../assets/images/ecommerce/jpg/2.jpg" alt="">
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);" class="d-block fw-medium">FlexStride Boosters</a>
                                                                    <span class="fs-12 text-muted">Lorem ipsum dolor sit amet</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="badge bg-primary-transparent">In Stock</span></td>
                                                        <td class="text-center">$89.99</td>
                                                        <td class="text-end">5000</td>
                                                        <td class="text-end">
                                                            <div class="d-flex gap-2 justify-content-end">
                                                                <a href="javascript:void(0);" class="text-muted" data-bs-toggle="tooltip" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="bi bi-pencil-square"></i></a>
                                                                <a href="javascript:void(0);" class="text-muted" data-bs-toggle="tooltip" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-3">
                                                                <div class="lh-1">
                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                        <img src="../assets/images/ecommerce/jpg/6.jpg" alt="">
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);" class="d-block fw-medium">VividTint Artistry</a>
                                                                    <span class="fs-12 text-muted">Lorem ipsum dolor sit amet</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="badge bg-success-transparent">Out Of Stock</span></td>
                                                        <td class="text-center">$16.99</td>
                                                        <td class="text-end">7000</td>
                                                        <td class="text-end">
                                                            <div class="d-flex gap-2 justify-content-end">
                                                                <a href="javascript:void(0);" class="text-muted" data-bs-toggle="tooltip" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="bi bi-pencil-square"></i></a>
                                                                <a href="javascript:void(0);" class="text-muted" data-bs-toggle="tooltip" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-3">
                                                                <div class="lh-1">
                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                        <img src="../assets/images/ecommerce/jpg/7.jpg" alt="">
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);" class="d-block fw-medium">PureTune AudioBuds</a>
                                                                    <span class="fs-12 text-muted">Lorem ipsum dolor sit amet</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="badge bg-primary-transparent">In Stock</span></td>
                                                        <td class="text-center">$9.99</td>
                                                        <td class="text-end">1800</td>
                                                        <td class="text-end">
                                                            <div class="d-flex gap-2 justify-content-end">
                                                                <a href="javascript:void(0);" class="text-muted" data-bs-toggle="tooltip" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="bi bi-pencil-square"></i></a>
                                                                <a href="javascript:void(0);" class="text-muted" data-bs-toggle="tooltip" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-3">
                                                                <div class="lh-1">
                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                        <img src="../assets/images/ecommerce/jpg/8.jpg" alt="">
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);" class="d-block fw-medium">ScentSpira AromaMist</a>
                                                                    <span class="fs-12 text-muted">Lorem ipsum dolor sit amet</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="badge bg-primary-transparent">In Stock</span></td>
                                                        <td class="text-center">$279.99</td>
                                                        <td class="text-end">3000</td>
                                                        <td class="text-end">
                                                            <div class="d-flex gap-2 justify-content-end">
                                                                <a href="javascript:void(0);" class="text-muted" data-bs-toggle="tooltip" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="bi bi-pencil-square"></i></a>
                                                                <a href="javascript:void(0);" class="text-muted" data-bs-toggle="tooltip" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-bottom-0">
                                                            <div class="d-flex align-items-center gap-3">
                                                                <div class="lh-1">
                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                        <img src="../assets/images/ecommerce/jpg/3.jpg" alt="">
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);" class="d-block fw-medium">SnapPro CaptureCam</a>
                                                                    <span class="fs-12 text-muted">Lorem ipsum dolor sit amet</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="border-bottom-0"><span class="badge bg-success-transparent">Out Of Stock</span></td>
                                                        <td class="text-center border-bottom-0">$349.99</td>
                                                        <td class="text-end border-bottom-0">2000</td>
                                                        <td class="text-end border-bottom-0">
                                                            <div class="d-flex gap-2 justify-content-end">
                                                                <a href="javascript:void(0);" class="text-muted" data-bs-toggle="tooltip" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="bi bi-pencil-square"></i></a>
                                                                <a href="javascript:void(0);" class="text-muted" data-bs-toggle="tooltip" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card custom-card">
                                    <div class="card-header justify-content-between">
                                        <div class="card-title">
                                            Recent Orders
                                        </div>
                                        <div class="d-flex flex-wrap gap-2"> 
                                            <div> <input class="form-control form-control-sm" type="text" placeholder="Search Here" aria-label=".form-control-sm example"> </div> 
                                            <div class="dropdown"> 
                                                <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-wave waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false"> Sort By<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i> </a> 
                                                <ul class="dropdown-menu" role="menu"> 
                                                    <li><a class="dropdown-item" href="javascript:void(0);">New</a></li> 
                                                    <li><a class="dropdown-item" href="javascript:void(0);">Popular</a></li> 
                                                    <li><a class="dropdown-item" href="javascript:void(0);">Relevant</a></li> 
                                                </ul> 
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table text-nowrap table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                            <span>
                                                                <input class="form-check-input" type="checkbox" id="order_All" value="" aria-label="...">
                                                            </span>
                                                        </th>
                                                        <th scope="col">Order Id </th>
                                                        <th scope="col">Customer</th>
                                                        <th scope="col" class="text-center">Quantity</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Ordered Date</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <span>
                                                                <input class="form-check-input" type="checkbox" id="order_1" value="" aria-label="..." checked>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="fw-medium">#1537890</span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="me-2 lh-1">
                                                                    <span class="avatar avatar-md bg-light avatar-rounded">
                                                                        <img src="../assets/images/faces/10.jpg" alt="" class="p-1">
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);" class="fw-medium">Simon Cowall</a>
                                                                    <span class="d-block text-muted fs-12">simoncowall247@gmail.com</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            1
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-success-transparent">Shipped</span>
                                                        </td>
                                                        <td>
                                                            <span class="fw-medium fs-14">$4320.29</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted">25,Nov 2024</span>
                                                        </td>
                                                        <td>
                                                            <div class="hstack gap-2 fs-1">
                                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-primary-light btn-wave"><i class="ri-download-2-line"></i></a>
                                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-secondary-light btn-wave"><i class="ri-edit-line"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span>
                                                                <input class="form-check-input" type="checkbox" id="order_2" value="" aria-label="...">
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="fw-medium">#1539078</span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="me-2 lh-1">
                                                                    <span class="avatar avatar-md bg-light avatar-rounded">
                                                                        <img src="../assets/images/faces/1.jpg" alt="" class="p-1">
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);" class="fw-medium">Meisha Kerr</a>
                                                                    <span class="d-block text-muted fs-12">meishakerr@gmail.com</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            1
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-danger-transparent">Cancelled</span>
                                                        </td>
                                                        <td>
                                                            <span class="fw-medium fs-14">$6745.99</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted">29,Nov 2024</span>
                                                        </td>
                                                        <td>
                                                            <div class="hstack gap-2 fs-1">
                                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-primary-light btn-wave waves-effect waves-light"><i class="ri-download-2-line"></i></a>
                                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-secondary-light btn-wave"><i class="ri-edit-line"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span>
                                                                <input class="form-check-input" type="checkbox" id="order_3" value="" aria-label="..." checked>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="fw-medium">#1539832</span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="me-2 lh-1">
                                                                    <span class="avatar avatar-md bg-light avatar-rounded">
                                                                        <img src="../assets/images/faces/2.jpg" alt="" class="p-1">
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);" class="fw-medium">Jessica</a>
                                                                    <span class="d-block text-muted fs-12">jessica@gmail.com</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                           2
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-primary-transparent">Under Process</span>
                                                        </td>
                                                        <td>
                                                            <span class="fw-medium fs-14">$1176.89</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted">04,Dec 2024</span>
                                                        </td>
                                                        <td>
                                                            <div class="hstack gap-2 fs-1">
                                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-primary-light btn-wave waves-effect waves-light"><i class="ri-download-2-line"></i></a>
                                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-secondary-light btn-wave"><i class="ri-edit-line"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span>
                                                                <input class="form-check-input" type="checkbox" id="order_4" value="" aria-label="..." checked>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="fw-medium">#1539832</span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="me-2 lh-1">
                                                                    <span class="avatar avatar-md bg-light avatar-rounded">
                                                                        <img src="../assets/images/faces/3.jpg" alt="" class="p-1">
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);" class="fw-medium">Amanda B</a>
                                                                    <span class="d-block text-muted fs-12">amandab@gmail.com</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                           1
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-success-transparent">Shipped</span>
                                                        </td>
                                                        <td>
                                                            <span class="fw-medium fs-14">$1899.99</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted">10,Dec 2024</span>
                                                        </td>
                                                        <td>
                                                            <div class="hstack gap-2 fs-1">
                                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-primary-light btn-wave waves-effect waves-light"><i class="ri-download-2-line"></i></a>
                                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-secondary-light btn-wave"><i class="ri-edit-line"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span>
                                                                <input class="form-check-input" type="checkbox" id="order_5" value="" aria-label="...">
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="fw-medium">#1538267</span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="me-2 lh-1">
                                                                    <span class="avatar avatar-md bg-light avatar-rounded">
                                                                        <img src="../assets/images/faces/4.jpg" alt="" class="p-1">
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);" class="fw-medium">Jason Stathman</a>
                                                                    <span class="d-block text-muted fs-12">jasonstathman@gmail.com</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                           1
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-warning-transparent">Pending</span>
                                                        </td>
                                                        <td>
                                                            <span class="fw-medium fs-14">$1867.29</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted">18,Dec 2024</span>
                                                        </td>
                                                        <td>
                                                            <div class="hstack gap-2 fs-1">
                                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-primary-light btn-wave waves-effect waves-light"><i class="ri-download-2-line"></i></a>
                                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-secondary-light btn-wave"><i class="ri-edit-line"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-bottom-0">
                                                            <span>
                                                                <input class="form-check-input" type="checkbox" id="order_6" value="" aria-label="...">
                                                            </span>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <span class="fw-medium">#1537890</span>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <div class="d-flex align-items-center">
                                                                <div class="me-2 lh-1">
                                                                    <span class="avatar avatar-md bg-light avatar-rounded">
                                                                        <img src="../assets/images/faces/5.jpg" alt="" class="p-1">
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);" class="fw-medium">Khabib Hussain</a>
                                                                    <span class="d-block text-muted fs-12">khabibhussain@gmail.com</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="border-bottom-0 text-center">
                                                           1
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <span class="badge bg-success-transparent">Success</span>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <span class="fw-medium fs-14">$2439.99</span>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <span class="text-muted">24,Dec 2024</span>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <div class="hstack gap-2 fs-1">
                                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-primary-light btn-wave waves-effect waves-light"><i class="ri-download-2-line"></i></a>
                                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-secondary-light btn-wave"><i class="ri-edit-line"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer"> 
                                        <div class="d-flex align-items-center"> 
                                            <div> 
                                                Showing 6 Entries <i class="bi bi-arrow-right ms-2"></i> 
                                            </div> 
                                            <div class="ms-auto"> 
                                                <nav aria-label="Page navigation" class="pagination-style-4"> 
                                                    <ul class="pagination mb-0"> 
                                                        <li class="page-item disabled"> <a class="page-link" href="javascript:void(0);"> Prev </a> </li> 
                                                        <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li> 
                                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li> 
                                                        <li class="page-item"> <a class="page-link text-primary" href="javascript:void(0);"> next </a> </li> 
                                                    </ul> 
                                                </nav> 
                                            </div> 
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3">
                        <div class="row">
                            <div class="col-xl-12 col-xl-6">
                                <div class="card custom-card card-bg-primary visitors-search-card">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-start gap-3">
                                            <div>
                                                <span class="avatar avatar-lg bg-white-transparent svg-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#5f6368"><path d="M0 0h24v24H0V0z" fill="none"/><circle cx="12" cy="8" opacity=".3" r="2.1"/><path d="M12 14.9c-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1z" opacity=".3"/><path d="M12 13c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4zm6.1 5.1H5.9V17c0-.64 3.13-2.1 6.1-2.1s6.1 1.46 6.1 2.1v1.1zM12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6.1c1.16 0 2.1.94 2.1 2.1 0 1.16-.94 2.1-2.1 2.1S9.9 9.16 9.9 8c0-1.16.94-2.1 2.1-2.1z"/></svg>
                                                </span>
                                            </div>
                                            <div>
                                                <div class="fw-medium mb-1">Total Page Views</div>
                                                <h4 class="mb-2 fw-semibold text-fixed-white">24,43,853</h4>
                                                <span>Increased by <span class="text-success ms-1 fw-semibold">8.43%<i class="ti ti-arrow-narrow-up"></i></span></span>
                                            </div>
                                        </div>
                                        <div id="visitors-source"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-xl-6">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-header justify-content-between">
                                        <div class="card-title">
                                            Visitors By Browser
                                        </div>
                                        <div class="dropdown"> 
                                            <a href="javascript:void(0);" class="py-2 fs-12 text-muted" data-bs-toggle="dropdown" aria-expanded="false"> Month <i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i> </a> 
                                            <ul class="dropdown-menu" role="menu"> 
                                                <li><a class="dropdown-item" href="javascript:void(0);">This Week</a></li>
                                                 <li><a class="dropdown-item" href="javascript:void(0);">Last Week</a></li> 
                                                 <li><a class="dropdown-item" href="javascript:void(0);">This Month</a></li> 
                                            </ul> 
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <ul class="list-unstyled visitors-browser-list p-3 pb-0">
                                            <li>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div>
                                                        <span class="avatar avatar-md bg-light p-2">
                                                            <img src="../assets/images/browsers/chrome.png" alt="">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <span class="d-block fw-medium">Chrome</span>
                                                        <span class="fs-12 text-muted d-block">Google, Inc.</span>
                                                    </div>
                                                    <div>
                                                        <span class="badge bg-primary-transparent">35,502</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div>
                                                        <span class="avatar avatar-md bg-light p-2">
                                                            <img src="../assets/images/browsers/edge.png" alt="">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <span class="d-block fw-medium">Edge</span>
                                                        <span class="fs-12 text-muted d-block">Microsoft Corporation, Inc.</span>
                                                    </div>
                                                    <div>
                                                        <span class="badge bg-primary-transparent">25,364</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div>
                                                        <span class="avatar avatar-md bg-light p-2">
                                                            <img src="../assets/images/browsers/firefox.png" alt="">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <span class="d-block fw-medium">Firefox</span>
                                                        <span class="fs-12 text-muted d-block">Mozilla Foundation, Inc.</span>
                                                    </div>
                                                    <div>
                                                        <span class="badge bg-primary-transparent">14,635</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div>
                                                        <span class="avatar avatar-md bg-light p-2">
                                                            <img src="../assets/images/browsers/safari.png" alt="">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <span class="d-block fw-medium">Safari</span>
                                                        <span class="fs-12 text-muted d-block">Apple Corporation, Inc.</span>
                                                    </div>
                                                    <div>
                                                        <span class="badge bg-primary-transparent">35,657</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div>
                                                        <span class="avatar avatar-md bg-light p-2">
                                                            <img src="../assets/images/browsers/opera.png" alt="">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <span class="d-block fw-medium">Opera</span>
                                                        <span class="fs-12 text-muted d-block">Opera, Inc.</span>
                                                    </div>
                                                    <div>
                                                        <span class="badge bg-primary-transparent">12,563</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div id="visitors-browser"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header justify-content-between">
                                        <div class="card-title">
                                            Top Customers
                                        </div>
                                        <a href="javascript:void(0)" class="text-muted fs-12 tag-link">View All<i class="ti ti-arrow-narrow-right ms-1"></i></a>
                                    </div>
                                    <div class="card-body ps-2">
                                        <ul class="list-unstyled recent-sales-list">
                                            <li>
                                                <div class="d-flex align-items-start gap-3">
                                                    <div class="lh-1">
                                                        <span class="avatar avatar-md avatar-rounded">
                                                            <img src="../assets/images/faces/11.jpg" alt="">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <span class="fw-medium">Leo Phillips</span>
                                                        <span class="text-muted fs-12 d-block">leophillip@gmail.com</span>
                                                    </div>
                                                    <div class="text-end">
                                                        <span class="d-block fs-12 text-muted">Sales</span>
                                                        <span class="d-block fw-medium">2,342</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex align-items-start gap-3">
                                                    <div class="lh-1">
                                                        <span class="avatar avatar-md avatar-rounded">
                                                            <img src="../assets/images/faces/5.jpg" alt="">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <span class="fw-medium">Owen Foster</span>
                                                        <span class="text-muted fs-12 d-block">owenfoster@gmail.com</span>
                                                    </div>
                                                    <div class="text-end">
                                                        <span class="d-block fs-12 text-muted">Sales</span>
                                                        <span class="d-block fw-medium">1,976</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex align-items-start gap-3">
                                                    <div class="lh-1">
                                                        <span class="avatar avatar-md avatar-rounded">
                                                            <img src="../assets/images/faces/6.jpg" alt="">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <span class="fw-medium">Ava Taylor</span>
                                                        <span class="text-muted fs-12 d-block">avataylor@gmail.com</span>
                                                    </div>
                                                    <div class="text-end">
                                                        <span class="d-block fs-12 text-muted">Sales</span>
                                                        <span class="d-block fw-medium">1,783</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex align-items-start gap-3">
                                                    <div class="lh-1">
                                                        <span class="avatar avatar-md avatar-rounded">
                                                            <img src="../assets/images/faces/14.jpg" alt="">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <span class="fw-medium">Liam Parker</span>
                                                        <span class="text-muted fs-12 d-block">leoparker@gmail.com</span>
                                                    </div>
                                                    <div class="text-end">
                                                        <span class="d-block fs-12 text-muted">Sales</span>
                                                        <span class="d-block fw-medium">1,568</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex align-items-start gap-3">
                                                    <div class="lh-1">
                                                        <span class="avatar avatar-md avatar-rounded">
                                                            <img src="../assets/images/faces/13.jpg" alt="">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <span class="fw-medium">Lucas Hayes</span>
                                                        <span class="text-muted fs-12 d-block">lucashayes@gmail.com</span>
                                                    </div>
                                                    <div class="text-end">
                                                        <span class="d-block fs-12 text-muted">Sales</span>
                                                        <span class="d-block fw-medium">1,355</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-xl-6">
                               <div class="card custom-card">
                                    <div class="card-header justify-content-between">
                                        <div class="card-title">
                                            Recent Transactions
                                        </div>
                                        <a href="javascript:void(0)" class="text-muted fs-12 tag-link">View All<i class="ti ti-arrow-narrow-right ms-1"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled recent-transactions-list">
                                            <li>
                                                <div class="d-flex align-items-start gap-3">
                                                    <div class="flex-fill">
                                                        <span class="d-block fw-medium">Noah Russell</span>
                                                        <span class="text-muted fs-12">23, May 2024 - 12:24PM</span>
                                                    </div>
                                                    <div>
                                                        <span class="d-block fw-medium">+244.27</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex align-items-start gap-3">
                                                    <div class="flex-fill">
                                                        <span class="d-block fw-medium">Henry Morgan</span>
                                                        <span class="text-muted fs-12">14, Jun 2024 - 10:15AM</span>
                                                    </div>
                                                    <div>
                                                        <span class="d-block fw-medium">+532.76</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex align-items-start gap-3">
                                                    <div class="flex-fill">
                                                        <span class="d-block fw-medium">Ava Taylor</span>
                                                        <span class="text-muted fs-12">28, Apr 2024 - 03:36PM</span>
                                                    </div>
                                                    <div>
                                                        <span class="d-block fw-medium">-1,432.00</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex align-items-start gap-3">
                                                    <div class="flex-fill">
                                                        <span class="d-block fw-medium">Harper Wilson</span>
                                                        <span class="text-muted fs-12">29, Apr 2024 - 01:18PM</span>
                                                    </div>
                                                    <div>
                                                        <span class="d-block fw-medium">+499.00</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex align-items-start gap-3">
                                                    <div class="flex-fill">
                                                        <span class="d-block fw-medium">Liam Parker</span>
                                                        <span class="text-muted fs-12">18, Mar 2024 - 09:54AM</span>
                                                    </div>
                                                    <div>
                                                        <span class="d-block fw-medium">-128.38</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex align-items-start gap-3">
                                                    <div class="flex-fill">
                                                        <span class="d-block fw-medium">Zoey Taylor</span>
                                                        <span class="text-muted fs-12">23, May 2024 - 12:24PM</span>
                                                    </div>
                                                    <div>
                                                        <span class="d-block fw-medium">+186.55</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End:: row-1 -->

            </div>
        </div>
     
@endsection
@section('scripts')
@parent

@endsection