@extends('layout')
@section('title')
    
@endsection
@section('content')
<div class="container p-2 mx-auto sm:p-4 dark:text-gray-800">
	<h2 class="mb-4 text-2xl font-semibold leading-tight">Invoices</h2>
	<div class="overflow-x-auto">
		<table class="min-w-full text-xs">
			<colgroup>
				<col>
				<col>
				<col>
				<col>
				<col>
				<col class="w-24">
			</colgroup>
			<thead class="dark:bg-gray-300">
				<tr class="text-left">
					<th class="p-3">Id</th>
					<th class="p-3">Title</th>
					<th class="p-3">Body</th>
					<th class="p-3">Detail</th>
					<th class="p-3">Edit</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($data as $item)
                <tr class="border-b border-opacity-20 dark:border-gray-300 dark:bg-gray-50">
					<td class="p-3">
						<p>{{$item['id']}}</p>
                        {{-- ที่ใช้ $item['id'] แทนที่จะใช้ $item->id เพราะว่าข้อมูลที่ดึงมาจะเป้นรูปแบบ Array --}}
					</td>
					<td class="p-3">
						<p>{{$item['title']}}</p>
					</td>
					<td class="p-3">
						<p>{{$item['body']}}</p>
					</td>
					<td class="p-3">
						<a href="{{route('fetchdataId', $item['id'])}}">Detail</a>
					</td>
					<td class="p-3">
						<a href="{{route('edit', $item['id'])}}">Edit</a>
					</td>
				</tr>
                @endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection