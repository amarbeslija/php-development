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
        <h1><?=Language::get("app", "edit-heading");?></h1>
        <!-- Search Form for All Users -->
        <form class="phonebook-add" action="<?php echo URL . "/function/update.function.php" ?>" method="POST">
            <input type="text" name="firstname" placeholder="First Name" value="<?php echo $firstname; ?>" required>
            <input type="text" name="lastname" placeholder="Last Name" value="<?php echo $lastname; ?>" required>
            <input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
            <input type="text" name="phone" placeholder="Phone" value="<?php echo $phone; ?>" required>
            <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
            <div class="form-container">
                <input type="submit" value=" <?=Language::get("app", "edit");?> ">
                <a onclick="history.back()"> <?=Language::get("app", "go-back");?> </a>
            </div>
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
                                echo "<td> <a href='update?id=" . $user["id"] . "'> Edit </a> </td>";
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