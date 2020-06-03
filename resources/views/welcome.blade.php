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
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            
            <div class="content">
                <form class="form-horizontal" method="post">
              <div class="form-group">
                <label class="control-label col-sm-3">Provinsi:</label>
                <div class="col-sm-9">
                    {{-- $sql_provinsi = mysqli_query($con,"SELECT * FROM provinces ORDER BY name ASC"); --}}
                    {{ $tes }}
                  <select class="form-control" name="provinsi" id="provinsi">
                    <option></option>
                    {{--
                        while($rs_provinsi = mysqli_fetch_assoc($sql_provinsi)){ 
                           echo '<option value="'.$rs_provinsi['id'].'">'.$rs_provinsi['name'].'</option>';
                        }
                      --}}                    
                  </select>
                  <img src="asset/img/loading.gif" width="35" id="load1" style="display:none;" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" >Kota/Kabupaten:</label>
                <div class="col-sm-9">          
                  <select class="form-control" name="kota" id="kota">
                    <option></option>
                  </select>
                  <img src="asset/img/loading.gif" width="35" id="load2" style="display:none;" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" >Kecamatan:</label>
                <div class="col-sm-9">          
                  <select class="form-control" name="kecamatan" id="kecamatan">
                    <option></option>
                  </select>
                  <img src="asset/img/loading.gif" width="35" id="load3" style="display:none;" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" >Kelurahan:</label>
                <div class="col-sm-9">          
                  <select class="form-control" name="kelurahan" id="kelurahan">
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
    </body>
</html>
