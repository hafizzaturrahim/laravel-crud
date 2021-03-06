@extends('master')

@section('header')
<div class="row mb-2">
	<div class="col-sm-6">
		<h1>Daftar Pertanyaan</h1>
	</div>
	<div class="col-sm-6">
		<ol class="breadcrumb float-right">
			<a class="btn btn-success" href="/pertanyaan/create">Buat Pertanyaan</a>
		</ol>
	</div>
</div>
@endsection

@section('content')
	<div class="card">

	<!-- /.card-header -->
	<div class="card-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No.</th>
					<th>Judul Pertanyaan</th>
					<th>Pertanyaan</th>
					<th>Tanggal Dibuat</th>
					<th>Terakhir Diperbaharui</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($question as $item)
				<tr>
					<td>{{$loop->iteration}} </td>
					<td><a href="/jawaban/{{$item->id_question}} ">{{$item->title}}</a></td>
					<td>{{$item->description}}</td>
					<td>{{$item->created_at}}</td>
					<td>{{$item->updated_at}}</td>
					<td><a class="btn btn-sm btn-warning" href="/pertanyaan/{{$item->id_question}}/edit">Edit</a>
						<form action="/pertanyaan/{{$item->id_question}}" method="POST" >
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa fa-trash"></i></button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- /.card-body -->
</div>
@endsection