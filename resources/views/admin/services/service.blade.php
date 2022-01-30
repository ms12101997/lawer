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
							<h4 class="content-title mb-0 my-auto">الخدمات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة الخدمات</span>
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
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								@can('إضافة خدمة')
								<div class="d-flex justify-content-between col-sm-3">
									
									<a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
										data-toggle="modal" href="#modaldemo8">اضافة خدمة</a>
								
							</div>
								@endcan
								
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="myTable" class="table key-buttons text-md-nowrap">
										<thead>
											<tr>
												<th class="border-bottom-0">#</th>
												<th class="border-bottom-0">أسم الخدمة</th>
												<th class="border-bottom-0">الوصف</th>
												<th class="border-bottom-0">العمليات</th>
											
											</tr>
										</thead>
										<tbody>
											@php
											$i = 0;
											@endphp
											@if(!empty($services))
											@foreach($services as $service)
											@php
											$i++
											@endphp
											<tr>
												<td>{{$i}}</td>
												<td>{{ $service->title }}</td> 
												<td>{{ $service->desc }}</td>
												<td>
													<div class="dropdown">
														<button aria-expanded="false" aria-haspopup="true"
															class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
															type="button">العمليات<i class="fas fa-caret-down ml-1"></i></button>
														<div class="dropdown-menu tx-13">
																@can('عرض الخدمة')
																<a class="dropdown-item"
																href=" {{ route('services.show',$service->id) }}"><i class="icon ion-md-eye"></i>&nbsp;&nbsp;عرض
																الخدمة</a>
																@endcan
																
																	<a class="dropdown-item modal-effect " data-effect="effect-scale"
																	data-id="{{ $service->id }}" data-section_name="{{ $service->title}}"
																	data-description="{{ $service->desc }}" data-toggle="modal"
																	href="#exampleModal2" title=" تعديل الخدمة"><i class="typcn typcn-edit"></i>&nbsp;&nbsp;تعديل الخدمة</a>
																@can('حذف الخدمة')
																<a class="dropdown-item modal-effect" data-effect="effect-scale"
																data-id="{{ $service->id }}" data-section_name="{{ $service->title }}"
																data-toggle="modal" href="#modaldemo9" title="حذف"><i
																class="text-danger fas fa-trash-alt"></i>&nbsp;&nbsp;حذف
																	الخدمة</a>
																@endcan
																	
														</div>
													</div>
												</td>
												
											</tr>
											@endforeach
											@endif
								
										</tbody>
									</table>
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
								<form action="services/destroy" method="post">
									{{ method_field('delete') }}
									{{ csrf_field() }}
									<div class="modal-body">
										<p>هل انت متاكد من عملية الحذف ؟</p><br>
										<input type="hidden" name="id" id="id" value="">
										<input class="form-control" name="title" id="title" type="text" readonly>
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
									<h6 class="modal-title">اضافةخدمة</h6><button aria-label="Close" class="close" data-dismiss="modal"
										type="button"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<form class="form-group  overflow-auto mt-4 container" method="POST" action="{{route('services.store')}} " enctype="multipart/form-data" >
										@csrf
										<label for="inputName" class="control-label">اسم الخدمة</label>
										<input class="form-control my-2" type="text" name="title" value="{{old('title')}}" >
										<label for="inputName" class="control-label">وصف الخدمة</label>
										<textarea class="form-control my-2" name="desc" rows="4"  value="{{old('desc')}}" ></textarea>
										<div class="row d-flex">
											
											{{-- <p class="text-danger">* صيغة المرفق 0 ,jpeg ,.jpg , png </p>
											<br>
											<h5 class="card-title">المرفقات</h5> --}}
												
													
													<div class=" col-lg-6 col-sm-6 col-md-6">
														<label>رفع الايقونة</label>
														<input type="file" name="icon" class="dropify" accept=".jpg, .png, image/jpeg, image/png"
															data-height="75" />
													</div>
													<div class=" col-lg-6 col-sm-6 col-md-6">
														<label>رفع صورة الغلاف</label>
														<input type="file" name="img" class="dropify" accept=".jpg, .png, image/jpeg, image/png"
															data-height="75" />
													</div>
												
										</div>
				
										<br>
										<div class="d-flex justify-content-center my-5">
											<button type="submit" class="btn btn-primary">حفظ البيانات</button>
										</div>
									</form>
								</div>
							</div>
						</div>
	
				</div>

					<!-- edit -->
					<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
					aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel"> تعديل الخدمة</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
				
								<form action="{{route('services.update',$service->id ?? '')}}" method="post" autocomplete="off" enctype="multipart/form-data"> 
									@method('PUT')
									@csrf
									
									<input type="hidden" name="id" id="id" value="">
									<label for="inputName" class="control-label">اسم الخدمة</label>
									<input class="form-control my-2" type="text" id="title" name="title" value="" >
									<label for="inputName" class="control-label">وصف الخدمة</label>
									<textarea class="form-control my-2" name="desc"  id="desc" rows="4"  value="" ></textarea>
									<div class="row d-flex">
										
										{{-- <p class="text-danger">* صيغة المرفق 0 ,jpeg ,.jpg , png </p>
										<br>
										<h5 class="card-title">المرفقات</h5> --}}
											
												
												<div class=" col-lg-6 col-sm-6 col-md-6">
													<label>رفع الايقونة</label>
													<input type="file" name="icon" class="dropify" accept=".jpg, .png, image/jpeg, image/png"
														data-height="75" />
												</div>
												<div class=" col-lg-6 col-sm-6 col-md-6">
													<label>رفع صورة الغلاف</label>
													<input type="file" name="img" class="dropify" accept=".jpg, .png, image/jpeg, image/png"
														data-height="75" />
												</div>
											
									</div>
				
									<br>
									<div class="d-flex justify-content-center my-5">
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
<script>
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var section_name = button.data('section_name')
        var description = button.data('description')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #title').val(section_name);
        modal.find('.modal-body #desc').val(description);
    })

</script>
<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var section_name = button.data('section_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #title').val(section_name);
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