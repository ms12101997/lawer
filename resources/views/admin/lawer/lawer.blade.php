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
							<h4 class="content-title mb-0 my-auto">الأعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ لماذا تختار محامينا</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
@if (session()->has('edit'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('edit') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
				<!-- row -->
				<div class="row">
					<section class="about-area">
						<div class="container-fluid">
							
								@foreach ($lawers as $lawer )
							<form action="{{route('lawer.update',$lawer->id)}}" method="post" autocomplete="off" enctype="multipart/form-data"> 
									@method('PUT')
									@csrf
									<div class="row">
											<div class="col-lg-5 col-md-12 my-5">
												@foreach ($lawer->getmedia('lawer') as $avatar)
												<div class="about-image">
													{{$avatar}}
												</div>
												@endforeach
												
											</div>
											<div class="col-lg-7 col-md-12 about-title pr-5">
												<h2 class="text-uppercase  pt-5">
													<input class=" font-weight-bold form-control my-2 fs-24" type="text" id="title" name="title" value="{{$lawer->title}}" >
													{{-- <span>تختار </span>
													<span>محامينا</span> --}}
												</h2>
												<div  class=" co-lg-12 paragraph py-4 w-90">
													
														
														<textarea class=" form-control" id="exampleTextarea" name="desc" rows="3" value="{{$lawer->desc}}">{{$lawer->desc}}</textarea>
													
													
												</div>
												
													<div class=" col-lg-8 col-sm-6 col-md-6 d-flex justify-content-center">
														<label>تعديل الصورة </label>
														<input type="file" name="img" class="dropify" accept=".jpg, .png, image/jpeg, image/png"
															data-height="75" data-width="120"/>
													</div>
													<div class="col-lg-9 col-sm-6 col-md-6 d-flex justify-content-center my-5 ">
														<button type="submit" class="btn btn-primary">حفظ البيانات</button>
													</div>
												
											</div>
									</div>
							</form>
								@endforeach
								
								
							
						</div>
					</section>
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