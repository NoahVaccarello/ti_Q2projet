<?php

class AccesoireDB extends Accesoire
{

    private $_bd;
    private $_array = array();

    public function __construct($cnx)
    {
        $this->_bd = $cnx;
    }

    public function getAllAccesoire()
    {
        $query = "select * from accesoire order by id_accesoire";
        try {
            $this->_bd->beginTransaction();
            $resultset = $this->_bd->prepare($query);
            $resultset->execute();
            $data = $resultset->fetchAll();
            //var_dump($data);
            foreach ($data as $d) {
                $this->_array[] = new Categorie($d);
            }
            $this->_bd->commit();
            return $this->_array;
        } catch (PDOException $e) {
            $this->_bd->rollback();
            print "Echec de la requête " . $e->getMessage();
        }
    }


}
