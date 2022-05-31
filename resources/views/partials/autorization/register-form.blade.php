<form class="login100-form" method="POST" action="{{route('register')}}">
    @csrf
    @method("POST")
					<span class="login100-form-title">
                        Registracija
					</span>

    <div class="wrap-input100" >
        <input class="input100" type="text" name="ime" id="ime"placeholder="Ime">
        <span class="focus-input100"></span>

    </div>
    <div class="wrap-input100 " >
        <input class="input100" type="text" name="prezime" id="prezime" placeholder="Prezime">
        <span class="focus-input100"></span>

    </div>
    <div class="wrap-input100 " >
        <input class="input100" type="text" name="email" id="email"placeholder="Email">
        <span class="focus-input100"></span>

    </div>

    <div class="wrap-input100" >
        <input class="input100" type="password" name="lozinka" id="lozinka" placeholder="Lozinka">
        <span class="focus-input100"></span>

    </div>

    <div class="container-login100-form-btn">
        <button class="login100-form-btn">
            Registracija
        </button>
    </div>



    <div class="text-center p-t-136">
        <a class="txt2" href="{{route('home')}}">
         Logujte se
            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
        </a>
    </div>
</form>
