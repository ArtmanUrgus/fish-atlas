<?php

class DataDispatcher
{
    // @formatter:off

    private $dbDispatcher;
    private $errorMissage;

    public function connectDB() : bool
    {
        $dsn = 'mysql:host=localhost; dbname=fishatlas';
        $user = 'root';
        $password = '';

        try {
            $this->dbDispatcher = new PDO($dsn, $user,$password);
            $this->dbDispatcher->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            self::$errorMissage = "Connection failed: " . $e->getMessage();
            return false;
        }

        return true;
    }

    public function disconnectDB()
    {
        $this->dbDispatcher = null;
    }

    public function atlasStructure()
    {
        if( $this->dbDispatcher !== null ){

            $data = $this->dbDispatcher->query('SELECT * FROM groups_fish');
            return $data;
        }
        return null;
    }

    public function familyTitle()
    {
        if( $this->dbDispatcher !== null ){

            $data = $this->dbDispatcher->query("SELECT name, id FROM groups_fish WHERE id ='".$_COOKIE['familyID']."'");
            return $data;
        }
        return null;
    }

    public function specimen($familyId)
    {
        if( $this->dbDispatcher !== null ){

            $data = $this->dbDispatcher->query("SELECT id, name, image, discription, affiliation FROM ident WHERE affiliation ='".$familyId."'");
            return $data;
        }
        return null;
    }

    public function article($dbId)
    {
        if( $this->dbDispatcher !== null ){

            $data = $this->dbDispatcher->query("SELECT id, name, image, discription, affiliation FROM ident WHERE id ='".$dbId."'");
            return $data;
        }
        return null;
    }
}