<?php
require_once("../config.php");

$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
?>

<script>
			$(document).ready(function(){
				 $("#uid").load("UIDContainer.php");
				setInterval(function() {
					$("#uid").load("UIDContainer.php");
				}, 500);
			});
		</script>
<div class="card card-color panel-primary">
            <div class="card-header"> 
                <h3 class="panel-title">Registrasi kartu baru</h3> 
            </div> 
        <div class="card-body">
			<div class="col-lg-12" id="indexresult"></div>
	  <form method="POST">
				                    <div class="form-group">
				                      <label>Card Uid:</label>
				                      <div>
                                      <textarea class="form-control" name="uid" id="uid" placeholder="Please Tag your Card / Key Chain to display ID" rows="1" required></textarea>
				                      </div>
				                    </div>
				                    <div class="form-group">
				                      <label>Nama :</label>
				                      <div>
				                        <input type="text" class="form-control" placeholder="Nama" name="nama" id="nama">
				                      </div>
				                    </div>
      </div>

      <div class="modal-footer">
        <button type="submit"  onclick="kirim()" name="kirim" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>

  <script>

function kirim()
{
post();
	var uid = $('#uid').val();
	var nama = $('#nama').val();
	$.ajax({
		url	: 'panel/proses-reg.php',
		data	: 'uid='+uid+'&nama='+nama,
		type	: 'POST',
		dataType: 'html',
		success	: function(msg){
                     result();
	        $("#indexresult").prepend(msg);
	    }
	});
}
</script>