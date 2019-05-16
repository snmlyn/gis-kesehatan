<?php /*<script type="text/javascript">function initMap() {
        var map = new google.maps.Map(document.getElementById('imap'), {
            center: { lat: -6.860162, lng: 115.285652 },
            scrollwheel: false,
            zoom: 16,
            
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDieZ7uAY4DPdT3Z4fp4KtykHl6dWryYdw&callback=initMap">
</script>*/?>
<script type="text/javascript">function initMap() {
        function updateMarkerPosition(latLng) {
            document.getElementById('latitude').value = [latLng.lat()]
            document.getElementById('longitude').value = [latLng.lng()]
        }
        var map = new google.maps.Map(document.getElementById('imap'), {
            zoom: 16,
            center: new google.maps.LatLng(-6.860162,115.285652),
            mapTypeId:  'satellite',/* google.maps.MapTypeId.ROADMAP,*/
            mapTypeControl: true,
            zoomControl: true,
            scaleControl: true,
            streetViewControl: true,
            rotateControl: false,
            fullscreenControl: false
        });
        var latLng = new google.maps.LatLng(-6.860162,115.285652);
        var marker = new google.maps.Marker({
            position: latLng,
            title: 'lokasi',
            map: map,
            streetViewControl: false,
            draggable: true
        });
        updateMarkerPosition(latLng);
        google.maps.event.addListener(marker, 'drag', function () {
            updateMarkerPosition(marker.getPosition());
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBiLX_pYFqBCyPewJTrgwiYBjRKXFws9mY&callback=initMap">
</script>
<div class="row" id="setting-peta">
    <div class="col col-md-4">
       <div class="card card-chart" style="height: calc(100vh - 123px);">
            <div class="card-content" >
                <h4 class="card-title" style="margin-bottom: 20px">PILIH PELAYANAN</h4>
                <div class="modal-alert alert hide"></div>
                <div class="row small-list-margin">
                    <div class="col-lg-3 col-md-3 col-sm-3 text-bold" style="padding-top: 12px">
                        Kecamatan
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <select id="kec" name="kecamatan" class="form-control" required>
                            <option value="">Pilih Kecamatan</option>
                            <?php if(isset($kecamatan)){ foreach($kecamatan as $row) { ?>
                                <option value="<?php echo $row->kecamatan_id;?>"><?php echo $row->nama_kecamatan;?></option>
                            <?php }}?>
                        </select>
                    </div>
                </div>
                <div class="row small-list-margin">
                    <div class="col-lg-3 col-md-3 col-sm-3 text-bold"  style="padding-top: 12px">
                        Kelurahan
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <select id="kel" name="kelurahan" class="form-control" required>
                            <option value="">Pilih Desa / Kelurahan</option>
                        </select>
                    </div>
                </div>
                <div class="row small-list-margin">
                    <div class="col-lg-3 col-md-3 col-sm-3 text-bold"  style="padding-top: 12px">
                        Distribusi
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <select id="dis" name="distribusi" class="form-control" required>
                            <option value="">Pilih Alamat/Distribusi</option>
                        </select>
                    </div>
                </div>
                <div class="row small-list-margin">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-bold"  style="padding-top: 12px">
                        Koordinat
                    </div>
                    <div class="col-md-6">
                        <input type="text" placeholder="Latitude" name="latitude" id="latitude"
                               class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                        <input type="text" placeholder="Longitude" name="longitude" id="longitude"
                               class="form-control" readonly>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div><a class="btn btn-sm btn-primary" id="simpan"> Simpan </a> </div>
                <div class="stats">
                    Pastikan pilih distribuasi layanan & koordinat sebelum click SAVE
                </div>
            </div>
        </div>
    </div>
    <div class="col col-md-8"><div id="imap" style="width: 100%; height: calc(100vh - 123px); margin: 10px 0;border-radius:6px"></div></div>
</div>
<script type="text/javascript">
    $(function(){
            $("#setting-peta").on("change","#kec",function(){
                var kecamatan = $("option:selected",$("#kec")).val();
                $.ajax({
                    url: "<?php echo my_url();?>/wilayah/filter_kelurahan",
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

            $("#setting-peta").on("change","#kel",function(){
                var kelurahan = $("option:selected",$("#kel")).val();
                $.ajax({
                    url: "<?php echo my_url();?>/wilayah/filter_distribusi",
                    type: 'POST',
                    dataType:'html',
                    data: {
                        kelurahan:kelurahan
                    },
                    success: function(options) {
                        $("#dis").html(options);
                    },
                    error: function(xhr, textStatus, ThrownException){
                        showAlerts('error',textStatus);
                    }
                });
                return false;
            });

        $("#setting-peta").on("click","#simpan",function(){
            var dis = $("option:selected",$("#dis")).val();
            var latitude = $("#latitude").val();
            var longitude = $("#longitude").val();
            $.ajax({
                url: "<?php echo my_url();?>/wilayah/save_koordinat",
                type: 'POST',
                dataType:'json',
                data: {
                    distribusi:dis,lat:latitude,long:longitude
                },
                success: function(result) {
                    if(result.status){
                        showAlerts('success',result.message);
                        setTimeout(function(){// wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                        }, 5000);
                    }
                    else {
                        showAlerts('error',textStatus);
                    }
                },
                error: function(xhr, textStatus, ThrownException){
                    showAlerts('error',textStatus);
                }
            });
            return false;
        });


    });
</script>