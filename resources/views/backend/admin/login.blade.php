<html>
<head>
    <title>Admin | Login</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/') }}/login.css">
</head>
<body style="background-image: url({{ asset('bank.jpg') }})">
<div class="loginbox">
    <img src="{{ asset('/backend/assets/') }}/avatar.png" class="avatar">
    <h1>Admin Login</h1>
    <form method="POST" action="{{ url('admin/login') }}">
        @csrf
        <p>Email</p>
        <input type="text" name="email" placeholder="Enter Username" value="{{ old('email') }}" required>
        @if ($message = Session::get('error'))
            <span style="color: red"> {{ $message }}</span>
        @endif
        <p>Password</p>
        <input type="password" name="password" placeholder="Enter Password" required>
        @if ($message = Session::get('error'))
            <span style="color: red"> {{ $message }}</span>
        @endif
        <input type="submit" name="" value="Login">
    </form>
</div>

</body>
</html>
