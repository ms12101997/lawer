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
							<h4 class="content-title mb-0 my-auto">الأعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إضافة سليدر</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row d-flex  justify-content-center">
					<div class="card  ">
						<div class="card-body">
							<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
								<div class="carousel-indicators">
								  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
								  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
								  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
								</div>
								
								<div class="carousel-inner">
									@foreach ($sliders as $slider )
									<div class="carousel-item {{$loop->first ? 'active' : ''}}">
										@foreach ( $slider->getmedia('slider') as $avatar )
										{{$avatar}}
										@endforeach
									  </div>
									  @endforeach
								  
								</div>
								
								
								<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
								  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
								  <span class="visually-hidden">></span>
								</button>
								<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
								  <span class="carousel-control-next-icon" aria-hidden="true"></span>
								  <span class="visually-hidden"><</span>
								</button>
							  </div>
						</div>
						<div class="card-body">
							<form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data"
							autocomplete="off">
											{{ csrf_field() }}
											{{-- 1 --}}
					
											<div class="col-sm-12 col-md-12">
												<input type="file" name="img" class="dropify" accept=".jpg, .png, image/jpeg, image/png"
													data-height="70" />
											</div><br>
					
											<div class="d-flex justify-content-center">
												<button type="submit" class="btn btn-primary">حفظ البيانات</button>
											</div>
							</form>
						</div>
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
</script>
<script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
<!--Internal Fancy uploader js-->
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>
@endsection