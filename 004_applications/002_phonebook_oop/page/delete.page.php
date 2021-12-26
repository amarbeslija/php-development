<?php
if(isset($_GET['id'])){

    $id = $_GET['id'];
    $user = new User();
    $user = $user->get($id);

    if(is_array($user)){
        $firstname = $user[0]['firstname'];
        $lastname = $user[0]['lastname'];
        $email = $user[0]['email'];
        $phone = $user[0]['phone'];
    }

}

if(isset($_GET['id'])){

?>

<div class="phonebook-container">
    <div class="phonebook-content">
        <h1><?=Language::get("app", "delete-heading");?></h1>
        <h2><?=Language::get("app", "delete-question");?></h2>
        <ul>
            <li><?=Language::get("table", "firstname");?> : <?= $firstname; ?></li>
            <li><?=Language::get("table", "lastname");?> : <?= $lastname; ?></li>
            <li><?=Language::get("table", "email");?> : <?= $email; ?></li>
            <li><?=Language::get("table", "phone");?> : <?= $phone; ?></li>
        </ul>
        <!-- Search Form for All Users -->
        <form class="phonebook-delete" action="<?php echo URL . "/function/delete.function.php" ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?> ">
            <input type="submit" value=" <?=Language::get("app", "delete");?> ">
                <a onclick="history.back()"> <?=Language::get("app", "go-back");?> </a>
        </form>
    </div>
</div>

<?php

}else{
    ?>
        <div class="phonebook-container">
            <div class="phonebook-content">
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
                                echo "<td> <a href='delete?id=" . $user["id"] . "'> Delete </a> </td>";
                                echo "</tr>";
                            }
                        }else{
                            echo Language::get("app", "no-users");
                        }
                        
                    ?>

                </table>
            </div>
        </div>
    <?php
}