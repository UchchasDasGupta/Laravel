@extends('layouts.frontend_master')
@section('frontend_content')


<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg align-items-center">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-sm-6">
                <div class="breadcrumb_tittle text-left">
                    <h2>services</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="breadcrumb_content text-right">
                    <p>Home<span>/</span>services</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--services part start-->
<section class="our_service section_padding single_page_services">
    <div class="container">
        <div class="row">
            <div class="col-xl-5">
                <div class="section_tittle">
                    <h2>our services</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xl-4">
                <div class="single_feature">
                    <div class="single_service">
                        <span class="flaticon-ui"></span>
                        <h4>Better Future</h4>
                        <p>Set have great you male grasses yielding yielding first their to
                            called deep abundantly Set have great you male</p>
                        <a href="#" class="btn_3">read more</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="single_feature">
                    <div class="single_service">
                            <span class="flaticon-ui"></span>
                        <h4>Qualified Trainers</h4>
                        <p>Set have great you male grasses yielding yielding first their to called
                            deep abundantly Set have great you male</p>
                        <a href="#" class="btn_3">read more</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="single_feature">
                    <div class="single_service single_service_2">
                            <span class="flaticon-ui"></span>
                        <h4>Job Oppurtunity</h4>
                        <p>Set have great you male grasses yielding yielding first their to called deep
                            abundantly Set have great you male</p>
                        <a href="#" class="btn_3">read more</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="single_feature">
                    <div class="single_service">
                        <span class="flaticon-ui"></span>
                        <h4>Better Future</h4>
                        <p>Set have great you male grasses yielding yielding first their to
                            called deep abundantly Set have great you male</p>
                        <a href="#" class="btn_3">read more</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="single_feature">
                    <div class="single_service">
                            <span class="flaticon-ui"></span>
                        <h4>Qualified Trainers</h4>
                        <p>Set have great you male grasses yielding yielding first their to called
                            deep abundantly Set have great you male</p>
                        <a href="#" class="btn_3">read more</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="single_feature">
                    <div class="single_service single_service_2">
                            <span class="flaticon-ui"></span>
                        <h4>Job Oppurtunity</h4>
                        <p>Set have great you male grasses yielding yielding first their to called deep
                            abundantly Set have great you male</p>
                        <a href="#" class="btn_3">read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--services part end-->

<!-- review part start-->
<section class="review_part section_padding margin_bottom">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-end">
            <div class="col-lg-5 col-xl-4">
                <div class="tour_pack_text">
                    <h2>Some Feedback
                            From Client</h2>
                    <p>Which cattle fruitful he fly visi won not let above lesser stars fly form wonder every let third form two air seas after us said day won lso together midst two female she</p>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="review_part_cotent owl-carousel">
                    <div class="single_review_part">
                        <img src="{{ asset('frontend') }}/img/client/client_2.png" alt="">
                        <div class="tour_pack_content">
                            <p>Life open fifth midst lesser place light after unto move that make had void and whales. So after void called  whose were cattle fourth seed Image yielding is given every own tree Image</p>
                            <h4>Sawpalo, Brasil</h4>
                        </div>
                    </div>
                    <div class="single_review_part">
                        <img src="{{ asset('frontend') }}/img/client/client_1.png" alt="">
                        <div class="tour_pack_content">
                            <p> Life open fifth midst lesser place light after unto move that make had void and whales. So after void called  whose were cattle fourth seed Image yielding is given every own tree Image</p>
                            <h4>Sawpalo, Brasil</h4>
                        </div>
                    </div>
                    <div class="single_review_part">
                        <img src="{{ asset('frontend') }}/img/client/client_2.png" alt="">
                        <div class="tour_pack_content">
                            <p>Life open fifth midst lesser place light after unto move that make had void and whales. So after void called  whose were cattle fourth seed Image yielding is given every own tree Image</p>
                            <h4>Sawpalo, Brasil</h4>
                        </div>
                    </div>
                    <div class="single_review_part">
                        <img src="{{ asset('frontend') }}/img/client/client_1.png" alt="">
                        <div class="tour_pack_content">
                            <p>Life open fifth midst lesser place light after unto move that make had void and whales. So after void called  whose were cattle fourth seed Image yielding is given every own tree Image</p>
                            <h4>Sawpalo, Brasil</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- review part end-->

@endsection