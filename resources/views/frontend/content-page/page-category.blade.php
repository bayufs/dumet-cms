@extends('frontend/base.base')
@section('content-page')
				<!-- Main -->
                <div id="main">

                    <!-- Post -->
                    @if (empty($page_categories))
                        <h1>No News Found</h1>
                    @else
                    @foreach ($page_categories as $rows)
                        <article class="post">
                            <header>
                                <div class="title">
                                    <h2><a href="#">{{ $rows->title }}</a></h2>
                                </div>
                                <div class="meta">
                                    <time class="published" datetime="2015-11-01">{{ \Carbon\Carbon::parse($rows->created_at)->format('d F Y')}}</time>
                                    <a href="#" class="author"><span class="name">Admin</span><img src="{{ asset('images') }}/{{ $rows->icon }}" alt="" /></a>
                                </div>
                            </header>
                            <a href="#" class="image featured"><img src="{{ asset('images') }}/{{ $rows->images }}" alt="{{ $rows->alt }}" /></a>
                            <p>{{ str_limit($rows->news, 500) }}</p>
                            <footer>
                                <ul class="actions">
                                    <li><a href="{{ url('detail') }}/{{ str_slug($rows->title,'-') }}" class="button big">Continue Reading</a></li>
                                </ul>
                                <ul class="stats">
                                    <li><a href="#">General</a></li>
                                    <li><a href="#" class="icon fa-heart">28</a></li>
                                    <li><a href="#" class="icon fa-comment">128</a></li>
                                </ul>
                            </footer>
                        </article>
                        @endforeach
                        @endif
                    <!-- Pagination -->
                    {{ $page_categories->links('custom.pagination') }}
                       

                </div>

            <!-- Sidebar -->
                <section id="sidebar">

                    <!-- Intro -->
                        <section id="intro">
                            <a href="#" class="logo"><img src="{{ asset('images/logo.jpg') }}" alt="" /></a>
                            <header>
                                <h2>Dumet CMS</h2>
                            </header>
                        </section>

                    <!-- Mini Posts -->
                        <section>
                            <div class="mini-posts">

                                <!-- Mini Post -->
                                @foreach ($mini_post as $rows)
                                <article class="mini-post">
                                        <header>
                                            <h3><a href="{{ url('detail') }}/{{ str_slug($rows->title,'-') }}">{{ $rows->title }}</a></h3>
                                            <time class="published" datetime="2015-10-20">{{ substr($rows->created_at,0,9) }}</time>
                                            <a href="{{ url('detail') }}/{{ str_slug($rows->title,'-') }}" class="author"><img src="{{ asset('images') }}/{{ $rows->icon }}" alt="{{ $rows->alt }}" /></a>
                                        </header>
                                        <a href="{{ url('detail') }}/{{ str_slug($rows->title,'-') }}" class="image"><img src="{{ asset('images') }}/{{ $rows->images }}" alt="{{ $rows->alt }}" /></a>
                                    </article>
                                @endforeach
                                   
                            </div>
                        </section>

                    <!-- About -->
                        <section class="blurb">
                            <h2>About</h2>
                            <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.</p>
                            <ul class="actions">
                                <li><a href="#" class="button">Learn More</a></li>
                            </ul>
                        </section>
@endsection