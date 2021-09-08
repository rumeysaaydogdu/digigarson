<?php
class DB
{
    private $sunucu = "localhost";
    private $user = "dgsite";
    private $password = 'FOj$qbBJc0XXdu4g8Cf#ArBrDTSQ30cw';
    private $dbname = "dgsite_wp59";
    public $baglanti;
    public function __construct()
    {
        try {
            $this->baglanti = new PDO("mysql:host=" . $this->sunucu . ";dbname=" . $this->dbname . ";charset=utf8", $this->user, $this->password);
        } catch (PDOException $error) {
            echo $error->getMessage();
            exit();
        }
    }
    public function fetch_data($table, $wherefields = "", $wherearrayvalue = "", $orderby = "ORDER BY ID ASC", $limit = "")
    {
        $this->baglanti->query("SET CHARACTER SET utf8");
        $sql = "SELECT * FROM " . $table;
        if (!empty($wherefields) && !empty($wherearrayvalue)) {

            $sql .= " " . $wherefields;
            if (!empty($orderby)) {
                $sql .= " " . $orderby;
            }
            if (!empty($limit)) {
                $sql .= " LIMIT " . $limit;
            }
            $run = $this->baglanti->prepare($sql);
            $result = $run->execute($wherearrayvalue);
            $data = $run->fetchAll(PDO::FETCH_ASSOC);
        } else {
            if (!empty($orderby)) {
                $sql .= " " . $orderby;
            }
            if (!empty($limit)) {
                $sql .= " LIMIT " . $limit;
            }
            $data = $this->baglanti->query($sql, PDO::FETCH_ASSOC);
        }
        if ($data != false && !empty($data)) {
            $data_ = array();
            foreach ($data as $info) {
                $data_[] = $info;
            }
            return $data_;
        } else {
            return false;
        }
    }
}
