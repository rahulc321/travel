@extends('layouts.admin')
@section('content')
<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h1 class="page-title fw-bold text-primary fs-20 mb-2">View Sales</h1>
                <div>
                    <nav>
                        <ol class="breadcrumb mb-0 bg-light px-3 py-2 rounded">
                            <li class="breadcrumb-item"><a href="javascript:void(0);" class="text-decoration-none text-primary">Home</a></li>
                            <li class="breadcrumb-item active text-secondary" aria-current="page">View Sales</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header Close -->

        <!-- Start::row-1 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card shadow border-0">
                    <div class="card-header bg-primary text-white">
                        <h6 class="mb-0">Sales Details</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle">
                                <tbody>
                                    <tr>
                                        <th>Sale Id:</th>
                                        <td>#{{$user->id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Travel Type:</th>
                                        <td>{{$user->travel_type}}</td>
                                    </tr>
                                    <tr>
                                        <th>Travel Date:</th>
                                        <td>{{$user->travel_date}}</td>
                                    </tr>
                                    <tr>
                                        <th>From Station:</th>
                                        <td>{{$user->from_station}}</td>
                                    </tr>
                                    <tr>
                                        <th>To Station:</th>
                                        <td>{{$user->to_station}}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone:</th>
                                        <td>{{$user->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Passenger Name:</th>
                                        <td>{{$user->passenger_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Holder Name:</th>
                                        <td>{{$user->holder_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Card No:</th>
                                        <td>{{$user->card_no}}</td>
                                    </tr>
                                    <tr>
                                        <th>CVV No:</th>
                                        <td>{{$user->cvv}}</td>
                                    </tr>
                                    <tr>
                                        <th>Confirmation:</th>
                                        <td>{{$user->confirmation_code}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End::row-1 -->

    </div>
</div>
<!-- End::app-content -->
@endsection