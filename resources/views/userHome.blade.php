@extends('layouts.userHomeScreen')
@section('title')
    User home
@endsection
@section('main')

    <div class="blog_main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Our Blogs</h2>
                        <span>It is a long established fact that a reader will be distracted by the readable content of a page </span>
                    </div>
                </div>
            </div>
            <!-- fist section -->
            <div class="row">
                <div class="col-md-12">
                    <div class="our_two_box">
                        <div class="row d_flex">

                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                <div class="our_img">
                                    <figure><img src="{{asset('assets/user/images/our_img1.jpg')}}" alt="#"/></figure>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                <div class="our_text_box">
                                    <h3 class="awesome pa_wi">The biggest and most awesome Photo of  year</h3>
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model </p>
                                    <div class="post_box padding_bottom1">
                                        <h4 class="flot_left1">Post By : Blogger </h4>
                                        <ul class="like">
                                            <li><a href="#"><img src="{{asset('assets/user/images/like.png')}}" alt="#"/>Like</a></li>
                                            <li><a href="#"><img src="{{asset('assets/user/images/comm.png')}}" alt="#"/>Comment</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end fist section -->
            <!-- secend section -->
            <div class="row">
                <div class="col-md-12">
                    <div class="our_two_box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="our_img">
                                    <figure><img class="he_img" src="{{asset('assets/user/images/our_img2.jpg')}}" alt="#"/></figure>


                                    <div class="our_text_box position_box">
                                        <h3 class="awesome withi_color">This week is incelebrity homes  love food </h3>
                                        <p class="hiuouh">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repea</p>
                                        <div class="post_box">
                                            <h4 class="flot_left1 withi_color">Post By : Blogger </h4>
                                            <ul class="like withi_color">
                                                <li><a href="#"><img src="{{asset('assets/user/images/like1.png')}}" alt="#"/>Like</a></li>
                                                <li><a href="#"><img src="{{asset('assets/user/images/comm1.png')}}" alt="#"/>Comment</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end secend section -->

            <!-- three section -->
            <div class="row">
                <div class="col-md-6 padding_bottom2">
                    <div class="our_img">
                        <figure><img src="{{asset('assets/user/images/our_img3.jpg')}}" alt="#"/></figure>
                    </div>
                    <div class="our_text_box three_box">


                        <div class="post_box d_flex padding_top3">
                            <h3 class="awesome padding_flot">Chad-Montano</h3>
                            <h4 class="flot_left1">Post By : Blogger </h4>
                            <ul class="like padding_left2">
                                <li><a href="#"><img src="{{asset('assets/user/images/like.png')}}" alt="#"/>Like</a></li>
                                <li><a href="#"><img src="{{asset('assets/user/images/comm.png')}}" alt="#"/>Comment</a></li>
                            </ul>
                        </div>
                        <p>ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimquis nostrud exercitation ullamco laboris </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="our_img">
                        <figure><img src="{{asset('assets/user/images/our_img4.jpg')}}" alt="#"/></figure>
                    </div>
                    <div class="our_text_box three_box">


                        <div class="post_box d_flex padding_top3">
                            <h3 class="awesome padding_flot">Amezing  Place</h3>
                            <h4 class="flot_left1">Post By : Blogger </h4>
                            <ul class="like padding_left2">
                                <li><a href="#"><img src="{{asset('assets/user/images/like.png')}}" alt="#"/>Like</a></li>
                                <li><a href="#"><img src="{{asset('assets/user/images/comm.png')}}" alt="#"/>Comment</a></li>
                            </ul>
                        </div>
                        <p>ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimquis nostrud exercitation ullamco laboris </p>
                    </div>
                </div>
            </div>


            <!-- end three section -->

            <!-- for section -->
            <div class="row">
                <div class="col-md-12">
                    <div class="our_two_box magna_top90">
                        <div class="row d_flex">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                <div class="our_img">
                                    <figure><img src="{{asset('assets/user/images/our_img5.jpg')}}" alt="#"/></figure>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                <div class="our_text_box">
                                    <h3 class="awesome pa_wi">Our food Quick is comment </h3>
                                    <p>ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id </p>
                                    <div class="post_box padding_bottom1">
                                        <h4 class="flot_left1">Post By : Blogger </h4>
                                        <ul class="like">
                                            <li><a href="#"><img src="{{asset('assets/user/images/like.png')}}" alt="#"/>Like</a></li>
                                            <li><a href="#"><img src="{{asset('assets/user/images/comm.png')}}" alt="#"/>Comment</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end for section -->


        </div>
    </div>
    <!-- end blog_main -->

    <!-- Testimonial -->
    <div class="section">

        <div id="" class="Testimonial">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="titlepage">
                            <h2>Testimonial</h2>
                        </div>
                    </div>
                </div>
                <div class="row d_flex">
                    <div class="col-md-3">
                        <div class="Testimonial_box">
                            <i><img src="{{asset('assets/user/images/plan1.png')}}" alt="#"/></i>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="Testimonial_box">
                            <h4>will smithe</h4>
                            <p>Tof Lorem Ipsum, you need to be There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a pass
                                <br>
                                age of Lorem Ipsum, you need to be
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end Testimonial -->
    <!-- contact -->
    <div id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Contact us</h2>
                        <span>There are many variations of passages of Lorem Ipsum available, but the </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <form class="main_form ">
                        <div class="row">
                            <div class="col-md-12 ">
                                <input class="form_contril" placeholder="Name " type="text" name="Name ">
                            </div>
                            <div class="col-md-12">
                                <input class="form_contril" placeholder="Phone Number" type="text" name=" Phone Number">
                            </div>
                            <div class="col-md-12">
                                <input class="form_contril" placeholder="Email" type="text" name="Email">
                            </div>
                            <div class="col-md-12">
                                <textarea class="textarea" placeholder="Message" type="text" name="Message"></textarea>
                            </div>
                            <div class="col-sm-12">
                                <button class="send_btn">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var botmanWidget = {
            title:'Chat',
            mainColor:'#FFF200',
            bubbleBackground:"#FFF200",
            bubbleColor:'#000',
            backgroundImage:"none",
            aboutText:''

        }

    </script>


    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
    <script >
        window.addEventListener("load",()=>{

            // botmanChatWidget.whisper("start")
            botmanChatWidget.say("Ukoliko zelite interaktivno da pretrazujete unesite <strong>/vodic</strong>, ukoliko zelite rucno unesite <strong>/pretraga</strong>.");
            botmanChatWidget.close();
        })

    </script>


@endsection
