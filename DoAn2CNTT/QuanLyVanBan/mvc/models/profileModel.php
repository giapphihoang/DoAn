<?php
class profileModel extends DB
{
    public function getProfile()
    {
        $query = 'SELECT `pass`,`name` FROM `user` WHERE user = "'.$_SESSION['user'].'"';
        $result = mysqli_query($this->con, $query);
        return $result;
    }
    public function updateProfile()
    {
        //xử lí dữ liệu đầu vào
        foreach ($_POST as $key => $value) {
            $_POST[$key] = addslashes($value);
        }
        $updateName = "";
        $updatePass = "";
        //đổi tên
        if (isset($_POST['name'])) {
            $updateName = $this->updateName($_POST['name']);
        }
        //đổi pass
        if (isset($_POST['newpass']) && isset($_POST['repeatpass']) && isset($_POST['oldpass'])) {
            $updatePass = $this->updatePass($_POST['oldpass'], $_POST['newpass'], $_POST['repeatpass']);
        }
        return array("updateName"=>$updateName,"updatePass"=>$updatePass);
    }
    public function validateName($str="")
    {
        if ($str=="") {
            return false;
        }
        $reg = "/^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/";
        return preg_match($reg, $str);
    }
    public function updatePass($oldpass, $newpass, $repeatpass)
    {
        if (!empty($oldpass)) {
            if (strlen($newpass)>5) {
                if ($newpass==$repeatpass) {
                    $query = 'SELECT `pass` FROM `user` WHERE user = "'.$_SESSION['user'].'" AND pass = "'.md5($oldpass).'"';
                    $result = mysqli_query($this->con, $query);
                    if (mysqli_num_rows($result)>0) {
                        $query = 'UPDATE `user` SET `pass`="'.md5($newpass).'" WHERE `user`= "'.$_SESSION['user'].'"';
                        $result = mysqli_query($this->con, $query);
                        if ($result) {
                            return "Thành công";
                        } else {
                            return "Không thể đổi mật khẩu";
                        }
                    } else {
                        return "Mật khẩu hiện tại không chính xác";
                    }
                } else {
                    return "Mật khẩu mới không trùng nhau";
                }
            } else {
                return "Mật khẩu quá ngắn";
            }
        }
    }
    public function updateName($name="")
    {
        if ($name != "") {
            $query = 'SELECT `name` FROM `user` WHERE user = "'.$_SESSION['user'].'"';
            $result = mysqli_query($this->con, $query);
            $row = mysqli_fetch_assoc($result);
            if ($name != $row["name"]) {
                if ($this->validateName($name)) {
                    $query = 'UPDATE `user` SET `name`="'.$name.'" WHERE `user`= "'.$_SESSION['user'].'"';
                    $result = mysqli_query($this->con, $query);
                    if ($result) {
                        return "Thành công";
                    } else {
                        return "Không thể đổi tên";
                    }
                } else {
                    return "Tên không hợp lệ";
                }
            }
        }
    }
}
