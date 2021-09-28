<?php
require __DIR__ . '/vendor/autoload.php';

class db
{
    private PDO $pdo;

    //db object constructor
    function __construct() {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $dsn = 'mysql:dbname=' . $_ENV['SQL_DBNAME'] . ';host=' . $_ENV['SQL_HOST'] . '';
        $user = $_ENV['SQL_USERNAME'];
        $password = $_ENV['SQL_PASSWORD'];

        try {
            $pdo = new PDO($dsn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
        $this->pdo = $pdo;
    }

    //pushes new record to the database
    function add_new_lottery_record(bool $successful, string $place) : string|bool
    {
        date_default_timezone_set('Europe/Prague');
        $timestamp = date('Y-m-d');

        if(!$this->get_specific_lottery_result($timestamp) && $this->already_succesful() === false){
            $qry = $this->pdo->prepare("INSERT into lottery_records (timestamp, success, place) VALUES(?, ?, ?)");
            $exec = $qry->execute(array(
                $timestamp,
                $successful,
                $place
            ));
            return $this->pdo->lastInsertId();
        }

        return false;
    }


    function get_specific_lottery_result(string $date) : mixed
    {
        $qry = $this->pdo->prepare("SELECT * FROM lottery_records WHERE timestamp = ?");
        $qry->execute(array($date));
        return $qry->fetch();
    }

    function get_latest_record() : mixed
    {
        $qry = $this->pdo->prepare("SELECT * FROM lottery_records ORDER BY timestamp DESC");
        $qry->execute();
        return $qry->fetch();
    }

    function get_count_of_records() : int
    {
        $qry = $this->pdo->prepare("SELECT COUNT(*) FROM lottery_records ");
        $qry->execute();
        return (int)$qry->fetch()['COUNT(*)'];
    }

    function already_succesful() : mixed{
        $qry = $this->pdo->prepare("SELECT * FROM lottery_records WHERE `success` = true ORDER BY timestamp ASC");
        $qry->execute();
        if($qry->rowCount() > 0)
            return $qry->fetch();
        else
            return false;
    }

    function get_random_place() : mixed
    {
        $qry = $this->pdo->prepare("SELECT * FROM places ORDER BY RAND() LIMIT 1");
        $qry->execute();
        return $qry->fetch();
    }
}