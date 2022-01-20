@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المناقشة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الرسائل</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
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
                                    <div class="card-header flex-wrap py-3">
                                        <div class="card-title">
                                            <h3 class="card-label">
                                              Discuss
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
                                                <th scope="col">الأسم</th>
                                                <th scope="col">الأيميل;</th>
                                                <th scope="col">الموضوع</th>
                                                <th scope="col">العمليات</th>
                                                
                                              </tr>
                                            </thead>
                                            <tbody>
                                                    @php
                                                    $i = 0;
                                                    @endphp
                                                @foreach($discusses as $discuss)
                                                    @php
                                                    $i++
                                                    @endphp
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td>{{ $discuss->name }}</td> 
                                                        <td>{{ $discuss->email }}</td> 
                                                        <td>{{ $discuss->subject }}</td>
                                                        <td>
                                                            <a class=" btn btn-sm btn-info"

                                                            href="{{route('discuss.show',$discuss->id)}}" title="عرض"><i class="icon ion-md-eye"></i></a>
                                                    
            
                                                    
                                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                            data-id="{{ $discuss->id }}" data-section_name="{{ $discuss->name }}"
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
                <form action="discuss/destroy" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="section_name" id="section_name" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
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
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var section_name = button.data('section_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #section_name').val(section_name);
    })

</script>
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>
@endsection