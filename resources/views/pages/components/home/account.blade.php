@extends('layouts.master')
@section('title', 'Account')
@section('content')
<div class="accounts-page">
   <div class="container">
        <section class="u-box">
            <!-- User Information -->
            <div class="user-info">
                <p class="account-info">Account Information</p>
                <p class="user-name">
                    Name: {{auth()->user()->name}}
                </p>
                <p class="user-email">
                    Email: {{auth()->user()->email}}
                </p>
            </div>
            <!-- Logout Button -->
            <div class="user-btn">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="btn btn-primary">logout</button>
                </form>
            </div>
        </section>  
    </div> 
</div>
@endsection