<section class="menu-section-area @auth isLoginMenu @endauth">
    <!-- Navigation -->
    <nav class="navbar sticky-header navbar-expand-lg" id="mainNav">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">

                <img src="{{ getImageFile('images/logo.png') }}" alt="Logo"
                    style="
                border-radius: 0.8em;
                background: white;
                border-radius: 0.8;
                width: 132px;
            ">


            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="main-menu-collapse collapse navbar-collapse" id="navbarSupportedContent">
                <div class="header-nav-left-side me-auto d-flex">
                </div>
                <div class="header-nav-right-side d-flex">
                    <ul class="navbar-nav">






                        @if (Route::has('login'))

                            @auth
                                <!-- Menu User Dropdown Menu Option Start -->
                                <li class="nav-item dropdown menu-round-btn menu-user-btn dropdown-top-space">
                                    <a class="nav-link" href="#">

                                        @if (auth()->user())
                                            <img src="{{ getImageFile('images/user_profile.png') }}" alt="img"
                                                class="radius-50">
                                        @endif

                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" data-bs-popper="none">

                                        <!-- Dropdown User Info Item Start -->
                                        <div class="dropdown-user-info">
                                            <div class="message-user-item d-flex align-items-center">
                                                <div class="message-user-item-left">
                                                    <div class="d-flex align-items-center">

                                                        <div class="flex-grow-1 ms-2">

                                                            @if (auth()->user())
                                                                <h6 class="color-heading font-14 text-capitalize">
                                                                    {{ auth()->user()->name }}</h6>
                                                                <p class="font-13">{{ auth()->user()->email }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if (auth()->user())
                                            {{-- admin menu box --}}
                                            <ul class="user-dropdown-item-box">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                            role="img" class="iconify iconify--bxs" width="1em"
                                                            height="1em" preserveAspectRatio="xMidYMid meet"
                                                            viewBox="0 0 24 24" data-icon="bxs:dashboard">
                                                            <path fill="currentColor"
                                                                d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z">
                                                            </path>
                                                        </svg>
                                                        {{ __('Dashboard') }}
                                                    </a>
                                                </li>



                                            </ul>
                                        @endif

                                        <ul class="user-dropdown-item-box">


                                            <li><a class="dropdown-item" href="{{ route('logout') }}"><span class="iconify"
                                                        data-icon="ic:round-logout"></span>{{ __('Logout') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <!-- Menu User Dropdown Menu Option End -->
                            @else
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navigation -->
</section>