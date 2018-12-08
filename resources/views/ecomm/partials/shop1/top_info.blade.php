<section id="topinfo" class="action_section table_section light_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
            {{--<a href="{{route('home')}}" class="navbar-brand"><i class="rt-icon-home" title="Go Back Home" data-toggle="tooltip"></i></a>--}}
            </div>

            <div class="col-sm-8 text-right">
                Follow Us:
                <a class="socialico-facebook" href="https://www.facebook.com/" title="Facebook" data-toggle="tooltip">#</a>
                <a class="socialico-twitter" href="https://www.twitter.com/" title="Twitter" data-toggle="tooltip">#</a>
                <a class="socialico-google" href="https://github.com/thazinthazin/" title="Github" data-toggle="tooltip">#</a>



                <div class="widget widget_search">
                    <form role="search" method="get" id="searchform" class="searchform form-inline" action="{{route('shop_search')}}">
                        <div class="form-group">
                            <label class="screen-reader-text" for="search">Search for:</label>
                            <input type="text" name="query" id="search" class="form-control" placeholder="Search Only Products ...">
                        </div>
                        <button type="submit" id="searchsubmit" class="theme_button">Search</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</section>