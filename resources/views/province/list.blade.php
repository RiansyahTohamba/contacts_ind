<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel - List</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
            	<h1>Kontak Relasi</h1>
                @if(Session::has('alert-success'))
                    <div class="alert alert-success">
                        <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                    </div>
                @endif
                <a href="/contact_form" class="btn btn-primary">Tambah Kontak</a>
                <hr>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. HP</th>
                        <th>Provinsi</th>
                        <th>Kota/Kabupaten</th>
                        <th>Kecamatan</th>
                        <th>Desa</th>
                        <th>Detail Alamat</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $no = 1; @endphp
                    @foreach($contacts as $ct)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $ct->name }}</td>
                            <td>{{ $ct->email }}</td>
                            <td>{{ $ct->handphone }}</td>
                            <td>{{ $ct->province_id }}</td>
                            <td>{{ $ct->regency_id }}</td>
                            <td>{{ $ct->district_id }}</td>
                            <td>{{ $ct->village_id }}</td>
                            <td>{{ $ct->detail_address }}</td>
                            <td>
                                <form action="{{ route('contact.destroy', $ct->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a href="{{ route('contact.edit',$ct->id) }}" class=" btn btn-sm btn-primary">Edit</a>
                                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
