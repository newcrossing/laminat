@extends('backend.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Редактирование статьи')
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
        <form action="{{ (isset($post->id))? route('post.update',$post->id):route('post.store')  }}" method="POST">
            @csrf
            @if(isset($post->id))
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
                                               value="{{old('name',$post->name)}}"
                                               placeholder="Название статьи">
                                    </div>

                                </div>
                                <hr>
                                <!-- invoice address and contact -->
                                <div class="row invoice-info">
                                    <div class="col-lg-12 col-md-12 mt-25">

                                    <textarea class="" cols="80" id="rrrr"
                                              name="text">{{old('text',$post->text)}}</textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="invoice-subtotal pt-50">
                                    <div class="row">
                                        <div class="col-md-5 col-12">
                                            <div class="form-group">
                                                <h6 class="invoice-to">Заголовок </h6>
                                                <input type="text" name="meta_title" class="form-control"
                                                       value="{{old('text',$post->meta_title)}}">
                                            </div>
                                            <div class="form-group">
                                                <fieldset class="invoice-address form-group">
                                                    <h6 class="invoice-to">Описание </h6>
                                                    <textarea name="meta_description" class="form-control" rows="4"
                                                              placeholder="">{{old('text',$post->meta_description)}}</textarea>
                                                </fieldset>
                                            </div>

                                        </div>
                                        <div class="col-lg-5 col-md-7 offset-lg-2 col-12">
                                            <div class="form-group">
                                                <h6 class="invoice-to">Теги </h6>
                                                <select name="tags[]" class="select2-customize-result form-control"
                                                        multiple="multiple" id="select2-customize-result">
                                                    @foreach ($tags as $tag)
                                                        <option @if(in_array($tag->id,$sTags)) selected
                                                                @endif value="{{$tag->id}}">{{$tag->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex justify-content-between border-0 pb-0">
                                                    <span class="invoice-subtotal-title">Просмотров за сутки</span>
                                                    <h6 class="invoice-subtotal-value mb-0">{{(@$post->hits)}}</h6>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between border-0 pb-0">
                                                    <span class="invoice-subtotal-title">Всего</span>
                                                    <h6 class="invoice-subtotal-value mb-0">-</h6>
                                                </li>

                                            </ul>
                                        </div>
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
                        </div>
                    </div>
                    <div class="invoice-payment">
                        <div class="invoice-payment-option mb-2">
                            <p>Тип</p>

                            <fieldset class="form-group">
                                <select class="form-control" name="type">
                                    <option value="post" @if($post->type == 'post') selected @endif>Статья</option>
                                    <option value="news" @if($post->type == 'news') selected @endif>Новость</option>
                                </select>
                            </fieldset>
                        </div>

                        <div class="invoice-payment-option mb-2">
                            <p>Дата публикации</p>

                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" name="date_public" class="form-control pickadate-months-year"
                                       placeholder="Выберите дату"
                                       value="{{isset($post->date_public)?$post->date_public->format('d/m/Y'):''}}"/>
                                <div class="form-control-position"><i class='bx bx-calendar'></i></div>
                            </fieldset>
                        </div>
                        <div class="invoice-terms">
                            <div class="d-flex justify-content-between py-50">
                                <span class="invoice-terms-title">Опубликовать</span>
                                <div class="custom-control custom-switch custom-switch-glow">
                                    <input type="checkbox" name="pub" class="custom-control-input"
                                           id="paymentTerm" {{!empty($post->pub)?'checked':''}}>
                                    <label class="custom-control-label" for="paymentTerm">
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between py-50">
                                <span class="invoice-terms-title">Уведомить</span>
                                <div class="custom-control custom-switch custom-switch-glow">
                                    <input type="checkbox" class="custom-control-input" name="notify"
                                           id="clientNote" {{!empty($post->notify)?'checked':''}}>
                                    <label class="custom-control-label" for="clientNote">
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between py-50">
                                <span class="invoice-terms-title">На главную</span>
                                <div class="custom-control custom-switch custom-switch-glow">
                                    <input type="checkbox" class="custom-control-input" id="paymentstub"
                                           name="in_main" {{!empty($post->in_main)?'checked':''}}>
                                    <label class="custom-control-label" for="paymentstub">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr>

                    </div>
                </div>
            </div>

        </form>
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

    <script type="text/javascript" src="/CKE/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/CKE/ckfinder.js"></script>

    <script type="text/javascript">
        var editor = CKEDITOR.replace('rrrr',
            {
                customConfig: '/CKE/ckeditor/config_post.js'
            }
        );

        CKFinder.setupCKEditor(editor, '/CKE/');
    </script>
@endsection
