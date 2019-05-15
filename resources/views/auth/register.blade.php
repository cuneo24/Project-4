@extends('master')

@section('title')
    Register
@endsection

@section('content')
    <div class='genericWrapper'>
        <h1>Register</h1>

        Already have an account? <a href='/login'>Login here...</a>
        <br><br>

        <form method='POST' action='{{ route('register') }}'>
            {{ csrf_field() }}

            <label for='name'>Name</label><br>
            <input id='name' type='text' name='name' value='{{ old('name') }}' required autofocus>
            <br><br>
            <label for='email'>E-Mail Address</label><br>
            <input id='email' type='email' name='email' value='{{ old('email') }}' required>
            <br><br>
            <label for='password'>Password (min: 8)</label><br>
            <input id='password' type='password' name='password' required>
            <br><br>
            <label for='password-confirm'>Confirm Password</label><br>
            <input id='password-confirm' type='password' name='password_confirmation' required>
            <br><br>
            <button type='submit' class='showButton'>Register</button>
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