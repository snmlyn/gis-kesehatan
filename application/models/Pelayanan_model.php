<?php
class Pelayanan_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
    }

    function getPelayanByKecamatan($kecamatan){
        $sql = 'SELECT d.distribusi_pelayanan_id as id, p.nama_layanan as jenis, d.sarana_pelayanan as pelayanan, p.icon as icon,
d.keterangan,k.nama_kelurahan as kelurahan,d.koordinat_x as x, d.koordinat_y as y
 FROM distribusi_pelayanan d left join pelayanan p on p.pelayanan_id = d.pelayanan_id
         left join kelurahan k on k.kelurahan_id = d.kelurahan_id WHERE 1=1 AND d.koordinat_x != "" AND d.koordinat_y != "" and k.kecamatan_id = ? ';
        $params = [$kecamatan];
        $sql .=' ORDER BY d.pelayanan_id,d.sarana_pelayanan ASC';
        $q = $this->db->query($sql,$params);
        return $q->result();
    }
    function getPelayanByType($type){
        $sql = 'SELECT d.distribusi_pelayanan_id as id, p.nama_layanan as jenis, d.sarana_pelayanan as pelayanan, p.icon as icon,
d.keterangan,k.nama_kelurahan as kelurahan,d.koordinat_x as x, d.koordinat_y as y
 FROM distribusi_pelayanan d left join pelayanan p on p.pelayanan_id = d.pelayanan_id
         left join kelurahan k on k.kelurahan_id = d.kelurahan_id WHERE 1=1 AND d.koordinat_x != "" AND d.koordinat_y != "" and p.pelayanan_id = ? ';
        $params = [$type];
        $sql .=' ORDER BY d.pelayanan_id,d.sarana_pelayanan ASC';
        $q = $this->db->query($sql,$params);
        return $q->result();
    }

    function getPelayanan(){
        $sql = 'SELECT d.distribusi_pelayanan_id as id, p.nama_layanan as jenis, d.sarana_pelayanan as pelayanan, p.icon as icon,
d.keterangan,k.nama_kelurahan as kelurahan,ke.nama_kecamatan as kecamatan,ke.kecamatan_id,k.kelurahan_id,p.pelayanan_id,d.koordinat_x as x, d.koordinat_y as y, d.image
 FROM distribusi_pelayanan d left join pelayanan p on p.pelayanan_id = d.pelayanan_id
         left join kelurahan k on k.kelurahan_id = d.kelurahan_id
           left join kecamatan ke on k.kecamatan_id = ke.kecamatan_id
         WHERE 1=1 ';
        //$params = [$kecamatan];
        $sql .=' ORDER BY d.pelayanan_id,d.sarana_pelayanan ASC';
        $q = $this->db->query($sql);
        return $q->result();
    }


    function savePelayanan($kel,$jenis,$nama,$x,$y,$ket){
        $sql = "INSERT INTO distribusi_pelayanan (kelurahan_id,pelayanan_id,sarana_pelayanan,koordinat_x,koordinat_y,keterangan) VALUES (?,?,?,?,?,?)";
        $status = $this->db->query($sql, array($kel,$jenis,$nama,$x,$y,$ket));
        if($status){
            return array($status,'Data telah ditambahkan');
        }
        else {
            return array($status, $this->db->error());
        }
    }

function editPelayanan($id,$kel,$jenis,$nama,$x,$y,$ket){
        $sql = "UPDATE distribusi_pelayanan SET kelurahan_id=?,pelayanan_id=?,sarana_pelayanan=?,keterangan=? WHERE distribusi_pelayanan_id = ?";
        $status = $this->db->query($sql, array($kel,$jenis,$nama,$ket,$id));
        if($status){
            return array($status,'Data telah diedit');
        }
        else {
            return array($status, $this->db->error());
        }
    }

    function deletePelayanan($id)
    {
        $sql = "DELETE FROM distribusi_pelayanan WHERE distribusi_pelayanan_id = ?";
        $status =  $this->db->query($sql,array($id));
        if($status){
            return array($status,'Data telah dihapus');
        }
        else {
            return array($status, $this->db->error());
        }
    }

    function editImage($image,$id){
        $sql = "UPDATE distribusi_pelayanan SET image=? WHERE distribusi_pelayanan_id = ?";
        $status = $this->db->query($sql, array($image,$id));
        if($status){
            return array($status,'Data telah diedit');
        }
        else {
            return array($status, $this->db->error());
        }
    }

    function deleteImage($id){
        $sql = "UPDATE distribusi_pelayanan SET image= '' WHERE distribusi_pelayanan_id = ? ";
        $status = $this->db->query($sql, array($id));
        if($status){
            return array($status,'Data telah didelete');
        }
        else {
            return array($status, $this->db->error());
        }
    }

}
?>