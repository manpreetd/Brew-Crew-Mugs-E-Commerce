@extends('layouts.master')
@section('title', 'Login')
@section('content')
    <section class="login-page">
        <div class="login-form-box">
            <div class='login-title'>Login</div>
            <div class="login-form">
                 <form action="{{route('login')}}" method="post">
                    
                    <div class="field">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="@error('email') has-error @enderror" placeholder="john@gmail.com">
                        @error('email')
                        <span class="field-error">Invalid email.</span>
                    @enderror
                    </div>
                    <div class="field">
                        <label for="password">Password</label>
                        <input type="Password" name="password" id="password" class="@error('password') has-error @enderror" placeholder="**********">
                        @error('password')
                        <span class="field-error">The password field is required.</span>
                    @enderror
                    </div>

                    <div class="field">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>

                    <a href="{{route('register')}}">Don't have an Account? Register Here...</a>
                    @csrf
                 </form>
            </div>
        </div>
    </section>
@endsection