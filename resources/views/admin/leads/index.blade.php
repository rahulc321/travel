@extends('layouts.admin')
@section('title', 'CRM - Leads')
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
                        <li class="breadcrumb-item active" aria-current="page">Leads</li>
                        
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
                                    List Leads
                                </div>

                                <a class="" href='{{ route("admin.lead.create") }}' style="float:right !important"><span class="badge bg-outline-info">Add Lead</span></a>
                                
                            </div>
                           
                            <div class="card-body">
                                
                                <div class="table-responsive">
                                    <table id="datatable-basic" class="table table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Travel Type</th>
                                                <th>From Station</th>
                                                <th>To Station</th>
                                                <th>Travel Date</th>
                                                <th>Passenger</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($leads as $key => $value)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$value->travel_type}}</td>
                                                <td>{{$value->from_station}}</td>
                                                <td>{{$value->to_station}}</td>
                                                <td>{{date('d-m-Y', strtotime($value->travel_date))}}</td>
                                                <td>{{$value->passenger_name}}</td>
                                                <td>{{$value->phone}}</td>
                                                <td>
                                                <a class="" href="{{ route('admin.lead.edit', $value->id) }}">
                                                <span class="badge bg-outline-info">Edit</span>
                                                </a>
                                                 
                                                <a class="" href="javascript:;" onclick="if(confirm('Are you sure you want to delete this?')) { event.preventDefault(); document.getElementById('deleteFrm<?=$key?>').submit(); }">
                                                    <span class="badge bg-outline-secondary">Delete</span>
                                                </a>
                                                
                                                <form id="deleteFrm{{$key}}" action="{{ route('admin.lead.destroy', $value->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="badge bg-outline-secondary" value="Delete">
                                                </form>

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

