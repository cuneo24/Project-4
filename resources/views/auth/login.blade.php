@extends('master')

@section('title')
    Login
@endsection

@section('content')

    <div class='genericWrapper'>
        <h1>Login</h1>

        Don't have an account? <a href='/register'>Register here...</a>
        <br><br>

        <form method='POST' action='{{ route('login') }}'>

            {{ csrf_field() }}

            <label for='email'>E-Mail Address</label><br>
            <input id='email' type='email' name='email' value='{{ old('email') }}' required autofocus>
            <br><br>
            <label for='password'>Password</label><br>
            <input id='password' type='password' name='password' required>
            <br><br>
            <label>
                <input type='checkbox' name='remember' {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
            <br><br>
            <button type='submit' class='showButton'>Login</button>
            <br><br>
            <a class='btn btn-link' href='{{ route('password.request') }}'>Forgot Your Password?</a>
            <br><br>

            @if ($errors->any())
                <div class="genericAlert">
                    @foreach ($errors->all() as $error)
                        {{ $error }} <br>
                    @endforeach
                </div>
                <br>
            @endif

        </form>
    </div>

@endsection