<form class="login100-form" method="POST" action="{{route('login')}}">
    @csrf
    @method('POST')
					<span class="login100-form-title">
                        Login
					</span>

    <div class="wrap-input100 validate-input" >
        <input class="input100" type="text" name="email" id="email" placeholder="Email">
        <span class="focus-input100"></span>

    </div>

    <div class="wrap-input100 validate-input" >
        <input class="input100" type="password" name="lozinka" id="lozinka" placeholder="Lozinka">
        <span class="focus-input100"></span>

    </div>

    <div class="container-login100-form-btn">
        <button type="submit" class="login100-form-btn">
            Login
        </button>
    </div>



    <div class="text-center p-t-136">
        <a class="txt2" href="{{route('reg-form')}}">
            Napravite nalog
            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
        </a>
    </div>
</form>
