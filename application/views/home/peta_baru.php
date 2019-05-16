<script>
    var markers = new Array();
    var locations = new Array();
    var xlocations = new Array();
    locations[1] = [
        <?php if(!empty($kec1)){foreach($kec1 as $d){ ?>
        ['<?php echo $d->jenis;?>', <?php echo $d->x;?>, <?php echo $d->y;?>, "<?php echo preg_replace("/[^A-Za-z0-9?!]/"," ",$d->keterangan);?>",<?php echo $d->id;?>,'<?php echo $d->icon;?>'],
        <?php }} ?>
    ];
    locations[2] = [
        <?php if(!empty($kec2)){ foreach($kec2 as $d){ ?>
        ['<?php echo $d->jenis;?>', <?php echo $d->x;?>, <?php echo $d->y;?>, "<?php echo preg_replace("/[^A-Za-z0-9?!]/"," ",$d->keterangan);?>",<?php echo $d->id;?>,'<?php echo $d->icon;?>'],
        <?php }} ?>
    ];
    locations[3] = [
        <?php if(!empty($kec3)){foreach($kec3 as $d){ ?>
        ['<?php echo $d->jenis;?>', <?php echo $d->x;?>, <?php echo $d->y;?>, "<?php echo preg_replace("/[^A-Za-z0-9?!]/"," ",$d->keterangan);?>",<?php echo $d->id;?>,'<?php echo $d->icon;?>'],
        <?php }} ?>
    ];
    xlocations[1] = [
        <?php if(!empty($typ1)){foreach($typ1 as $d){ ?>
        ['<?php echo $d->jenis;?>', <?php echo $d->x;?>, <?php echo $d->y;?>, "<?php echo preg_replace("/[^A-Za-z0-9?!]/"," ",$d->keterangan);?>",<?php echo $d->id;?>,'<?php echo $d->icon;?>'],
        <?php }} ?>
    ];
    xlocations[2] = [
        <?php if(!empty($typ2)){ foreach($typ2 as $d){ ?>
        ['<?php echo $d->jenis;?>', <?php echo $d->x;?>, <?php echo $d->y;?>, "<?php echo preg_replace("/[^A-Za-z0-9?!]/"," ",$d->keterangan);?>",<?php echo $d->id;?>,'<?php echo $d->icon;?>'],
        <?php }} ?>
    ];
    xlocations[3] = [
        <?php if(!empty($typ3)){foreach($typ3 as $d){ ?>
        ['<?php echo $d->jenis;?>', <?php echo $d->x;?>, <?php echo $d->y;?>, "<?php echo preg_replace("/[^A-Za-z0-9?!]/"," ",$d->keterangan);?>",<?php echo $d->id;?>,'<?php echo $d->icon;?>'],
        <?php }} ?>
    ];
    xlocations[4] = [
        <?php if(!empty($typ4)){foreach($typ4 as $d){ ?>
        ['<?php echo $d->jenis;?>', <?php echo $d->x;?>, <?php echo $d->y;?>, "<?php echo preg_replace("/[^A-Za-z0-9?!]/"," ",$d->keterangan);?>",<?php echo $d->id;?>,'<?php echo $d->icon;?>'],
        <?php }} ?>
    ];
    xlocations[5] = [
        <?php if(!empty($typ5)){ foreach($typ5 as $d){ ?>
        ['<?php echo $d->jenis;?>', <?php echo $d->x;?>, <?php echo $d->y;?>, "<?php echo preg_replace("/[^A-Za-z0-9?!]/"," ",$d->keterangan);?>",<?php echo $d->id;?>,'<?php echo $d->icon;?>'],
        <?php }} ?>
    ];
    xlocations[6] = [
        <?php if(!empty($typ6)){foreach($typ6 as $d){ ?>
        ['<?php echo $d->jenis;?>', <?php echo $d->x;?>, <?php echo $d->y;?>, "<?php echo preg_replace("/[^A-Za-z0-9?!]/"," ",$d->keterangan);?>",<?php echo $d->id;?>,'<?php echo $d->icon;?>'],
        <?php }} ?>
    ];
  xlocations[7] = [
        <?php if(!empty($typ7)){foreach($typ7 as $d){ ?>
        ['<?php echo $d->jenis;?>', <?php echo $d->x;?>, <?php echo $d->y;?>, "<?php echo preg_replace("/[^A-Za-z0-9?!]/"," ",$d->keterangan);?>",<?php echo $d->id;?>,'<?php echo $d->icon;?>'],
        <?php }} ?>
    ];

    function initMap() {
        var myOptions = {
            center: { lat: -6.860162, lng: 115.285652 },
            scrollwheel: false,
            zoom:16,
            mapTypeId: 'satellite'
        };
        var map = new google.maps.Map(document.getElementById("imap"),
            myOptions);

        $('.kec').on('click', function() {
            if ($(this).data('action') === 'add') {
                setMarkers(map, locations[$(this).data('filtertype')]);
                $(this).data('action','remove');
                $(this).addClass("btn-danger").removeClass("btn-primary");
            } else {
                removeMarkers(map, locations[$(this).data('filtertype')]);
                $(this).data('action','add');
                $(this).removeClass("btn-danger").addClass("btn-primary");
            }
        });
        $('.cb').click(function() {
            //removeMarkers(map, locations[1]); removeMarkers(map, locations[2]); removeMarkers(map, locations[3]);
            console.log($(this).data('filtertype'));
            if ($(this).is(':checked')) {
                setMarkers(map, xlocations[$(this).data('filtertype')]);
            }
            else {
                removeMarkers(map, xlocations[$(this).data('filtertype')]);
            }
        });
    }

    function setMarkers(map, location) {
        var marker,i;
        for (i = 0; i < location.length; i++) {
            var jenis = location[i][0];
            var lat = location[i][1];
            var long = location[i][2];
            var ket = location[i][3];
            latlngset = new google.maps.LatLng(lat, long);
            marker = new google.maps.Marker({
                map: map, title: jenis, position: latlngset,icon: {
                    url: "<?php echo base_url();?>public/assets/img/icons/"+location[i][5]+".png",
                    scaledSize: new google.maps.Size(24, 24)
                }
            });
            map.setCenter(marker.getPosition());
            var content = "Jenis Layanan: " + jenis +" " + " <div>Keterangan: " + ket+ "</div>";
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
    <div class="col col-md-12"><div id="imap" style="width: 100%; height: calc(100vh - 210px);"></div></div>
    <div class="col col-md-2" style="margin-top:10px">
        <div style="margin-bottom:10px"><a href="#" data-filtertype="1" data-action="add" class="btn btn-primary btn-sm kec" style="width:100%">KECAMATAN ARJASA</a></div>
        <div style="margin-bottom:10px"><a href="#" data-filtertype="2" data-action="add" class="btn btn-primary btn-sm kec" style="width:100%">KECAMATAN KANGAYAN</a></div>
        <div style="margin-bottom:10px"><a href="#" data-filtertype="3" data-action="add" class="btn btn-primary btn-sm kec" style="width:100%">KECAMATAN SAPEKEN</a></div>
    </div>
    <div class="col col-md-2" style="padding:20px 0">
        <div style="color:blue;font-weight: initial; margin-bottom:10px"><input nama="atts5" label="puskesmas induk" data-filtertype="5" class="cb" type="checkbox" value="5" /> Puskesmas Induk</div> 
        <div style="margin-bottom:10px"><input nama="atts6" label="puskesmas pembantu" data-filtertype="6"  class="cb" type="checkbox" value="6" /> Puskesmas Pembantu</div>
   <div style="color:#cc00ff; font-weight: initial; margin-bottom:10px"><input nama="atts7" label="layanan luar" data-filtertype="7"  class="cb" type="checkbox" value="7" />Layanan Luar</div>
    </div>
    <div class="col col-md-2" style="padding:20px 0">
        <div style="color:green; font-weight: initial;margin-bottom:10px"><input nama="atts3" label="pokontren" data-filtertype="3"  class="cb" type="checkbox" value="3" /> Poskentren</div>
        <div style="color: #5fbcd3; font-weight: initial; margin-bottom:10px"><input nama="atts4" label="poskondes" data-filtertype="4"  class="cb" type="checkbox" value="4" /> Poskondes</div>
    </div>
    <div class="col col-md-2" style="padding:20px 0">
        <div style="color:#ff6600; font-weight: initial;margin-bottom:10px"><input nama="atts2" label="polindes" data-filtertype="2"  class="cb" type="checkbox" value="2" /> Polindes</div>
        <div style="color:red; font-weight: initial;margin-bottom:10px"><input nama="atts1" label="poyandu" data-filtertype="1"  class="cb" type="checkbox" value="1" /> Posyandu</div>
    </div>
    <div class="col col-md-2" style="padding:80px 0">
     
    </div>
    <div class="col col-md-2" style="padding:80px 0">
        Created by @ SunaMulyani
    </div>
</div>