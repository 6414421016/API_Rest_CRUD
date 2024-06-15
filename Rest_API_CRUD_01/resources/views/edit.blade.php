@extends('layout')
@section('title')
    
@endsection
@section('content')
<div>
    <h1 class="text-6xl">Edit Data</h1>
</div>
<form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('books.update', $booksdata->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">
            title
        </label>
        <input name="title"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="username" type="text"
            value="{{$booksdata->title}}">
    </div>
    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2">
            author
        </label>
        <input name="author"
            class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 "
            type="text"
            value="{{$booksdata->author}}">
    </div>
    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2">
            pages
        </label>
        <input name="pages"
            class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 "
            type="number"
            value="{{$booksdata->pages}}">
    </div>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4" type="submit">
        Add data
    </button>
</form>
@endsection