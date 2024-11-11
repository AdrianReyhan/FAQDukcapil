@extends('layouts.guest')

@section('content')
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-5">Sign in</h3>
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                
                                <!-- Email Input -->
                                <div class="form-outline mb-4">
                                    <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Email" required autofocus />
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Password Input -->
                                <div class="form-outline mb-4">
                                    <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password" required />
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Remember Me Checkbox -->
                                <div class="form-check d-flex justify-content-start mb-4">
                                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" name="remember" />
                                    <label class="form-check-label" for="form1Example3"> Remember password </label>
                                </div>

                                <!-- Sign In Button -->
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

                                <hr class="my-4">

                                <!-- Register Link -->
                                <p class="text-center mt-4">Don't have an account? <a href="{{ route('register') }}" style="color: #508bfc;">Sign up here</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
