@extends('layouts.admin')
@section('title', 'CRM - Edit Card')
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
                     <li class="breadcrumb-item active" aria-current="page">Edit Card</li>
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
               <form action='{{ route("admin.card.update",[$edit->id]) }}' method="POST" enctype="multipart/form-data" class="row g-3 mt-0">
                @csrf
                @method('PUT')
                  <div class="col-md-3">
                     <label class="form-label">Holder name<code>*</code></label>
                      <input type="text" class="form-control" required="" name="holder_name" placeholder="Holder name" value="{{$edit->holder_name}}"> 
                  </div>

                  <div class="col-md-3">
                     <label for="inputEmail4" class="form-label">Card No<code>*</code></label>
                     <input type="number" class="form-control" required="" name="card_no" required="" placeholder="Card No" value="{{$edit->card_no}}">
                  </div>

                  <div class="col-md-3">
                      <label for="expiryMonth" class="form-label">Expiry Month<code>*</code></label>
                      <select id="expiryMonth" class="form-control" required name="expiry_month">
                          <option value="" disabled selected>Select a month</option>
                          <?php
                           $selvalm = $edit->expiry_month;
                          // Loop from 1 to 12 for the months
                          for ($i = 1; $i <= 12; $i++) {
                              # Format month number as two digits
                              $monthValue = str_pad($i, 2, '0', STR_PAD_LEFT); 
                              $selectedm = ($monthValue == $selvalm) ? 'selected' : '';
                              # Convert the number to the month name
                              $monthName = date('F', mktime(0, 0, 0, $i, 1));
                              
                              # Output the option
                              echo "<option value=\"$monthValue\" $selectedm>$monthName</option>";
                          }
                          ?>
                      </select>
                  </div>


                  <div class="col-md-3">
                      <label for="expiryYear" class="form-label">Expiry Year<code>*</code></label>
                      <select id="expiryYear" class="form-control" required name="expiry_year">
                          <option value="" disabled selected>Select a year</option>
                          <?php
                          // Loop from 2020 to 2050
                          $selval = $edit->expiry_year;
                          for ($year = 2020; $year <= 2050; $year++) {
                             $selected = ($year == $selval) ? 'selected' : '';
                            echo "<option value=\"$year\" $selected>$year</option>";
                          }
                          ?>
                      </select>
                  </div>

                  <div class="col-md-3">
                     <label for="inputEmail4" class="form-label">CVV<code>*</code></label>
                     <input type="text" class="form-control" required="" name="cvv" required="" placeholder="CVV" value="{{$edit->cvv}}">
                  </div>

                  <div class="col-md-3">
                     <label class="form-label">Phone<code>*</code></label>
                      <select class="form-control" name="status">
                         <option value="1" <?php if($edit->status == 1){ echo 'selected'; } ?>>Active</option>
                         <option value="0" <?php if($edit->status == 0){ echo 'selected'; } ?>>Inactive</option>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function () {
      // Handle Select All checkbox change
      $('#select-all').on('change', function () {
          const isChecked = $(this).is(':checked');
          
          $('#permissions1 option').prop('selected', isChecked);
          $('#permissions1').trigger('change'); // Trigger change to update any plugins
      });
   
      // Update Select All checkbox based on individual selections
      $('#permissions1').on('change', function () {
          const allSelected = $('#permissions1 option').length === $('#permissions1 option:selected').length;
          $('#select-all').prop('checked', allSelected);
      });
   });
   
   
   
</script>
@endsection