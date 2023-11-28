@include('nav')
<div class="mainPage" style="text-align: center;">
    <fieldset>
        <h3 style="text-align: center; color: red;" >Login</h3>
            <form action="{{ route('login_submit') }}" method="post">
                @csrf    
                <label for="fname">Username:</label>
                <input type="text"  name="username"><br><br>
                <label for="password">Password:</label>
                <input type="password"  name="password"><br><br>
                <input type="submit" style="margin-left: 190px;" value="Login">
                <div style="margin-top:10px;">
                 <br>
                <a href="{{ route('forget_password') }}">Forget Password</a><br><br>
                <a href="{{route('registration')}}">Registration</a>
            </form> 
            
   