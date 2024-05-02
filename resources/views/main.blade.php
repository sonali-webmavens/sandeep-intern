    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminLTE 3 | Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet"
            href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css?v=3.2.0') }}">
        <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>



        <script nonce="a497fc58-3ddf-40e1-a2e1-c7b1a1c4ad39">
            try {
                (function(w, d) {
                    ! function(j, k, l, m) {
                        j[l] = j[l] || {};
                        j[l].executed = [];
                        j.zaraz = {
                            deferred: [],
                            listeners: []
                        };
                        j.zaraz._v = "5592";
                        j.zaraz.q = [];
                        j.zaraz._f = function(n) {
                            return async function() {
                                var o = Array.prototype.slice.call(arguments);
                                j.zaraz.q.push({
                                    m: n,
                                    a: o
                                })
                            }
                        };
                        for (const p of ["track", "set", "debug"]) j.zaraz[p] = j.zaraz._f(p);
                        j.zaraz.init = () => {
                            var q = k.getElementsByTagName(m)[0],
                                r = k.createElement(m),
                                s = k.getElementsByTagName("title")[0];
                            s && (j[l].t = k.getElementsByTagName("title")[0].text);
                            j[l].x = Math.random();
                            j[l].w = j.screen.width;
                            j[l].h = j.screen.height;
                            j[l].j = j.innerHeight;
                            j[l].e = j.innerWidth;
                            j[l].l = j.location.href;
                            j[l].r = k.referrer;
                            j[l].k = j.screen.colorDepth;
                            j[l].n = k.characterSet;
                            j[l].o = (new Date).getTimezoneOffset();
                            if (j.dataLayer)
                                for (const w of Object.entries(Object.entries(dataLayer).reduce(((x, y) => ({
                                        ...x[1],
                                        ...y[1]
                                    })), {}))) zaraz.set(w[0], w[1], {
                                    scope: "page"
                                });
                            j[l].q = [];
                            for (; j.zaraz.q.length;) {
                                const z = j.zaraz.q.shift();
                                j[l].q.push(z)
                            }
                            r.defer = !0;
                            for (const A of [localStorage, sessionStorage]) Object.keys(A || {}).filter((C => C
                                .startsWith("_zaraz_"))).forEach((B => {
                                try {
                                    j[l]["z_" + B.slice(7)] = JSON.parse(A.getItem(B))
                                } catch {
                                    j[l]["z_" + B.slice(7)] = A.getItem(B)
                                }
                            }));
                            r.referrerPolicy = "origin";
                            r.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(j[l])));
                            // q.parentNode.insertBefore(r, q)
                        };
                        ["complete", "interactive"].includes(k.readyState) ? zaraz.init() : j.addEventListener(
                            "DOMContentLoaded", zaraz.init)
                    }(w, d, "zarazData", "script");
                })(window, document)
            } catch (e) {
                throw fetch("/cdn-cgi/zaraz/t"), e;
            };
        </script>
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
                    height="60" width="60">
            </div>

            <nav class="main-header navbar navbar-expand navbar-white navbar-light">

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="index3.html" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">


                    <li class="nav-item">
                        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                            <i class="fas fa-search"></i>
                        </a>
                        <div class="navbar-search-block">
                            <form class="form-inline">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                        aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-navbar" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    @php
                        $language = Config::get('app.locale');
                        // dd($language);
                    @endphp
                    {{-- language  start  --}}
                    <li class="nav-item dropdown">

                        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
                            <i class="fa-solid fa-language">language</i>
                            <span
                                class="badge badge-danger navbar-badge">{{ count(Config::get('app.available_locales')) }}<span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            @foreach (Config::get('app.available_locales') as $locale)
                                <a href="{{ url($locale) }}" class="dropdown-item">

                                    <div class="media">
                                        @if ($locale == 'en')
                                            <img src="{{ asset('dist/img/english.png') }}" alt="English"
                                                class="img-size-50 mr-3 img-circle">
                                        @elseif ($locale == 'hi')
                                            <img src="{{ asset('dist/img/hindi.png') }}" alt="Hindi"
                                                class="img-size-50 mr-3 img-circle">
                                        @elseif ($locale == 'gu')
                                            <img src="{{ asset('dist/img/gujrati.png') }}" alt="Gujarati"
                                                class="img-size-50 mr-3 img-circle">
                                        @endif
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                @if ($locale == 'en')
                                                    English
                                                @elseif ($locale == 'hi')
                                                    हिंदी
                                                @elseif ($locale == 'gu')
                                                    ગુજરાતી
                                                @endif
                                                <span class="float-right text-sm text-danger"><i
                                                        class="fas fa-star"></i></span>
                                            </h3>
                                            <p class="text-sm">
                                                @if ($locale == 'en')
                                                    Default Language
                                                @elseif ($locale == 'hi')
                                                    भारत की राष्ट्र भाषा
                                                @elseif ($locale == 'gu')
                                                    વિશ્વની ભાષામાં શ્રેષ્ઠ
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                            @endforeach
                            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                        </div>

                        {{-- language  end  --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge">15</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">15 Notifications</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 new messages
                                <span class="float-right text-muted text-sm">3 mins</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 8 friend requests
                                <span class="float-right text-muted text-sm">12 hours</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> 3 new reports
                                <span class="float-right text-muted text-sm">2 days</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true"
                            href="#" role="button">
                            <i class="fas fa-th-large"></i>
                        </a>
                    </li>
                </ul>
            </nav>


            <aside class="main-sidebar sidebar-dark-primary elevation-4">

                <a href="index3.html" class="brand-link">
                    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">AdminLTE 3</span>
                </a>

                <div class="sidebar">

                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                                alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">Alexander Pierce</a>
                        </div>
                    </div>

                    <div class="form-inline">
                        <div class="input-group" data-widget="sidebar-search">
                            <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">

                            <li class="nav-item menu-open">
                                <a href="{{ route('dashboard.index') }}" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        {{ __('dashbord.Dashboard') }}
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>

                            </li>

                            <li class="nav-item menu">
                                <a href="#" class="nav-link ">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        {{ __('dashbord.Companies') }}
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ isset($language) ? route('companies.create', ['locale' => $language ]) : route('companies.create' ,['locale' =>  'en' ]) }}"
                                            class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> {{ __('dashbord.Add Companies') }}
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ isset($language) ? route('companies.index', ['locale' => $language ]) : route('companies.index' ,['locale' =>  'en' ]) }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('dashbord.Companies data') }}</p>
                                        </a>
                                    </li>


                                </ul>
                            </li>
                            <li class="nav-item menu">
                                <a href="#" class="nav-link ">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        <p> {{ __('dashbord.Employees') }}


                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ isset($language) ? route('employees.create', ['locale' => $language ]) : route('employees.create' ,['locale' =>  'en' ]) }}"
                                            class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> {{ __('dashbord.Add Employees') }}</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ isset($language) ? route('employees.index', ['locale' => $language ]) : route('employees.index' ,['locale' =>  'en' ]) }}"
                                            class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> {{ __('dashbord.Employees Data') }}</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="nav-item menu">
                                <a href="#" class="nav-link ">
                                    <i class="nav-icon fas fa-user-alt"></i>
                                    <p>
                                        {{ __('dashbord.Uesr Setting') }}
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @guest
                                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>{{ __('dashbord.Login') }}</p>
                                            </a></li>
                                    @endguest

                                    @auth
                                        <li class="nav-item"><a class="nav-link" href="#"
                                                onclick="document.getElementById('logout-form').submit()">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>{{ __('dashbord.Log out') }}</p>
                                            </a></li>
                                    @endauth
                                    <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                        @csrf
                                    </form>

                                </ul>
                            </li>

                        </ul>

                    </nav>
                </div>

            </aside>

            <div class="content-wrapper">

                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">{{ $title ?? '' }}</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">{{ $title ?? '' }} v1</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>


                <section class="content">
                    <div class="container-fluid">





                        @yield('content')
                    </div>
                </section>

            </div>

            <footer class="main-footer">
                <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 3.2.0
                </div>
            </footer>

            <aside class="control-sidebar control-sidebar-dark">

            </aside>

        </div>

        <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
        <script>
            new DataTable('#myTable', {
                layout: {
                    bottomEnd: {
                        paging: {
                            boundaryNumbers: false
                        }
                    }
                }
            });
        </script>
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>


        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}">
            < script src = "{{ asset('plugins/chart.js/Chart.min.js') }}" >
        </script>
        <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
        <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
        <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
        <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
        <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <script src="{{ asset('dist/js/adminlte.js?v=3.2.0') }}"></script>
        <script src="{{ asset('dist/js/demo.js') }}"></script>
        <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    </body>

    </html>
