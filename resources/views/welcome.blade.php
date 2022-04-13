<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('image/logo.png')}}">
    <title>Blog Travel</title>
    <!-- Bootstrap core CSS -->
@include('admin.layouts.style')
<!-- Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>
<body>

<!-- Begin Nav
================================================== -->
<nav class="navbar navbar-toggleable-md navbar-light bg-white shadow-sm py-3">
    <div class="container mx-auto px-4 flex justify-between">
        <!-- Begin Logo -->
        <div>
            <a class="flex items-center gap-4" href="index.html">
                <img src="{{asset('image/logo.png')}}" alt="logo" style="width:50px;height: 50px">
                <span class="text-lg">Blog Travel</span>
            </a>
        </div>
        <!-- End Logo -->
        <div class="flex items-center">
            <!-- Begin Menu -->
            <ul class="flex items-center gap-2 mr-3 ">
                <li class="nav-item active">
                    <a class="nav-link text-gray-500" href="index.html">Stories </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-gray-500" href="post.html">Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-gray-500" href="author.html">Author</a>
                </li>
            </ul>
            <!-- End Menu -->
            <!-- Begin Search -->
            <form class="border-gray-500 border rounded-full  py-1 px-3 my-2 my-lg-0">
                <input class="flex-grow w-40 outline-none text-gray-600 focus:text-blue-600" type="text"
                       placeholder="Search ..."/>
                <button><i class="fas fa-search"></i></button>
            </form>

            <!-- End Search -->
        </div>
    </div>

</nav>
<!-- End Nav
================================================== -->

<!-- Begin Site Title
================================================== -->
<div class="container mx-auto p-4">
    <div class="title">
        <h1 class="text-2xl" style="font-family:Righteous ">Blog Travel</h1>
        <p class="mt-2">
            Welcome to Blog Travel
        </p>
    </div>
    <!-- End Site Title
    ================================================== -->

    <!-- Begin Featured
    ================================================== -->
    <section class="featured-posts mt-8">
        <div class="font-bold text-lg mb-4 pb-2 border-b border-gray-500 ">
            <h2><span>Featured</span></h2>
        </div>
        <div class="card-columns grid grid-cols-2 gap-4">

            <!-- begin post -->
            <div class="card rounded overflow-hidden">
                <div class="row">
                    <div class="col-md-5 wrapthumbnail">
                        <a href="post.html">
                            <div class="thumbnail overflow-hidden h-48">
                                <img src="{{asset('themes/dist/img/photo1.png')}}" class="bg-cover bg-center h-100" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="col-md-7 ">
                        <div class="card-block p-3 ">
                            <h2 class="text-md text-gray-900 font-semibold"><a href="post.html">We're living some
                                    strange times</a></h2>
                            <h4 class="text-sm text-gray-400 mt-2">This is a longer card with supporting text below as a
                                natural lead-in
                                to additional content. This content is a little bit longer.</h4>
                            <div class="mt-3">
                                <div class="flex  ">
                                    <div class=" mr-3">
                                        <a href="author.html"><img class="w-12 h-12 rounded-full"
                                                                   src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x"
                                                                   alt="Sal"></a>
                                    </div>
                                    <div class="flex-grow">
                                        <div class="text-base font-normal"><a href="author.html">Steve</a></div>
                                        <div class="flex justify-between align-center">
                                            <div class="flex align-center text-sm font-light text-gray-500">
                                                <div class="post-date">22 July 2017</div>
                                                <span class="mx-2"> - </span>
                                                <div class="post-read">6 min read</div>
                                            </div>
                                            <div class="">
                                                <a href="post.html" >
                                                    <button><i class="far fa-bookmark"></i></button>
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
            <!-- end post -->
            <!-- begin post -->
            <div class="card rounded overflow-hidden">
                <div class="row">
                    <div class="col-md-5 wrapthumbnail">
                        <a href="post.html">
                            <div class="thumbnail overflow-hidden h-48">
                                <img src="{{asset('themes/dist/img/photo1.png')}}" class="bg-cover bg-center h-100" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="col-md-7 ">
                        <div class="card-block p-3 ">
                            <h2 class="text-md text-gray-900 font-semibold"><a href="post.html">We're living some
                                    strange times</a></h2>
                            <h4 class="text-sm text-gray-400 mt-2">This is a longer card with supporting text below as a
                                natural lead-in
                                to additional content. This content is a little bit longer.</h4>
                            <div class="mt-3">
                                <div class="flex  ">
                                    <div class=" mr-3">
                                        <a href="author.html"><img class="w-12 h-12 rounded-full"
                                                                   src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x"
                                                                   alt="Sal"></a>
                                    </div>
                                    <div class="flex-grow">
                                        <div class="text-base font-normal"><a href="author.html">Steve</a></div>
                                        <div class="flex justify-between align-center">
                                            <div class="flex align-center text-sm font-light text-gray-500">
                                                <div class="post-date">22 July 2017</div>
                                                <span class="mx-2"> - </span>
                                                <div class="post-read">6 min read</div>
                                            </div>
                                            <div class="">
                                                <a href="post.html" >
                                                    <button><i class="far fa-bookmark"></i></button>
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
            <!-- end post -->
            <!-- begin post -->
            <div class="card rounded overflow-hidden">
                <div class="row">
                    <div class="col-md-5 wrapthumbnail">
                        <a href="post.html">
                            <div class="thumbnail overflow-hidden h-48">
                                <img src="{{asset('themes/dist/img/photo1.png')}}" class="bg-cover bg-center h-100" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="col-md-7 ">
                        <div class="card-block p-3 ">
                            <h2 class="text-md text-gray-900 font-semibold"><a href="post.html">We're living some
                                    strange times</a></h2>
                            <h4 class="text-sm text-gray-400 mt-2">This is a longer card with supporting text below as a
                                natural lead-in
                                to additional content. This content is a little bit longer.</h4>
                            <div class="mt-3">
                                <div class="flex  ">
                                    <div class=" mr-3">
                                        <a href="author.html"><img class="w-12 h-12 rounded-full"
                                                                   src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x"
                                                                   alt="Sal"></a>
                                    </div>
                                    <div class="flex-grow">
                                        <div class="text-base font-normal"><a href="author.html">Steve</a></div>
                                        <div class="flex justify-between align-center">
                                            <div class="flex align-center text-sm font-light text-gray-500">
                                                <div class="post-date">22 July 2017</div>
                                                <span class="mx-2"> - </span>
                                                <div class="post-read">6 min read</div>
                                            </div>
                                            <div class="">
                                                <a href="post.html" >
                                                    <button><i class="far fa-bookmark"></i></button>
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
            <!-- end post -->
            <!-- begin post -->
            <div class="card rounded overflow-hidden">
                <div class="row">
                    <div class="col-md-5 wrapthumbnail">
                        <a href="post.html">
                            <div class="thumbnail overflow-hidden h-48">
                                <img src="{{asset('themes/dist/img/photo1.png')}}" class="bg-cover bg-center h-100" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="col-md-7 ">
                        <div class="card-block p-3 ">
                            <h2 class="text-md text-gray-900 font-semibold"><a href="post.html">We're living some
                                    strange times</a></h2>
                            <h4 class="text-sm text-gray-400 mt-2">This is a longer card with supporting text below as a
                                natural lead-in
                                to additional content. This content is a little bit longer.</h4>
                            <div class="mt-3">
                                <div class="flex  ">
                                    <div class=" mr-3">
                                        <a href="author.html"><img class="w-12 h-12 rounded-full"
                                                                   src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x"
                                                                   alt="Sal"></a>
                                    </div>
                                    <div class="flex-grow">
                                        <div class="text-base font-normal"><a href="author.html">Steve</a></div>
                                        <div class="flex justify-between align-center">
                                            <div class="flex align-center text-sm font-light text-gray-500">
                                                <div class="post-date">22 July 2017</div>
                                                <span class="mx-2"> - </span>
                                                <div class="post-read">6 min read</div>
                                            </div>
                                            <div class="">
                                                <a href="post.html" >
                                                    <button><i class="far fa-bookmark"></i></button>
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
            <!-- end post -->
        </div>
    </section>
    <!-- End Featured
    ================================================== -->

    <!-- Begin List Posts
    ================================================== -->
    <section class="recent-posts mt-3">
        <div class="font-bold text-lg mb-4 pb-2 border-b border-gray-500 ">
            <h2><span>All Stories</span></h2>
        </div>
        <div class="card-columns listrecent">

            <!-- begin post -->
            <div class="card">
                <a href="post.html">
                    <img class="img-fluid" src="assets/img/demopic/5.jpg" alt="">
                </a>
                <div class="card-block">
                    <h2 class="card-title"><a href="post.html">Autumn doesn't have to be nostalgic, you know?</a></h2>
                    <h4 class="card-text">This is a longer card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</h4>
                    <div class="metafooter">
                        <div class="wrapfooter">
						<span class="meta-footer-thumb">
						<a href="author.html"><img class="author-thumb"
                                                   src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x"
                                                   alt="Sal"></a>
						</span>
                            <span class="author-meta">
						<span class="post-name"><a href="author.html">Sal</a></span><br/>
						<span class="post-date">22 July 2017</span><span class="dot"></span><span class="post-read">6 min read</span>
						</span>
                            <span class="post-read-more"><a href="post.html" title="Read Story"><svg class="svgIcon-use"
                                                                                                     width="25"
                                                                                                     height="25"
                                                                                                     viewbox="0 0 25 25"><path
                                            d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z"
                                            fill-rule="evenodd"></path></svg></a></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end post -->

            <!-- begin post -->
            <div class="card">
                <a href="post.html">
                    <img class="img-fluid" src="assets/img/demopic/6.jpg" alt="">
                </a>
                <div class="card-block">
                    <h2 class="card-title"><a href="post.html">Best galleries in the world with photos</a></h2>
                    <h4 class="card-text">This is a longer card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</h4>
                    <div class="metafooter">
                        <div class="wrapfooter">
						<span class="meta-footer-thumb">
						<a href="author.html"><img class="author-thumb"
                                                   src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x"
                                                   alt="Sal"></a>
						</span>
                            <span class="author-meta">
						<span class="post-name"><a href="author.html">Sal</a></span><br/>
						<span class="post-date">22 July 2017</span><span class="dot"></span><span class="post-read">6 min read</span>
						</span>
                            <span class="post-read-more"><a href="post.html" title="Read Story"><svg class="svgIcon-use"
                                                                                                     width="25"
                                                                                                     height="25"
                                                                                                     viewbox="0 0 25 25"><path
                                            d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z"
                                            fill-rule="evenodd"></path></svg></a></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end post -->

            <!-- begin post -->
            <div class="card">
                <a href="post.html">
                    <img class="img-fluid" src="assets/img/demopic/7.jpg" alt="">
                </a>
                <div class="card-block">
                    <h2 class="card-title"><a href="post.html">Little red dress and a perfect summer</a></h2>
                    <h4 class="card-text">This is a longer card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</h4>
                    <div class="metafooter">
                        <div class="wrapfooter">
						<span class="meta-footer-thumb">
						<a href="author.html"><img class="author-thumb"
                                                   src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x"
                                                   alt="Sal"></a>
						</span>
                            <span class="author-meta">
						<span class="post-name"><a href="author.html">Sal</a></span><br/>
						<span class="post-date">22 July 2017</span><span class="dot"></span><span class="post-read">6 min read</span>
						</span>
                            <span class="post-read-more"><a href="post.html" title="Read Story"><svg class="svgIcon-use"
                                                                                                     width="25"
                                                                                                     height="25"
                                                                                                     viewbox="0 0 25 25"><path
                                            d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z"
                                            fill-rule="evenodd"></path></svg></a></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end post -->

            <!-- begin post -->
            <div class="card">
                <a href="post.html">
                    <img class="img-fluid" src="assets/img/demopic/8.jpg" alt="">
                </a>
                <div class="card-block">
                    <h2 class="card-title"><a href="post.html">Thinking outside the box can help you prosper</a></h2>
                    <h4 class="card-text">This is a longer card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</h4>
                    <div class="metafooter">
                        <div class="wrapfooter">
						<span class="meta-footer-thumb">
						<a href="author.html"><img class="author-thumb"
                                                   src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x"
                                                   alt="Sal"></a>
						</span>
                            <span class="author-meta">
						<span class="post-name"><a href="author.html">Sal</a></span><br/>
						<span class="post-date">22 July 2017</span><span class="dot"></span><span class="post-read">6 min read</span>
						</span>
                            <span class="post-read-more"><a href="post.html" title="Read Story"><svg class="svgIcon-use"
                                                                                                     width="25"
                                                                                                     height="25"
                                                                                                     viewbox="0 0 25 25"><path
                                            d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z"
                                            fill-rule="evenodd"></path></svg></a></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end post -->

            <!-- begin post -->
            <div class="card">
                <a href="post.html">
                    <img class="img-fluid" src="assets/img/demopic/9.jpg" alt="">
                </a>
                <div class="card-block">
                    <h2 class="card-title"><a href="post.html">10 Things you should know about choosing your house</a>
                    </h2>
                    <h4 class="card-text">This is a longer card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</h4>
                    <div class="metafooter">
                        <div class="wrapfooter">
						<span class="meta-footer-thumb">
						<a href="author.html"><img class="author-thumb"
                                                   src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x"
                                                   alt="Sal"></a>
						</span>
                            <span class="author-meta">
						<span class="post-name"><a href="author.html">Sal</a></span><br/>
						<span class="post-date">22 July 2017</span><span class="dot"></span><span class="post-read">6 min read</span>
						</span>
                            <span class="post-read-more"><a href="post.html" title="Read Story"><svg class="svgIcon-use"
                                                                                                     width="25"
                                                                                                     height="25"
                                                                                                     viewbox="0 0 25 25"><path
                                            d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z"
                                            fill-rule="evenodd"></path></svg></a></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end post -->

            <!-- begin post -->
            <div class="card">
                <a href="post.html">
                    <img class="img-fluid" src="assets/img/demopic/10.jpg" alt="">
                </a>
                <div class="card-block">
                    <h2 class="card-title"><a href="post.html">Visiting the world means learning cultures</a></h2>
                    <h4 class="card-text">This is a longer card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</h4>
                    <div class="metafooter">
                        <div class="wrapfooter">
						<span class="meta-footer-thumb">
						<a href="author.html"><img class="author-thumb"
                                                   src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x"
                                                   alt="Sal"></a>
						</span>
                            <span class="author-meta">
						<span class="post-name"><a href="author.html">Sal</a></span><br/>
						<span class="post-date">22 July 2017</span><span class="dot"></span><span class="post-read">6 min read</span>
						</span>
                            <span class="post-read-more"><a href="post.html" title="Read Story"><svg class="svgIcon-use"
                                                                                                     width="25"
                                                                                                     height="25"
                                                                                                     viewbox="0 0 25 25"><path
                                            d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z"
                                            fill-rule="evenodd"></path></svg></a></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end post -->

        </div>
    </section>
    <!-- End List Posts
    ================================================== -->

    <!-- Begin Footer
    ================================================== -->
    <div class="footer">
        <p class="pull-left">
            Copyright &copy; 2017 Your Website Name
        </p>
        <p class="pull-right">
            Mediumish Theme by <a target="_blank" href="https://www.wowthemes.net">WowThemes.net</a>
        </p>
        <div class="clearfix">
        </div>
    </div>
    <!-- End Footer
    ================================================== -->

</div>
<!-- /.container -->


</body>
</html>
