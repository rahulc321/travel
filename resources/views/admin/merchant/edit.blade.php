@extends('layouts.admin')
@section('title', 'CRM - Edit Marchent')
@section('content')
<style>
.cke_notification_warning {
    background: #c83939;
    border: 1px solid #902b2b;
    display: none;
}
</style>
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <!-- <h1 class="page-title fw-medium fs-18 mb-2">Data Tables</h1> -->
                <div class="">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Marchent</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                    Marchent
                    </div>

                </div>
                <div class="card-body">
                    <form action='{{ route("admin.merchant.update",[$edit->id]) }}' method="POST"
                        enctype="multipart/form-data" class="row g-3 mt-0">
                        @csrf
                        @method('PUT')
                        <div class="col-md-3">
                            <label class="form-label">Merchant Id<code>*</code></label>
                            <input type="text" class="form-control" required="" name="marchent"
                                placeholder="Enter PMerchant" value="{{$edit->marchent}}">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Status<code>*</code></label>
                            <select class="form-control" name="status">
                                <option value="1" <?php if(@$edit->status == 1){ echo 'selected'; } ?>>Active</option>
                                <option value="0" <?php if(@$edit->status == 0){ echo 'selected'; } ?>>Inactive</option>
                            </select>
                        </div>




                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
// Initialize CKEditor for the Notes section
CKEDITOR.replace('notes');
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Handle Select All checkbox change
    $('#select-all').on('change', function() {
        const isChecked = $(this).is(':checked');

        $('#permissions1 option').prop('selected', isChecked);
        $('#permissions1').trigger('change'); // Trigger change to update any plugins
    });

    // Update Select All checkbox based on individual selections
    $('#permissions1').on('change', function() {
        const allSelected = $('#permissions1 option').length === $('#permissions1 option:selected')
            .length;
        $('#select-all').prop('checked', allSelected);
    });
});
</script>
@endsection