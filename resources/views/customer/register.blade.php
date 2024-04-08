<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('themplete/regist')}}/assets/img/favicon.ico">

	<title>Halaman Pendaftaran</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('themplete/regist')}}/assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="{{ asset('themplete/regist')}}/assets/img/favicon.png" />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
	<link href="{{ asset('themplete/regist')}}/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="{{ asset('themplete/regist')}}/assets/css/material-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="{{ asset('themplete/regist')}}/assets/css/demo.css" rel="stylesheet" />

	{{-- ekstrernal --}}

	{{-- <link href="{{ asset('themplete/register')}}/assets/css/eksternal.css" rel="stylesheet" /> --}}
	{{-- <script src="{{ asset('themplete/register')}}/assets/js/eksternal.js"></script>
 --}}

 

	<script src="https://cdn.tiny.cloud/1/dfbjp5t7l2tma3tonn4p1r4as5erau94fle9b3eaj3vokrm9/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>




 



</head>

<body>
	<div class="image-container set-full-height" style="background-image: url('https://images.unsplash.com/photo-1497215728101-856f4ea42174?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')">
	    <!--   Creative Tim Branding   -->
	    <a href="/">
	         <div class="logo-container">
	            <div class="logo">
	                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSNLl8tPjJPBjBzOcZWjQS2Z_-0Dt72w5YzyA&usqp=CAU">
	            </div>
	            <div class="brand">
	                Mau
					BikinCV
	            </div>
	        </div>
	    </a>

		<!--  Made With Material Kit  -->
		<a href="#" class="made-with-mk">
			<div class="brand">MB</div>
			<div class="made-with"> | Mau Bikin <strong>CV</strong></div>
		</a>

	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="green" id="wizardProfile">
							<form action="{{ route('customers.store') }}"  method="post" enctype="multipart/form-data">
								@csrf
		                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        	   Lengkapi Data Anda
		                        	</h3>
									<h5>Informasi ini akan membuat kami lebih jauh mengenal anda.</h5>
		                    	</div>
								<div class="wizard-navigation">
									<ul>
			                            <li><a href="#about" data-toggle="tab">Pribadi</a></li>
			                            <li><a href="#account" data-toggle="tab">Pengalaman</a></li>
			                            <li><a href="#address" data-toggle="tab">Templete</a></li>
			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane" id="about">
		                              <div class="row">
		                                	<h4 class="info-text"> Mari kita mulai dengan informasi dasar (dengan validasi)</h4>
		                                	<div class="col-sm-4 col-sm-offset-1">
		                                    	<div class="picture-container">
		                                        	<div class="picture">
                                        				<img src="{{ asset('themplete/regist')}}/assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
		                                            	<input type="file" id="wizard-picture" name="gambar">
		                                        	</div>
		                                        	<h6>Pilih Gambar</h6>
		                                    	</div>
		                                	</div>

											


											{{-- Nama Gabungan --}}
											<input type="text" name="kode_transaksi" id="kode_transaksi" >


											
											<div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon"></span>
													<div class="form-group label-floating">
														<label class="control-label">Nama Awal <small>(wajib diisi)</small></label>
														<input name="nama_awal" type="text" class="form-control">
													</div>
												</div>
											
												<div class="input-group">
													<span class="input-group-addon"></span>
													<div class="form-group label-floating">
														<label class="control-label">Nama Akhir <small>(wajib diisi)</small></label>
														<input name="nama_akhir" type="text" class="form-control">
													</div>
												</div>
											</div>
											
											{{-- Nama Gabungan --}}
											<input type="text" name="nama_lengkap" id="nama_lengkap" hidden>
											
								 
											
											
											
											
											
											
		                                	<div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Email <small>(wajib diisi)</small></label>
			                                            <input name="email" type="email" class="form-control">
			                                        </div>
												</div>
		                                	</div>
											<div class="col-sm-5">
												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">No Telp/HP</label>
			                                            <input name="no_telp" type="number" class="form-control">
			                                        </div>
												</div>
		                                	</div>
											<div class="col-sm-11 col-sm-offset-0">
												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Alamat</label>
			                                            <input name="alamat" type="text" class="form-control">
			                                        </div>
												</div>
		                                	</div>
											<div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Kode POS</label>
			                                            <input name="kode_pos" type="text" class="form-control">
			                                        </div>
												</div>
		                                	</div>
											<div class="col-sm-5">
												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Kota</label>
			                                            <input name="kota" type="text" class="form-control">
			                                        </div>
												</div>
		                                	</div>
											<div class="col-sm-2">
												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Tanggal</label>
														<select name="tanggal_lahir" id="tanggal" class="form-control">
															<option value="01">01</option>
															<option value="02">02</option>
															<option value="03">03</option>
															<option value="04">04</option>
															<option value="05">05</option>
															<option value="06">06</option>
															<option value="07">07</option>
															<option value="08">08</option>
															<option value="09">09</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
															<option value="13">13</option>
															<option value="14">14</option>
															<option value="15">15</option>
															<option value="16">16</option>
															<option value="17">17</option>
															<option value="18">18</option>
															<option value="19">19</option>
															<option value="20">20</option>
															<option value="21">21</option>
															<option value="22">22</option>
															<option value="23">23</option>
															<option value="24">24</option>
															<option value="25">25</option>
															<option value="26">26</option>
															<option value="27">27</option>
															<option value="28">28</option>
															<option value="29">29</option>
															<option value="30">30</option>
															<option value="31">31</option>
														</select>
			                                        </div>
												</div>
		                                	</div>
											<div class="col-sm-2">
												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Bulan</label>
			                                            <select name="bulan_lahir" id="bulan" class="form-control">
															<option value="Januari">Januari</option>
															<option value="Februari">Februari</option>
															<option value="Maret">Maret</option>
															<option value="April">April</option>
															<option value="Mei">Mei</option>
															<option value="Juni">Juni</option>
															<option value="Juli">Juli</option>
															<option value="Agustus">Agustus</option>
															<option value="September">September</option>
															<option value="Oktober">Oktober</option>
															<option value="November">November</option>
															<option value="Desember">Desember</option>
														</select>
			                                        </div>
												</div>
		                                	</div>
											<div class="col-sm-2">
												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Tahun</label>
			                                            <select name="tahun_lahir" id="tahun" class="form-control">
															<?php
															for ($i = 1980; $i <= 2023; $i++) {
																echo "<option value='$i'>$i</option>";
															}
															?>
														</select>
			                                        </div>
												</div>
		                                	</div>
											<div id="tanggalTerpilih"></div>

											<script>
												function tampilkanTanggalTerpilih() {
													const day = document.getElementById("day").value;
													const month = document.getElementById("month").value;
													const year = document.getElementById("year").value;
													const tanggalTerpilih = `Tanggal Terpilih: ${day}/${month}/${year}`;
													document.getElementById("tanggalTerpilih").textContent = tanggalTerpilih;
												}
											</script>


											<div class="col-sm-5">
												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating">
														<label class="control-label">Tempat Lahir</label>
			                                            <input name="tempat_lahir" type="text" class="form-control">
			                                        </div>
												</div>
		                                	</div>


											<div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">SIM </label>
			                                            <input name="sim" type="text" class="form-control">
			                                        </div>
												</div>
		                                	</div>
											<div class="col-sm-5">
												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating">
														<label class="control-label">Jenis Kelamin</label>
														<select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
															<option value="Pria">Pria</option>
															<option value="Wanita">Wanita</option>
														 
															
														</select>
			                                        </div>
												</div>
		                                	</div>

											<div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Kebangsaan </label>
			                                            <input name="kebangsaan" type="text" class="form-control">
			                                        </div>
												</div>
		                                	</div>
											<div class="col-sm-5">
												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating">
														<label class="control-label">Status Pernikahan</label>
														<select name="status_pernikahan" id="status_pernikahan" class="form-control">
															<option value="Nikah">Nikah</option>
															<option value="Belum Nikah">Belum Nikah</option>
															<option value="Janda">Janda</option>
															<option value="Duda">Duda</option>
														 
															
														</select>
			                                        </div>
												</div>
		                                	</div>


											<div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Linkedln </label>
			                                            <input name="linkedln" type="text" class="form-control">
			                                        </div>
												</div>
		                                	</div>
											<div class="col-sm-5">
												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating">
														<label class="control-label">Website</label>
														<input name="website" type="text" class="form-control">
			                                        </div>
												</div>
		                                	</div>


											



		                            	</div>
		                            </div>





		                            <div class="tab-pane" id="account">
		                                <h4 class="info-text"> Ceritakan tentang dirimu lebih detail ! </h4>
		                                <div class="row">
		                                    <div class="col-sm-12">
		                                    
												<div class="m-2">

													
													<div class="panel-group" id="accordion">
														<div class="panel-group" id="accordion">
															<div class="panel panel-default">
																<div class="panel-heading">
																	<h4 class="panel-title">
																		<a data-toggle="collapse" data-parent="#accordion" href="#profil">
																			PROFIL
																		</a>                
																	 
																		<a href="#" style="float: right;"   data-toggle="modal" data-target="#profilModal">Baca Tips !</a> 
																		 
																		
																		<!-- Modal -->
																		<div class="modal fade" id="profilModal" tabindex="-1" role="dialog" aria-labelledby="profilModalLabel" aria-hidden="true">
																			<div class="modal-dialog" role="document">
																			<div class="modal-content">
																				<div class="modal-header">
																				 
																				</div>
																				<div class="modal-body">
																					<h5>Tips</h5>
																					<p>1.Profil Anda selalu berada di atas CV.</p>
																					<p>2.Deskripsikan diri Anda secara singkat dan bermakna dengan mempertimbangkan lowongan kerja dan posisi yang dilamar. Jangan hanya gunakan satu kalimat, tetapi cobalah seringkas mungkin.</p>
																					<p>3.Buat profil yang bagus dengan menyebutkan setidaknya semua hal berikut: pencapaian, kualitas, ambisi, target, dan apa yang Anda cari.</p>
																				</div>
																				<div class="modal-footer">
																				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
																				 
																				</div>
																			</div>
																			</div>
																		</div>


																		

																		
																	</h4>
																</div>
																<div id="profil" class="panel-collapse collapse in">
																	<div class="panel-body">
																		<textarea name="deskripsi_profil">
																			Isi Profil Disini!
																		</textarea>
																		<a href = "resume.html" class = "btn btn-success text-uppercase"><i class="fa fa-save"></i> Simpan</a>
																		<a href = "resume.html" class = "btn btn-danger text-uppercase"><i class="fa fa-trash"></i> Hapus</a>
																		
																	</div>
																</div>
															</div>
															<div class="panel panel-default">
																<div class="panel-heading">
																	<h4 class="panel-title">
																		<a data-toggle="collapse" data-parent="#accordion" href="#pengalaman">
																			PENGALAMAN KERJA
																		</a>

																		<a href="#" style="float: right;"   data-toggle="modal" data-target="#pengalamanKerjaModal">Baca Tips !</a> 
																		 
																		
																		<!-- Modal -->
																		<div class="modal fade" id="pengalamanKerjaModal" tabindex="-1" role="dialog" aria-labelledby="pengalamanKerjaModalLabel" aria-hidden="true">
																			<div class="modal-dialog" role="document">
																			<div class="modal-content">
																				<div class="modal-header">
																				 
																				</div>
																				<div class="modal-body">
																					<h5>Tips</h5>
																					<p>1.Gunakan posisi kerja yang tepat untuk lowongan kerja yang dilamar. Misalnya, "Penjual" sebaiknya ditulis "Account Manager".</p>
																					<p>2.Deskripsikan tugas, tanggung jawab, dan kompetensi yang Anda kembangkan sejelas mungkin.</p>
																					<p>3.Lihatlah apa yang dicari oleh perusahaan. Susunlah konten dengan mempertimbangkan kebutuhan perusahaan, dan lengkapi dengan pengalaman Anda.</p>
																					<p>4.Jika Anda punya pengalaman kerja, hanya sebutkan tugas dan tanggung jawab yang relevan dengan lowongan kerja yang dilamar.</p>
																					<p>5.Mengurutkan item secara kronologis? Klik ikon roda gigi di kanan atas bagian dan pilih "urutkan secara kronologis".</p>
																			 </div>
																				<div class="modal-footer">
																				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
																				 
																				</div>
																			</div>
																			</div>
																		</div>

																	</h4>
																</div>
																<div id="pengalaman" class="panel-collapse collapse">
																	<div class="panel-body">
																		<div class="col-sm-6">
																			<div class="input-group">
																				<span class="input-group-addon">
																					
																				</span>
																				<div class="form-group label-floating">
																					<label class="control-label">Posisi Kerja</label>
																					<input name="posisi_kerja" type="text" class="form-control">
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-6">
																			<div class="input-group">
																				<span class="input-group-addon">
																					
																				</span>
																				<div class="form-group label-floating">
																					<label class="control-label">Kota</label>
																					<input name="kota_kerja" type="text" class="form-control">
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-12">
																			<div class="input-group">
																				<span class="input-group-addon">
																					
																				</span>
																				<div class="form-group label-floating">
																					<label class="control-label">Pemberi Pekerjaan/Perusahaan</label>
																					<input name="perusahaan" type="text" class="form-control">
																				</div>
																			</div>
																		</div>

																		<div class="col-sm-3">
																			<div class="input-group">
																				<span class="input-group-addon">
																					
																				</span>
																				<div class="form-group label-floating">
																					 <label class="control-label">Tanggal Mulai</label>
																						<select name="tanggal" id="tanggal" class="form-control">
																							<option value="Januari">Januari</option>
																							<option value="Februari">Februari</option>
																							<option value="Maret">Maret</option>
																							<option value="April">April</option>
																							<option value="Mei">Mei</option>
																							<option value="Juni">Juni</option>
																							<option value="Juli">Juli</option>
																							<option value="Agustus">Agustus</option>
																							<option value="September">September</option>
																							<option value="Oktober">Oktober</option>
																							<option value="November">November</option>
																							<option value="Desember">Desember</option>
																						</select>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-3">
																			<div class="input-group">
																				<span class="input-group-addon">
																					
																				</span>
																				<div class="form-group label-floating">
																					<select name="tahun" id="tahun" class="form-control">
																						<?php
																						for ($i = 1980; $i <= 2023; $i++) {
																							echo "<option value='$i'>$i</option>";
																						}
																						?>
																					</select>
																				</div>
																			</div>
																		</div>

																		<div class="col-sm-3">
																			<div class="input-group">
																				<span class="input-group-addon">
																					
																				</span>
																				<div class="form-group label-floating">
																					 <label class="control-label">Tanggal Akhir</label>
																						<select name="tanggal" id="tanggal" class="form-control">
																							<option value="Januari">Januari</option>
																							<option value="Februari">Februari</option>
																							<option value="Maret">Maret</option>
																							<option value="April">April</option>
																							<option value="Mei">Mei</option>
																							<option value="Juni">Juni</option>
																							<option value="Juli">Juli</option>
																							<option value="Agustus">Agustus</option>
																							<option value="September">September</option>
																							<option value="Oktober">Oktober</option>
																							<option value="November">November</option>
																							<option value="Desember">Desember</option>
																						</select>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-3">
																			<div class="input-group">
																				<span class="input-group-addon">
																					
																				</span>
																				<div class="form-group label-floating">
																					<select name="tahun" id="tahun" class="form-control">
																						<?php
																						for ($i = 1980; $i <= 2023; $i++) {
																							echo "<option value='$i'>$i</option>";
																						}
																						?>
																					</select>
																				</div>
																			</div>
																		</div>
																		

																		<div class="col-sm-12">
																			<div class="input-group">
																				<span class="input-group-addon">
																					
																				</span>
																				<div class="form-group">
																					<label class="control-label">Deskripsi</label>
																					<br>
																					<textarea>
																						Isi Deskripsi Disini!
																					</textarea>
																					<a href = "resume.html" class = "btn btn-success text-uppercase"><i class="fa fa-save"></i> Simpan</a>
																					<a href = "resume.html" class = "btn btn-danger text-uppercase"><i class="fa fa-trash"></i> Hapus</a>
																					
																				</div>
																			</div>
																		</div>

 
																		 
																	</div>
																</div>
															</div>
															<div class="panel panel-default">
																<div class="panel-heading">
																	<h4 class="panel-title">
																		<a data-toggle="collapse" data-parent="#accordion" href="#pendidikan">
																			PENDIDIKAN & KUALIFIKASI
																		</a>
																		<a href="#" style="float: right;"   data-toggle="modal" data-target="#pendidikanModal">Baca Tips !</a> 
																		 
																		
																		<!-- Modal -->
																		<div class="modal fade" id="pendidikanModal" tabindex="-1" role="dialog" aria-labelledby="pendidikanModalLabel" aria-hidden="true">
																			<div class="modal-dialog" role="document">
																			<div class="modal-content">
																				<div class="modal-header">
																				 
																				</div>
																				<div class="modal-body">
																					<h5>Tips</h5>
																					<p>1.Profil Anda selalu berada di atas CV.</p>
																					<p>2.Deskripsikan diri Anda secara singkat dan bermakna dengan mempertimbangkan lowongan kerja dan posisi yang dilamar. Jangan hanya gunakan satu kalimat, tetapi cobalah seringkas mungkin.</p>
																					<p>3.Buat profil yang bagus dengan menyebutkan setidaknya semua hal berikut: pencapaian, kualitas, ambisi, target, dan apa yang Anda cari.</p>
																				</div>
																				<div class="modal-footer">
																				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
																				 
																				</div>
																			</div>
																			</div>
																		</div>

																	</h4>
																

																</div>
																<div id="pendidikan" class="panel-collapse collapse">
																	<div class="panel-body">
																		Konten Pendidikan & Kualifikasi Anda di sini.
																	</div>
																</div>
															</div>
															<div class="panel panel-default">
																<div class="panel-heading">
																	<h4 class="panel-title">
																		<a data-toggle="collapse" data-parent="#accordion" href="#minat">
																			MINAT
																		</a>
																		<a href="#" style="float: right;"   data-toggle="modal" data-target="#minatModal">Baca Tips !</a> 
																		 
																		
																		<!-- Modal -->
																		<div class="modal fade" id="minatModal" tabindex="-1" role="dialog" aria-labelledby="minatModalLabel" aria-hidden="true">
																			<div class="modal-dialog" role="document">
																			<div class="modal-content">
																				<div class="modal-header">
																				 
																				</div>
																				<div class="modal-body">
																					<h5>Tips</h5>
																					<p>1.Gunakan posisi kerja yang tepat untuk lowongan kerja yang dilamar. Misalnya, "Penjual" sebaiknya ditulis "Account Manager".</p>
																					<p>2.Deskripsikan tugas, tanggung jawab, dan kompetensi yang Anda kembangkan sejelas mungkin.</p>
																					<p>3.Lihatlah apa yang dicari oleh perusahaan. Susunlah konten dengan mempertimbangkan kebutuhan perusahaan, dan lengkapi dengan pengalaman Anda.</p>
																					<p>4.Jika Anda punya pengalaman kerja, hanya sebutkan tugas dan tanggung jawab yang relevan dengan lowongan kerja yang dilamar.</p>
																					<p>5.Mengurutkan item secara kronologis? Klik ikon roda gigi di kanan atas bagian dan pilih "urutkan secara kronologis".</p>
																			 </div>
																				<div class="modal-footer">
																				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
																				 
																				</div>
																			</div>
																			</div>
																		</div>
																	</h4>
																</div>
																<div id="minat" class="panel-collapse collapse">
																	<div class="panel-body">
																		Konten Minat Anda di sini.
																	</div>
																</div>
															</div>
															<div class="panel panel-default">
																<div class="panel-heading">
																	<h4 class="panel-title">
																		<a data-toggle="collapse" data-parent="#accordion" href="#referensi">
																			REFERENSI
																		</a>
																		<a href="#" style="float: right;"   data-toggle="modal" data-target="#referensiModal">Baca Tips !</a> 
																		 
																		
																		<!-- Modal -->
																		<div class="modal fade" id="referensiModal" tabindex="-1" role="dialog" aria-labelledby="referensiModalLabel" aria-hidden="true">
																			<div class="modal-dialog" role="document">
																			<div class="modal-content">
																				<div class="modal-header">
																				 
																				</div>
																				<div class="modal-body">
																					<h5>Tips</h5>
																					<p>1.Gunakan posisi kerja yang tepat untuk lowongan kerja yang dilamar. Misalnya, "Penjual" sebaiknya ditulis "Account Manager".</p>
																					<p>2.Deskripsikan tugas, tanggung jawab, dan kompetensi yang Anda kembangkan sejelas mungkin.</p>
																					<p>3.Lihatlah apa yang dicari oleh perusahaan. Susunlah konten dengan mempertimbangkan kebutuhan perusahaan, dan lengkapi dengan pengalaman Anda.</p>
																					<p>4.Jika Anda punya pengalaman kerja, hanya sebutkan tugas dan tanggung jawab yang relevan dengan lowongan kerja yang dilamar.</p>
																					<p>5.Mengurutkan item secara kronologis? Klik ikon roda gigi di kanan atas bagian dan pilih "urutkan secara kronologis".</p>
																			 </div>
																				<div class="modal-footer">
																				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
																				 
																				</div>
																			</div>
																			</div>
																		</div>
																	</h4>
																</div>
																<div id="referensi" class="panel-collapse collapse">
																	<div class="panel-body">
																		Konten Referensi Anda di sini.
																	</div>
																</div>
															</div>
															<div class="panel panel-default">
																<div class="panel-heading">
																	<h4 class="panel-title">
																		<a data-toggle="collapse" data-parent="#accordion" href="#keahlian">
																			KEAHLIAN
																		</a>
																		<a href="#" style="float: right;"   data-toggle="modal" data-target="#keahlianModal">Baca Tips !</a> 
																		 
																		
																		<!-- Modal -->
																		<div class="modal fade" id="keahlianModal" tabindex="-1" role="dialog" aria-labelledby="keahlianModalLabel" aria-hidden="true">
																			<div class="modal-dialog" role="document">
																			<div class="modal-content">
																				<div class="modal-header">
																				 
																				</div>
																				<div class="modal-body">
																					<h5>Tips</h5>
																					<p>1.Gunakan posisi kerja yang tepat untuk lowongan kerja yang dilamar. Misalnya, "Penjual" sebaiknya ditulis "Account Manager".</p>
																					<p>2.Deskripsikan tugas, tanggung jawab, dan kompetensi yang Anda kembangkan sejelas mungkin.</p>
																					<p>3.Lihatlah apa yang dicari oleh perusahaan. Susunlah konten dengan mempertimbangkan kebutuhan perusahaan, dan lengkapi dengan pengalaman Anda.</p>
																					<p>4.Jika Anda punya pengalaman kerja, hanya sebutkan tugas dan tanggung jawab yang relevan dengan lowongan kerja yang dilamar.</p>
																					<p>5.Mengurutkan item secara kronologis? Klik ikon roda gigi di kanan atas bagian dan pilih "urutkan secara kronologis".</p>
																			 </div>
																				<div class="modal-footer">
																				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
																				 
																				</div>
																			</div>
																			</div>
																		</div>
																	</h4>
																</div>
																<div id="keahlian" class="panel-collapse collapse">
																	<div class="panel-body">
																		Konten Keahlian Anda di sini.
																	</div>
																</div>
															</div>
															<div class="panel panel-default">
																<div class="panel-heading">
																	<h4 class="panel-title">
																		<a data-toggle="collapse" data-parent="#accordion" href="#bahasa">
																			BAHASA
																		</a>
																		<a href="#" style="float: right;"   data-toggle="modal" data-target="#bahasaModal">Baca Tips !</a> 
																		 
																		
																		<!-- Modal -->
																		<div class="modal fade" id="bahasaModal" tabindex="-1" role="dialog" aria-labelledby="bahasaModalLabel" aria-hidden="true">
																			<div class="modal-dialog" role="document">
																			<div class="modal-content">
																				<div class="modal-header">
																				 
																				</div>
																				<div class="modal-body">
																					<h5>Tips</h5>
																					<p>1.Gunakan posisi kerja yang tepat untuk lowongan kerja yang dilamar. Misalnya, "Penjual" sebaiknya ditulis "Account Manager".</p>
																					<p>2.Deskripsikan tugas, tanggung jawab, dan kompetensi yang Anda kembangkan sejelas mungkin.</p>
																					<p>3.Lihatlah apa yang dicari oleh perusahaan. Susunlah konten dengan mempertimbangkan kebutuhan perusahaan, dan lengkapi dengan pengalaman Anda.</p>
																					<p>4.Jika Anda punya pengalaman kerja, hanya sebutkan tugas dan tanggung jawab yang relevan dengan lowongan kerja yang dilamar.</p>
																					<p>5.Mengurutkan item secara kronologis? Klik ikon roda gigi di kanan atas bagian dan pilih "urutkan secara kronologis".</p>
																			 </div>
																				<div class="modal-footer">
																				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
																				 
																				</div>
																			</div>
																			</div>
																		</div>
																	</h4>
																</div>
																<div id="bahasa" class="panel-collapse collapse">
																	<div class="panel-body">
																		Konten Bahasa Anda di sini.
																	</div>
																</div>
															</div>
															<div class="panel panel-default">
																<div class="panel-heading">
																	<h4 class="panel-title">
																		<a data-toggle="collapse" data-parent="#accordion" href="#lainnya">
																			LAINNYA
																		</a>
																	</h4>
																</div>
																<div id="lainnya" class="panel-collapse collapse">
																	<div class="panel-body">
																		Konten Lainnya Anda di sini.
																	</div>
																</div>
															</div>
														</div>
														
														<!-- Add more sections as needed -->
													</div>
												</div>
												
												
		                                    </div>
		                                </div>
		                            </div>


									
		                            <div class="tab-pane" id="address">
		                                <div class="row">
											<div class="col-sm-12">
		                                    
												<div class="m-2">

													
													 
											
											        
											<?php ?>
											@foreach ($portofolios as $p)
											
											<div class="col-sm-4">
											  <img src="/upload/{{ $p->gambar}}"style="max-width: 100%; height: auto;">
											</div>
								
											<?php ?>
											@endforeach

												</div>
														
														
											</div>

		                                    
 
		                                </div>
		                            </div>
		                        </div>
		                        <div class="wizard-footer">
		                            <div class="pull-right">
		                                <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Next' />
		                                <input type='submit' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Finish' />
		                            </div>

		                            <div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	        </div><!-- end row -->
	    </div> <!--  big container -->

	    <div class="footer">
	        <div class="container text-center">
	             Made with <i class="fa fa-heart heart"></i> by <a href="">Astacode</a>
	        </div>
	    </div>
	</div>








 

</body>
	<!--   Core JS Files   -->
    <script src="{{ asset('themplete/regist')}}/assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="{{ asset('themplete/regist')}}/assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="{{ asset('themplete/regist')}}/assets/js/jquery.bootstrap.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="{{ asset('themplete/regist')}}/assets/js/material-bootstrap-wizard.js"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="{{ asset('themplete/regist')}}/assets/js/jquery.validate.min.js"></script>

	<!-- Add these scripts before </body> -->
	<script>
		tinymce.init({
		  selector: 'textarea',
		  plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
		  toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
		  tinycomments_mode: 'embedded',
		  tinycomments_author: 'Author name',
		  mergetags_list: [
			{ value: 'First.Name', title: 'First Name' },
			{ value: 'Email', title: 'Email' },
		  ],
		  ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
		});
	  </script>

<script>
    $(document).ready(function () {
        // Menggabungkan nama_awal dan nama_akhir saat pengguna mengetik
        $('input[name="nama_awal"], input[name="nama_akhir"]').on('input', function () {
            var namaAwal = $('input[name="nama_awal"]').val();
            var namaAkhir = $('input[name="nama_akhir"]').val();
            var namaLengkap = namaAwal + ' ' + namaAkhir;
            $('#nama_lengkap').val(namaLengkap);
        });
    });
</script>

<script>
	$(document).ready(function() {
		// Ambil kode otomatis dari controller saat halaman dimuat
		$.get('/generate-kode-transaksi', function(data) {
			$('#kode_transaksi').val(data.kode_transaksi);
		});
	});
	</script>











	  
	  
</html>
