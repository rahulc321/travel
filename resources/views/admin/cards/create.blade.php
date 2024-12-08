@extends('layouts.admin')
@section('title', 'CRM - Add Card')
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
                     <li class="breadcrumb-item active" aria-current="page">Add Card</li>
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
                  Card
               </div>
            </div>
            <div class="card-body">
               <form action="{{ route('admin.card.store') }}" method="POST" enctype="multipart/form-data" class="row g-3 mt-0">
                  @csrf
                  <div class="col-md-3">
                     <label class="form-label">Phone<code>*</code></label>
                     <input type="number" class="form-control" required="" name="phone" placeholder="Enter Phone">
                  </div>

                  <div class="col-md-6">
                     <label class="form-label">Notes<code>*</code></label>
                     <textarea name="note" id="notes" class="form-control" placeholder="Notes"></textarea>
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
