<style type="text/css">
    #imap { border:0px;border-radius: 5px;}
    .form-control {width:100%}
    #right-form {padding-right: 20px; }
    h3.head {font-weight: bold;margin-left:5px}
</style>
<script style="text/javascript">
    var markers = new Array();
    var locations = new Array();
    var map;
    var icons = '<?php echo $icons; ?>';

    function initMap() {
        var myOptions = {
            center: { lat: -6.860162, lng: 115.285652 },
            scrollwheel: false,
            zoom:16,
            mapTypeId: 'satellite'
        };
        map = new google.maps.Map(document.getElementById("imap"),
            myOptions);
        $("body").on("change","#kec",function(){
            var kecamatan = $("option:selected",$("#kec")).val();
            $.ajax({
                url: "<?php echo my_url();?>home/filter_kelurahan",
                type: 'POST',
                dataType:'html',
                data: {
                    kecamatan:kecamatan
                },
                success: function(options) {
                    $("#kel").html(options);
                },
                error: function(xhr, textStatus, ThrownException){
                    showAlerts('error',textStatus);
                }
            });
            return false;
        });

        var setUnitLayananDdl = function(data){
            var opt = '<option value="">Pilih Unit Layanan</option>';
            $.each(data, function(i, item) {
                opt += '<option value="'+item[4]+'">'+item[7]+'</option>';
            });
            $("#unit").html(opt);
        }

        $("body").on("change","#kel",function(){
            var kelurahan = $("option:selected",$("#kel")).val();
            var kecamatan = $("option:selected",$("#kec")).val();
            $.ajax({
                url: "<?php echo my_url();?>home/filter_distribusi",
                type: 'POST',
                dataType:'json',
                data: {
                    kelurahan:kelurahan,kecamatan:kecamatan
                },
                success: function(json) {
                    setUnitLayananDdl(json);
                    removeMarkers(map,locations);
                    locations = json;
                    setMarkers(map,locations);
                },
                error: function(xhr, textStatus, ThrownException){
                    showAlerts('error',textStatus);
                }
            });
            return false;
        });

        $("body").on("change","#layanan",function(){
            if($("option:selected",$("#kel")).val() == ''){
                return false;
            }
            var kelurahan = $("option:selected",$("#kel")).val();
            var kecamatan = $("option:selected",$("#kec")).val();
            var layanan = $("option:selected",$("#layanan")).val();
            $.ajax({
                url: "<?php echo my_url();?>home/filter_distribusi_bylayanan",
                type: 'POST',
                dataType:'json',
                data: {
                    kelurahan:kelurahan,kecamatan:kecamatan,layanan:layanan
                },
                success: function(json) {
                    setUnitLayananDdl(json);
                    removeMarkers(map,locations);
                    locations = json;
                    setMarkers(map,locations);
                },
                error: function(xhr, textStatus, ThrownException){
                    showAlerts('error',textStatus);
                }
            });
            return false;
        });

        $("body").on("change","#unit",function(){
            if($("option:selected",$("#kel")).val() == ''){
                return false;
            }
            var kelurahan = $("option:selected",$("#kel")).val();
            var kecamatan = $("option:selected",$("#kec")).val();
            var unitlayanan = $("option:selected",$("#unit")).val();
            $.ajax({
                url: "<?php echo my_url();?>home/filter_distribusi_byunitlayanan",
                type: 'POST',
                dataType:'json',
                data: {
                    kelurahan:kelurahan,kecamatan:kecamatan,unitlayanan:unitlayanan
                },
                success: function(json) {
                    console.log(locations);
                    removeMarkers(map,locations);
                    locations = json;
                    setMarkers(map,locations);
                },
                error: function(xhr, textStatus, ThrownException){
                    showAlerts('error',textStatus);
                }
            });
            return false;
        });

        var soptions = {
            url: function(phrase) {
                return "<?php echo my_url();?>home/search_distribusi";
            },
            getValue: function(element) {
                return element.name ;
            },
            ajaxSettings: {
                dataType: "json",
                method: "POST",
                data: {
                    dataType: "json"
                }
            },
            list: {
                onClickEvent: function() {
                    var value = $("#ajax-search").getSelectedItemData().id;
                    $.ajax({
                        url: "<?php echo my_url();?>home/distribusi",
                        type: 'POST',
                        dataType:'json',
                        data: {
                            id:value
                        },
                        success: function(json) {
                            console.log(locations);
                            removeMarkers(map,locations);
                            locations = json;
                            setMarkers(map,locations);
                        },
                        error: function(xhr, textStatus, ThrownException){
                            showAlerts('error',textStatus);
                        }
                    });
                }
            },
            preparePostData: function(data) {
                data.phrase = $("#ajax-search").val();
                return data;
            },
            requestDelay: 400
        };
        $("#ajax-search").easyAutocomplete(soptions);

    }

    function setMarkers(map, location) {
        var marker,i;
        for (i = 0; i < location.length; i++) {
            var jenis = location[i][0];
            var lat = location[i][1];
            var long = location[i][2];
            var ket = location[i][3];
            var id = location[i][4];
            var kel = location[i][6];
            var pel = location[i][7];
            var image = location[i][8];
            latlngset = new google.maps.LatLng(lat, long);
            marker = new google.maps.Marker({
                map: map,
                title: jenis,
                position: latlngset,
                icon: {
                    url: "<?php echo base_url();?>public/assets/img/icons/"+location[i][5]+".png",
                    scaledSize: new google.maps.Size(24, 24)
                }
            });
            map.setCenter(marker.getPosition());
            var imgUrl = "<?php echo base_url();?>public/uploads/layanan/"+image;
            var content = "<a href='"+imgUrl+"' target='_blank' style='border:0px'><img style='width:40%;float:left' src='"+imgUrl+"'></a>";
            content += "<div style='width:55%;float:right'><div><b>Kelurahan: " + kel +"</b></div><hr>";
            content += "<div>Jenis: " + jenis +"</div>";
            content += "<div>Pelayanan: " + pel+ "</div>";
            content += "<div>Keterangan: " + ket+ "</div> <br>";
            content += "<div>Koordinat: <br><b>" + lat+ "</b> <br> <b>"+long+"</b></div></div>";
            var infowindow = new google.maps.InfoWindow();
            google.maps.event.addListener(marker, 'click', (function (marker, content, infowindow) {
                return function () {
                    infowindow.setContent(content);
                    infowindow.open(map, marker);
                };
            })(marker, content, infowindow));
            markers[location[i][4]] = new Array();
            markers[location[i][4]] = marker;

        }
    }

    function removeMarkers(map,location) {
        for (i = 0; i < location.length; i++) {
            markers[location[i][4]].setMap(null);
        }
    }

</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDieZ7uAY4DPdT3Z4fp4KtykHl6dWryYdw&callback=initMap">
</script>
<div class="row">
    <div class="col col-md-9">
        <div id="imap" style="width: 100%; height: calc(100vh - 250px);"></div>
        <div style="width: 100%; height: 250px; margin-top: 10px">
            <div>Bagaimana Komentar Anda ?</div>
            <textarea class="form-control" id="comment-message"></textarea>
            <div>Nama</div>
            <input name="username" id="username" class="" />
            <a href="#" class="btn btn-sm btn-primary" style="margin-top: 5px" id="comment-submit">Submit</a>
            <h3>Lis Buku Tamu</h3>
            <div id="comments" style="margin-top: 10px; border-top: thin solid #ddd">
            <?php if(isset($comments)){ foreach($comments as $row) { ?>
                       <div> <?php echo $row->message;?> </div>
                       <div style="margin-bottom: 5px;"> <?php echo $row->datetime.' oleh '.$row->username;?> </div>
                   <?php }}?>
            </div>
        </div>
    </div>
    <div class="col col-md-3">
        <div class="row" id="right-form">
            <h4 class="head">Search</h4>
            <input type="text" class="form-control" id="ajax-search" name="search_map" placeholder="Search box"/>
            </div>

       <div class="row" id="right-form">
           <h4 class="head">Filter</h4>
           <div style="margin-bottom:3px">
               <select id="kec" name="kecamatan" class="form-control">
                   <option value="">Pilih Kecamatan</option>
                   <?php if(isset($kecamatan)){ foreach($kecamatan as $row) { ?>
                       <option value="<?php echo $row->kecamatan_id;?>"><?php echo $row->nama_kecamatan;?></option>
                   <?php }}?>
               </select>
           </div>
           <div style="margin-bottom:3px">
               <select id="kel" name="kelurahan" class="form-control">
                   <option value="">Pilih Kelurahan</option>
               </select>
           </div>
           <div style="margin-bottom:3px">
               <select id="layanan" name="layanan" class="form-control">
                   <option value="">Pilih Layanan</option>
                   <?php if(isset($sarana)){ foreach($sarana as $row) { ?>
                       <option value="<?php echo $row->pelayanan_id;?>"><?php echo $row->nama_layanan;?></option>
                   <?php }}?>
               </select>
           </div>
            <div style="margin-bottom:3px">
               <select id="unit" name="unit" class="form-control">
                   <option value="">Pilih Unit Layanan</option>
               </select>
           </div>
       </div>
        <?php if(isset($sarana) && !empty($sarana)){ $i=0;foreach($sarana as $row) { ?>
        <div class="row" id="right-form">
            <?php if($i == 0){ ?><h3 class="head">Legenda</h3><?php } ?>
                    <div class="col col-md-2">
                        <img src="<?php echo base_url().'/public/assets/img/icons/'.$row->icon;?>.png" width="24px" height="24px"/>
                        </div>
                    <div class="col col-md-10">
                        <?php echo $row->nama_layanan;?>
                        (<?php
                        switch($row->pelayanan_id){
                            case 1: echo ($sarana_count->c_posyandu)?$sarana_count->c_posyandu:0;break;
                            case 2: echo ($sarana_count->c_polindes)?$sarana_count->c_polindes:0;break;
                            case 3: echo ($sarana_count->c_poskentren)?$sarana_count->c_poskentren:0;break;
                            case 4: echo ($sarana_count->c_poskesdes)?$sarana_count->c_poskesdes:0;break;
                            case 5: echo ($sarana_count->c_poskesmas_induk)?$sarana_count->c_poskesmas_induk:0;break;
                            case 6: echo ($sarana_count->c_poskesmas_pembantu)?$sarana_count->c_poskesmas_pembantu:0;break;
                            case 7: echo ($sarana_count->c_layanan_luar)?$sarana_count->c_layanan_luar:0;break;
                            default: break;
                        }
                        ?>)
                        </div>
        </div>
        <?php $i++;}}?>

        <div class="row" id="right-form" style="margin-top:30px;">
            <div class="col col-md-12">
                Created by @ SunaMulyani
            </div>
            </div>
    </div>

</div>
<script type="text/javascript">
    jQuery(document).ready(function(){
            jQuery("#comment-submit").click(function(){
                if($("#username").val() == ''){
                    return false;
                }
                if($("#comment-message").val() == ''){
                    return false;
                }
                    $.ajax({
                        url: "<?php echo my_url();?>home/add_comment",
                        type: 'POST',
                        dataType:'json',
                        data: {
                            'comment':$("#comment-message").val(),'username':$("#username").val()
                        },
                        success: function(json) {
                            location.reload();
                        },
                        error: function(xhr, textStatus, ThrownException){
                            alert("Error: Terjadi kesalahan sistem");
                        }
                    });
                    return false;
            });
            return false;
    });
</script>
