// owl-carousel
$(document).ready(function(){
    $('.home .owl-carousel').owlCarousel({
        autoplay: true,
        nav: true,
        loop: true,
        dots: true,
        inifinite: true,
        speed: 4000,
        autoplaySpeed: 2500,
        slideToShow: 1,
        items: 1,
        navText: [
            "<i class='fas fa-angle left'></i>",
            "<i class='fas fa-angle right'></i>"
        ],
        navContainer: "#owl-nav"
    });
});

// detail produk
$(document).ready(function(){
    $('.detail-produk .owl-carousel').owlCarousel({
        nav: true,
        loop: true,
        dots: true,
        inifinite: true,
        speed: 4000,
        slideToShow: 1,
        items: 1,
        navText: [
            "<i class='fas fa-angle left'></i>",
            "<i class='fas fa-angle right'></i>"
        ],
        navContainer: "#owl-nav"
    });
});

//raja-ongkir
$(document).ready(function(){
    $.ajax({
        url: 'data_provinsi.php',
        type: 'post',
        success: function (data_provinsi){
            $("select[name=provinsi]").html(data_provinsi);
        }
    });

    $("select[name=provinsi]").on("change",function(){

    var id_provinsi = $("option:selected", this).attr('id_provinsi');

    $.ajax({
        url: 'data_distrik.php',
        type: 'post',
        data: 'id_provinsi='+id_provinsi,
        success: function (data_distrik){
            $("select[name=distrik]").html(data_distrik);
        }
    });
    });

    $.ajax({
        url: 'data_ekspedisi.php',
        type: 'post',
        success: function (data_ekspedisi){
            $("select[name=ekspedisi]").html(data_ekspedisi);
        }
    });

   $("select[name=ekspedisi]").on("change",function(){

    var nama_ekspedisi = $("select[name=ekspedisi]").val();
    var datadistrik = $("option:selected", "select[name=distrik]").attr('id_distrik');
    var total_berat = $("input[name=total_berat]").val();
    $.ajax({
        url: 'data_paket.php',
        type: 'post',
        data: 'ekspedisi='+nama_ekspedisi+'&distrik='+datadistrik+'&berat='+total_berat,
        success: function(data_paket){
            $("select[name=paket]").html(data_paket);
            $("input[name=nama_ekspedisi]").val(nama_ekspedisi);
        }
    });

   });

   $("select[name=distrik]").on("change",function(){

    var prov = $("option:selected",this).attr('nama_provinsi');
    var dist = $("option:selected",this).attr('nama_distrik');
    var type = $("option:selected",this).attr('type_distrik');
    var pos = $("option:selected",this).attr('kode_pos');
    $("input[name=nama_provinsi]").val(prov);
    $("input[name=nama_distrik]").val(dist);
    $("input[name=type_distrik]").val(type);
    $("input[name=kode_pos]").val(pos);

   });

   $("select[name=paket]").on("change",function(){

    var paket = $("option:selected",this).attr('paket');
    var ongkir = $("option:selected",this).attr('ongkir');
    var etd = $("option:selected",this).attr('etd');
    $("input[name=paket]").val(paket);
    $("input[name=ongkir]").val(ongkir);
    $("input[name=estimasi]").val(etd);

   });

});
