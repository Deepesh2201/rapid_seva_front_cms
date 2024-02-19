@extends('layouts.main')
@section('main-section')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="p-5 text-center">
                <i class="icofont-check-circled display-1 text-success"></i>
                <h1 class="font-weight-bold" style="color:green">Order has been placed successfully 🎉</h1>
                <p class="text-red">Check your order status in <a href="#"
                        class="font-weight-bold text-decoration-none">My Order</a> about next steps
                    information.</p>
            </div>

            <div class="bg-white rounded p-3 m-5 text-center">
                <h6 class="font-weight-bold mb-2">Waiting for confirmation</h6>
                <p class="small text-muted">We will notify you, once we assign a expert for you.</p>
                <a href="#" class="btn rounded btn-warning btn-lg btn-block">Track My Order</a>
            </div>
        </div>
    </div>
    @endsection