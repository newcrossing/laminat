@extends('backend.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Пользователи')
{{-- vendor style --}}
@section('vendor-styles')

    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/tables/datatable/datatables.min.css">

@endsection
{{-- page style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/css/pages/app-invoice.css')}}">
@endsection

@section('content')
    <section class="invoice-edit-wrapper">


        <form action="{{ (isset($user->id))? route('backend.user.update',$user->id):route('backend.user.store')}}" method="POST">
            @csrf
            @if(isset($user->id))
                @method('PUT')
            @endif
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-1">
                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1 mt-3">{{($user->login)?:"Новый "}}</h4>
                    {{--                    <p class="text-muted">{{($product->article)?"Артикул: ".$product->article:""}}</p>--}}
                </div>
                <div class="d-flex align-content-center flex-wrap gap-2">
                    <div class="px-0 mr-1">
                        <button type="button" value="delete" class="btn btn-outline-danger ">
                            <i class='bx bx-x-circle'></i> Удалить
                        </button>
                    </div>
                    <a class="btn btn-primary mr-1" href="{{route('backend.user.index')}}">
                        <i class='bx bx-arrow-back'></i> Отменить
                    </a>
                    <button type="submit" class="btn btn-success ">
                        <i class='bx bx-save'></i> Сохранить
                    </button>
                </div>
            </div>
            <div class="row">
                <!-- invoice view page -->
                <div class="col-xl-9 col-md-8 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">Информация </h5>
                        </div>
                        <div class="card-content">
                            <div class="card-body pb-0 mx-25">
                                <!-- logo and title -->
                                <div class="row mb-1">
                                    <div class="col-sm-6 col-6 order-2 order-sm-1 mb-1">
                                        <label>Логин </label>
                                        <input type="text" name="login" class="form-control @error('login') is-invalid  @enderror" value="{{old('login',$user->login)}}"
                                               placeholder="Логин" autofocus required disabled>
                                        @error('login')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6 col-6 order-2 order-sm-1 mb-1">
                                        <label>Имя </label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid  @enderror" value="{{old('name',$user->name)}}"
                                               placeholder="Имя" required>
                                        @error('name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6 col-6 order-2 order-sm-1 mb-1">
                                        <label>E-mail </label>
                                        <input type="text" name="email" class="form-control @error('email') is-invalid  @enderror" value="{{old('email',$user->email)}}"
                                               placeholder="email">
                                        @error('name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6 col-6 order-2 order-sm-1 mb-1">
                                        <label>Новый пароль </label>
                                        <input type="text" name="password" class="form-control @error('password') is-invalid  @enderror" value="">
                                        @error('password')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- invoice action  -->
                <div class="col-xl-3 col-md-4 col-12">
                    <div class="card invoice-action-wrapper shadow-none border">
                        <div class="card-header ">
                            <h5 class="card-tile mb-0">Роли</h5>
                        </div>
                        <hr class="mt-0">
                        <div class="card-body pb-0 pt-0">

                            <div class=" py-50">
                                @foreach($user->roles as $role)
                                    <div class="badge badge-glow badge-info">{{$role->name}}</div>
                                @endforeach
                            </div>


                        </div>
                    </div>

                </div>

            </div>
        </form>
    </section>

@endsection

{{-- vendor scripts --}}
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
{{-- page scripts --}}
@section('page-scripts')
    <script src="/adm/app-assets/js/scripts/datatables/datatable.js"></script>

@endsection
