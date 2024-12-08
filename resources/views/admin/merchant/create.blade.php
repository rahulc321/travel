@extends('layouts.admin')
@section('title', 'CRM - Add Merchant')
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
            <div class="">
               <nav>
                  <ol class="breadcrumb mb-0">
                     <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Add Merchant</li>
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
               Merchant
               </div>
            </div>
            <div class="card-body">
               <form action="{{ route('admin.merchant.store') }}" method="POST" enctype="multipart/form-data" class="row g-3 mt-0">
                  @csrf
                  <div class="col-md-3">
                     <label class="form-label">Merchant Id<code>*</code></label>
                     <input type="text" class="form-control" required="" name="marchent" placeholder="Enter Merchant">
                  </div>

                  <div class="col-md-3">
                     <label class="form-label">Status<code>*</code></label>
                      <select class="form-control" name="status">
                         <option value="1" >Active</option>
                         <option value="0" >Inactive</option>
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
@endsection
