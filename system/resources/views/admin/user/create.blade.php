@extends('admin.template.base')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 mt-5">
			<div class="card">
				<div class="card-header">
					Tambah Data User
				</div>
				<div class="card-body">
					<form action="{{url('admin/user')}}" method="post" enctype="multipart/form-data">
					@csrf
						<div class="form-group">
							<label for="" class="control-label">Nama</label>
							<input type="text" name="nama" class="form-control">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Username</label>
							<input type="text" name="username" class="form-control">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Jenis Kelamin</label>
							<input type="text" name="jenis_kelamin" class="form-control">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Email</label>
							<input type="email" name="email" class="form-control">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Password</label>
							<input type="password" name="password" class="form-control">
						</div>
						<div class="row">
							<div class="col-md-3">
								<label for="" class="control-label">Provinsi</label>
								<select name="" class="form-control" onchange="gantiProvinsi(this.value)">
									<option value="">Pilih Provinsi</option>
								@foreach($list_provinsi as $provinsi)
									<option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
								@endforeach
								</select>
							</div>
							<div class="col-md-3">
								<label for="" class="control-label">Kabupaten/Kota</label>
								<select name="" class="form-control" id="kabupaten" onchange="gantiKabupaten(this.value)">
									<option value="">Pilih Provinsi Terlebih Dahulu</option>
								</select>
							</div>
							<div class="col-md-3">
								<label for="" class="control-label">Kecamatan</label>
								<select name="" class="form-control" id="kecamatan" onchange="gantiKecamatan(this.value)">
									<option value="">Pilih Kabupaten Terlebih Dahulu</option>
								</select>
							</div>
							<div class="col-md-3">
								<label for="" class="control-label">Desa</label>
								<select name="" class="form-control" id="desa">
									<option value="">Pilih Kecamatan Terlebih Dahulu</option>
								</select>
							</div>
						</div>						
						<div class="col-md-5">
							<div class="form-group">
								<label for="" class="control-label">Foto</label>
								<input type="file" name="foto" accept=".png" class="form-control">
							</div>	
						</div>
						<button class="btn btn-dark float-right">
							<i class="fa fa-save"> Simpan</i>
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('script')
<script>
	function gantiProvinsi(id){
		$.get("api/provinsi/"+id, function(result){
			result = JSON.parse(result)
			option = ""
			for(item of result){
				option += `<option value="${item.id}">${item.name}<option>`;
			}
			$("#kabupaten").html(option)
		});
	}

	function gantiKabupaten(id){
		$.get("api/kabupaten/"+id, function(result){
			result = JSON.parse(result)
			option = ""
			for(item of result){
				option += `<option value="${item.id}">${item.name}<option>`;
			}
			$("#kecamatan").html(option)
		});
	}

	function gantiKecamatan(id){
		$.get("api/kecamatan/"+id, function(result){
			result = JSON.parse(result)
			option = ""
			for(item of result){
				option += `<option value="${item.id}">${item.name}<option>`;
			}
			$("#desa").html(option)
		});
	}
</script>
@endpush