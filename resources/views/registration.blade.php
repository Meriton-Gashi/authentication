@include('nav')
<div class="mainPage" style="text-align: center;">
    <fieldset>
<h3>Registration</h3>

<form action="{{ route('registration_submit') }}" method="post">
    @csrf
    <div>Name</div>
    <div>
        <input type="text" name="name">
    </div>
    <div>UserName</div>
    <div>
        <input type="text" name="username">
    </div>
    <div>Email Address</div>
    <div>
        <input type="text" name="email">
    </div>

    <div>Password</div>
    <div>
        <input type="password" name="password">
    </div>

    <div>Retype Password</div>
    <div>
        <input type="password" name="retype_password">
    </div>

    <div style="margin-top:10px;"><input type="submit" value="Make Registration"></div>
    <br> <br>
    <a href="{{ route('login') }}">Back to Login Page</a>
</form>