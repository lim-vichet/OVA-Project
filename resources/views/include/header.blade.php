{{--left-side-bar--}}
<div class="draw-bar">
    <div class="left-menu">
        <ul>
            <li><a href="{{route('/')}}">
                    <i class="fas fa-plus"></i>ទំព័រដើម
                </a>
            </li>
            <li>
                <a href="#" class="menu1">
                    <i class="fas fa-plus"></i> អំពីសហគមន៍
                </a>
                <div class="sub-left-menu">
                    <ul>
                        <li><a href="{{route('director')}}">នាយកសហគមន៍</a></li>
                        <li><a href="{{route('mission')}}">បេសកកម្ម</a></li>
                        <li><a href="{{route('vision')}}">ចក្ខុវិស័យ</a></li>
                        <li><a href="{{route('structure')}}">រចនាសម្ព័័ន្ធ</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="{{route('activity')}}">
                    <i class="fas fa-plus"></i>សកម្មភាព
                </a>
            </li>
            <li><a href="{{route('charity')}}">
                    <i class="fas fa-plus"></i>សប្បុរសធម៍
                </a>
            </li>
            <li><a href="{{route('contact')}}">
                    <i class="fas fa-plus"></i>ទំនាក់ទំនង
                </a>
            </li>
        </ul>
    </div>
</div>
{{--Header--}}
<div class="container bg1">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="logo">
                <img src="img/logo-our.png" alt="">
            </div>
            <div class="title">
                <h1>សមាគមន៍ភូមិយើង</h1>
                <h2>Over Village Association</h2>
            </div>
        </div>
    </div>
</div>
{{--Menu--}}
<div class="container bg2">
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-4 col-4 menu">
                    <ul>
                        <li class="btn-menu">
                            <a href="#">
                                <i class="fas fa-bars"></i>
                            </a>
                        </li>
                        <li><a href="{{route('/')}}">ទំព័រដើម</a></li>
                        <li>
                            <a href="#">អំពីសហគមន៍</a>
                            <ul>
                                <li><a href="#"></a></li>
                                <li><a href="{{route('director')}}">នាយកសហគមន៍</a></li>
                                <li><a href="{{route('mission')}}">បេសកកម្ម</a></li>
                                <li><a href="{{route('vision')}}">ចក្ខុវិស័យ</a></li>
                                <li><a href="{{route('structure')}}">រចនាសម្ព័័ន្ធ</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('activity')}}">សកម្មភាព</a></li>
                        <li><a href="{{route('charity')}}">សប្បុរសធម៍</a></li>
                        <li><a href="{{route('contact')}}">ទំនាក់ទំនង</a></li>
                        <li>
                            <a href="{{route('login')}}" style="color: greenyellow;">
                                {{--                                Login--}}
                                <i class="fas fa-sign-in-alt"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="search col-xl-4 col-lg-4 col-md-4 col-sm-8 col-8">
                    <form class="example" action="/action_page.php" style="margin:auto;max-width:300px">
                        <input type="text" placeholder="Search.." name="search2">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-xl-12 bg3">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 slide-news-box">
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-8 col slide-box">
                                <div class="btn-slide btn-back">
                                    <i class="fas fa-arrow-left"></i>
                                </div>
                                <div class="btn-slide btn-next">
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                                <div class="slide">

                                    <img src="{{asset('img/par4.jpg')}}">
                                </div>
                                <div class="slide">
                                    <img src="{{asset('img/par5.jpg')}}">
                                </div>
                                <div class="slide">
                                    <img src="{{asset('img/par6.jpg')}}">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 news">
                                <div class="news-box1">
                                    <h1>Featured Causes</h1>
                                    <h2><</h2>
                                    <h3>></h3>
                                </div>
                                <div class="news-box2">
                                    <div class="news-title">
                                        <h1>ការចែកថ្នាំ...</h1>
                                        <br>
                                        <h2>
                                            កម្មវិធីបណ្ដុះបណ្ដាលវិជ្ជាជីវះនេះធ្វើអោយនិស្សិតអាចអភិវឌ្ឍជំនាញវិជ្ជាជីវះដែលគួរអោយចង់បានបំផុតនៅក្នុងសេដ្ធកិច្ចពិភពលោក។ និស្សិតនិងអាចស្វែងរកការងារដែលមានប្រាក់ខែខ្ពស់ដូច្នេះពួកគេអាចគាំទ្រ
                                            កម្មវិធីបណ្ដុះបណ្ដាលវិជ្ជាជីវះនេះធ្វើអោយ...
                                        </h2>
                                        <div class="read-more">
                                            អានបន្ត
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 video1" >
                                <a href="#">
                                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/xmyTtW2kcR8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </a>
                            </div>
                            <div class="col-xl-8 col-lg-8 pr-xl-0 pl-xl-1">
                                <div class="col-xl-12 video2">
                                    <div class="new-slide-box">
                                        <div class="new-btn-slide new-btn-back">
                                            <i class="fas fa-arrow-left"></i>
                                        </div>
                                        <div class="new-btn-slide new-btn-next">
                                            <i class="fas fa-arrow-right"></i>
                                        </div>
                                        <div class="new-slide">
                                            <a href="#">
                                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/NSaxnP2bFN8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </a>
                                        </div>
                                        <div class="new-slide">
                                            <a href="#">
                                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/Y0nI-MwvQ1Q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </a>
                                        </div>
                                        <div class="new-slide">
                                            <a href="#">
                                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/xmyTtW2kcR8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

