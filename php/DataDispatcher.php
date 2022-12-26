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

            $data = $this->dbDispatcher->query("SELECT * FROM groups_fish");
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

    public function serach($query) : string
    {
        $dsn = 'mysql:host=localhost; dbname=fishatlas';
        $user = 'root';
        $password = '';

        if (!mysqli_connect($dsn, $user, $password)) {
            exit('Cannot connect to server');
        }
        if (!mysqli_select_db($dsn)) {
            exit('Cannot select database');
        }
        $query = mysqli_real_escape_string($query);

        $q = "SELECT id, name, image, discription, affiliation FROM ident WHERE name LIKE '%$query%' OR discription LIKE '%$query%'";
        $result = mysqli_query($q);

        if (mysqli_affected_rows() > 0) {
            $row = mysqli_fetch_assoc($result);
            $num = mysqli_num_rows($result);

            echo '<p>По запросу <b>'.$query.'</b> найдено совпадений: '.$num.'</p>';
/*
            do {
                // Делаем запрос, получающий ссылки на статьи
                $q1 = "SELECT `link` FROM `table_name` WHERE `uniq_id` = '$row[page_id]'";
                $result1 = mysqli_query($q1);

                if (mysqli_affected_rows() > 0) {
                    $row1 = mysqli_fetch_assoc($result1);
                }

                $text .= '<p><a> href="'.$row1['link'].'/'.$row['category'].'/'.$row['uniq_id'].'" title="'.$row['title_link'].'">'.$row['title'].'</a></p>
                    <p>'.$row['desc'].'</p>';

            } while ($row = mysqli_fetch_assoc($result));
*/
            echo $result;

        } else {
            $text = '<p>По вашему запросу ничего не найдено.</p>';
        }

        return $text;
    }
}