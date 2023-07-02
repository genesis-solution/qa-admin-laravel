<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <title>ONE PAGE❘夢境如詩一頁 舒眠一夜-測驗問券Q1</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @yield('styles')
    <style>
        #yourModal {
            display: none;
        }
    </style>
</head>
<body>
<!--
Image Attribution

Image Source : https://www.freepik.com

Image by upklyak on Freepik

Vector Link : https://www.freepik.com/free-vector/night-landscape-with-car-road-river-mountains-horizon-full-moon-sky-vector-cartoon-illustration-lake-with-asphalt-highway-with-sign-fencing-white-rocks-coast_24217312.htm
 -->
<section>
    <div class="container">
        <div id="scene">
            <div class="layer" data-depth-x="-0.5" data-depth-y="0.25"><img src="{{asset('assets/moon.png')}}" class="moon"></div>
            <div class="layer" data-depth-x="0.15"><img src="{{asset('assets/mountains02.png')}}"></div>
            <div class="layer" data-depth-x="0.25"><img src="{{asset('assets/mountains01.png')}}"></div>
            <div class="layer" data-depth-x="-0.25"><img src="{{asset('assets/road.png')}}"></div>
        </div>
    </div>
    <div class="login center" data-depth-x="-0.25" >

        @yield('content')

        <div class="group">
        </div>

    </div>

</section>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>--}}
@yield('scripts')
@include('partials.contact')
<div class="lbvXTF">
    <button id="toggle_btn" class="hjFUtE" title="此表單填寫代表同意個資隱私條件">
        <span class="ButtonBase__Overlay-sc-p43e7i-4 jUXzLe">
            <div class="Icon__IconContainer-sc-11wrh3u-0 hPVtvf ButtonBase__ButtonIcon-sc-p43e7i-0 gMSomS">
                <div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="injected-svg" data-src="{{asset('assets/floating-button-dialog.svg')}}" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g clip-path="url(#a-1)">
                                <path fill-rule="evenodd" d="M1.935 6.274A11.678 11.678 0 0 1 11.7 1h.604c3.936 0 7.607 1.983 9.765 5.274a8.759 8.759 0 0 1 0 9.606 11.678 11.678 0 0 1-9.765 5.274H11.7c-.257 0-.512-.008-.767-.025l-3.635 2.772a.5.5 0 0 1-.803-.398V19.93a11.673 11.673 0 0 1-4.56-4.05 8.759 8.759 0 0 1 0-9.606Zm6.764 4.803c0 .928-.74 1.68-1.653 1.68s-1.653-.752-1.653-1.68c0-.928.74-1.68 1.653-1.68s1.653.752 1.653 1.68Zm3.303 1.68c.913 0 1.653-.752 1.653-1.68 0-.928-.74-1.68-1.653-1.68-.912 0-1.652.752-1.652 1.68 0 .928.74 1.68 1.652 1.68Zm6.61-1.68c0 .928-.74 1.68-1.653 1.68s-1.653-.752-1.653-1.68c0-.928.74-1.68 1.653-1.68s1.653.752 1.653 1.68Z" clip-rule="evenodd">

                                </path>
                            </g>
                            <defs>
                                <clipPath id="a-1">
                                    <path d="M0 0h24v24H0z"></path>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                </div>
            </div>
            <span class="ButtonBase__Ellipsis-sc-p43e7i-5 dqiKFy"></span>
        </span>
    </button>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
<script>
    var scene = document.getElementById('scene');
    var parallax = new Parallax(scene);
</script>
<script>
    document.getElementById("toggle_btn").addEventListener("click", function () {
        document.getElementById("yourModal").style.transition = "2s";
        document.getElementById("yourModal").style.display = "block";

    });
    document.getElementById("close_modal").addEventListener("click", function () {
        document.getElementById("yourModal").style.display = "none";
    });
</script>
</body>
</html>