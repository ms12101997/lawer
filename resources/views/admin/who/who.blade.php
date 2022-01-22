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
							<h4 class="content-title mb-0 my-auto">الأعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ من نحن </span>
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
				<div class="row d-flex justify-content-center">
					<section class="about-area d-flex justify-content-center">
						<div class="container">
							
								@foreach ($whos as $who )
							<form action="{{route('who.update',$who->id)}}" method="post" autocomplete="off" enctype="multipart/form-data"> 
									@method('PUT')
									@csrf
									<div class="row d-flex justify-content-center">
											  <div class="col-lg-12">
													<h2 class="text-uppercase  pt-5">
														<input class=" font-weight-bold form-control my-2 fs-24" type="text" id="title" name="title" value="{{$who->title}}" >
													
													</h2>
											  </div>
											<div  class=" col-lg-12 paragraph py-4 w-120">
												<textarea class=" form-control" id="exampleTextarea" name="desc" rows="5" value="{{$who->desc}}">{{$who->desc}}</textarea>
											</div>
											<div class="col-lg-12 col-sm-6 col-md-6 d-flex justify-content-center my-5 ">
												<button type="submit" class="btn btn-primary">حفظ البيانات</button>
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