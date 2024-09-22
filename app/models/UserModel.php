<?php

class UserModel
{
    private static $table = 'users';

    public static function login($data)
    {
        $username = $data['username'];
        $password = $data['password'];

        $conn = Database::getConnection();
        $query = "SELECT * FROM " . self::$table . " WHERE username = ? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role'];
                var_dump($_SESSION);
                return true;
            }
        }

        return false;
    }

    public static function register($data)
    {
        $username = $data['username'];
        $inputPassword = $data['password'];
        $password = password_hash($inputPassword, PASSWORD_DEFAULT);
        $role = 'user';

        $conn = Database::getConnection();
        $query = "INSERT INTO " . self::$table . " (username, password, role) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sss', $username, $password, $role);
        return $stmt->execute();
    }

    public static function getAllUser()
    {
        $conn = Database::getConnection();
        $query = "SELECT * FROM " . self::$table;
        $result = $conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function getUserById($id)
    {
        $conn = Database::getConnection();
        $query = "SELECT * FROM " . self::$table . ' WHERE id = ?';
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public static function updateUser($data)
    {
        $id = $data['id'];
        $username = $data['username'];
        $inputPassword = $data['password'];
        $role = $data['role'];
        $password = password_hash($inputPassword, PASSWORD_DEFAULT);

        $conn = Database::getConnection();
        $query = "UPDATE " . self::$table . " SET username = ?, password = ?, role = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssi', $username, $password, $role, $id);
        return $stmt->execute();
    }

    public static function deleteUser($id)
    {
        $conn = Database::getConnection();
        $query = "DELETE FROM " . self::$table . " WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    public static function search($data)
    {
        $keyword = "%" . $data['keyword'] . "%";
        $conn = Database::getConnection();
        $query = "SELECT * FROM " . self::$table . " WHERE username LIKE ? OR role LIKE ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $keyword, $keyword);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
