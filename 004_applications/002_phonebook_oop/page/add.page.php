
<div class="phonebook-container">
    <div class="phonebook-content">
        <h1><?=Language::get("app", "add-heading");?></h1>
        <!-- Search Form for All Users -->
        <form class="phonebook-add" action="<?php echo URL . "/function/add.function.php" ?>" method="POST">
            <input type="text" name="firstname" placeholder="First Name" required>
            <input type="text" name="lastname" placeholder="Last Name" required>
            <input type="text" name="email" placeholder="Email" required>
            <input type="text" name="phone" placeholder="Phone" required>
            <div class="form-container">
                <input type="submit" value="Add User">
                <a onclick="history.back()"> <?=Language::get("app", "go-back");?> </a>
            </div>
        </form>
    </div>
</div>