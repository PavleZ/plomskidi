<!DOCTYPE html>
<html lang="en">
<head>
@include('partials.autorization.head')
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{asset("assets/images/img-01.png")}}" alt="IMG">
            </div>

            @yield('form')
        </div>
    </div>
</div>




@include('partials.autorization.scripts')

</body>
</html>
