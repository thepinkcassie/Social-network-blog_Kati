@extends('layouts.app_library')

@section('content')
<h2> 
<a href="{{ route('page.single', ['slug' => $page->slug]) }}">{{ $page->page_title }}</a>
</h2>

@endsection
