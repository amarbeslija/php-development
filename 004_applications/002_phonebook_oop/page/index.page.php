
<div class="phonebook-container">
    <div class="phonebook-content">
        <!-- Search Form for All Users -->
        <form action="<?php echo URL . "/function/search.function.php" ?>" method="POST">
            <input type="text" name="search" required>
            <input type="submit" value=" <?=Language::get("app", "search"); ?> ">
            <a href="index">  <?=Language::get("app", "reset-search"); ?> </a>
        </form>

        <!-- Feedback Message -->
        <?php if(isset($_GET['message'])){
            echo "<h3>" . $_GET['message'] . "</h3>";
        }
        ?>

        <!-- Table with all Users -->
        <table class="phonebook-table">
            <tr>
                <td> <?=Language::get("table", "id");?> </td>
                <td> <?=Language::get("table", "firstname");?> </td>
                <td> <?=Language::get("table", "lastname");?> </td>
                <td> <?=Language::get("table", "email");?> </td>
                <td> <?=Language::get("table", "phone");?> </td>
            </tr>

            <?php
                if(isset($_GET['data'])){
                    $data = json_decode($_GET['data'], true);
                    if(is_array($data)){
                        foreach($data as $user){
                            echo "<tr>";
                            echo "<td>" . $user["id"] . "</td>";
                            echo "<td>" . $user["firstname"] . "</td>";
                            echo "<td>" . $user["lastname"] . "</td>";
                            echo "<td>" . $user["email"] . "</td>";
                            echo "<td>" . $user["phone"] . "</td>";
                            echo "<td> <a href='update?id=" . $user["id"] . "'>" . Language::get("app", "edit") . "</a> </td>";
                            echo "<td> <a href='delete?id=" . $user["id"] . "'>" . Language::get("app", "delete") . "</a> </td>";
                            echo "</tr>";
                        }
                    }else{
                        echo Language::get("app", "no-users");
                    }
                }else{
                    $users = new User();
                    $all_users = $users->get_all();
                    if(is_array($all_users)){
                        foreach($all_users as $user){
                            echo "<tr>";
                            echo "<td>" . $user["id"] . "</td>";
                            echo "<td>" . $user["firstname"] . "</td>";
                            echo "<td>" . $user["lastname"] . "</td>";
                            echo "<td>" . $user["email"] . "</td>";
                            echo "<td>" . $user["phone"] . "</td>";
                            echo "<td> <a href='update?id=" . $user["id"] . "'>" . Language::get("app", "edit") . "</a> </td>";
                            echo "<td> <a href='delete?id=" . $user["id"] . "'>" . Language::get("app", "delete") . "</a> </td>";
                            echo "</tr>";
                        }
                    }else{
                        echo Language::get("app", "no-users");
                    }                    
                }
                
            ?>

        </table>
    </div>
</div>