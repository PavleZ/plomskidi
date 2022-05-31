@extends('layouts.adminForms')
@section('title')
    Izmeni predmet
@endsection
@section('form')



    <div id="layoutSidenav_content" class=" w-100">
        <main class="mb-5">
            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <h1 class="mt-5 text-center"> Izmeni predmet</h1>

                    </div>

                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-10">
                        <form action="{{route('predmet.update',['id'=>$predmet->id])}}" method="post">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="categoryName">Naziv:</label>
                                <input type="text" class="form-control" id="naziv" name="naziv" value="{{$predmet->naziv}}">
                            </div>

                            <div class="form-group">
                                <label class="h3">Stavke:</label>

                            </div>
                            <div class="form-group">
                                @foreach($stavkePredmeta as $s)
                                    <div class="">
                                        <input type="checkbox" id="" name="stavke[]" class="" value="{{$s->stavkaID."-".$s->link}}" checked="checked">
                                        <label class="custom-control-label" for="customRadio1">{{$s->nazivStavke}}</label>
                                        <input type="text" id="" name="odgovor-stavke[]" class="form-control" value="{{$s->link}}">

                                    </div>
                                @endforeach
                                    @foreach($ostaleStavke as $s)
                                        <div class="">
                                            <input type="checkbox" id="" name="stavke[]" class="" value="{{$s->id."-"}}">
                                            <label class="custom-control-label" for="customRadio1"  >{{$s->naziv}}</label>
                                            <input type="text" id="" name="odgovor-stavke[]" class="form-control"placeholder="link.....">

                                        </div>
                                    @endforeach

                            </div>

                            <div id="errorsList">
                                <button class="btn btn-primary" type="submit">Izmeni predmet</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </main>
    </div>

@endsection




