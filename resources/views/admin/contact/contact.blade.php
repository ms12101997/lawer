@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الأعدادت</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تواصل معنا</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row d-flex justify-content-center">
					<div class="col-xl-6">
						<div class="card mg-b-20">
							
							<div class="card-body">
								<form class="form-group  overflow-auto mt-4 container" method="POST" action="{{route('contact.update',$contact->id)}} " enctype="multipart/form-data" >
									@csrf
									@method('PUT')
									<input class="form-control my-2" type="text" name="phone" placeholder="أدخل رقم الهاتف" value="{{old('phone')??$contact->phone}}" >
									<input class="form-control my-2" type="email"name="email" placeholder="أدخل الأيميل" value="{{old('email')??$contact->email}}" ></input>
									<input class="form-control my-2" type="text" name="adress" placeholder="أدخل العنوان" value="{{old('adress')??$contact->adress}}" >
								  
									<div class="d-flex justify-content-center my-5">
										<button type="submit" class="btn btn-primary">حفظ البيانات</button>
									</div>
								</form>
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
@endsection