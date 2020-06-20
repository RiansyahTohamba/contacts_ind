<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
              <form class="form-horizontal" method="post">

                <div class="form-group">
                  <label class="control-label col-sm-3">Nama : </label>
                  <div class="col-sm-9">
                    
                  </div>
                </div>

                
                <div class="form-group">
                  <label class="control-label col-sm-3">Provinsi:</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="province" id="province">
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
                    <select class="form-control" name="regency" id="regency">
                      <option></option>
                    </select>
                    <img src="asset/img/loading.gif" width="35" id="load2" style="display:none;" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" >Kecamatan:</label>
                  <div class="col-sm-9">          
                    <select class="form-control" name="district" id="district">
                      <option></option>
                    </select>
                    <img src="asset/img/loading.gif" width="35" id="load3" style="display:none;" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" >Kelurahan:</label>
                  <div class="col-sm-9">          
                    <select class="form-control" name="village" id="village">
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
        $('select[name="province"]').on('change', function() {
            var provID = $(this).val();
            if(provID) {
                $.ajax({
                    url: '/regency/ajax/'+provID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="regency"]').empty();
                        $('select[name="regency"]').append('<option value="">Pilih Kabupaten</option>');
                        $.each(data, function(key, value) {
                            $('select[name="regency"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="regency"]').empty();
            }
        });
        $('select[name="regency"]').on('change', function() {
            var provID = $(this).val();
            if(provID) {
                $.ajax({
                    url: '/district/ajax/'+provID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="district"]').empty();
                        $('select[name="district"]').append('<option value="">Pilih Kecamatan</option>');
                        $.each(data, function(key, value) {
                            $('select[name="district"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="district"]').empty();
            }
        });
        $('select[name="district"]').on('change', function() {
            var provID = $(this).val();
            if(provID) {
                $.ajax({
                    url: '/village/ajax/'+provID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="village"]').empty();
                        $('select[name="village"]').append('<option value="">Pilih Kelurahan/Desa</option>');
                        $.each(data, function(key, value) {
                            $('select[name="village"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="village"]').empty();
            }
        });
    });
</script>
    </body>
</html>
