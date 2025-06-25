{{-- @include('layouts.css')
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    @include('layouts.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
    @include('layouts.sidebar')
      <!-- partial -->
      @yield('content')

      
    </div>
  </div>
  @include('layouts.js')
</body>

</html> --}}

@include('layouts.css')
<body>
    @include('layouts.header')
    @include('layouts.sidebar')
    
    <!-- Start Status area -->
    <div class="breadcomb-area">
        <div class="notika-status-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                            <div class="website-traffic-ctn">
                                <h2><span class="counter">50,000</span></h2>
                                <p>Total Website Traffics</p>
                            </div>
                            <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                            <div class="website-traffic-ctn">
                                <h2><span class="counter">90,000</span>k</h2>
                                <p>Website Impressions</p>
                            </div>
                            <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                            <div class="website-traffic-ctn">
                                <h2>$<span class="counter">40,000</span></h2>
                                <p>Total Online Sales</p>
                            </div>
                            <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                            <div class="website-traffic-ctn">
                                <h2><span class="counter">1,000</span></h2>
                                <p>Total Support Tickets</p>
                            </div>
                            <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="visitor-sv-tm-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="visitor-sv-tm-int sm-res-mg-t-30 tb-res-mg-t-30 tb-res-ds-n dk-res-ds">
                        <div class="contact-hd mg-bt-ant-inner">
                            <h2>Visits Over Time</h2>
                            <p>Fusce eget dolor id justo luctus commodo vel pharetra nisi. Donec velit libero</p>
                        </div>
                        <div class="visitor-st-ch visitor-ov-ct">
                            <div id="visit-over-time" class="flot-chart" style="padding: 0px; position: relative;"><canvas class="flot-base" width="320" height="282" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 320px; height: 282px;"></canvas><div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px; display: block;"><div style="position: absolute; max-width: 64px; top: 1px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(159, 159, 159); left: 85px; text-align: center;">Tue</div><div style="position: absolute; max-width: 64px; top: 1px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(159, 159, 159); left: 158px; text-align: center;">Wed</div><div style="position: absolute; max-width: 64px; top: 1px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(159, 159, 159); left: 235px; text-align: center;">Thr</div></div><div class="flot-x-axis flot-x2-axis xAxis x2Axis" style="position: absolute; inset: 0px; display: block;"><div style="position: absolute; max-width: 64px; top: 268px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(159, 159, 159); left: 80px; text-align: center;">01/08</div><div style="position: absolute; max-width: 64px; top: 268px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(159, 159, 159); left: 154px; text-align: center;">01/16</div><div style="position: absolute; max-width: 64px; top: 268px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(159, 159, 159); left: 228px; text-align: center;">01/24</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px; display: block;"><div style="position: absolute; top: 247px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(159, 159, 159); left: 1px; text-align: right;">1600</div><div style="position: absolute; top: 170px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(159, 159, 159); left: 1px; text-align: right;">1650</div><div style="position: absolute; top: 94px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(159, 159, 159); left: 1px; text-align: right;">1700</div><div style="position: absolute; top: 18px; font: 400 11px / 13px Roboto, sans-serif; color: rgb(159, 159, 159); left: 1px; text-align: right;">1750</div></div></div><canvas class="flot-overlay" width="320" height="282" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 320px; height: 282px;"></canvas></div>
                            <div class="flc-visits"><table style="font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #00c292;overflow:hidden"></div></div></td><td class="legendLabel">Visits</td><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #03A9F4;overflow:hidden"></div></div></td><td class="legendLabel">Unique Visitors</td></tr></tbody></table></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="visitor-sv-tm-int sm-res-mg-t-30 tb-res-mg-t-30 tb-res-ds-n dk-res-ds">
                        <div class="realtime-ctn">
                            <div class="realtime-title ongoing-hd-wd">
                                <h2>Ongoing Tasks</h2>
                                <p>Magna cursus malesuada lacinia</p>
                            </div>
                        </div>
                        <div class="skill-content-3 ongoing-tsk">
                            <div class="skill">
                                <div class="progress">
                                    <div class="lead-content">
                                        <p>HTML5 Validation Report</p>
                                    </div>
                                    <div class="progress-bar wow fadeInLeft" data-progress="95%" style="width: 95%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-wow-duration="1.5s" data-wow-delay="1.2s"> <span>95%</span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="lead-content">
                                        <p>Google Chrome Extension</p>
                                    </div>
                                    <div class="progress-bar wow fadeInLeft" data-progress="85%" style="width: 85%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>85%</span> </div>
                                </div>
                                <div class="progress">
                                    <div class="lead-content">
                                        <p>Social Internet Projects</p>
                                    </div>
                                    <div class="progress-bar wow fadeInLeft" data-progress="70%" style="width: 70%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>70%</span> </div>
                                </div>
                                <div class="progress">
                                    <div class="lead-content">
                                        <p>Bootstrap Admin</p>
                                    </div>
                                    <div class="progress-bar wow fadeInLeft" data-progress="60%" style="width: 60%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>60%</span> </div>
                                </div>
                                <div class="progress progress-bt">
                                    <div class="lead-content">
                                        <p>Youtube App</p>
                                    </div>
                                    <div class="progress-bar wow fadeInLeft" data-progress="50%" style="width: 50%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>50%</span> </div>
                                </div>
                            </div>
                            <div class="view-all-onging">
                                <a href="#">View All Tasks</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
    
    <!-- End Status area-->
    <!-- Start Sale Statistic area-->
    <div class="sale-statistic-area">
        <div class="container">
            @yield('content')
        </div>
    </div>
    <!-- End Sale Statistic area-->
    <!-- Start Email Statistic area-->
    
    <!-- End Email Statistic area-->
    <!-- Start Realtime sts area-->
    
    <!-- End Realtime sts area-->
    <!-- Start Footer area-->
    @include('layouts.footer')
    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
    @include('layouts.js')
</body>

</html>
