@extends('layouts.main')
@section('content')
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain border">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Masuk</h4>
                                    <p class="mb-0">Masukan Username Dan Password</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="post" action="{{ route('login.perform') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="text" class="form-control form-control-lg"
                                                placeholder="Username" name="username" aria-label="Email">
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" class="form-control form-control-lg"
                                                placeholder="Password" name="password" aria-label="Password">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Masuk</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
          background-size: cover;">
                                <span class="mask bg-gradient-primary opacity-6"></span>
                                <h1 class="mt-5 text-white font-weight-bolder position-relative">"Apotek Patoman"</h1>
                                <p class="text-white position-relative">Be Yourself and Never Surrender</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
