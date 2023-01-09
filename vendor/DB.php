<?php

class DB
{
    public function __construct()
    {
        $host = 'localhost';
        $port = '3306';
        $name = 'practicetask-1';
        $user = 'root';
        $pass = '';
        try {
            $this->db = new PDO(
                'mysql:' .
                'host=' . $host . ';' .
                'port=' . $port . ';' .
                'dbname=' . $name,
                $user,
                $pass
            );
        } catch (Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }

    public function __destruct()
    {
        $this->db = null;
    }

    public function addUser($email, $password)
    {
        $query = "INSERT INTO `users` (`email`, `password`) VALUES ('$email', '$password')";
        return $this->db->query($query);
    }

    public function getUser($email)
    {
        $query = "SELECT * FROM `users` WHERE email = '$email'";
        return $this->db->query($query)->fetchObject();
    }

    private function _filterText($str): string
    {
        $str = str_replace("'", "\'", $str);
        str_replace('"', '\"', $str);
        str_replace('%', '\%', $str);
        str_replace('  ', ' ', $str);
        return trim($str);
    }

    public function addComplaint($email, $problem_text, $gender, $mailing)
    {
        $user_id = $this->getUser($email)->id;
        $problem_text = $this->_filterText($problem_text);
        $query = "INSERT INTO `complaint` (`user_id`, `problem_text`, `gender`, `mailing`)
                VALUES ('$user_id', '$problem_text', '$gender', '$mailing')";
        return $this->db->query($query);
    }
}