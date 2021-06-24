<?php
include("SQLConnection.php");

class SQLQueries
{
     private $db;
     public function __construct()
     {
         $this->db = new SQLConnection();
     }

    public function getRoles($id) {
        //$result = $this->db->getConnection()->prepare("SELECT * from user u left join roles   on u.id = rol.user join roles  r on  r.id = rol.role  where u.id = :id");
        //where id = :id
        $result = $this->db->getConnection()->prepare("SELECT  name from user  join roles_user on user.id = roles_user.user  join roles  on  roles.id = roles_user.role where user.id = :id");
        $result->bindParam(':id', $id);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUser($username) {
        $result = $this->db->getConnection()->prepare("SELECT * FROM user WHERE username = :user");
        $result->bindParam(':user', $username);
        //$result->bindParam(':pass', $password);
        $result->execute();
        return  $result->fetch(PDO::FETCH_ASSOC);
    }

    public function getPositions() {
         $result = $this->db->getConnection()->prepare("SELECT name from position");
         $result->execute();
         return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getBranches() {
        $result = $this->db->getConnection()->prepare("SELECT name from branch");
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBranch($id) {
         $result = $this->db->getConnection()->prepare("Select name from user join branch_user on user.id = branch_user.user join branch on branch.id = branch_user.branch where user.id = :id");
         $result->bindParam(':id', $id);
         $result->execute();
         return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function getPosition($id) {
        $result = $this->db->getConnection()->prepare("Select name from user join position_user on user.id = position_user.user join position on position.id = position_user.position where user.id = :id");
        $result->bindParam(':id', $id);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function updateUserInfo() {
        $result = $this->db->getConnection()->prepare("update user set username = :username , phone_number= :phoneNumber , landline = :landline where id = :id");
        $result->bindParam(':username', $_POST['inputUsername']);
        $result->bindParam(':phoneNumber', $_POST['inputPhoneNumber']);
        $result->bindParam(':landline', $_POST['inputLandline']);
        $result->bindParam(':id', $_SESSION['user']['id']);
        $result->execute();

        /**  update user's place of work  */
        $query = $this->db->getConnection()->prepare("select id from branch where name = :name");
        $query->bindParam(':name', $_POST['branches']);
        $query->execute();
        $branch_id = $query->fetch(PDO::FETCH_ASSOC);

        $query2 = $this->db->getConnection()->prepare("update branch_user set branch = :branch where user = :user");
        $query2->bindParam(':branch', $branch_id['id']);
        $query2->bindParam(':user', $_SESSION['user']['id']);
        $query2->execute();
        /**  update user's  work position */
        $query3 = $this->db->getConnection()->prepare("select id from position where name = :name");
        $query3->bindParam(':name', $_POST['positions']);
        $query3->execute();
        $position_id = $query3->fetch(PDO::FETCH_ASSOC);

        $query4 = $this->db->getConnection()->prepare("update position_user set position = :position  where user = :user");
        $query4->bindParam(':user', $_SESSION['user']['id']);
        $query4->bindParam(':position', $position_id['id']);
        $query4->execute();

    }


}