@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المناقشة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ عرض الرسالة</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    <div class="col-xl-12">
						
							<div class="card-body">
								<div class="card-body overflow-auto">
                                    <div class="container text-right">
                                        <form>
                                            <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="font-weight-bold">الأسم</h6>
                                                <span class="form-control btn btn-outline-primary">{{$discuss->name}}</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="font-weight-bold">الأيميل</h6>
                                                <span class="form-control btn btn-outline-primary ">{{$discuss->email}}</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="font-weight-bold">الموضوع</h6>
                                                <span class=" form-control btn btn-outline-primary my-3">{{$discuss->subject}}</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="font-weight-bold">التليفون</h6>
                                                <option class=" form-control btn btn-outline-primary my-3">{{$discuss->phone}}</option>
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <h6 class="font-weight-bold">الرسالة</h6>
                                                <textarea class="form-control my-3" rows="4">{{$discuss->message}}</textarea>
                                            </div>
                                        </div>
                                    </form>
                                       
                                    </div>
                                        
                            
                                </div>
                            
							</div>
						</div>
					</div>
                    <!-- delete -->
    
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')

@endsection