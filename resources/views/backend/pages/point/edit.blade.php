@extends('backend.layouts.contentLayoutMaster')

@section('title','Точки продаж')

@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/tables/datatable/datatables.min.css">
@endsection

@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/css/pages/app-invoice.css')}}">
@endsection

@section('content')

    <!-- account setting page start -->
    <section id="page-account-settings">
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
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <!-- left menu section -->
                    <!-- right content section -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                             aria-labelledby="account-pill-general" aria-expanded="true">
                                            <form
                                                action="{{ (isset($point->id))? route('point.update',$point->id):route('point.store')  }}"
                                                method="POST">
                                                @csrf
                                                @if(isset($point->id))
                                                    @method('PUT')
                                                @endif


                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Адрес</label>
                                                                <input type="text" class="form-control" name="address" value="{{old('address',$point->address)}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Ссылка</label>
                                                                <input type="text" class="form-control" name="link"
                                                                       value="{{old('link',$point->link)}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" name="active"
                                                                   class="custom-control-input"
                                                                   id="accountSwitchTel" {{ $point->active  ? 'checked' : '' }}>
                                                            <label class="custom-control-label mr-1"
                                                                   for="accountSwitchTel"></label>
                                                            <span
                                                                class="switch-label w-100">Опубликовано </span>
                                                        </div>
                                                    </div>


                                                    <div
                                                        class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" name="redirect" value="apply" class="btn btn-primary glow mr-sm-1 mb-1">
                                                            Применить
                                                        </button>

                                                        <button type="submit" name="redirect" value="save" class="btn btn-primary glow mr-sm-1 mb-1">
                                                            Сохранить
                                                        </button>

                                                        <button type="submit" name="redirect" value="saveadd" class="btn btn-primary glow mr-sm-1 mb-1">
                                                            Сохранить & Добавить
                                                        </button>

                                                        <button type="submit" name="redirect" value="cancel" class="btn btn-light glow mr-sm-1 mb-1">
                                                            Отменить
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- account setting page ends -->

@endsection

@section('vendor-scripts')
    <script src="/adm/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
@endsection

@section('page-scripts')
    <script src="/adm/app-assets/js/scripts/datatables/datatable.js"></script>
@endsection
