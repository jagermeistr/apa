@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">


    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-8 col-xl-8 middle-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <h6 class="card-title">Update Payments</h6>
                    <form method="POST" action="{{ route('payment.callback') }}">
                        @csrf
                        <div class="form-group" style="margin-bottom: 10px;">
                            <label for="phone-number">Phone Number</label>
                            <input class="form-control" type="tel" name="phone" required />
                        </div>
                        <div class="form-group" style="margin-bottom: 10px;">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" required />
                        </div>
                        <div class="form-group" style="margin-bottom: 10px;">
                            <label for="amount">Amount</label>
                            <input class="form-control" type="number" name="amount" required />
                        </div>
                        <div class="form-group" style="margin-bottom: 10px;">
                            <label for="first-name">First Name</label>
                            <input class="form-control" type="text" name="firstName" />
                        </div>
                        <div class="form-group" style="margin-bottom: 10px;">
                            <label for="last-name">Last Name</label>
                            <input class="form-control" type="text" name="lastName" />
                        </div>
                        <div class="form-submit">
                            <button class="btn btn-primary btn-block" type="submit"> Pay </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection