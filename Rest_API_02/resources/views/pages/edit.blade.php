@extends('layout')
@section('title')
@endsection
@section('content')
    <section class="p-6 dark:bg-gray-100 dark:text-gray-900">
        <form action="{{route('update', ['id' => $data['id']])}}" method="POST" class="container flex flex-col mx-auto space-y-12">
            @csrf
            @method('PUT')
            {{-- @method('PUT') จำเป็น  --}}
            <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-gray-50">
                <div class="space-y-2 col-span-full lg:col-span-1">
                    <p class="font-medium">Profile</p>
                    <p class="text-xs">Adipisci fuga autem eum!</p>
                </div>
                <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">
                    <div class="col-span-full sm:col-span-3">
                        <label for="username" class="text-sm">title</label>
                        <input id="username" type="text" value="{{$data['title']}}" name="title"
                            class="w-full rounded-md">
                    </div>
                    <div class="col-span-full">
                        <label for="bio" class="text-sm">Body</label>
                        <input id="bio" value="{{$data['body']}}" name="body"
                            class="w-full rounded-md h-16"></input>
                    </div>
                    <div class="col-span-full">
                        <div class="flex items-center space-x-2">
                            <button type="submit" class="px-4 py-2 border rounded-md dark:border-gray-800">Update</button>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </section>
@endsection
