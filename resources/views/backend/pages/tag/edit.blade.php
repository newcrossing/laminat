@extends('backend.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Редактирование')
{{-- vendor styles --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/pickers/pickadate/pickadate.css">
@endsection
{{-- page styles --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/css/pages/app-invoice.css">
@endsection


@section('content')
    <!-- app invoice View Page -->
    <section class="invoice-edit-wrapper">
        @if(session('success'))
            <div class="alert bg-rgba-success alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="d-flex align-items-center">
                    <i class="bx bx-like"></i>
                    <span>  {{session('success')}}  </span>
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert bg-rgba-danger alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="d-flex align-items-center">
                    <i class="bx bx-error"></i>
                    <span>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </span>
                </div>
            </div>
        @endif
        <form action="{{ (isset($tag->id))? route('tag.update',$tag->id):route('tag.store')  }}" method="POST">
            @csrf
            @if(isset($tag->id))
                @method('PUT')
            @endif
            <div class="row">
                <!-- invoice view page -->
                <div class="col-xl-9 col-md-8 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body pb-0 mx-25">

                                <!-- logo and title -->
                                <div class="row ">
                                    <div class="col-sm-12 col-12 order-2 order-sm-1">
                                        <h4 class="text-primary">Название </h4>
                                        <input type="text" name="name" class="form-control"
                                               value="{{old('name',$tag->name)}}"
                                               placeholder="Название">
                                    </div>
                                </div>
                                <hr>
                                <!-- logo and title -->
                                <div class="row mt-25 mb-75">
                                    <div class="col-sm-12 col-12 order-2 order-sm-1 ">
                                        <h6 class="text-primary">Ссылка </h6>
                                        <input type="text" name="slug" class="form-control"
                                               value="{{old('slug',$tag->slug)}}"
                                               placeholder="Название">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- invoice action  -->
                <div class="col-xl-3 col-md-4 col-12">
                    <div class="card invoice-action-wrapper shadow-none border">
                        <div class="card-body">
                            <div class="invoice-action-btn mb-1">
                                <button type="submit" name="redirect" value="apply"
                                        class="btn btn-primary btn-block invoice-send-btn">
                                    <i class="bx bx-send"></i>
                                    <span>Применить</span>
                                </button>
                            </div>

                            <div class="invoice-action-btn mb-1">
                                <button type="submit" name="redirect" value="save" class="btn btn-success btn-block">
                                    <i class='bx bx-save'></i>
                                    <span>Сохранить</span>
                                </button>
                            </div>
                            <div class="invoice-action-btn mb-1">
                                <button type="submit" name="redirect" value="delete" class="btn btn-outline-danger btn-block mr-1 mb-1">
                                    <i class='bx bx-x-circle'></i>
                                    Удалить</button>
                            </div>
                            <div class="d-flex justify-content-between py-50">
                                <span class="invoice-terms-title">Опубликовать</span>
                                <div class="custom-control custom-switch custom-switch-glow">
                                    <input type="checkbox" name="active" class="custom-control-input"
                                           id="paymentTerm" {{!empty($tag->active)?'checked':''}}>
                                    <label class="custom-control-label" for="paymentTerm">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </form>
    </section>


    <section>
        <div class="row">

            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Документы</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            @if($docs->count())
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Название</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($docs as $doc)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('doc.edit',$doc->id) }}"
                                                       class=" {{($doc->pub)?'text-success':'text-danger'}}">
                                                        {{ Str::limit( $doc->name , 400)  }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                                    <div class="d-flex align-items-center">
                                        <i class="bx bx-error-circle"></i>
                                        <span>
                                                   Документов нет
                                                </span>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Статьи</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            @if($posts->count())
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Название</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('post.edit',$post->id) }}"
                                                       class=" {{($post->pub)?'text-success':'text-danger'}}">
                                                        {{ Str::limit( $post->name , 400)  }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                                    <div class="d-flex align-items-center">
                                        <i class="bx bx-error-circle"></i>
                                        <span>
                                                   Статей нет
                                                </span>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection




{{-- vendor scripts --}}
@section('vendor-scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script src="/adm/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="/adm/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="/adm/app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="/adm/app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="/adm/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js"></script>
    <script src="/adm/app-assets/vendors/js/forms/select/select2.full.js"></script>
    <!-- END: Page Vendor JS-->
@endsection

{{-- page scripts --}}
@section('page-scripts')
    <!-- BEGIN: Page JS-->
    <script src="/adm/app-assets/js/doc.edit.js"></script>

    <script src="/adm/app-assets/js/scripts/forms/select/form-select2.js"></script>
    <!-- END: Page JS-->

@endsection
