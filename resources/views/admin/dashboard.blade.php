@extends('layouts.layoutAdmin');
@section('content');

<body class="theme-blue">
	<!-- page loader -->
	<div class="page-loader-wrapper">
		<div class="loader">
			<div class="preloader">
				<div class="spinner-layer pl-blue">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>
			</div>
			<p>Please Wait</p>
		</div>
	</div>
	<!-- end page loader -->
	<section class="content">
		<div class="container-fluid">
			<div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>DASHBOARD</h2>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <img src="{{asset('asset/images/uu.jpg')}}" style="width: 900px; height: 400px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                        </div>
                        <div class="body">
                            
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</section>
</body>