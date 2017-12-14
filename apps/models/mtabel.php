<?php

class Mtabel extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function SelectList($lang = "ina"){
        $query = "
SELECT IFNULL(A.parent_id, 0) parent_id, A.level, B.sorter FROM 
(
    SELECT parent_id, level FROM menu WHERE lang_id = '$lang' GROUP BY parent_id, level
) A
LEFT JOIN menu B
ON A.parent_id = B.id
ORDER BY level, sorter";

        $sql = $this->db->query($query);
        $data = null;
        if ($sql->num_rows() > 0)
            $data = $sql->result();
        $sql->free_result();
        return $data;
    }
    
    public function SelectListWithLevel($lang = "ina", $level = 1){
        $query = "
SELECT IFNULL(A.parent_id, 0) parent_id, A.level, B.sorter FROM 
(
    SELECT parent_id, level FROM menu WHERE lang_id = '$lang' GROUP BY parent_id, level
) A
LEFT JOIN menu B
ON A.parent_id = B.id
WHERE A.level <= $level
ORDER BY level, sorter";

        $sql = $this->db->query($query);
        $data = null;
        if ($sql->num_rows() > 0)
            $data = $sql->result();
        $sql->free_result();
        return $data;
    }
    
    public function SelectMenu($parent_id, $lang = "ina"){
        $where = ($parent_id == 0) ? "IS NULL" : "= $parent_id";
        $query = "
SELECT A.*, IFNULL(B.child, 0) child, C.link link_static FROM `menu` A
LEFT JOIN 
(
SELECT parent_id, count(*) child FROM `menu` GROUP BY parent_id
) B
ON A.id = B.parent_id
LEFT JOIN page_static C
    ON A.id_pagestatic = C.id
WHERE A.lang_id = '$lang' AND A.parent_id $where ORDER BY sorter";

        $sql = $this->db->query($query);
        $data = null;
        if ($sql->num_rows() > 0)
            $data = $sql->result();
        $sql->free_result();
        return $data;
    }

    public function SelectListMenu($kat = ""){
        $query = "
SELECT * FROM menu WHERE link LIKE '$kat-%' ORDER BY deskripsi";

        $sql = $this->db->query($query);
        $data = null;
        if ($sql->num_rows() > 0)
            $data = $sql->result();
        $sql->free_result();
        return $data;
    }
    
    public function SelectListMenuStatic(){
        $query = "
SELECT A.deskripsi, A.link FROM menu A LEFT JOIN page_static B
ON A.link = B.link 
WHERE B.link IS NULL AND A.link != ''
ORDER BY A.deskripsi";

        $sql = $this->db->query($query);
        $data = null;
        if ($sql->num_rows() > 0)
            $data = $sql->result();
        $sql->free_result();
        return $data;
    }

}
