$(document).ready(function() {

    $('.sp_single').on('click', function() {
        $('.sp_nikah_date').hide();
    });

    $('.sp_menikah').on('click', function() {
        $('.sp_nikah_date').show();
        $('.sp_nikah_date_tgl').attr("required", "true");
    });

    $('.sp_cerai').on('click', function() {
        $('.sp_nikah_date').show();
        $('.sp_nikah_date_tgl').attr("required", "true");
    });

    $('.buttoneditProfile').on('click', function() {
    	$('.detailProfile').hide();
    	$('.editProfile').show();
        $('.editAlamatDiBandung').hide();
        $('.editAlamatLuarBandung').hide();
        $('.editPassword').hide();
        $('.header-profile').html('Edit Data Personal');
    });

    $('.buttoneditAlamatDiBandung').on('click', function() {
        $('.detailProfile').hide();
        $('.editProfile').hide();
 
        $('.editAlamatDiBandung').show();
        $('.editAlamatLuarBandung').hide();
        $('.editPassword').hide();
        $('.header-profile').html('Edit Alamat Di Bandung');
    });

    $('.buttoneditAlamatLuarBandung').on('click', function() {
        $('.detailProfile').hide();
        $('.editProfile').hide();
        $('.editAlamatDiBandung').hide();
        $('.editAlamatLuarBandung').show();
        $('.editPassword').hide();
        $('.header-profile').html('Edit Alamat Luar Bandung');
    }); 



    $('.buttonEditPassword').on('click', function() {
        $('.detailProfile').hide();
        $('.editAlamatDiBandung').hide();
        $('.editAlamatLuarBandung').hide();
        $('.editProfile').hide();
        $('.header-profile').html('Edit Password');

    	$('.editPassword').show();
    });

    $('.editImage').on('click', function() {
    	$('.editImage').hide();
    	$('.updateImage').show();
    });

      $('.batalImage').on('click', function() {
    	$('.editImage').show();
    	$('.updateImage').hide();
    });

    $('.buttoncalcelIdentitas').on('click', function() {
        $('.detailProfile').show();

        $('.editProfile').hide();
        $('.editAlamatDiBandung').hide();
        $('.editAlamatLuarBandung').hide();
        $('.editPassword').hide();

        $('.header-profile').html('Data Personal Pegawai');

        
    }); 


});