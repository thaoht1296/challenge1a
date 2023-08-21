<?php
  session_start();
  require 'dbcon.php';
  include 'lect_header.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
</head>
<body>
  <div style="display: flex; margin: 20px">
    <div style="width: 25%; margin-top: 20px;">
      <div style="padding: 10px 5px; border: 1px solid black; background: #eef3fc">Tên user 1</div>
      <div style="padding: 10px 5px; border: 1px solid black; background: #eef3fc">Tên user 2</div>
      <div style="padding: 10px 5px; border: 1px solid black; background: #eef3fc">Tên user 3</div>
      <div style="padding: 10px 5px; border: 1px solid black; background: #eef3fc">Tên user 4</div>
    </div>
    <div style="margin: 10px; width: 50%">
      <div style="width: 90%">
<!--        tin1-->
        <div style="margin: 20px 10px;">
          <div><b>Tên user 1</b></div>
          <div style="padding: 10px; background: aliceblue; border-radius: 10px; border: 1px solid black">
            Message gửi user 2 nè!
<!--              <span innerText="hello /n hello"></span>-->
<!--              <span innerHtml="hell <br> hello"></span>-->
          </div>
          <div style="margin-left: 10px">
            <span style="margin-right: 15px; cursor: pointer"><b>Edit</b></span>
            <span style="cursor: pointer; color: red"><b>Delete</b></span>
          </div>
        </div>
<!--        tin2-->
        <div style="margin: 20px 10px;">
          <div><b>Tên user 1</b></div>
          <div style="padding: 10px; background: aliceblue; border-radius: 10px; border: 1px solid black">
            Message gửi user 2 nè!
          </div>
          <div style="margin-left: 10px">
            <span style="margin-right: 15px; cursor: pointer"><b>Edit</b></span>
            <span style="cursor: pointer; color: red"><b>Delete</b></span>
          </div>
        </div>
      </div>
      <hr>
      <div style="display: flex; justify-content: space-around; align-items: start;">
        <textarea placeholder="Text message..." rows="3"
                  style="border-radius: 10px; background: #f6f6f6; width: 90%; padding: 10px">
            Message gui ban/n
        </textarea>
        <button class="btn btn-info ml-3">Send</button>
      </div>
    </div>
    <div style="width: 25%; background: #ffffebe3; padding: 20px; min-height: 400px">
        <div style="width: 50px; height: 50px; margin: auto">
            <img style="width: 50px; height: 50px" src="./user.png" alt="user-image">
        </div>
          <div style="line-height: 2; width: fit-content; margin: auto;">
            <div><b>Full name:</b> Ho ten</div>
            <div><b>Email:</b> email@gmail.com</div>
            <div style="margin-bottom: 10px"><b>Phone:</b> 012345678</div>
            <div style="text-align: center;"><input type="submit" class="btn btn-success" value="Edit"></div>
          </div>

<!--      div nay chi sua thong tin-->
<!--      <div style="width: fit-content; margin: auto;">-->
<!--        <form action="">-->
<!--          <label>Email:</label><br>-->
<!--          <input type="text" id="fname" name="email" value="email1111"><br><br>-->
<!--          <label>Phone:</label><br>-->
<!--          <input type="text" id="lname" name="phone" value="0123234"><br><br>-->
<!--          <label>Password:</label><br>-->
<!--          <input type="text" id="pass" name="password" value="hello@1r3"><br><br>-->
<!--          <div style="text-align: center;">-->
<!--            <input type="submit" class="btn btn-success" value="Update">-->
<!--          </div>-->
<!--        </form>-->
<!--      </div>-->
    </div>
  </div>
</body>
</html>