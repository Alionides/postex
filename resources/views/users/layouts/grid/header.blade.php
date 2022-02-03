<header>

                <div class="container-wrap">
                    <div class="header-bottom ">
                        <div class="space left">
                            <div class="navbar-header">
                                <a class="navbar-toggle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="12" viewBox="0 0 17 12">
                                        <path class="menu" fill-rule="nonzero" d="M1 7V5h15v2H1zm0-2h15c1.333 0 1.333 2 0 2H1C-.333 7-.333 5 1 5zm0 7v-2h15v2H1zm0-2h15c1.333 0 1.333 2 0 2H1c-1.333 0-1.333-2 0-2zm0-8V0h15v2H1zm0-2h15c1.333 0 1.333 2 0 2H1C-.333 2-.333 0 1 0z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="middle">
                            <div class="container-middle">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-10 header-logo">
                                        <a href="{{route('account.individual')}}"> <img src="/assets/img/logo.png" alt="Yurtiçi Kargo" class="logo" width="178" height="44" /></a>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-10 col-xs-2 col-lg-offset-1">
                                        <div class="right-form">
                                            <div class="contact-form">
                                                <a href="assets/login/Help.html">
                                                    <span>S.S.S.</span>
                                                </a>
                                            </div>
                                                <div class="member-info left-radius">
                                                    <a id="btn-logouts" class="all-radius logout">
                                                        <span>ÇIKIŞ</span>
                                                    </a>
                                                </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space right"></div>
                    </div>
                </div>
                <div class="customer-btn-wrap mobile">
                    <h4>ÜYE GİRİŞİ / ÜYE OLUN</h4>
                    <a class="customer-btn-default all-radius">BİREYSEL</a>
                    <a class="customer-btn-default all-radius">KURUMSAL</a>
                </div>
                <div class="container-wrap container-wrap-content">
                    <div class="space left"></div>
                    <div class="middle">
                        <div class="member-login">
                            <p class="main-content-bold">
                                @if (Auth::guard('customer')->check())
                                    <div>
                                        <b>
                                            {{Auth::guard('customer')->user()->first_name.' '.Auth::guard('customer')->user()->last_name}}
                                        </b>
                                    </div>
                                    <span>Kargo Hesabınıza xoş gəldiniz</span><a class="logout" href="#"> ( Çıxış )</a>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="space right"></div>
                </div>
            </header>