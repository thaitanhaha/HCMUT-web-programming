<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: /user/signin.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
  <header>
    <?php include "../utils/header.php" ?>
  </header>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
  </head>

<style>
  body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: white;
  }
</style>

  <body>
    <div style="display: flex; flex-direction: column; padding: 2em 10em 0px 10em">
      <h1>HỒ SƠ</h1>

      <div style="display: flex; gap: 10em;">
        <!-- <div
          style="display: flex; flex-direction: column; width: 200px; gap: 12px"
        >
          <h4>Tư cách thành viên</h4>
          <span style="margin-left: 1em">Hồ sơ</span>
          <span style="margin-left: 1em">Quản lý</span>
        </div> -->

        <div
          style="
            display: flex;
            flex-direction: column;
            width: 100%;
            border: 1px solid #e0e0e0;
            padding: 12px 32px 32px 32px;
          "
        >
          <h2>Thông tin cá nhân</h2>
          <div style="display: flex; gap: 10em">
            <div style="display: flex; flex-direction: column">
                <h3> Họ và Tên </h3>
                <span style="margin-top: -12px">
                 <?php echo $_SESSION['fullname'] ?>
                </span>
            </div>
            <div style="display: flex; flex-direction: column">
              <h3>Địa chỉ email</h3>
              <span style="margin-top: -12px">
                <?php echo $_SESSION['email'] ?>
              </span>
            </div>

    
            <div style="display: flex; flex-direction: column">
              <h3> Tài khoản </h3>
              <span style="margin-top: -12px"> <?php echo $_SESSION['username']?> </span>
            </div>

            <div style="display: flex; flex-direction: column">
              <h3> Giới tính</h3>
              <span style="margin-top: -12px"> <?php  echo $_SESSION['gender']; ?></span>
            </div>
          </div>

          <div
            style="
              background-color: #dadada;
              width: 100%;
              height: 1px;
              margin-top: 2em;
              margin-bottom: 2em;
            "
          ></div>

          <h1>Mã vạch thành viên</h1>
          <img
            style="width: 10em; height: 4em"
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAL4AAABGCAMAAABFa97bAAAAHnRFWHRTb2Z0d2FyZQBid2lwLWpzLm1ldGFmbG9vci5jb21Tnbi0AAABxVBMVEX///8AAAD+/v79/f1UVFQvLy8nJyfNzc14eHhBQUEPDw84ODjh4eFHR0cEBAQYGBhfX1+xsbEQEBCSkpLj4+N+fn6qqqo1NTXi4uKGhob6+vrp6enMzMz4+Pjx8fFZWVnT09PV1dVvb2+UlJSHh4e7u7uTk5MwMDAlJSXDw8NYWFhQUFDr6+sZGRnt7e0UFBRISEi4uLhJSUkBAQGvr6/m5uZxcXFoaGjKysoGBgYoKCjz8/PLy8tXV1c3Nzfw8PCoqKhaWlr5+fnl5eXBwcF2dnYaGhoNDQ0gICBhYWEMDAxPT09gYGA2NjYdHR0+Pj7q6uo5OTmysrK/v7+urq4HBwfa2tpiYmKdnZ2MjIykpKRmZmbHx8ctLS3u7u6BgYEiIiISEhJtbW0JCQnCwsIICAgyMjICAgK0tLSRkZH8/PyDg4N5eXmioqIRERHs7Ox6enoFBQXX19dMTEwXFxe5ubmmpqZ8fHzIyMjk5OTZ2dmQkJAuLi5eXl7g4OAVFRUODg4WFhacnJz7+/tpaWlycnJGRkZNTU1OTk5ubm6Xl5fo6Og9PT29vb1FRUXR0dFsbGzQ0NBRUVFKSkq6urpSUlLJycnzkPhEAAADIElEQVR4nO2W+VPTQBTH9wUslgDFKJegFBUsiBRBUDk8ihIpWA6pioqIiAgqKqLiCXjft/69ZrM5drcl6Q/WGZ33nWnzdveTt59Ok7QEgBD6ct/ZDDuyWQB7LDPuyCaJFXvEd1uL48+QSd4sTW/UR33UR33UR33UR33UR33UR33UR33UR33UR33UR33UR33UR33UR33UR33UR33UR33Uz6L+n89f6I36fltkszfq+22Rzd6o77dFNnujvt8W2ez9j+v/Z1FyA2bUSnnlGJ3uGHOZjltpzn/wKI/vk5YhX/d7MryDZ5/U5Kyz/p9VGYOtO3Zq0Ra2F+k1p09TZpwht4nMkKVFeMz68Awp6A6tvqmx9/isf/NkeAeRyTA5ZflbjEM1RHY1tx7oMuf0fgG5PA2zRGbuJTUIpDJPNQi+ak1a/m2J+IIf4zrwTKYpgQp6CNcqhOyFblorMMATVfrMDSIzdyHykNN3mFx4Rsgo3GFaQTicpo/AcA48k2E2gLrZGbTBQXroBG1w4KQ9GZ6cvsqdYDHl95uIq+8yy/PGRyTRZXMwBl/cE9dgBAdpL98UaFq5M1DaoZ0eY8fNS19hsypMDxSkMDSuvsuEVp4b75MhWr9PwtTq97AnIzqIe/mnEEqdurEaOg5ZkkMjATjL6tpLV2B+IZXh9V2mAV5UNtZBIa1LADQNkgtejOgg7OWfPFCdujYE+zrdpS6odupZ+zoVGf7WtZnyVfPp8Y7WwzChKBXw04sRHfi9Msh62GiXdbB7D7/UCWVOPadp6RhB32aGXg5GIGE+SCb1OWNeT3gxggPPZJIgbLKqGlCbhKVROOe21BfTMaI+Y4wo3cA+ZNy8ukP5XgzvIDH+CRTlWFUF1PMLyohWdJ4WF2LG8+8ae1hKjKPPM4R+R29Z8QE+EvIDgl4M7yAx/sm3736yDRqKjZiP6Z6+E8Ydd4aWsXhSzY1Ab4/McPoCQ0gpvI6xqr61qKV5ZuaXF8M5SEwGUYvtajv7wT5C66PxxHD7KTY/cVGfGr9+M4WhKXuSyhDS12//gpKlT9Foc5U3wzmIjJTf+WijnhXZVzMAAAAASUVORK5CYII="
          />
          <p style="width: 300px">
            Vui lòng đưa mã vạch trên thẻ thành viên này cho nhân viên thu ngân
            khi bạn thanh toán cho sản phẩm đã mua.
          </p>
          <div style="display: flex; gap: 60em">
            <button
              style="
                border: 1px black solid;
                width: 200px;
                height: 50px;
                background-color: white;
                color: black;
                font-weight: 700;
              "
            >
              IN MÃ VẠCH
            </button>
            <button
              style="
                border: 1px black solid;
                width: 200px;
                height: 50px;
                background-color: red;
                color: white;
                font-weight: 700;
              "
              onclick="signout()"
            >
              ĐĂNG XUẤT
            </button>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script> 
    function signout(){
      fetch('/user/auth.php', {
        method: 'POST',
        body: new URLSearchParams({
          action: 'signout'
        }),
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          window.location.href = '/user/signin.php';
        }
      })
    }

  </script>
</html>
