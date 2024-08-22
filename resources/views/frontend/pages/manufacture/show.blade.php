@extends('frontend.layouts.main')

@section('title','Изменение объявления')

@section('vendor-styles')

@endsection


@section('page-styles')

@endsection

@section('content')
    <section class="ec-page-content ec-vendor-dashboard section-space-p">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->
                <div class="ec-shop-leftside ec-vendor-sidebar col-lg-3 col-md-12">
                    <div class="ec-sidebar-wrap">
                        <!-- Sidebar Category Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-vendor-block">

                                <div class="ec-vendor-block-detail">
                                    @php
                                       $img =  $firm->fotos()->first();
                                    @endphp

                                    <img  src="{{ asset(Storage::disk('product')->url('/300/'). $img->full_name_file)}}" alt="{{$firm->name}}">
                                    <h5 class="mt-4">{{$firm->name}}</h5>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="ec-shop-rightside col-lg-9 col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ec-vendor-block-profile">

                                <div class="ec-vendor-block-about space-bottom-30">
                                   {!! $firm->text !!}
                                </div>
                                <h5>Account Information</h5>

                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="ec-vendor-detail-block ec-vendor-block-email space-bottom-30">
                                            <h6>E-mail address</h6>
                                            <ul>
                                                <li><strong>Email 1 : </strong>support1@exapmle.com</li>
                                                <li><strong>Email 2 : </strong>support2@exapmle.com</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="ec-vendor-detail-block ec-vendor-block-contact space-bottom-30">
                                            <h6>Contact nubmer</h6>
                                            <ul>
                                                <li><strong>Phone Nubmer 1 : </strong>(123) 123 456 7890</li>
                                                <li><strong>Phone Nubmer 2 : </strong>(123) 123 456 7890</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="ec-vendor-detail-block ec-vendor-block-address mar-b-30">
                                            <h6>Address</h6>
                                            <ul>
                                                <li><strong>Home : </strong>123, 2150 Sycamore Street, dummy text of
                                                    the, San Jose, California - 95131.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="ec-vendor-detail-block ec-vendor-block-address">
                                            <h6>Shipping Address</h6>
                                            <ul>
                                                <li><strong>Office : </strong>123, 2150 Sycamore Street, dummy text of
                                                    the, San Jose, California - 95131.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ec-vendor-dashboard-card space-bottom-30">
                        <div class="ec-vendor-card-header">
                            <h5>Latest Order</h5>
                            <div class="ec-header-btn">
                                <a class="btn btn-lg btn-primary" href="#">View All</a>
                            </div>
                        </div>
                        <div class="ec-vendor-card-body">
                            <div class="ec-vendor-card-table">
                                <table class="table ec-table">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Method</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row"><span>225</span></th>
                                        <td><img class="prod-img" src="assets/images/product-image/1.jpg"
                                                 alt="product image"></td>
                                        <td><span>Stylish baby shoes</span></td>
                                        <td><span>COD</span></td>
                                        <td><span>Pending</span></td>
                                        <td><span>$320</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><span>548</span></th>
                                        <td><img class="prod-img" src="assets/images/product-image/2.jpg"
                                                 alt="product image"></td>
                                        <td><span>Sweat Pullover Hoodie</span></td>
                                        <td><span>Cash</span></td>
                                        <td><span>Pending</span></td>
                                        <td><span>$214</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><span>684</span></th>
                                        <td><img class="prod-img" src="assets/images/product-image/3.jpg"
                                                 alt="product image"></td>
                                        <td><span>T-shirt for girl</span></td>
                                        <td><span>Ewallets</span></td>
                                        <td><span>On Way</span></td>
                                        <td><span>$548</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><span>987</span></th>
                                        <td><img class="prod-img" src="assets/images/product-image/4.jpg"
                                                 alt="product image"></td>
                                        <td><span>Wool hat for men</span></td>
                                        <td><span>Bank Transfers</span></td>
                                        <td><span>Delivered</span></td>
                                        <td><span>$200</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
