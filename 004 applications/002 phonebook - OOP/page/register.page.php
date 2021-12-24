

<!------ Include the above in your HEAD tag ---------->

<form class="form-horizontal" action='' method="POST">
    <fieldset>
        <div id="legend">
            <legend class="">Register</legend>
        </div>
        <div class="control-group">
            <!-- Username -->
            <label class="control-label" for="fullname">Full Name</label>
            <div class="controls">
                <input type="text" id="fullname" name="fullname" placeholder="" class="form-control input-xlarge">
                <p class=" fullname_msg"></p>
            </div>
        </div>

        <div class="control-group">
            <!-- E-mail -->
            <label class="control-label" for="email">E-mail</label>
            <div class="controls">
                <input type="text" id="email" name="email" placeholder="" class="form-control input-xlarge">
                <p class=" email_msg"></p>
            </div>
        </div>

        <div class="control-group">
            <!-- Password-->
            <label class="control-label" for="password">Password</label>
            <div class="controls">
                <input type="password" id="password" name="password" placeholder="" class="form-control input-xlarge">
                <p class=" password_msg"></p>
            </div>
        </div>

        <div class="control-group">
            <!-- Password -->
            <label class="control-label" for="password_confirm">Password (Confirm)</label>
            <div class="controls">
                <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="form-control input-xlarge">
                <p class=" password_repeat_msg"></p>
            </div>
        </div>

        <div class="control-group">
            <!-- Button -->
            <div class="controls">
                <button type="submit" id="register_form" class="btn btn-success">Register</button>
            </div>
        </div>
    </fieldset>
</form>