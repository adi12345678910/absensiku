

<?php foreach ($q_rekap_absen_by->result() as $row): ?>

<section class="content">
    <div class="container-fluid">

        <?php echo $alert; ?>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2>
                        <?php echo $title_page; ?> TANGGAL <?php echo strtoupper(tgl_in($row->absen_date)); ?>
                        

                            <div class="row pull-right">
                                <div class="col-md-12">
                                    <?php if ($template_show_lembaga == 12): ?>
                                        <?php if ($template_show_role == 1): ?>
                                           <button type="button" class="btn btn-info waves-effect " data-toggle="modal" data-target="#smallModal">EDIT</button> 
                                        <?php endif ?>
                                    <?php endif ?>

                                    <?php if ($template_show_lembaga == 4): ?>
                                        <?php if ($template_show_role == 3 OR $template_show_role == 4): ?>
                                            <button type="button" class="btn btn-info waves-effect " data-toggle="modal" data-target="#smallModal">EDIT</button>
                                        <?php endif ?>
                                    <?php endif ?>

                                    
                                </div>
                            </div>
   
                        </h2>
                    </div>

                    <div class="body">
                        <p>Nama : <?php echo ucwords(strtolower($row->user_name)); ?> (<?php echo ucwords($row->lembaga_name); ?>)</p>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <table class="table table-bordered font-12">
                                    <tr>
                                        <th colspan="2">Masuk</th>
                                    </tr> 

                                    <tr>
                                        <td>Waktu</td>
                                        <td><?php echo date('H:i', strtotime($row->absen_masuk)); ?></td>
                                    </tr> 
                                    
                                    <?php if ($row->absen_masuk_os != 'Android' AND $row->absen_masuk_os != 'iOS' AND $row->absen_masuk_os != 'Unknown Platform' AND $row->absen_masuk_os != 'Windows Phone'): ?>
                                        <tr>
                                            <td>Personal Computer</td>
                                            <td><?php echo $row->absen_masuk_pc; ?></td>
                                        </tr>         
                                    <?php endif ?>

                                    <tr>
                                        <td>Operasi System</td>
                                        <td><?php echo $row->absen_masuk_os; ?></td>
                                    </tr> 

                                    <tr>
                                        <td>IP Address</td>
                                        <td><?php echo $row->absen_masuk_ip; ?></td>
                                    </tr> 

                                    <tr>
                                        <td>Browser</td>
                                        <td><?php echo $row->absen_masuk_browser; ?></td>
                                    </tr> 

                                    <tr>
                                        <td>Lokasi</td>
                                        <td>
                                            <?php
                                                if (empty($row->absen_masuk_lokasi)) 
                                                {
                                                    echo "Tidak Diketahui";
                                                }
                                                else
                                                {
                                                    echo $row->absen_masuk_lokasi;
                                                }  
                                            ?>    
                                        </td>
                                    </tr> 

                                    <tr>
                                        <td>Point</td>
                                        <td><?php echo $row->absen_masuk_poin; ?></td>
                                    </tr> 

                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            <?php 
                                                if (!empty($status_masuk)) 
                                                {
                                                    echo ucwords($status_masuk);
                                                }
                                            ?>
                                        </td>
                                    </tr>  
                                    
                                  
                                    <tr>
                                        <td>Status Absen</td>
                                        <td>
                                            <?php
                                                if ($row->jarak > 50) 
                                                {
                                                    echo "<div class='badge bg-red'>Berada di luar radius";
                                                }
                                                else
                                                {
                                                    echo "<div class='badge bg-green'>berada di dalam radius";
                                                }  
                                            ?>    
                                        </td>
                                        <?php if ($template_show_role == 1 || $template_show_role == 4): ?>
                                        <td>
                                            <?php echo anchor('rekap_absen/edit/'.$row->absen_id, '<i class="material-icons">border_color</i>', array('class' => 'btn btn-warning')); ?>

                                        </td>
                                        <?php endif ?>
                                    </tr> 
                                
                                    <tr>
                                        <td>Foto</td>
                                        <td>
                                            <img class="img-responsive thumbnail image-bukti" src="<?php echo base_url('assets/images/absen/masuk/'.$row->image); ?>">
                                        </td>

                                    </tr>  

                                    <tr>
                                        <td>Maps</td>
                                        <td>
                                            <?php 
                                            if (empty($row->lat && $row->long)) 
                                                {
                                                    echo "Tidak Diketahui";
                                                }
                                            ?>
                                        <div id="map" style="width:100%;height:380px; z-index: 3"></div>

                                        </td>
                                    </tr>  
                                    
                                </table>
                                <script>
                                    // Fungsi initialize : untuk mengatur properti Google Maps

                                    //wilayah bandung tracker
                                    var map = L.map('map').setView([-6.9230447, 107.7494662], 15);
                                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                        maxZoom: 19,
                                        attribution: '© OpenStreetMap'
                                    }).addTo(map);

                                    //tempat users absen
                                    var marker = L.marker([<?php echo $row->lat; ?>, <?php echo $row->long; ?>]).addTo(map);

                                    //titik akeno
                                    var circle = L.circle([-6.9230447, 107.7494662], {
                                        color: 'green',
                                        fillColor: 'green',
                                        fillOpacity: 0.5,
                                        radius: 50
                                    }).addTo(map);

                                    var polygon = L.polygon([
                                        [51.509, -0.08],
                                        [51.503, -0.06],
                                        [51.51, -0.047]
                                    ]).addTo(map);
                                </script>


                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                <?php if (!empty($row->absen_pulang)): ?>
                                        <table class="table table-bordered font-12">
                                        <tr>
                                            <th colspan="2">Pulang</th>
                                        </tr> 

                                        <tr>
                                            <td>Waktu</td>
                                            <td><?php echo date('H:i', strtotime($row->absen_pulang)); ?></td>
                                        </tr> 
                                        
                                        <?php if ($row->absen_pulang_os != 'Android' AND $row->absen_pulang_os != 'iOS' AND $row->absen_pulang_os != 'Unknown Platform' AND $row->absen_pulang_os != 'Windows Phone'): ?>
                                            <tr>
                                                <td>Personal Computer</td>
                                                <td><?php echo $row->absen_pulang_pc; ?></td>
                                            </tr>         
                                        <?php endif ?>

                                        <tr>
                                            <td>Operasi System</td>
                                            <td><?php echo $row->absen_pulang_os; ?></td>
                                        </tr> 

                                        <tr>
                                            <td>IP Address</td>
                                            <td><?php echo $row->absen_pulang_ip; ?></td>
                                        </tr> 

                                        <tr>
                                            <td>Browser</td>
                                            <td><?php echo $row->absen_pulang_browser; ?></td>
                                        </tr> 

                                        <tr>
                                            <td>Lokasi</td>
                                            <td>
                                                <?php
                                                    if (empty($row->absen_pulang_lokasi)) 
                                                    {
                                                        echo "Tidak Diketahui";
                                                    }
                                                    else
                                                    {
                                                        echo $row->absen_pulang_lokasi;
                                                    }  
                                                ?>    
                                            </td>
                                        </tr> 

                                        <tr>
                                            <td>Point</td>
                                            <td><?php echo $row->absen_pulang_poin; ?></td>
                                        </tr> 

                                        <tr>
                                            <td>Status</td>
                                            <td>
                                                <?php 
                                                    if (!empty($status_pulang)) 
                                                    {
                                                        echo ucwords($status_pulang);
                                                    }
                                                ?>
                                            </td>
                                        </tr>  
                                       
                                    <tr>
                                        <td>Status Absen</td>
                                        <td>
                                            <?php
                                                if ($row->jarak_ > 50) 
                                                {
                                                    echo "<div class='badge bg-red'>Berada di luar radius";
                                                }
                                                else
                                                {
                                                    echo "<div class='badge bg-green'>Berada di dalam radius";
                                                }  
                                            ?>    
                                        </td>
                                        <?php if ($template_show_role == 1 || $template_show_role == 4): ?>

                                        <td>
                                            <?php echo anchor('rekap_absen/edit_pulang/'.$row->absen_id, '<i class="material-icons">border_color</i>', array('class' => 'btn btn-warning')); ?>
                                        </td>
                                        <?php endif ?>
                                    </tr> 
                                   

                                        <tr>
                                            <td>Foto</td>
                                            <td>
                                                <img class="img-responsive thumbnail image-bukti" src="<?php echo base_url('assets/images/absen/pulang/'.$row->image_pulang); ?>">
                                            </td>

                                        </tr> 


                                        <tr>
                                            <td>Maps</td>
                                            <td>
                                                <?php 
                                                if (empty($row->lat_ && $row->long_)) 
                                                    {
                                                        echo "Tidak Diketahui";
                                                    }
                                                ?>
                                                <div id="maps" style="width:100%;height:380px; z-index: 3"></div>
                                            </td>
                                        </tr>  

                                       

                                    </table> 

                                    <script>
                                        // Fungsi initialize : untuk mengatur properti Google Maps

                                        //wilayah bandung tracker
                                        var maps = L.map('maps').setView([-6.9230447, 107.7494662], 15);
                                        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                            maxZoom: 19,
                                            attribution: '© OpenStreetMap'
                                        }).addTo(maps);

                                        //tempat users absen
                                        var marker = L.marker([<?php echo $row->lat_; ?>, <?php echo $row->long_; ?>]).addTo(maps);

                                        //titik akeno
                                        var circle = L.circle([-6.9230447, 107.7494662], {
                                            color: 'green',
                                            fillColor: 'green',
                                            fillOpacity: 0.5,
                                            radius: 50
                                        }).addTo(maps);

                                        var polygon = L.polygon([
                                            [51.509, -0.08],
                                            [51.503, -0.06],
                                            [51.51, -0.047]
                                        ]).addTo(maps);
                                    </script>


                                    <?php endif ?>
                            </div>
                        </div>
                                    <button type="button" class="btn bg-grey btn-sm waves-effec" style="margin-bottom: 15px;" onclick="javascript:history.back()"><span ></span> KEMBALI</button>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
  
    </div>

    
</section>

 

 <!-- Small Size -->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content demo-masked-input">

            <div class="modal-header">
                <h4 class="modal-title" id="smallModalLabel">Edit Absen</h4>
            </div>

            <?php echo form_open('rekap_absen/update_time'); ?>
                <div class="modal-body demo-masked-input">

                    <input type="hidden" name="absen_id" value="<?php echo $row->absen_id; ?>">
                    <input type="hidden" name="absen_user" value="<?php echo $row->absen_user; ?>">

                    <div class="row">
                        <div class="col-md-6">
                            <label>Jam Masuk</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">access_time</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" name="absen_masuk" class="timepicker form-control time24-costum" value="<?php echo $row->absen_masuk; ?>" placeholder="Ex: 23:59">
                                </div>
                            </div> 
                        </div>

                        <div class="col-md-6">
                           <?php if (!empty($row->absen_pulang)): ?>
                                <label>Jam Pulang</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">access_time</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" name="absen_pulang"  class="timepicker form-control time24-costum" value="<?php echo $row->absen_pulang; ?>" placeholder="Ex: 23:59">
                                    </div>
                                </div>
                            <?php else: ?>
                                <input type="checkbox" id="basic_checkbox_2" class="filled-in ceklis-ubah-jam-pulang" />
                                <label for="basic_checkbox_2">Jam Pulang</label>

                                <div class="row">
                                    <div class="col-md-12 collapse edit-jam-pulang">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">access_time</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="absen_pulang"  class="timepicker form-control time24-costum" value="<?php echo $row->absen_pulang; ?>" placeholder="Ex: 23:59">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                              
                            <?php endif ?> 
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer" style="text-align: center;">
                    <button type="submit" class="btn btn-primary waves-effect">SIMPAN</button>
                    <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">BATAL</button>
                </div>
            </form>

        </div>
    </div>
</div>

<?php endforeach ?>