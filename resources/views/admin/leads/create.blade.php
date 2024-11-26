@extends('layouts.admin')
@section('title', 'CRM - Add Lead')
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
                     <li class="breadcrumb-item active" aria-current="page">Add Lead</li>
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
                  Lead
               </div>
                
            </div>
            <div class="card-body">
               <form action="{{ route("admin.lead.store") }}" method="POST" enctype="multipart/form-data" class="row g-3 mt-0">
                @csrf
                  <div class="col-md-3">
                     <label class="form-label">Travel Type<code>*</code></label>
                      <select name="travel_type" class="form-control" required>
                              <option value="Greyhound">Greyhound</option>
                              <option value="Amantak">Amantak</option>

                              
                      </select>
                  </div>

                  <div class="col-md-3">
                     <label for="inputEmail4" class="form-label">Travel Date</label>
                     <input type="date" class="form-control" required="" name="travel_date" placeholder="Travel Date">
                  </div>

                  <div class="col-md-3">
                     <label for="inputEmail4" class="form-label">From Station<code>*</code></label>
                     <input type="text" class="form-control" required="" name="from_station" required="" placeholder="From Station">
                  </div>

                  <div class="col-md-3">
                     <label for="inputEmail4" class="form-label">To Station<code>*</code></label>
                     <input type="text" class="form-control" required="" name="to_station" required="" placeholder="To Station">
                  </div>

                  <div class="col-md-3">
                     <label class="form-label">Phone<code>*</code></label>
                     <input type="text" class="form-control" placeholder="Phone" required="" value="{{ old('phone')}}" name="phone"
                        >
                  </div>

                  <div class="col-md-3">
                     <label class="form-label">Email</label>
                     <input type="email" class="form-control" placeholder="Email"   value="{{ old('email')}}" name="email"
                        >
                  </div>

                  <div class="col-md-3">
                     <label class="form-label">Charge Amount<code>*</code></label>
                     <input type="number" class="form-control" placeholder="Charge Amount" required="" value="{{ old('charge_amount')}}" name="charge_amount"
                        >
                  </div>

                  <div class="col-md-3">
                     <label for="inputEmail4" class="form-label">Passenger Name</label>
                     <input type="text" class="form-control" name="passenger_name"  placeholder="Passenger Name">
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