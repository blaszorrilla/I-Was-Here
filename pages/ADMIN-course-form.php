<?php
// (A) GET COURSE
$edit = isset($_POST["id"]) && $_POST["id"]!="";
if ($edit) {
  $course = $_CORE->autoCall("Courses", "get");
}

// (B) COURSE FORM ?>
<form onsubmit="return course.save()">
  <h3 class="mb-4"><?=$edit?"EDIT":"ADD"?> COURSE</h3>
  <input type="hidden" id="course_id" value="<?=isset($course)?$course["course_id"]:""?>"/>

  <div class="bg-white border p-4 mb-4">
    <h5 class="mb-4">BASIC COURSE INFORMATION</h5>
    <div class="input-group mb-4">
      <div class="input-group-prepend">
        <span class="input-group-text mi">code</span>
      </div>
      <input type="text" class="form-control" id="course_code" required value="<?=isset($course)?$course["course_code"]:""?>" placeholder="Course Code"/>
    </div>

    <div class="input-group mb-4">
      <div class="input-group-prepend">
        <span class="input-group-text mi">format_quote</span>
      </div>
      <input type="text" class="form-control" id="course_name" required value="<?=isset($course)?$course["course_name"]:""?>" placeholder="Course Name"/>
    </div>

    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text mi">description</span>
      </div>
      <input type="text" class="form-control" id="course_desc" value="<?=isset($course)?$course["course_desc"]:""?>" placeholder="Course Description"/>
    </div>
  </div>

  <div class="bg-white border p-4 mb-4">
    <h5 class="mb-4">START-END DATE</h5>
    <div class="input-group mb-4">
      <div class="input-group-prepend">
        <span class="input-group-text mi">today</span>
      </div>
      <input type="date" class="form-control" id="course_start" required value="<?=isset($course)?$course["course_start"]:""?>"/>
    </div>

    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text mi">event</span>
      </div>
      <input type="date" class="form-control" id="course_end" required value="<?=isset($course)?$course["course_end"]:""?>"/>
    </div>
  </div>

  <input type="button" class="col btn btn-danger btn-lg" value="Back" onclick="cb.page(1)"/>
  <input type="submit" class="col btn btn-primary btn-lg" value="Save"/>
</form>
