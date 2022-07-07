 <!-- PRE LOADER -->
 <section class="preloader">
          <div class="spinner">
               <span class="spinner-rotate"></span>
          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="#" class="navbar-brand">Job Search</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li class="{{request()->is('/')  ? 'active' : '' }}"><a href="/">Home</a></li>
                         <li class="{{request()->is('website/job')  ? 'active' : '' }}"><a href="{{ route('website.job')}}">Jobs</a></li>
                         <li  class="{{request()->is('website/about')  ? 'active' : '' }}"><a href="{{ route('website.about')}}">About Us</a></li>
                         <li  class="{{request()->is('website/contact')  ? 'active' : '' }}"><a href="{{ route('website.contact')}}">Contact Us</a></li>
                         @auth


                         <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>

                              <ul class="dropdown-menu">
                                   <li><a href="team.html">Team</a></li>
                                   <li><a href="testimonials.html">Testimonials</a></li>
                                   <li><a href="terms.html">Terms</a></li>
                              </ul>
                         </li>
                         @else
                            <li  class="{{request()->is('register')  ? 'active' : '' }}"><a href="{{ route('register')}}">Connectez-vous</a></li>
                         @endauth
                    </ul>
               </div>

          </div>
     </section>
