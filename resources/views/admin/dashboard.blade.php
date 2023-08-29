@extends('layouts.master');
@section('content')
    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"> <i class="fas fa-tshirt nav-icon"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Loundry</span>
                    <span class="info-box-number" id="loundryCount"></span>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-box nav-icon"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Paket</span>
                    <span class="info-box-number" id="paketCount"></span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-shopping-cart nav-icon"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Order</span>
                    <span class="info-box-number" id="orderCount"></span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-users nav-icon"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Member</span>
                    <span class="info-box-number" id="memberCount"></span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-chart-bar nav-icon"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Report</span>
                    <span class="info-box-number" id="reportCount"></span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-user nav-icon"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">User</span>
                    <span class="info-box-number" id="userCount"></span>
                </div>
            </div>
        </div>


    </div>
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Selamat Datang Di Dashboard 🎉</h5>

                        @auth
                            <p class="mb-4">{{ auth()->user()->name }}</p>
                        @endauth

                        <i class="fa-sharp fa-solid fa-face-smile text-warning"></i>
                        <a href="javascript:;" class="">Enjoy your work !!!</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <script>
            const apiUrl = 'count'
            $(document).ready(function() {
                $.ajax({
                    url: `{{ url('${apiUrl}') }}`,
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        const data = response.data
                        $("#loundryCount").text(data.loundry)
                        $("#paketCount").text(data.paket)
                        $("#orderCount").text(data.order)
                        $("#memberCount").text(data.member)
                        $("#reportCount").text(data.report)
                        $("#userCount").text(data.user)
                    },
                    error: function() {
                        console.log("Failed to get data from server");
                    }
                });
            });
        </script>
    @endsection
