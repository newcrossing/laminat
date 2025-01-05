@extends('backend.layouts.fullLayoutMaster')
{{-- page title --}}
@section('title','Авторизация')
{{-- page scripts --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/b/app-assets/css/pages/authentication.css')}}">
@endsection

@section('content')
    <!-- login page start -->
    <section id="auth-login" class="row flexbox-container">
        <div class="col-xl-8 col-11">
            <div class="card bg-authentication mb-0">
                <div class="row m-0">
                    <!-- left section-login -->
                    <div class="col-md-6 col-12 px-0">
                        <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                            <div class="card-header pb-1">
                                @if(session('success'))
                                    <div class="alert border-success alert-dismissible mb-2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <div class="d-flex align-items-center">
                                            <i class="bx bx-like"></i>
                                            <span> {{session('success')}}</span>
                                        </div>
                                    </div>

                                @endif
                                <div class="card-title">
                                    <h4 class="text-center mb-2">Добро пожаловать</h4>
                                    <div class="divider">
                                        <div class="divider-text text-uppercase text-muted"><small>{{env('APP_NAME') }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    {{-- form  --}}
                                    <form method="POST" action="{{ route('authenticate') }}">
                                        @csrf
                                        <div class="form-group mb-50">
                                            <label class="text-bold-600" for="email">Логин </label>
                                            <input id="email" type="text"
                                                   class="form-control @error('login') is-invalid @enderror"
                                                   name="login" value="{{ old('login') }}"
                                                   autofocus placeholder="Логин">
                                            @error('login')
                                            <span class="invalid-feedback" role="alert">
                        					<strong>{{ $message }}</strong>
                      						</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="text-bold-600" for="password">Пароль</label>
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" autocomplete="current-password"
                                                   placeholder="Пароль">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>                      </span>
                                            @enderror

                                        </div>
                                        <div class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center">
                                            <div class="text-left">
                                                <div class="checkbox checkbox-sm">
                                                    <input class="form-check-input" type="checkbox"
                                                           name="remember"
                                                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="remember">
                                                        <small>Запомнить меня</small>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary glow w-100 position-relative">Войти
                                            <i id="icon-arrow" class="bx bx-right-arrow-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- right section image -->
                    <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                        <div class="card-content">
                            <img class="img-fluid" src="{{asset('/b/app-assets/images/pages/logo_big.svg')}}" style="width: 500px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login page ends -->
@endsection
