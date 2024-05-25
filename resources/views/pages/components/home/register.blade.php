@extends('layouts.master')
@section('title', 'Register')
@section('content')

    <!-- Registration form section -->
    <section class="login-page">
        <div class="login-form-box">
            <div class='login-title'>Register</div>
            <div class="login-form">
                 <form action="{{route('register')}}" method="post">

                    <!-- Name field -->
                    <div class="field">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="@error('name') has-error @enderror" placeholder="John Doe">
                        @error('name')
                            <span class="field-error">The name field is required.</span>
                        @enderror
                    </div>

                    <!-- Email field -->
                    <div class="field">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="@error('email') has-error @enderror" placeholder="john@gmail.com">
                        @error('email')
                            <span class="field-error">The email field is required.</span>
                        @enderror
                    </div>

                    <!-- Password field -->
                    <div class="field">
                        <label for="password">Password</label>
                        <input type="Password" name="password" id="password" class="@error('password') has-error @enderror" placeholder="**********">
                        @error('password')
                            <span class="field-error">The password field is required.</span>
                        @enderror
                    </div>
                    <!-- Confirm Password field -->
                    <div class="field">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="text" name="password_confirmation" id="password_confirmation" placeholder="**********">
                    </div>

                    <!-- Register button -->
                    <div class="field">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>

                    <!-- Login link -->
                    <a href="{{route('login')}}">Already have an Account? Login Here...</a>

                    @csrf
                 </form>
            </div>
        </div>
    </section>
@endsection