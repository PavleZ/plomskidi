<!doctype html>
<html lang="en">
<head>
    @include('partials.admin.head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset("assets/admin/css/font-awesome.css")}}">

    <style>
    #wrapper #content-wrapper #content{
        flex: unset;
    }
    .edit-btn{
        display: flex;
        gap: 5px;
        justify-content: center;
        align-items: center;
    }
    .custom-link{
        color:#000 !important;
    }

    h1,td,th,.copyright {
        color: #000 !important;

    }
    #wrapper #content-wrapper{
        overflow:inherit;
    }
    .col-lg-2{
        flex: unset !important;
    }
</style>
</head>
<body>
<div id="page-top">
    <div id="wrapper">
        @include('partials.admin.header')
        {{-- end of header--}}
        @yield("main")
       @include("partials.admin.footer")
    </div>
</div>

@include("partials.admin.scripts")


</body>

</html>
