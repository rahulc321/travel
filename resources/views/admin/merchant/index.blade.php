@extends('layouts.admin')
@section('title', 'CRM - Merchant')
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
                            <li class="breadcrumb-item active" aria-current="page">Merchant</li>
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
                            List Merchant
                        </div>
                        @if (Auth::user()->roles->contains('title', 'Admin'))
                        <a class="" href='{{ route("admin.merchant.create") }}' style="float:right !important"><span
                                class="badge bg-outline-info">Add Merchant</span></a>
                        @endif
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="datatable-basic" class="table table-bordered text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Merchant Id</th>
                                        <th>Status</th>
                                        @if (Auth::user()->roles->contains('title', 'Admin'))
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($marchant as $key => $value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            {{$value->marchent}}
                                            <button onclick="copyToClipboard('{{$value->marchent}}')"
                                                style="border: none; background: none; cursor: pointer;"
                                                title="Copy to clipboard">
                                                📋
                                            </button>
                                        </td>

                                        <td>
                                            @if($value->status ==0)
                                            <span class="badge bg-outline-danger">Inactive</span>

                                            @else
                                            <span class="badge bg-outline-success">Active</span>

                                            @endif
                                        </td>

                                        @if (Auth::user()->roles->contains('title', 'Admin'))
                                        <td>

                                            <a class="" href="{{ route('admin.merchant.edit', $value->id) }}">
                                                <span class="badge bg-outline-info">Edit</span>
                                            </a>

                                            <a class="" href="javascript:;"
                                                onclick="if(confirm('Are you sure you want to delete this?')) { event.preventDefault(); document.getElementById('deleteFrm<?=$key?>').submit(); }">
                                                <span class="badge bg-outline-secondary">Delete</span>
                                            </a>


                                            <form id="deleteFrm{{$key}}"
                                                action="{{ route('admin.merchant.destroy', $value->id) }}" method="POST"
                                                onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="badge bg-outline-secondary" value="Delete">
                                            </form>

                                        </td>
                                        @endif
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
<script>
function copyToClipboard(value) {
    // Create a temporary input element
    const tempInput = document.createElement('textarea');
    tempInput.value = value;
    document.body.appendChild(tempInput);

    // Select the text and copy it to the clipboard
    tempInput.select();
    document.execCommand('copy');

    // Remove the temporary input element
    document.body.removeChild(tempInput);

    // Notify the user (optional)
    alert('Copied to clipboard: ' + value);
}
</script>

@endsection