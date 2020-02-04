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
					Login
				</div>
				<div class="card-body">
					<?php 
					if($this->session->flashdata('pesan')):?>
					<div class="alert alert-success">
						<?php echo $this->session->flashdata('pesan');?>
					</div>
					<?php 
				endif;
					echo form_open(base_url('login/proses'),['class' => 'form-weecom']);
					?>
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

					<?php 
						echo form_submit(['name' => 'submit',
											'class' => 'btn btn-dark btn-block',
						],'LOGIN');
						echo form_close();
					?>
				</div>
			</div>
		</div>
	</div>
</div>