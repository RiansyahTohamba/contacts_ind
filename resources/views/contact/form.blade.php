<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
              <form class="form-horizontal" method="post" action="{{ route('contact.store') }}" >
                {{ csrf_field() }}
                <div class="form-group">
                  <label class="control-label col-sm-3">Nama  </label>
                  <div class="col-sm-9">
                    <input type="text" name="name" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3">Email  </label>
                  <div class="col-sm-9">
                    <input type="email" name="email" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3">Handphone  </label>
                  <div class="col-sm-9">
                    <input type="text" name="handphone" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3">Alamat Detail  </label>
                  <div class="col-sm-9">
                    <input type="text" name="detail_address" class="form-control">
                  </div>
                </div>

                
                <div class="form-group">
                  <label class="control-label col-sm-3">Provinsi:</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="province_id" id="province">
                      <option value="">--- Pilih Provinsi ---</option>
                      @foreach($provinces as $prov)
                        <option value="{{$prov->id }}">{{ $prov->name }}</option>
                      @endforeach
                    </select>
                    <img src="asset/img/loading.gif" width="35" id="load1" style="display:none;" />
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-sm-3" >Kota/Kabupaten:</label>
                  <div class="col-sm-9">          
                    <select class="form-control" name="regency_id" id="regency">
                      <option></option>
                    </select>
                    <img src="asset/img/loading.gif" width="35" id="load2" style="display:none;" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" >Kecamatan:</label>
                  <div class="col-sm-9">          
                    <select class="form-control" name="district_id" id="district">
                      <option></option>
                    </select>
                    <img src="asset/img/loading.gif" width="35" id="load3" style="display:none;" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" >Kelurahan:</label>
                  <div class="col-sm-9">          
                    <select class="form-control" name="village_id" id="village">
                      <option></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">        
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-default">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[id="province"]').on('change', function() {
            var provID = $(this).val();
            if(provID) {
                $.ajax({
                    url: '/regency/ajax/'+provID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[id="regency"]').empty();
                        $('select[id="regency"]').append('<option value="">Pilih Kabupaten</option>');
                        $.each(data, function(key, value) {
                            $('select[id="regency"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            }else{
                $('select[id="regency"]').empty();
            }
        });
        $('select[id="regency"]').on('change', function() {
            var provID = $(this).val();
            if(provID) {
                $.ajax({
                    url: '/district/ajax/'+provID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[id="district"]').empty();
                        $('select[id="district"]').append('<option value="">Pilih Kecamatan</option>');
                        $.each(data, function(key, value) {
                            $('select[id="district"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            }else{
                $('select[id="district"]').empty();
            }
        });
        $('select[id="district"]').on('change', function() {
            var provID = $(this).val();
            if(provID) {
                $.ajax({
                    url: '/village/ajax/'+provID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[id="village"]').empty();
                        $('select[id="village"]').append('<option value="">Pilih Kelurahan/Desa</option>');
                        $.each(data, function(key, value) {
                            $('select[id="village"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            }else{
                $('select[id="village"]').empty();
            }
        });
    });
</script>
    </body>
</html>
