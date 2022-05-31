@extends('layouts.adminForms')
@section('title')
    Edit korisnika
    @endsection
    @section('form')



        <div id="layoutSidenav_content" class=" w-100">
            <main class="mb-5">
                <div class="container-fluid">
                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <h1 class="mt-5 text-center">Edit korisnika</h1>

                        </div>

                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <form action="{{route('korisnik.update',['id'=>$korisnik->id])}}" method="post">
                                @method('PATCH')
                                @csrf
                                <div class="form-group">
                                    <label for="categoryName">Ime</label>
                                    <input type="text" class="form-control" id="ime" name="ime" value="{{$korisnik->ime}}">
                                </div>
                                <div class="form-group">
                                    <label for="categoryName">Prezime</label>
                                    <input type="text" class="form-control" id="prezime" name="prezime" value="{{$korisnik->prezime}}">
                                </div>
                                <div class="form-group">
                                    <label for="categoryName">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{$korisnik->email}}">
                                </div>
                                <button class="btn btn-primary" type="submit">Izmeni podatke</button>
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




