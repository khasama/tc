<?php
    // Tất cả chức năng ở đây

    # Sản phẩm func
        // Lấy tất cả bánh
        function all_cakes(){
            require "ConDB.php";
            $sql = "
                SELECT * FROM tb_cakes
                INNER JOIN tb_loaicake
                ON tb_cakes.idLC = tb_loaicake.idLC
                INNER JOIN tb_trangthaicake
                ON tb_cakes.idTTC = tb_trangthaicake.idTTC
            ";
            $pre = $conn->prepare($sql);
            $pre->execute();
            return $pre->fetchAll();
        }
        // Lấy thông tin của 1 loại bánh
        function info_cake($idCake){
            require "ConDB.php";
            $sql = "
                SELECT * FROM tb_cakes
                INNER JOIN tb_loaicake
                ON tb_cakes.idLC = tb_loaicake.idLC
                INNER JOIN tb_trangthaicake
                ON tb_cakes.idTTC = tb_trangthaicake.idTTC
                WHERE idCake = :idCake
            ";
            $pre = $conn->prepare($sql);
            $pre->bindParam(":idCake", $idCake, PDO::PARAM_INT);
            $pre->execute();
            return $pre->fetchAll();
        }
        // Lấy bánh theo loại bánh
        function loai_cakes($idLC){
            require "ConDB.php";
            $sql = "
                SELECT * FROM tb_loaicake
                INNER JOIN tb_cakes
                ON tb_cakes.idLC = tb_loaicake.idLC
                WHERE tb_loaicake.idLC = :idLC
            ";
            $pre = $conn->prepare($sql);
            $pre->bindParam(":idLC", $idLC, PDO::PARAM_INT);
            $pre->execute();
            return $pre->fetchAll();
        }
        // Lấy bánh mới
        function new_cakes(){
            require "ConDB.php";
            $sql = "
                SELECT * FROM tb_loaicake
                INNER JOIN tb_cakes
                ON tb_cakes.idLC = tb_loaicake.idLC
                LIMIT 0,8
            ";
            $pre = $conn->prepare($sql);
            $pre->execute();
            return $pre->fetchAll();
        }
    #

    # Loại bánh func
        // Lấy tất cả loại bánh
        function all_loai(){
            require "ConDB.php";
            $sql = "
                SELECT * FROM tb_loaicake
            ";
            $pre = $conn->prepare($sql);
            $pre->execute();
            return $pre->fetchAll();
        }
    #
    
    # Đơn hàng func
        // Lấy tất cả đơn hàng
        function all_orders(){
            require "ConDB.php";
            $sql = "
                SELECT * FROM tb_order
                INNER JOIN tb_orderstatus
                ON tb_order.idOS = tb_orderstatus.idOS
            ";
            $pre = $conn->prepare($sql);
            $pre->execute();
            return $pre->fetchAll();
        }
        // Lấy trạng thái đơn hàng
        function status_order(){
            require "ConDB.php";
            $sql = "
                SELECT * FROM tb_orderstatus
            ";
            $pre = $conn->prepare($sql);
            $pre->execute();
            return $pre->fetchAll();
        }
    #

    # Tìm kiếm phân trang
        // Lấy bánh theo loại bánh
        function cakes_menu($idLC, $start){
            require "ConDB.php";
            $sql = "
                SELECT * FROM tb_cakes
                INNER JOIN tb_loaicake
                ON tb_cakes.idLC = tb_loaicake.idLC
                WHERE tb_cakes.idLC = :idLC
                LIMIT 0,12
            ";
            $pre = $conn->prepare($sql);
            $pre->bindParam(":idLC", $idLC, PDO::PARAM_INT);
            $pre->execute();
            return $pre->fetchAll();
        }
        // Lấy số lượng bánh theo loại bánh
        function count_cakes_menu($idLC){
            require "ConDB.php";
            $sql = "
                SELECT idCake FROM tb_cakes
                WHERE tb_cakes.idLC = :idLC
            ";
            $pre = $conn->prepare($sql);
            $pre->bindParam(":idLC", $idLC, PDO::PARAM_INT);
            $pre->execute();
            return $pre->rowCount();
        }
    #

    # Người dùng func
        // Lấy tất cả người dùng
        function all_users(){
            require "ConDB.php";
            $sql = "
                SELECT * FROM tb_user
                INNER JOIN tb_loaiuser
                ON tb_user.idLU = tb_loaiuser.idLU
            ";
            $pre = $conn->prepare($sql);
            $pre->execute();
            return $pre->fetchAll();
        }
    #
?>