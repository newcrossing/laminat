@extends('frontend.layouts.main')

@section('title','Изменение объявления')

@section('vendor-styles')

@endsection


@section('page-styles')
@endsection

@section('content')
    <!-- Start Terms & Condition page -->
    <section class="ec-page-content section-space-p terms_condition_page ">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">{{$info->name}}</h2>
                        <h2 class="ec-title">{{$info->name}}</h2>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="ec-common-wrapper">
                        <div class="col-sm-12 ec-cms-block">
                            <div class="ec-cms-block-inner">
                                {!!$info->text!!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Terms & Condition page -->

@endsection

@section('page-scripts')
@endsection
