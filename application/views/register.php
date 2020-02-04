<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h2>Sistem Perusahaan Weecom</h2>
			<h3>Pengelola Karyawan & digital absensi</h3>
			<div class="akses-button">
				<?php
				echo anchor('user/login','LOGIN',['class' => 'btn btn-outline-primary']);
				echo anchor('user/register','REGISTER',['class' => 'btn btn-outline-primary']);
				?>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card frame-form-weecom">
				<div class="card-header">
					Daftar interview
				</div>
				<div class="card-body">
					<?php 
					echo form_open(base_url('user/prosesRegister'),['class' => 'form-weecom']);
					?>
					<div class="form-group row">
						<label for="nama_depan" class="col-3">Nama Depan</label>
						<div class="col-9">
							<?php 
							echo form_input(['name' => 'nama_depan',
								'id' => 'nama_depan',
								'value' => set_value('nama_depan'),
								'class' => 'form-control',
								'placeholder' => 'Nama Depan'
							]);
							echo form_error('nama_depan','<div class="text-danger">','</div>');
							?>
						</div>
					</div>
					<div class="form-group row">
						<label for="nama_belakang" class="col-3">Nama Belakang</label>
						<div class="col-9">
							<?php 
							echo form_input(['name' => 'nama_belakang',
								'id' => 'nama_belakang',
								'class' => 'form-control',
								'value' => set_value('nama_belakang'),
								'placeholder' => 'Nama Belakang'
							]);
							echo form_error('alamat');
							?>
						</div>
					</div>

					<div class="form-group row">
						<label for="nama-depan" class="col-3">Email</label>
						<div class="col-9">
							<?php 
							echo form_input(['name' => 'email',
								'id' => 'email',
								'class' => 'form-control',
								'value' => set_value('email'),
								'placeholder' => 'Email'
							]);
							echo form_error('email');
							?>
						</div>
					</div>

					<div class="form-group row">
						<label for="dob" class="col-3">Tanggal Lahir</label>
						<div class="col-9">
							<?php 
							echo form_input(['name' => 'dob',
								'id' => 'dob',
								'class' => 'form-control',
								'value' => set_value('dob'),
								'placeholder' => 'Tanggal Lahir'
							]);
							echo form_error('dob');
							echo form_error('tanggal_lahir');
							?>
						</div>
					</div>

					<div class="form-group row">
						<label for="alamat" class="col-3">Alamat</label>
						<div class="col-9">
							<?php 
							echo form_input(['name' => 'alamat',
								'id' => 'alamat',
								'value' => set_value('alamat'),		
								'class' => 'form-control',
								'placeholder' => 'Alamat'
							]);
							echo form_error('alamat');
							?>
						</div>
					</div>

					<div class="form-group row">
						<label for="nomor_telpon" class="col-3">Nomor Telpon</label>
						<div class="col-9">
							<?php 
							echo form_input(['name' => 'nomor_telpon',
								'id' => 'nomor_telpon',
								'class' => 'form-control',
								'value' => set_value('nomor_telpon'),
								'placeholder' => 'Nomor Telpon'
							]);
							echo form_error('nomor_telpon');
							?>
						</div>
					</div>

					<div class="form-group row">
						<label for="nomor_hp" class="col-3">Nomor Hp</label>
						<div class="col-9">
							<?php 
							echo form_input(['name' => 'nomor_hp',
								'id' => 'nomor_hp',
								'class' => 'form-control',
								'value' => set_value('nomor_hp'),
								'placeholder' => 'Nomor Hp'
							]);
							echo form_error('nomor_hp');
							?>
						</div>
					</div>

					<div class="form-group row">
						<label for="jenis_kelamin" class="col-3">Jenis Kelamin</label>
						<div class="col-9">
							<div class="row">
								<div class="col-4">
									<label class="radio-inline">
										<?php 
										echo form_radio(['name' => 'jenis_kelamin',
											'id' => 'jenis_kelamin',
											'checked' => set_radio('jenis_kelamin'),
											'value' => 'Wanita'
										])
										?>Wanita
									</label>
								</div>
								<div class="col-4">
									<label class="radio-inline">
										
										<?php 
										echo form_radio(['name' => 'jenis_kelamin',
											'id' => 'jenis_kelamin',
											'checked' => set_radio('jenis_kelamin'),
											'value' => 'Pria'
										])
										?>
										pria
									</label>
								</div>
							</div>
							<?php echo form_error('jenis_kelamin');?>
						</div>
					</div>

					<div class="form-group row">
						<label for="nomor_hp" class="col-3">Password</label>
						<div class="col-9">
							<?php 
							echo form_password(['name' => 'password',
								'id' => 'password',
								'class' => 'form-control',
								'placeholder' => 'Password'
							]);
							echo form_error('password');
							?>
						</div>
					</div>

					<div class="form-group row">
						<label for="nomor_hp" class="col-3">Konfirmasi Password</label>
						<div class="col-9">
							<?php 
							echo form_password(['name' => 'konfirmasi_password',
								'id' => 'konfirmasi_password',
								'class' => 'form-control',
								'placeholder' => 'Konfirmasi Password'
							]);
							echo form_error('konfirmasi_password');
							?>
						</div>
					</div>

					<?php 
						echo form_submit(['name' => 'submit',
											'class' => 'btn btn-dark btn-block',
						],'REGISTER');
						echo form_close();
					?>
				</div>
			</div>
		</div>
	</div>
</div>