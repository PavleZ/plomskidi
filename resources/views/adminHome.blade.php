@extends('layouts.adminHomeScreen')
@section('title')
    Admin home
@endsection

@section('main')
    <h1 class="h3 mb-2  p-2">Korisnici</h1>
    <div class="col-lg-2">
        <a href="{{route('korisnik.create')}}"><button type="button" class="btn btn-primary edit-btn">Dodaj korisnika</span></button></a>
    </div>
    <div class="card shadow mb-4 m-2">

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Brisanje</th>


                    </tr>
                    </thead>

                    <tbody>
                    @foreach($korisnici as $k)
                        @if($k->tipNalogaID  != 1)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$k->ime}}</td>
                            <td>{{$k->prezime}}</td>
                            <td>{{$k->email}}</td>
                            <td>
                                <form method="post"action="{{route('userStatusChange',["id"=>$k->id])}}">
                                    @csrf
                                    @method('POST')
                                    @if($k->isDeleted) <button type="submit" class="btn btn-danger status-btn">Neaktivan</button> @else   <button type="submit" class="btn btn-success status-btn">Aktivan</button> @endif

                                </form>
                            </td>
                            <td><a href="{{route('korisnik.edit',['id'=>$k->id])}}"><button type="button" class="btn btn-warning edit-btn"><i class="fa fa-pencil"></i><span>Edit</span></button></a></td>
                            <td>
                                <form method="post"action="{{route('korisnik.destroy',["id"=>$k->id])}}">
                                    @csrf
                                    @method('DELETE')
                                  <button type="submit" class="btn btn-danger status-btn">Obrisi</button>

                                </form>

                            </td>
                        </tr>
                        @endif
                    @endforeach

                    </tbody>
                </table>
                {{$korisnici->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>

    <h1 class="h3 mb-2  p-2">Predmeti</h1>
    <div class="col-lg-2">
        <a href="{{route('predmet.create')}}"><button type="button" class="btn btn-primary edit-btn">Dodaj predmet</span></button></a>
    </div>
    <div class="card shadow mb-4 m-2">

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Naziv</th>
                        <th>Status</th>

                        <th>Edit</th>
                        <th>Brisanje</th>

                    </tr>
                    </thead>

                    <tbody>
                    @foreach($predmeti as $p)

                            <tr>
                                <td>{{$p->id}}</td>
                                <td>{{$p->naziv}}</td>
                                <td>
                                    <form method="post"action="">
                                        @csrf
                                        @method('POST')
                                        @if($p->isDeleted) <button type="submit" class="btn btn-danger status-btn">Neaktivan</button> @else   <button type="submit" class="btn btn-success status-btn">Aktivan</button> @endif

                                    </form>
                                </td>
                                <td><a href="{{route('predmet.edit',['id'=>$p->id])}}"><button type="button" class="btn btn-warning edit-btn"><i class="fa fa-pencil"></i><span>Edit</span></button></a></td>
                                <td>
                                    <form method="post"action="">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger status-btn">Obrisi</button>

                                    </form>

                                </td>
                            </tr>
                    @endforeach

                    </tbody>
                </table>
                {{$predmeti->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>

    <h1 class="h3 mb-2  p-2">Informacije</h1>
    <div class="col-lg-2">
        <a href="#"><button type="button" class="btn btn-primary edit-btn">Dodaj informaciju</span></button></a>
    </div>
    <div class="card shadow mb-4 m-2">

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Naziv</th>
                        <th>Status</th>

                        <th>Edit</th>
                        <th>Brisanje</th>

                    </tr>
                    </thead>

                    <tbody>
                    @foreach($informacije as $i)

                        <tr>
                            <td>{{$i->id}}</td>
                            <td>{{$i->naziv}}</td>
                            <td>
                                <a href="{{$i->link}}">{{$i->link}}</a>
                            </td>
                            <td><a href=""><button type="button" class="btn btn-warning edit-btn"><i class="fa fa-pencil"></i><span>Edit</span></button></a></td>
                            <td>
                                <form method="post"action="">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger status-btn">Obrisi</button>

                                </form>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{$informacije->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>

    <h1 class="h3 mb-2  p-2">Tipovi informacija</h1>
    <div class="col-lg-2">
        <a href="#"><button type="button" class="btn btn-primary edit-btn">Dodaj tip informacija</span></button></a>
    </div>
    <div class="card shadow mb-4 m-2">

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Naziv</th>

                        <th>Edit</th>
                        <th>Brisanje</th>

                    </tr>
                    </thead>

                    <tbody>
                    @foreach($tipoviInformacija as $ti)

                        <tr>
                            <td>{{$ti->id}}</td>
                            <td>{{$ti->naziv}}</td>

                            <td><a href=""><button type="button" class="btn btn-warning edit-btn"><i class="fa fa-pencil"></i><span>Edit</span></button></a></td>
                            <td>
                                <form method="post"action="">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger status-btn">Obrisi</button>

                                </form>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{$tipoviInformacija->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>
    <h1 class="h3 mb-2  p-2">Aktivnosti</h1>
    <div class="col-lg-2">
        <a href="#"><button type="button" class="btn btn-primary edit-btn">Dodaj aktivnost</span></button></a>
    </div>
    <div class="card shadow mb-4 m-2">

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Naziv</th>

                        <th>Edit</th>
                        <th>Brisanje</th>

                    </tr>
                    </thead>

                    <tbody>
                    @foreach($aktivnosti as $a)

                        <tr>
                            <td>{{$a->id}}</td>
                            <td>{{$a->naziv}}</td>

                            <td><a href=""><button type="button" class="btn btn-warning edit-btn"><i class="fa fa-pencil"></i><span>Edit</span></button></a></td>
                            <td>
                                <form method="post"action="">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger status-btn">Obrisi</button>

                                </form>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection