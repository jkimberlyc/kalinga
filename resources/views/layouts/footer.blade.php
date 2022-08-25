<footer class="border-top bg-white mt-auto w-100">
    {{-- <div class="container-fluid row-sm row-cols-5 p-5"> --}}
        <div class="row  p-5 w-100 d-flex flex-column flex-md-row">
            <div class="col pt-3">
                <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
                    <img src="{{asset('images/logo-light.png')}}" alt="" class="img-fluid">
                </a>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed
                    do eiusmod tempor incididunt ut labore. </p>
            </div>

            <div class="col">

            </div>

            <div class="col pt-3">
                <h5>Quick Links</h5>
                <ul class="navbar-nav flex-sm-column">
                    <li class="nav-item mb-2"><a href="{{url('/').'#home'}}"
                            class="nav-link p-0 text-muted mb-2">Home</a></li>
                    <li class="nav-item mb-2"><a href="{{url('/').'#about'}}"
                            class="nav-link p-0 text-muted mb-2">About</a></li>
                    <li class="nav-item mb-2"><a href="{{url('/').'#contact'}}"
                            class="nav-link p-0 text-muted mb-2">Contact</a></li>

                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="{{ (request()->segment(1)) == 'login' ? 'nav-link text-white right active' : 'nav-link text-white right' }}"
                            href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="{{ (request()->segment(1)) == 'register' ? 'active nav-link text-white right' : 'nav-link text-white right' }}"
                            href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item">
                        <a class="nav-link text-white right" href="/appointments/{{Auth::user()->id}}">Appointments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white right"><i class='bx bx-bell fs-4'></i></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white right" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>

            <div class="col pt-3">
                <h5>Social Media</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted mb-2"><i
                                class="fa-brands fa-square-facebook fs-3"></i> Facebook</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted mb-2"><i
                                class="fa-brands fa-google-plus-g fs-3"></i> Google</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted mb-2"><i
                                class="fa-brands fa-github fs-3"></i> Github</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted mb-2"><i
                                class="fa-brands fa-linkedin fs-3"></i> LinkedIn</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted mb-2"><i
                                class="fa-brands fa-youtube fs-3"></i> Youtube</a></li>
                </ul>
            </div>

            <div class="col pt-3">
                <h5>Find Us</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted mb-2"><i
                                class="fa-solid fa-location-dot fs-3"></i> Davao Del Sur, Philippines</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted mb-2"><i
                                class="fa-solid fa-envelope fs-3"></i> info@jar.com</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted mb-2"><i
                                class="fa-solid fa-phone fs-3"></i>+639123456789</a></li>
                </ul>
            </div>
        </div>
        <div class="bg-light py-2 d-flex align-items-center justify-content-center">
            <p class="text-muted text-center my-2">&copy; Copyright | JAR 2022</p>
        </div>

        <script src="https://kit.fontawesome.com/3bdf664df4.js" crossorigin="anonymous"></script>
</footer>
