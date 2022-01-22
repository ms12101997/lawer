<!-- main-sidebar -->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll">
			<div class="main-sidebar-header active">
				<a class="desktop-logo logo-light active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo.png')}}" class="main-logo" alt="logo"></a>
				<a class="desktop-logo logo-dark active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a>
			</div>
			<div class="main-sidemenu">
				<div class="app-sidebar__user clearfix">
					<div class="dropdown user-pro-body">
						<div class="">
							<img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('assets/img/faces/6.jpg')}}"><span class="avatar-status profile-status bg-green"></span>
						</div>
						<div class="user-info">
							<h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::user()->name }}</h4>
							<span class="mb-0 text-muted">{{ Auth::user()->email }}</span>
						</div>
					</div>
				</div>
				<ul class="side-menu">
					<li class="side-item side-item-category">الرئيسية</li>
					<li class="slide">
						<a class="side-menu__item" href="{{ url('/' . $page='home') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg><span class="side-menu__label">القائمة الرئيسية</span><span class="badge badge-success side-badge">1</span></a>
					</li>
					@can('الخدمات')
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide"><span class="side-menu__label ">الخدمات</span><i class="angle fe fe-chevron-down"></i></a>
						@can('قائمة الخدمات  ')
						<ul class="slide-menu">
								
								<li><a class="slide-item" href="{{ url('/' . $page = 'services') }}">قائمة الخدمات</a></li>
								
								
								{{-- <li><a class="slide-item" href="{{ url('/' . ($page = '#')) }}">أرشيف الخدمات</a></li> --}}
							
						</ul>
						@endcan
					</li>
					@endcan
					@can('المناقشة')
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide"><span class="side-menu__label ">المناقشة</span><i class="angle fe fe-chevron-down"></i></a>
						@can(' رسائل الاستفسار')
						<ul class="slide-menu">
								<li><a class="slide-item" href="{{ url('/' . ($page = 'discuss')) }}"> رسائل الاستفسار</a></li>	
						</ul>
						@endcan
					</li>
					@endcan
					@can('المستخدمين ')
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide"><span class="side-menu__label ">المستخدمين</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
					
								@can('قائمة المستخدم')
								<li><a class="slide-item" href="{{ url('/' . ($page = 'users')) }}">قائمة المستخدم</a></li>
								@endcan
								@can('صلاحية المستخدمين')
								<li><a class="slide-item" href="{{ url('/' . ($page = 'roles')) }}"> صلاحيات المستخدم</a></li>
								@endcan
						</ul>
					</li>
					@endcan
						
					
					
					
					@can('الأعدادت')
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide"  }}"><span class="side-menu__label ">الأعدادات</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
								@can('اضافة سليدر')
								<li><a class="slide-item" href="{{ url('/' . ($page = 'slider')) }}">إضافة سليدر </a></li>
								@endcan
								@can('تواصل معنا ')
								<li><a class="slide-item" href="{{ url('/' . ($page = 'contact')) }}">تواصل معنا</a></li>
								@endcan
								@can(' لماذا تختار محامينا')
								<li><a class="slide-item" href="{{ url('/' . ($page = 'lawer')) }}"> لماذا تختار محامينا</a></li>
								@endcan
								@can('من نحن ')
								<li><a class="slide-item" href="{{ url('/' . ($page = 'who')) }}"> من نحن</a></li>
								@endcan
								@can('مرحبا بكم')
								<li><a class="slide-item" href="{{ url('/' . ($page = 'welcome')) }}"> مرحبا بكم</a></li>	
								@endcan
								
						</ul>
					</li>
					@endcan
					
				</ul>
			</div>
		</aside>
<!-- main-sidebar -->
