@extends('layouts.admin')
@section('title', 'CRM - Sales')
@section('content')
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
        <div>
            <!-- <h1 class="page-title fw-medium fs-18 mb-2">Data Tables</h1> -->
            <div class="">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sales</li>
                        
                    </ol>
                </nav>
            </div>
        </div>
      
    </div>

    <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">
                                    List Sales
                                </div>

                              <!--   <a class="" href='{{ route("admin.lead.create") }}' style="float:right !important"><span class="badge bg-outline-info">Add Lead</span></a> -->
                                
                            </div>
                           
                            <div class="card-body">
                                
                                <div class="table-responsive">
                                    <table id="datatable-basic" class="table table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Agent Name</th>
                                                <th>Travel Type</th>
                                                <th>Mobile</th>
                                                <th>CC No</th>
                                                <th>Card No</th>
                                                <th>Holder Name</th>
                                                <th>Passenger</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($leads as $key => $value)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{@$value->agentName->name}}</td>
                                                <td>{{$value->travel_type}}</td>
                                                <td>{{$value->phone}}</td>
                                                <td>{{$value->confirmation_code}}</td>
                                                <td>{{$value->card_no}}</td>
                                                
                                                <td>{{$value->holder_name}}</td>
                                                <td>{{$value->passenger_name}}</td>
                                                <td>
                                                    
                                                        <span class="badge bg-outline-info">{{$value->status}}</span>

                                                    
                                                
                                                </td>
                                                <td>{{$value->created_at}}</td>
                                                <td>

                                                <a class="" href="{{ route('admin.lead.show', $value->id) }}">
                                                <span class="badge bg-outline-info">View</span>
                                                </a>


                                                <a class="" href="{{ route('admin.sales.edit', $value->id) }}">
                                                <span class="badge bg-outline-info">Edit</span>
                                                </a>
                                                 
                                                <a class="" href="javascript:;" onclick="if(confirm('Are you sure you want to delete this?')) { event.preventDefault(); document.getElementById('deleteFrm<?=$key?>').submit(); }">
                                                    <span class="badge bg-outline-secondary">Delete</span>
                                                </a>
                                                
                                                <form id="deleteFrm{{$key}}" action="{{ route('admin.sales.destroy', $value->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="badge bg-outline-secondary" value="Delete">
                                                </form>


                                                <!-- Approve and disapprove -->
                                                @if($value->status == 'pending')
                                                    <a class="" href="{{ route('admin.sales.approve', $value->id) }}" onclick="return confirm('Are you sure you?');">
                                                    <span class="badge bg-outline-success">Approve</span>
                                                    </a>

                                                    <a class="" href="{{ route('admin.sales.reject', $value->id) }}" onclick="return confirm('Are you sure you?');">
                                                    <span class="badge bg-outline-danger">Reject</span>
                                                    </a>
                                                @endif

                                                @if($value->status == 'approve')

                                                <a class="" href="{{ route('admin.sales.reject', $value->id) }}" onclick="return confirm('Are you sure you?');">
                                                    <span class="badge bg-outline-danger">Reject</span>
                                                    </a>

                                                @endif

                                                @if($value->status == 'reject')
                                                    <a class="" href="{{ route('admin.sales.approve', $value->id) }}" onclick="return confirm('Are you sure you?');">
                                                    <span class="badge bg-outline-success">Approve</span>
                                                    </a>
                                                @endif

                                                </td>
                                            </tr>
                                        @endforeach 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>

@endsection

