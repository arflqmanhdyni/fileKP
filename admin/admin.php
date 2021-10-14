<?php include "layout/header.php"?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users Administrator</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">DataTables User .</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTables User Level Owner & Pegawai Mars Computer</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  <?php $role = $dt['role'];
					$id = $dt['user_id'];
					$nama = $dt['user_nama'];
				if ($_SESSION['level'] == 'owner') {
					if ($role == 'owner') {
					echo "<a href='input_admin.php' class='btn btn-primary bg-gradient-primary btn-round ml-auto'>
                    <i class='fa fa-plus'></i>
                    Insert Data
      		  </a>";
			}
			else {
				echo "<a href='input_admin.php' class='btn btn-primary bg-gradient-primary btn-round ml-auto'>
                    <i class='fa fa-plus'></i>  Insert Data
					</a>";

				}
			}

			else {
				if ($role == 'owner') {
					echo "<a href='input_admin.php' class='btn btn-primary bg-gradient-primary disabled btn-round ml-auto'>
                    <i class='fa fa-plus'></i>  Insert Data
					</a>";
				}
				else {
					echo "<a href='input_admin.php' class='btn btn-primary bg-gradient-primary disabled btn-round ml-auto'>
                    <i class='fa fa-plus'></i>  Insert Data
					</a>";
				}
			}?>
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr >
                        <th class="text-center" width="5%">No</th>
                        <th class="text-left" width="10%">level</th>
                        <th width="20%">Nama</th>
                        <th width="10%">Username</th>
                        <th>Foto</th>
                        <th >Action</th>

                    </tr>
                </thead>
                  <tbody>
<?php
					include '../config.php';
					$no=1;
					$data = mysqli_query($config,"SELECT * FROM user_admin");
					while($dt = mysqli_fetch_array($data)){
						?>
						<tr>
						<td class="text-center"><?php echo $no++; ?></td>
						<td class="text-center" ><?php echo $dt['role']; ?></td>
						<td class="text-center" ><?php echo $dt['user_nama']; ?></td>
						<td class="text-center"><?php echo $dt['user_username']; ?></td>
						<td class="text-center">
						<center>
							<?php if($dt['user_foto'] == ""){ ?>
								<img src="../fotoo/user/fotoku.jpg" style="width: 100px;height: 100px">
							<?php }else{ ?>
								<img src="../fotoo/user/<?php echo $dt['user_foto'] ?>" style="width: 100px;height: 100px">
							<?php } ?>
						</center>
						</td>
						<td class="text-center">

							<div class="form-button-action">
							<script>
							function deleteFunction() {
								return confirm ('Apakah data akan di hapus .?');
							}
						</script>
							<?php $role = $dt['role'];
									$id = $dt['user_id'];
									$nama = $dt['user_nama'];
								if ($_SESSION['level'] == 'owner') {
									if ($role == 'owner') {
									echo "
									<a type='button' data-toggle='tooltip' class='btn btn-sm btn-primary bg-gradient-primary btn-lg' data-original-title='Ubah Data' href='ubah_admin.php?id=$id'><i class='fa fa-edit' ></i>
									</a>
									<a type='button' data-toggle='tooltip'  title='Hapus Admin' class='btn btn-sm btn-danger bg-gradient-danger disabled' data-original-title='Hapus Data'>	<i class='fa fa-times'></i><a/>
									";
										}
										else {
									echo "
									<a type='button' data-toggle='tooltip' class='btn btn-sm btn-primary bg-gradient-primary btn-lg' data-original-title='Ubah Data' href='ubah_admin.php?id=$id'><i class='fa fa-edit' ></i>
									</a>
									<a type='button' data-toggle='tooltip'  onclick='return  deleteFunction()'  title='Hapus Admin' class='btn btn-sm btn-danger bg-gradient-danger' data-original-title='Hapus Data' href='delAdmin.php?hal=hapus&user_id=$id'>
										<i class='fa fa-times'></i>
									</a>";
										}
								}

								else {
									if ($role == 'owner') {
									echo "
									<a type='button' data-toggle='tooltip' class='btn btn-sm btn-primary btn-lg disabled' data-original-title='Ubah Data'><i class='fa fa-edit' ></i>
									</a>

									<a type='button' data-toggle='tooltip'  title='Hapus Admin' class='btn btn-sm btn-danger disabled' data-original-title='Hapus Data'><span class='fas fa-trash'></span><a/>
									";
										}
										else {
									echo "
									<a type='button' data-toggle='tooltip' class='btn btn-sm btn-primary btn-lg' data-original-title='Ubah Data' href='ubah_admin.php?id=$id'><i class='fa fa-edit' ></i>
									</a>
									<a type='button' data-toggle='tooltip'  onclick='return deleteFunction()'  title='Hapus Admin' class='btn btn-sm btn-danger' data-original-title='Hapus Data' href='delAdmin.php?hal=hapus&user_id=$id'>
										<i class='fa fa-times'></i>
									</a>";
										}
								}
									?>
							</div>
						</td>

						</tr>
						<?php
					}
					?>
                  </tbody>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "layout/footer.php"?>
