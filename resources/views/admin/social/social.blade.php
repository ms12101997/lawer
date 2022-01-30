@extends('layouts.master')
@section('css')
<link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
<!---Internal Fancy uploader css-->
<link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الأعدادت</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ السوشيال</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
			<div class="row d-flex justify-content-center">
			<div class="col-lg-6 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-8 col-lg-8 col-xl-6 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"> <a href="{{ url('/' . $page='Home') }}"><img src="https://almutairi-law.com/main-logo.png" class="sign-favicon ht-50" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28"></div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            
											@foreach ($socials as $social)
												<form method="POST" action="{{ route('social.update',$social->id)}} enctype="multipart/form-data"">
                                                @csrf
												@method('PUT')
												<input type="hidden" value="{{$social->id}}" name="id">
												<div class="row d-flex">
												 <div class="col-12">
                                                    <label> فيسبوك</label>
                                                    <input id="email" type="text" class="form-control"  name="facebook" value="{{$social->facebook }}" required >
                                                </div>

                                                <div class="col-12">
                                                    <label> تويتر</label>

                                                    <input id="email" type="text" class="form-control" name="twitter" value="{{$social->twitter }}" >

                                                </div>
												<div class="col-12">
                                                    <label> سناب شات</label>

                                                    <input id="email" type="text" class="form-control" name="snapchat" value="{{$social->snapchat }}" >

                                                </div>
												<div class="col-12">
                                                    <label> لينكد ان</label>

                                                    <input id="email" type="text" class="form-control" name="linkedin"value="{{$social->linkedin }}">

                                                </div>
												<div class="col-12">
                                                    <label> واتس اب</label>

                                                    <input id="number" type="text" class="form-control" name="whatsapp" value="{{$social->whatsapp }}" >

                                                </div>
												</div>

                                               
												<div class="col-sm-12 col-md-12 my-3">
												<label>تغيير صورة اللوجو</label>
												<input type="file" name="img" class="dropify" accept=".jpg, .png, image/jpeg, image/png"
													data-height="80" />
												</div><br>
                                                <button type="submit" class="btn btn-main-primary btn-block">
                                                    حفظ البيانات
                                                </button>
                                            </form>
											@endforeach
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
              </div><!-- End -->
			</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
<!--Internal Fancy uploader js-->
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
@endsection