@extends('layout')
@section('title')
    
@endsection
@section('content')
<div class="dark:bg-gray-100 dark:text-gray-800 h-screen">
	<div class="container max-w-4xl px-10 py-6 mx-auto rounded-lg shadow-sm dark:bg-gray-50">
		<div class="flex items-center justify-between">
			<span class="text-sm dark:text-gray-600">{{$data['id']}}</span>
			<a rel="noopener noreferrer" href="{{ route('fetchdata') }}" class="px-2 py-1 font-bold rounded dark:bg-violet-600 dark:text-gray-50">Back</a>
		</div>
		<div class="mt-3">
			<a rel="noopener noreferrer" href="#" class="text-2xl font-bold hover:underline">{{$data['title']}}</a>
			<p class="mt-2">{{$data['body']}}</p>
		</div>
		<div class="flex items-center justify-between mt-4">
			<a rel="noopener noreferrer" href="#" class="hover:underline dark:text-violet-600">Read more</a>
		</div>
	</div>
</div>
@endsection