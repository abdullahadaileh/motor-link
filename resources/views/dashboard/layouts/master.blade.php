

@include('dashboard.includes.head')


@include('dashboard.includes.navbar')
@include('dashboard.includes.sidebar')
<div class="content-body">

@yield('content')

</div>
@include('dashboard.includes.footer')