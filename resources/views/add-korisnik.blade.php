@extends('layouts.adminForms')
@section('title')
    Dodaj korisnika
@endsection
@section('form')



    <div id="layoutSidenav_content" class=" w-100">
        <main class="mb-5">
            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <h1 class="mt-5 text-center">Dodaj korisnika</h1>

                    </div>

                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <form  action="{{route('korisnik.store')}}" method="post">
                            @method('POST')
                            @csrf
                            <div class="form-group">
                                <label for="categoryName">Ime</label>
                                <input type="text" class="form-control" id="ime" name="ime" >
                            </div>
                            <div class="form-group">
                                <label for="categoryName">Prezime</label>
                                <input type="text" class="form-control" id="prezime" name="prezime" >
                            </div>
                            <div class="form-group">
                                <label for="categoryName">Email</label>
                                <input type="text" class="form-control" id="email" name="email" >
                            </div>
                            <div class="form-group">
                                <label for="categoryName">Lozinka</label>
                                <input type="password" class="form-control" id="lozinka" name="lozinka" >
                            </div>

                            <button class="btn btn-primary" type="submit">Dodaj korisnika</button>
                            <div id="errorsList">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </main>
    </div>

@endsection




