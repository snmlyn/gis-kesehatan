<?php
class Wilayah_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
    }

    function getPropinsi() {
        $sql = 'SELECT *
            FROM dt_propinsi
            ORDER BY NAMA_PROPINSI ASC';
        $q = $this->db->query($sql);
        return $q->result();
    }



    function addPropinsi($id,$propinsi)
    {
        $sql_get = 'SELECT * FROM dt_propinsi WHERE ID_PROP = ? AND NAMA_PROPINSI = ?';
        $q = $this->db->query($sql_get,array($id,$propinsi));
        $dt = $q->result();
        if(!empty($dt)){
            return array(false,'Nomor ID dan Propsinsi sudah ada ');
        }
        $sql = "INSERT INTO dt_propinsi (ID_PROP,NAMA_PROPINSI) VALUES (?,?)";
        $status = $this->db->query($sql, array($id,$propinsi));
        if($status){
            return array($status,'Data telah ditambahkan');
        }
        else {
            return array($status, $this->db->error());
        }

    }

    function deletePropinsi($id_prop,$propinsi)
    {
        $sql = "DELETE FROM dt_propinsi WHERE ID_PROP = ? AND NAMA_PROPINSI = ?";
        return $this->db->query($sql,array($id_prop,$propinsi));
    }

    function editPropinsi($id,$propinsi,$id_old,$propinsi_old)
    {
        $sql = "UPDATE dt_propinsi SET ID_PROP = ?, NAMA_PROPINSI = ? WHERE ID_PROP = ? AND NAMA_PROPINSI = ?";
        $status = $this->db->query($sql, array($id,$propinsi,$id_old,$propinsi_old));
        if($status){
            return array($status,'Data telah diedit');
        }
        else {
            return array($status, $this->db->error());
        }

    }

    function getKabupaten($propinsi='') {
        $sql = 'SELECT ID_PROP,ID_KAB, RES,NAMA_KABUPATEN,IBUKOTA
            FROM dt_kabupaten  WHERE ID_PROP = ? ORDER BY NAMA_KABUPATEN ASC';
            if($propinsi == ''){
                $propinsi = '*';
            }
        $q = $this->db->query($sql,[$propinsi]);
        return $q->result();
    }

    function addKabupaten($id_prop,$id_kab,$res,$kabupaten,$ibukota)
    {
        $sql = "INSERT INTO dt_kabupaten (ID_PROP,ID_KAB,RES,NAMA_KABUPATEN,IBUKOTA) VALUES (?,?,?,?,?)";
        $status = $this->db->query($sql, array($id_prop,$id_kab,$res,$kabupaten,$ibukota));
        if($status){
           return array($status,'Data telah ditambahkan');
        }
        else {
            return array($status, $this->db->error());
        }
    }

    function deleteKabupaten($id_prop,$id_kab)
    {
        $sql = "DELETE FROM dt_kabupaten WHERE ID_PROP = ? AND ID_KAB = ?";
        return $this->db->query($sql,array($id_prop,$id_kab));
    }

    function editKabupaten($id_prop,$id_kab,$res,$kabupaten,$ibukota)
    {
        $sql = "UPDATE dt_kabupaten SET RES = ? ,NAMA_KABUPATEN = ?,IBUKOTA = ? WHERE ID_KAB = ? AND ID_PROP = ?";
        $status = $this->db->query($sql, array($res,$kabupaten,$ibukota,$id_kab,$id_prop));
        if($status){
            return array($status,'Data telah diupdate');
        }
        else {
            return array($status, $this->db->error());
        }

    }

    function getKecamatan() {
        $sql = 'SELECT *  FROM kecamatan ORDER BY kecamatan_id ASC';
        $q = $this->db->query($sql);
        return $q->result();
    }

    function getKecamatanById($id) {
        $sql = 'SELECT b.*,c.NAMA_KABUPATEN AS NAMA_KABUPATEN FROM dt_kecamatan b
         LEFT JOIN dt_kabupaten c on c.ID_KAB = b.ID_KAB WHERE b.ID_KEC = ? LIMIT 0,1';
        $q = $this->db->query($sql,array($id));
        return $q->result();
    }

    function addKecamatan($id_kab,$id_kec,$kecamatan,$kodepos,$keterangan)
    {
        $sql = "INSERT INTO dt_kecamatan (ID_KAB,ID_KEC,NAMA_KECAMATAN,KODEPOS,KET) VALUES (?,?,?,?,?)";
        $status = $this->db->query($sql, array($id_kab,$id_kec,$kecamatan,$kodepos,$keterangan));
        if($status){
            return array($status,'Data telah ditambahkan');
        }
        else {
            return array($status, $this->db->error());
        }
    }

    function deleteKecamatan($id_kec)
    {
        $sql = "DELETE FROM dt_kecamatan WHERE ID_KEC = ?";
        return $this->db->query($sql,array($id_kec));
    }

    function editKecamatan($id_kab,$id_kec,$kecamatan,$kodepos,$keterangan)
    {
        $sql = "UPDATE dt_kecamatan SET NAMA_KECAMATAN = ? ,KODEPOS = ?,KET = ? WHERE ID_KEC = ? AND ID_KAB = ?";
        $status = $this->db->query($sql, array($kecamatan,$kodepos,$keterangan,$id_kec,$id_kab));
        if($status){
            return array($status,'Data telah diupdate');
        }
        else {
            return array($status, $this->db->error());
        }
    }

    function getKelurahan() {
        $sql = 'SELECT * FROM kelurahan  ORDER BY nama_kelurahan ASC';
        $q = $this->db->query($sql);
        return $q->result();
    }

    function getKelurahanByKecamatan($kecamatan) {
        $sql = 'SELECT * FROM kelurahan WHERE kecamatan_id = ? ORDER BY nama_kelurahan ASC';
        $q = $this->db->query($sql,array($kecamatan));
        return $q->result();
    }

    function getPelayanByKelurahan($kelurahan){
        $sql = 'SELECT d.distribusi_pelayanan_id as id, p.nama_layanan as jenis, d.sarana_pelayanan as pelayanan,d.koordinat_x as x,d.koordinat_y as y,p.icon as icon,k.nama_kelurahan,d.keterangan,d.image FROM distribusi_pelayanan d left join pelayanan p on p.pelayanan_id = d.pelayanan_id left join kelurahan k on k.kelurahan_id = d.kelurahan_id WHERE d.kelurahan_id = ? ORDER BY d.pelayanan_id,d.sarana_pelayanan ASC';
        $q = $this->db->query($sql,array($kelurahan));
        return $q->result();
    }

    function getPelayanByKelurahanJenisLayanan($kelurahan,$layanan){
        $sql = 'SELECT d.distribusi_pelayanan_id as id, p.nama_layanan as jenis, d.sarana_pelayanan as pelayanan,d.koordinat_x as x,d.koordinat_y as y,p.icon as icon,k.nama_kelurahan,d.keterangan,d.image FROM distribusi_pelayanan d left join pelayanan p on p.pelayanan_id = d.pelayanan_id left join kelurahan k on k.kelurahan_id = d.kelurahan_id WHERE d.kelurahan_id = ? AND p.pelayanan_id = ? ORDER BY d.pelayanan_id,d.sarana_pelayanan ASC';
        $q = $this->db->query($sql,array($kelurahan,$layanan));
        return $q->result();
    }

    function getPelayanByKelurahanUnitLayanan($kelurahan,$unitlayanan){
        $sql = 'SELECT d.distribusi_pelayanan_id as id, p.nama_layanan as jenis, d.sarana_pelayanan as pelayanan,d.koordinat_x as x,d.koordinat_y as y,p.icon as icon,k.nama_kelurahan,d.keterangan,d.image FROM distribusi_pelayanan d left join pelayanan p on p.pelayanan_id = d.pelayanan_id left join kelurahan k on k.kelurahan_id = d.kelurahan_id WHERE d.kelurahan_id = ? AND d.distribusi_pelayanan_id = ? ORDER BY d.pelayanan_id,d.sarana_pelayanan ASC';
        $q = $this->db->query($sql,array($kelurahan,$unitlayanan));
        return $q->result();
    }

    function getPelayanById($id){
        $sql = 'SELECT d.distribusi_pelayanan_id as id, p.nama_layanan as jenis, d.sarana_pelayanan as pelayanan,d.koordinat_x as x,d.koordinat_y as y,p.icon as icon,k.nama_kelurahan,d.keterangan,d.image FROM distribusi_pelayanan d left join pelayanan p on p.pelayanan_id = d.pelayanan_id left join kelurahan k on k.kelurahan_id = d.kelurahan_id WHERE d.distribusi_pelayanan_id = ? ORDER BY d.pelayanan_id,d.sarana_pelayanan ASC';
        $q = $this->db->query($sql,array($id));
        return $q->result();
    }

    function getPelayanByKecamatan($kecamatan){
        $sql = 'SELECT d.distribusi_pelayanan_id as id, p.nama_layanan as jenis, d.sarana_pelayanan as pelayanan,d.koordinat_x as x,d.koordinat_y as y,p.icon as icon,k.nama_kelurahan,d.keterangan,d.image FROM distribusi_pelayanan d left join pelayanan p on p.pelayanan_id = d.pelayanan_id left join kelurahan k on k.kelurahan_id = d.kelurahan_id WHERE k.kecamatan_id = ? ORDER BY d.pelayanan_id,d.sarana_pelayanan ASC';
        $q = $this->db->query($sql,array($kecamatan));
        return $q->result();
    }

    function getPelayanByKecamatanJenisLayanan($kecamatan,$layanan){
        $sql = 'SELECT d.distribusi_pelayanan_id as id, p.nama_layanan as jenis, d.sarana_pelayanan as pelayanan,d.koordinat_x as x,d.koordinat_y as y,p.icon as icon,k.nama_kelurahan,d.keterangan,d.image FROM distribusi_pelayanan d left join pelayanan p on p.pelayanan_id = d.pelayanan_id left join kelurahan k on k.kelurahan_id = d.kelurahan_id WHERE k.kecamatan_id = ? AND p.pelayanan_id = ? ORDER BY d.pelayanan_id,d.sarana_pelayanan ASC';
        $q = $this->db->query($sql,array($kecamatan,$layanan));
        return $q->result();
    }

    function getPelayanByKecamatanUnitLayanan($kecamatan,$unitlayanan){
        $sql = 'SELECT d.distribusi_pelayanan_id as id, p.nama_layanan as jenis, d.sarana_pelayanan as pelayanan,d.koordinat_x as x,d.koordinat_y as y,p.icon as icon,k.nama_kelurahan,d.keterangan,d.image FROM distribusi_pelayanan d left join pelayanan p on p.pelayanan_id = d.pelayanan_id left join kelurahan k on k.kelurahan_id = d.kelurahan_id WHERE k.kecamatan_id = ? AND d.distribusi_pelayanan_id = ? ORDER BY d.pelayanan_id,d.sarana_pelayanan ASC';
        $q = $this->db->query($sql,array($kecamatan,$unitlayanan));
        return $q->result();
    }

    function getPelayanByKecamatanLayanan($kecamatan = 1,$layanan = 'all'){
        $sql = 'SELECT d.distribusi_pelayanan_id as id, p.nama_layanan as jenis,p.icon as icon, d.sarana_pelayanan as pelayanan,
d.keterangan,k.nama_kelurahan as kelurahan,d.koordinat_x as x, d.koordinat_y as y
 FROM distribusi_pelayanan d left join pelayanan p on p.pelayanan_id = d.pelayanan_id
         left join kelurahan k on k.kelurahan_id = d.kelurahan_id WHERE 1=1 AND d.koordinat_x != "" AND d.koordinat_y != "" ';
        $params = [];
         $sql .=' ORDER BY d.pelayanan_id,d.sarana_pelayanan ASC';
        $q = $this->db->query($sql,$params);
        return $q->result();
    }

    function getJenisLayanan(){
        $sql = 'SELECT * FROM pelayanan';
        $q = $this->db->query($sql);
        return $q->result();
    }
    /*

1. puskesmas induk 1
2. pustu 3
3. polindes 27
4. ponkesdes 18
5. ponkestren 5
6. posyandu 75
7. pelayanan luar 7
total 136 pelayanan

select sum(t.c_posyandu) as c_posyandu,
            sum(t.c_polindes) as c_polindes,
            sum(t.c_poskentren)as c_poskentren,
            sum(t.c_poskesdes)as c_poskesdes,
            sum(t.c_poskesmas_induk)as c_poskesmas_induk,
            sum(t.c_poskesmas_pembantu)as c_poskesmas_pembantu,
            sum(t.c_layanan_luar)as c_layanan_luar
*/
    function getJenisLayananCount(){
        $sql = 'select "75" as c_posyandu,
            "27" as c_polindes,
            "5" as c_poskentren,
            "18" as c_poskesdes,
            "1" as c_poskesmas_induk,
            "3" as c_poskesmas_pembantu,
            "7" as c_layanan_luar
            from (select 
                sum(case when pelayanan_id = 1 then 1 else 0 end) as c_posyandu,
            sum(case when pelayanan_id = 2 then 1 else 0 end) as c_polindes,
                sum(case when pelayanan_id = 3 then 1 else 0 end) as c_poskentren,
            sum(case when pelayanan_id = 4 then 1 else 0 end) as c_poskesdes,
            sum(case when pelayanan_id = 5 then 1 else 0 end) as c_poskesmas_induk,
            sum(case when pelayanan_id = 6 then 1 else 0 end) as c_poskesmas_pembantu,
            sum(case when pelayanan_id = 7 then 1 else 0 end) as c_layanan_luar
            from distribusi_pelayanan
            group by pelayanan_id) as t';
            $q = $this->db->query($sql);
            return $q->row();
    }

    function getComments(){
        $sql = 'SELECT * FROM comment ORDER BY comment_id DESC';
        $q = $this->db->query($sql);
        return $q->result();
    }

    function addComment($username,$comment)
    {
        $sql = "INSERT INTO comment (username,message) VALUES (?,?)";
        $status = $this->db->query($sql, array($username,$comment));
        if($status){
            return array($status,'Data telah ditambahkan');
        }
        else {
            return array($status, $this->db->error());
        }
    }

    function addKelurahan($id_kec,$kelurahan)
    {
        $sql = "INSERT INTO kelurahan (kecamatan_id,nama_kelurahan) VALUES (?,?)";
        $status = $this->db->query($sql, array($id_kec,$kelurahan));
        if($status){
            return array($status,'Data telah ditambahkan');
        }
        else {
            return array($status, $this->db->error());
        }
    }

    function deleteKelurahan($id_kel)
    {
        $sql = "DELETE FROM kelurahan WHERE kelurahan_id = ?";
        return $this->db->query($sql,array($id_kel));
    }

    function getKelurahanById($id) {
        $sql = 'SELECT b.* FROM kelurahan b ';
        $sql .= 'WHERE b.kelurahan_id = ? LIMIT 0,1';
        $q = $this->db->query($sql,array($id));
        return $q->result();
    }

    function editKelurahan($id_kec,$id_kel,$kelurahan)
    {
        $sql = "UPDATE kelurahan SET nama_kelurahan = ? WHERE kelurahan_id = ?";
        $status = $this->db->query($sql, array($kelurahan,$id_kel));
        if($status){
            return array($status,'Data telah diupdate');
        }
        else {
            return array($status, $this->db->error());
        }
    }


    function getKodepos($propinsi='',$kabupaten='',$kecamatan='') {
        $params = [];
        $sql = 'SELECT * FROM dt_kodepos ';
        if($propinsi != ''){
            $sql .= 'WHERE NAMA_PROPINSI = ? ';
            $params[] = $propinsi;
        }
        if($kabupaten != ''){
            $sql .= 'AND NAMA_KABUPATEN = ? ';
            $params[] = $kabupaten;
        }
        if($kecamatan != ''){
            $sql .= 'AND NAMA_KECAMATAN = ? ';
            $params[] = $kecamatan;
        }
        $sql .= 'ORDER BY ID_KODE ASC ';
        $q = $this->db->query($sql,$params);
        return $q->result();
    }

    function addKodepos($prop,$res,$kab,$kec,$id_kel,$kelurahan,$kodepos)
    {
        $kb = explode("-",$kab);
        if(in_array(strtoupper($kb[0]),['','KAB','KAB.','KOTA','KOTA.'])){
            $kab = '';
            $i = 0;
            foreach($kb as $row){
                if($i > 0){
                    $kab .= $row.' ';
                }
                $i++;
            }
        }
        $kab = trim($kab);
        $sql = "INSERT INTO dt_kodepos (ID_KODE,ID_KEL,NAMA_KELURAHAN,NAMA_KECAMATAN,RES,NAMA_KABUPATEN,NAMA_PROPINSI) VALUES (?,?,?,?,?,?,?)";
        $status = $this->db->query($sql, array($kodepos,$id_kel,$kelurahan,$kec,$res,$kab,$prop));
        if($status){
            return array($status,'Data telah ditambahkan');
        }
        else {
            return array($status, $this->db->error());
        }
    }

    function deleteKodepos($id_kode)
    {
        $sql = "DELETE FROM dt_kodepos WHERE ID_KODE = ?";
        return $this->db->query($sql,array($id_kode));
    }

    function getKodeposById($id_kode) {
        $params = [$id_kode];
        $sql = 'SELECT * FROM dt_kodepos WHERE ID_KODE = ? ORDER BY ID_KODE ASC LIMIT 0,1';
        $q = $this->db->query($sql,$params);
        return $q->result();
    }

    function editKodepos($kodepos_old,$kodepos,$kelurahan)
    {
        $sql = "UPDATE dt_kodepos SET ID_KODE = ? WHERE ID_KODE = ? AND LOWER(NAMA_KELURAHAN) = LOWER(?)";
        $status = $this->db->query($sql, array($kodepos,$kodepos_old,$kelurahan));
        if($status){
            return array($status,'Data telah diupdate');
        }
        else {
            return array($status, $this->db->error());
        }
    }

    function saveKoordinat($id,$lat,$long)
    {
        $sql = "UPDATE distribusi_pelayanan SET koordinat_x = ? , koordinat_y = ? WHERE distribusi_pelayanan_id = ?";
        $status = $this->db->query($sql, array($lat,$long,$id));
        if($status){
            return array($status,'Koordinat telah di simpan');
        }
        else {
            return array($status, $this->db->error());
        }
    }


    function getPelayanByKeyword($keyword){
        $sql = 'SELECT d.distribusi_pelayanan_id as id, p.nama_layanan as jenis, d.sarana_pelayanan as pelayanan,d.koordinat_x as x,d.koordinat_y as y,p.icon as icon,k.nama_kelurahan,d.keterangan FROM distribusi_pelayanan d left join pelayanan p on p.pelayanan_id = d.pelayanan_id left join kelurahan k on k.kelurahan_id = d.kelurahan_id WHERE k.nama_kelurahan like "%'.$keyword.'%" or d.sarana_pelayanan like "%'.$keyword.'%" ORDER BY d.pelayanan_id,d.sarana_pelayanan ASC';
        $q = $this->db->query($sql);
        return $q->result();
    }

}
?>