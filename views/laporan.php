 <div class="row">
          <div class="col-lg-12">
            <h1>Halaman Laporan Order </h1>
            <ol class="breadcrumb">
              <marquee direction="left" scrollamount="2" align="center" behavior="alternate"><h1>Selamat Bekerja Sahabat TRAC ASTRA PALEMBANG</marquee></a>
              <li class="active"><i class="icon-file-alt"></i></li>
            </ol>
          </div>
          
        </div><!-- /.row -->
        <?php if ($_SESSION['level'] ==1): ?>
      <div class="table-responsive-">
          <form  action="" method="POST" ><table class="table table-bordered table-hover table-striped" id="datatables" align="center" style="width: 45%">
              <tr>
                                <tr>
                <th class="control-label">Tanggal Mulai </th>
                <td class="form-group"><input type="date" class="form-control" name="tgl_mulai" id="tgl_mulai" required="">  
              </tr>
              <tr>
                <th class="control-label">Tanggal Akhir </th>
                <td class="form-group"><input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir" required=""> 
                   <div class="modal-footer">
                <input type="submit" class="btn btn-success" name="cari" value="Cari">
                 </td>
              </tr>
			    </table>
              </form>
              </div>
            <?php endif?>
