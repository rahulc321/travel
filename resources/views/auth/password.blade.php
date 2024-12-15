@extends('layouts.admin')
@section('title', 'CRM - Change Password')
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
                            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
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
                        Change Password
                    </div>

                </div>
                <div class="card-body">
                    <form action="{{ route("admin.update_profile") }}" method="POST" enctype="multipart/form-data"
                        class="row g-3 mt-0">
                        @csrf
                        <div class="col-md-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" name="password" required
                                placeholder="Password">
                        </div>

                        <div class="col-md-3">
                            <label for="confirm_password" class="form-label">Confirm Password<code>*</code></label>
                            <input type="password" id="confirm_password" class="form-control" name="confirm_password"
                                required placeholder="Confirm Password">
                        </div>

                        <div class="col-md-12">
                            <p id="message" style="color: red; display: none;">Passwords do not match.</p>
                        </div>
 
                        <div class="col-12">
                            <button type="submit" id="submit_button" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Get references to the input fields, submit button, and message container
    const passwordField = document.getElementById('password');
    const confirmPasswordField = document.getElementById('confirm_password');
    const submitButton = document.getElementById('submit_button');
    const message = document.getElementById('message');

    // Function to validate password matching
    function validatePassword() {
        if (passwordField.value !== confirmPasswordField.value) {
            // Passwords don't match
            submitButton.style.display = 'none'; // Hide submit button
            message.style.display = 'block';    // Show error message
            message.textContent = 'Passwords do not match.'; // Set error text
        } else {
            // Passwords match
            submitButton.style.display = 'inline-block'; // Show submit button
            message.style.display = 'none';             // Hide error message
        }
    }

    // Add event listeners to both fields
    passwordField.addEventListener('input', validatePassword);
    confirmPasswordField.addEventListener('input', validatePassword);
</script>

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