@extends('layouts.common')

@section('content')
    <div class="index">
        <div class="contain">
            <video src="/html/index/video.mp4" autoplay loop muted poster="/html/index/video_cover.jpeg">
                <source src="/html/index/video.mp4" type="video/mp4">
            </video>
        </div>
        <div class="part-one">
            <div class="wrapper rel">
                <div class="title"></div>
                <ul>
                    <li class="one"><a href="detail.html"><img src="/images/tu1.png" alt=""></a></li>
                    <li class="two "><a href="#"><img src="/images/tu2.png" alt=""></a></li>
                    <li class="three"><a href="#"><img src="/images/tu3.png" alt=""></a></li>
                    <li class="four"><a href="#"><img src="/images/more.png" alt=""></a></li>
                </ul>
            </div>
        </div>
        <div class="part-two">
            <div class="wrapper rel">
                <div class="title"></div>
                <img src="/images/cmw2.png" alt="">
            </div>
        </div>

        <div class="part-three">
            <div class="wrapper rel">
                <div class="title"></div>
                <ul>
                    <li class="one"><a href=""><img src="/images/a1.png" alt=""></a></li>
                    <li class="two"><a href=""><img src="/images/a2.png" alt=""></a></li>
                    <li class="three"><a href=""><img src="/images/a3.png" alt=""></a></li>
                    <li class="four"><a href=""><img src="/images/a4.png" alt=""></a></li>
                    <li class="five"><a href=""><img src="/images/a5.png" alt=""></a></li>
                </ul>
            </div>
        </div>
        <!-- <img src="images/content-bg.jpg" alt=""> -->
    </div>
@endsection

