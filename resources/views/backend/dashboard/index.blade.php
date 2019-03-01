@extends('backend_layout')
@section('admibackend_include_css_content')
<link href="{{ asset('resources/assets/css/backend/dashboard.css') }}" rel="stylesheet">
@stop

@section('backend_content')

<div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>

@stop

@section('backend_include_js_content')	
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="{{ asset('resources/assets/js/backend/dashboard.js') }}"></script>
@stop