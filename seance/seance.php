<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "BtB";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);

        $sql = "SELECT id, name, style, image FROM play WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '
            <div class="item">
                <div class="content-flex" style="width:1200px;">
                    <div class="item-place">
                        <div class="item-box">
                            <div class="item-box-left">
                                <img src="' . $row["image"] . '" style="border-radius:6px;max-width:100%;height:100%;">
                            </div>
                            <div class="item-box-right">
                                <div class="item-box-style">' . $row["style"] . '</div>
                                <div class="item-box-name">' . $row["name"] . '</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';
        } else {
            echo "Спектакль не найден";
        }

        $stmt->close();
    } else {
        echo "ID спектакля не указан";
    }

    $conn->close();

?>