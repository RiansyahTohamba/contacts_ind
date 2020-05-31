<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mari Belajar Coding - Wilayah Adminstrasi Indonesia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="asset/bootstrap-3.3.7/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="asset/select2-4.0.6-rc.1/dist/css/select2.min.css">
  <script src="asset/jquery/jquery-3.3.1.min.js"></script>
  <script src="asset/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
  <script src="asset/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>   
  <script src="asset/select2-4.0.6-rc.1/dist/js/i18n/id.js"></script>   
  <script src="asset/js/app.js"></script>
  <?php
    include("koneksi.php");     
  ?>
</head>
<body>
<div class="container">
  <br>
  <div class="row">
    <div class="col-sm-offset-2  col-sm-8">
      <div class="panel panel-default">
        <div class="panel-heading"><b>Mari Belajar Coding - Wilayah Adminstrasi Indonesia</b></div>
        <div class="panel-body">
           <form class="form-horizontal" method="post">
              <div class="form-group">
                <label class="control-label col-sm-3">Provinsi:</label>
                <div class="col-sm-9">
                  <?php                    
                    $sql_provinsi = mysqli_query($con,"SELECT * FROM provinces ORDER BY name ASC");
                   ?>
                  <select class="form-control" name="provinsi" id="provinsi">
                    <option></option>
                    <?php                       
                        while($rs_provinsi = mysqli_fetch_assoc($sql_provinsi)){ 
                           echo '<option value="'.$rs_provinsi['id'].'">'.$rs_provinsi['name'].'</option>';
                        }                        
                      ?>
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
    </div>
  </div>  
</div>
</body>
</html>
