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
							<h4 class="content-title mb-0 my-auto">الأعدادت</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ السليدر</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session()->has('Add'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('Add') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session()->has('delete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('delete') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
				<!-- row -->
				<div class="row">
					<div class="col-xl-12">
					
						<div class="card-body">
						
							<div class="card card-custom">
								<div class="card-header pb-0">
									<div class="d-flex justify-content-between col-sm-3">
										
											<a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
												data-toggle="modal" href="#modaldemo8">اضافة سليدر</a>
										
									</div>
								</div>
								<div class="card-header flex-wrap py-3">
									<div class="card-title">
										<h3 class="card-label">
										  السليدر
										</h3>
									</div>
								</div>
								<div class="card-body overflow-auto">
									
								   
									<table class="table text-center" id="myTable">
										<thead>
										  <tr>
											<th scope="col">#</th>
											{{-- <th scope="col">Message</th>
											<th scope="col">phone</th> --}}
										
											<th scope="col">الصورة</th>
											<th scope="col">العمليات</th>
											
										  </tr>
										</thead>
										<tbody>
												@php
												$i = 0;
												@endphp
											@foreach($sliders as $slider)
												@php
												$i++
												@endphp
												<tr>
													<td>{{$i}}</td>
													@foreach ($slider->getmedia('slider') as $avatar)
													<td>{{$avatar }}</td>	
													@endforeach
													
													<td>
												
												
		
												
													<a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
														data-id="{{ $slider->id }}" "
														data-toggle="modal" href="#modaldemo9" title="حذف"><i
															class="las la-trash"></i></a>
												
													</td>
						
												 
												</tr>
						
											@endforeach
										</tbody>
									  </table>
								</div>
							</div>
						</div>
					</div>
				</div>
				 <!-- delete -->
				 <div class="modal" id="modaldemo9">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content modal-content-demo">
							<div class="modal-header">
								<h6 class="modal-title">حذف القسم</h6><button aria-label="Close" class="close" data-dismiss="modal"
									type="button"><span aria-hidden="true">&times;</span></button>
							</div>
							<form action="slider/destroy" method="post">
								{{ method_field('delete') }}
								{{ csrf_field() }}
								<div class="modal-body">
									<p>هل انت متاكد من عملية الحذف ؟</p><br>
									<input type="hidden" name="id" id="id" value="">
									
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
									<button type="submit" class="btn btn-danger">تاكيد</button>
								</div>
						</div>
						</form>
					</div>
				</div>
				<div class="modal" id="modaldemo8">
					<div class="modal-dialog" role="document">
						<div class="modal-content modal-content-demo">
							<div class="modal-header">
								<h6 class="modal-title">إضافة سليدر</h6><button aria-label="Close" class="close" data-dismiss="modal"
									type="button"><span aria-hidden="true">&times;</span></button>
							</div>
							<div class="modal-body">
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

			</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var section_name = button.data('section_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #section_name').val(section_name);
    })

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