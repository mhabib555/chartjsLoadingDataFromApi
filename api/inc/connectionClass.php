<?php


class conx2DB {

    private $conx;
    private $crimeCategory;
    private $crimeYears;

    public function __construct($dbServer, $dbUser, $dbPassword, $dbName){

        try {
            $this->conx = new PDO("mysql:host=$dbServer;dbname=$dbName",$dbUser,$dbPassword);
            $this->conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch(PDOException $e){
            return false;
        }

    }

    public function getCrimeLabels(){
        $query = "SELECT year from crimeData Group By year";
        $stmt = $this->conx->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_NUM);
        $singleD = array_reduce($stmt->fetchAll(), 'array_merge', array());
        return $singleD;
    }

    public function getCrimeCategories(){
        $query = "SELECT count(*) As noOfCrimes, crime from crimeData Group By crime";
        $stmt = $this->conx->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $this->crimeCategory = $stmt->fetchAll();
        $query = "SELECT count(*) As noOfCrimes, year from crimeData Group By year";
        $stmt = $this->conx->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $this->crimeYears = $stmt->fetchAll();
        return $stmt->fetchAll();
    }

    public function getCrimeData(){
        $tmpMainArr = [];
        $crimeDataArr = [];
        $i = 0;
        foreach($this->crimeCategory as $cc){
            $query = "SELECT count(*) As noOfCrimes, year, crime from crimeData where crime = :Murder Group By year";
            $stmt = $this->conx->prepare($query);
            $stmt->bindParam(':Murder',$cc['crime']);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
//            $crimeDataArr[$cc['crime']] = $stmt->fetchAll();

            $tmpArr = [];
        
            foreach($this->crimeYears as $cy){
                $tmpArr[$cy['year']] = 0;
                foreach($result as $rs){
                    if($rs['year']==$cy['year']){
                        $tmpArr[$cy['year']] = (int)$rs['noOfCrimes'];
                    }
                }
            }
            $array = array_values($tmpArr);

            $tmpMainArr[$i]['crime'] = $rs['crime'];
            $tmpMainArr[$i]['data'] = $array;
            $i++;
        }
        // var_dump($tmpMainArr);
        return $tmpMainArr;
    }

    public function closeConx(){
        $this->conx = null;
    }

}