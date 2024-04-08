<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>MaubikinCV</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- custom css -->
        <link rel="stylesheet" href="{{ asset('themplete/register')}}/assets/css/main.css">
    </head>
    <body>
        <nav class = "navbar bg-white">
            <div class="container">
                <div class = "navbar-content">
                    <div class = "brand-and-toggler">
                        <a href = "/" class = "navbar-brand">
                            <img src="{{ asset('themplete/register')}}/assets/images/curriculum-vitae.png" alt = "" class = "navbar-brand-icon">
                            <span class = "navbar-brand-text">maubikin <span>CV.</span>
                        </a>
                        <button type = "button" class = "navbar-toggler-btn">
                            <div class = "bars">
                                <div class = "bar"></div>
                                <div class = "bar"></div>
                                <div class = "bar"></div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <section id = "about-sc" class = "">
            <div class = "container">
                <div class = "about-cnt">
                    <form action="" class="cv-form" id = "cv-form">
                        <div class = "cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>DATA PRIBADI</h3>
                            </div>
                            <div class = "cv-form-row cv-form-row-about">
                                <div class = "cols-3">
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Nama Awal</label>
                                        <input name = "nama_awal" type = "text" class = "form-control nama_awal" id = "" onkeyup="generateCV()" placeholder="contoh: Muhammad">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Nama Akhir</label>
                                        <input name = "nama_akhir" type = "text" class = "form-control nama_akhir" id = "" onkeyup="generateCV()" placeholder="contoh: Rafi Heryadi">
                                        <span class="form-text"></span>
                                    </div>
                                </div>

                                <div class="cols-3">
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Poto</label>
                                        <input name = "image" type = "file" class = "form-control image" id = "" accept = "image/*" onchange="previewImage()">
                                    </div>
                                    
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Email</label>
                                        <input name = "email" type = "text" class = "form-control email" id = "" onkeyup="generateCV()" placeholder="contoh: rafi@gmail.com">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">No Telp/WA:</label>
                                        <input name = "no_telp" type = "text" class = "form-control no_telp" id = "" onkeyup="generateCV()" placeholder="contoh: 085320555394">
                                        <span class="form-text"></span>
                                    </div>
                                </div>

                                <div class = "cols-3">
                                    
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Alamat</label>
                                        <input name = "alamat" type = "text" class = "form-control alamat" id = "" onkeyup="generateCV()" placeholder="contoh: Jl. Tajur Indah No 121">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Kode Pos</label>
                                        <input name = "kode_pos" type = "text" class = "form-control kode_pos" id = "" onkeyup="generateCV()" placeholder="contoh: 48113">
                                        <span class="form-text"></span>
                                    </div>

                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Kota</label>
                                        <input name = "kota" type = "text" class = "form-control kota" id = "" onkeyup="generateCV()" placeholder="contoh: Tasikmalaya">
                                        <span class="form-text"></span>
                                    </div>
                                </div>

                                <div class = "cols-3">
                                    
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Tanggal</label>
                                        <input name = "tanggal_lahir" type = "number" class = "form-control tanggal_lahir" id = "" onkeyup="generateCV()" placeholder="contoh: 28">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Bulan</label>
                                        <input name = "bulan_lahir" type = "number" class = "form-control bulan_lahir" id = "" onkeyup="generateCV()" placeholder="contoh: 12">
                                        <span class="form-text"></span>
                                    </div>

                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Tahun</label>
                                        <input name = "tahun_lahir" type = "number" class = "form-control tahun_lahir" id = "" onkeyup="generateCV()" placeholder="contoh: 1994">
                                        <span class="form-text"></span>
                                    </div>
                                </div>
                                <div class = "cols-3">
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Tempat Lahir</label>
                                        <input name = "tempat_lahir" type = "text" class = "form-control tempat_lahir" id = "" onkeyup="generateCV()" placeholder="contoh: Tasikmalaya">
                                        <span class="form-text"></span>
                                    </div>
                                   <div class = "form-elem">
                                        <label for = "" class = "form-label">Jenis Kelamin</label>
                                        <input name = "jenis_kelamin" type = "text" class = "form-control jenis_kelamin" id = "" onkeyup="generateCV()" placeholder="contoh: Laki-laki/Perempuan">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">SIM</label>
                                        <input name = "sim" type = "text" class = "form-control sim" id = "" onkeyup="generateCV()" placeholder="contoh: 234325434665">
                                        <span class="form-text"></span>
                                    </div>
                                </div>

                                <div class = "cols-3">
                                    
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Kebangsaan</label>
                                        <input name = "kebangsaan" type = "text" class = "form-control kebangsaan" id = "" onkeyup="generateCV()" placeholder="contoh: Indonesia">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Status Pernikahan</label>
                                        <input name = "status_pernikahan" type = "text" class = "form-control status_pernikahan" id = "" onkeyup="generateCV()" placeholder="contoh: Sudah Kawin/Belum Kawin/Janda/Duda">
                                        <span class="form-text"></span>
                                    </div>

                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Linkedln</label>
                                        <input name = "linkedln" type = "text" class = "form-control linkedln" id = "" onkeyup="generateCV()" placeholder="contoh: mrafiheryadi">
                                        <span class="form-text"></span>
                                    </div>
                                </div>

                                <div class = "cols-3">
                                    
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Website</label>
                                        <input name = "website" type = "text" class = "form-control website" id = "" onkeyup="generateCV()" placeholder="contoh: www.astacode.id">
                                        <span class="form-text"></span>
                                    </div>
                                     
                                </div>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>achievements</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-a">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-achievement">
                                            <div class = "cols-2">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Title</label>
                                                    <input name = "achieve_title" type = "text" class = "form-control achieve_title" id = "" onkeyup="generateCV()" placeholder="contoh: johndoe@gmail.com">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Description</label>
                                                    <input name = "achieve_description" type = "text" class = "form-control achieve_description" id = "" onkeyup="generateCV()" placeholder="contoh: johndoe@gmail.com">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>experience</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-b">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-experience">
                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Title</label>
                                                    <input name = "exp_title" type = "text" class = "form-control exp_title" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Company / Organization</label>
                                                    <input name = "exp_organization" type = "text" class = "form-control exp_organization" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Location</label>
                                                    <input name = "exp_location" type = "text" class = "form-control exp_location" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>

                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Start Date</label>
                                                    <input name = "exp_start_date" type = "date" class = "form-control exp_start_date" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">End Date</label>
                                                    <input name = "exp_end_date" type = "date" class = "form-control exp_end_date" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Description</label>
                                                    <input name = "exp_description" type = "text" class = "form-control exp_description" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>

                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>education</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-c">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-experience">
                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">School</label>
                                                    <input name = "edu_school" type = "text" class = "form-control edu_school" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Degree</label>
                                                    <input name = "edu_degree" type = "text" class = "form-control edu_degree" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">City</label>
                                                    <input name = "edu_city" type = "text" class = "form-control edu_city" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>

                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Start Date</label>
                                                    <input name = "edu_start_date" type = "date" class = "form-control edu_start_date" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">End Date</label>
                                                    <input name = "edu_graduation_date" type = "date" class = "form-control edu_graduation_date" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Description</label>
                                                    <input name = "edu_description" type = "text" class = "form-control edu_description" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>

                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>projects</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-d">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-experience">
                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Project Name</label>
                                                    <input name = "proj_title" type = "text" class = "form-control proj_title" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Project link</label>
                                                    <input name = "proj_link" type = "text" class = "form-control proj_link" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Description</label>
                                                    <input name = "proj_description" type = "text" class = "form-control proj_description" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>skills</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-e">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-skills">
                                            <div class = "form-elem">
                                                <label for = "" class = "form-label">Skill</label>
                                                <input name = "skill" type = "text" class = "form-control skill" id = "" onkeyup="generateCV()">
                                                <span class="form-text"></span>
                                            </div>
                                            
                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section id = "preview-sc" class = "print_area">
            <div class = "container">
                <div class = "preview-cnt">
                    <div class = "preview-cnt-l bg-green text-white">
                        <div class = "preview-blk">
                            <div class = "preview-image">
                                <img src = "" alt = "" id = "image_dsp"> 
                            </div>
                            <div class = "preview-item preview-item-name">
                                <span class = "preview-item-val fw-6" id = "fullname_dsp"></span>
                            </div>
                            <div class = "preview-item">
                                <span class = "preview-item-val text-uppercase fw-6 ls-1" id = "alamat_dsp"></span> 
                            </div>
                            <div class = "preview-item">
                                <span class = "preview-item-val text-uppercase fw-6 ls-1" id = "kode_pos_dsp"></span> 
                            </div>
                            <div class = "preview-item">
                                <span class = "preview-item-val text-uppercase fw-6 ls-1" id = "kota_dsp"></span> 
                            </div>
                        </div>

                        <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>Data Pribadi</h3>
                            </div>
                            <div class = "preview-blk-list">
                                <div class = "preview-item">
                                    <span class = "preview-item-val" id = "no_telp_dsp"></span>
                                </div>
                                <div class = "preview-item">
                                    <span class = "preview-item-val" id = "email_dsp"></span>
                                </div>
                                <div class = "preview-item">
                                    <span class = "preview-item-val" id = "tanggal_lahir_dsp"></span> - <span class = "preview-item-val" id = "bulan_lahir_dsp"></span> -    <span class = "preview-item-val" id = "tahun_lahir_dsp"></span> 
                                </div>
                             
                                <div class = "preview-item">
                                    <span class = "preview-item-val" id = "tempat_lahir_dsp"></span>
                                </div>
                               <div class = "preview-item">
                                    <span class = "preview-item-val" id = "jenis_kelamin_dsp"></span>
                                </div>
                                <div class = "preview-item">
                                    <span class = "preview-item-val" id = "sim_dsp"></span>
                                </div>
                                <div class = "preview-item">
                                    <span class = "preview-item-val" id = "kebangsaan_dsp"></span>
                                </div>
                                <div class = "preview-item">
                                    <span class = "preview-item-val" id = "status_pernikahan_dsp"></span>
                                </div>
                                <div class = "preview-item">
                                    <span class = "preview-item-val" id = "linkedln_dsp"></span>
                                </div>
                                <div class = "preview-item">
                                    <span class = "preview-item-val" id = "website_dsp"></span>
                                </div>
                            </div>
                        </div>

                        <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>skills</h3>
                            </div>
                            <div class = "skills-items preview-blk-list" id = "skills_dsp">
                                <!-- skills list here -->
                            </div>
                        </div>
                    </div>

                    <div class = "preview-cnt-r bg-white">
                        <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>Achievements</h3>
                            </div>
                            <div class = "achievements-items preview-blk-list" id = "achievements_dsp"></div>
                        </div>

                        <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>educations</h3>
                            </div>
                            <div class = "educations-items preview-blk-list" id = "educations_dsp"></div>
                        </div>

                        <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>experiences</h3>
                            </div>
                            <div class = "experiences-items preview-blk-list" id = "experiences_dsp"></div>
                        </div>

                        <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>projects</h3>
                            </div>
                            <div class = "projects-items preview-blk-list" id = "projects_dsp"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class = "print-btn-sc">
            <div class = "container">
                <button type = "button" class = "print-btn btn btn-primary" onclick="printCV()">Print CV</button>
            </div>
        </section>


        

        <!-- jquery cdn -->
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <!-- jquery repeater cdn -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js" integrity="sha512-bZAXvpVfp1+9AUHQzekEZaXclsgSlAeEnMJ6LfFAvjqYUVZfcuVXeQoN5LhD7Uw0Jy4NCY9q3kbdEXbwhZUmUQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- custom js -->
        <script src="{{ asset('themplete/register')}}/assets/js/script.js"></script>
        <!-- app js -->
        <script src="{{ asset('themplete/register')}}/assets/js/app.js"></script>
    </body>
</html>