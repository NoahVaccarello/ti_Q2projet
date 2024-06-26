<?php

class ClientDB
{

    private $_bd;
    private $_array = array();

    public function __construct($cnx)
    {
        $this->_bd = $cnx;
    }

    public function updateClient($id, $nom, $prenom, $email, $adresse, $numero)
    {
        $query = "select update_client(:id,:nom,:prenom,:email,:adresse,:numero)";

        try {
            $this->_bd->beginTransaction();
            $res = $this->_bd->prepare($query);
            $res->bindValue(':id', $id);
            $res->bindValue(':nom', $nom);
            $res->bindValue(':prenom', $prenom);
            $res->bindValue(':email', $email);
            $res->bindValue(':adresse', $adresse);
            $res->bindValue(':numero', $numero);
            $res->execute();
            $this->_bd->commit();
        } catch (PDOException $e) {
            $this->_bd->rollback();
            print "Echec " . $e->getMessage();
        }
    }

    public function ajout_client($nom, $prenom, $email, $adresse, $numero)
    {
        try {
            $query = "select ajout_client(:nom,:prenom,:email,:adresse,:numero)";
            $res = $this->_bd->prepare($query);
            $res->bindValue(':nom', $nom);
            $res->bindValue(':prenom', $prenom);
            $res->bindValue(':email', $email);
            $res->bindValue(':adresse', $adresse);
            $res->bindValue(':numero', $numero);
            $res->execute();
            $data = $res->fetch();
            return $data;
        } catch (PDOException $e) {
            print "Echec " . $e->getMessage();
        }
    }

    public function supprimerClient($id)
    {
        $query = "SELECT supprimerclient(:id)";
        try {
            $this->_bd->beginTransaction();
            $res = $this->_bd->prepare($query);
            $res->bindValue(':id', $id);
            $res->execute();
            $this->_bd->commit();
            return true;
        } catch (PDOException $e) {
            $this->_bd->rollback();
            print "Echec " . $e->getMessage();
            return false;
        }
    }

    public function getClientById($id)
    {
        try {
            $query = "select * from client where id_client = :id";
            $res = $this->_bd->prepare($query);
            $res->bindValue(':id', $id);
            $res->execute();
            return $res->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            print "Echec " . $e->getMessage();
        }
    }


    public function getClientByEmail($email)
    {
        try {
            $query = "select * from client where email = :email";
            $res = $this->_bd->prepare($query);
            $res->bindValue(':email', $email);
            $res->execute();
            $data = $res->fetch();
            return $data;
        } catch (PDOException $e) {
            print "Echec " . $e->getMessage();
        }
    }


    public function getAllClients()
    {
        try {
            $query = "select * from client order by nom_client";
            $res = $this->_bd->prepare($query);
            $res->execute();
            $data = $res->fetchAll();
            if (!empty($data)) {
                foreach ($data as $d) {
                    $_array[] = new Client($d);
                }
                return $_array;
            } else {
                return null;
            }

            return $data;
        } catch (PDOException $e) {
            print "Echec " . $e->getMessage();
        }
    }

}

