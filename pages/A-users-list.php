<?php
// (A) GET USERS
$_CORE->Settings->defineN("USER_ROLES", true);
$users = $_CORE->autoCall("Users", "getAll");

// (B) DRAW USERS LIST
if (is_array($users)) { foreach ($users as $id=>$u) { ?>
<div class="d-flex align-items-center border p-2">
  <div class="flex-grow-1">
    <strong><?=$u["user_name"]?></strong><br>
    <small><?=USER_ROLES[$u["user_role"]]?> | <?=$u["user_email"]?></small>
  </div>
  <div>
    <?php if ($u["user_role"]!="I") { ?>
    <button class="btn btn-danger btn-sm mi" onclick="usr.del(<?=$id?>)">
      delete
    </button>
    <?php } ?>
    <button class="btn btn-primary btn-sm mi" onclick="usr.addEdit(<?=$id?>)">
      edit
    </button>
  </div>
</div>
<?php }} else { echo "No users found."; }

// (C) PAGINATION
$_CORE->load("Page");
$_CORE->Page->draw("usr.goToPage");