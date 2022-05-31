<!doctype html>
<html lang="en">
<head>
@include('partials.user.head')
    <style>
        @media screen and (max-width:500px) {
            #botmanWidgetRoot>div{
                right:7px !important;
                width: 360px !important;
            }

        }
        @media all and (max-width: 500px) {

            .links {
                display: flex;
                flex-direction: column;
            }
        }
        #botmanWidgetRoot svg line{
            stroke: #000 !important;

        }
        #botmanWidgetRoot svg{
            display: flex;
        }
        .desktop-closed-message-avatar{
            border: 1px solid #CD1 !important;
        }
     .desktop-closed-message-avatar svg path{
         fill: #000;

     }
    </style>

</head>
<body>

@include('partials.user.header')

@yield('main')
@include('partials.user.footer')
@include('partials.user.scripts')



</body>

</html>
