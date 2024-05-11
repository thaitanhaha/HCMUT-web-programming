<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In Form</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <div id="fail-modal" class="modal" hidden >
      <div class="modal-content">
        <span class="close">&times;</span>
        <p id='modal-paragraph'> </p>
      </div>
    </div>

    <div style="display: flex; align-items: center; ">
      <div style="display: flex; align-items: center; flex-direction: column; justify-content: center; background-color: #f0f0f0; width: 50vw;">
        <img src="../assets/shark.svg" style="width: 30vw; height: 30vh; margin-top: -20px"/>
      </div>
    
      <div style="display: flex; align-items: center; flex-direction: column; background-color: white; width: 50vw; height: 100vh; padding-top: 20vh;">
        <h1>Welcome to UniShark</h1>

        <form action="/admin/auth.php" style="width: 30vw" id="signinForm" method="POST">
          <div  style="display: flex; flex-direction: column; margin-top: 24px">
            <input id="action" name="action" value="signin" hidden />
            <label style="font-weight: 700" for="username"> Tài khoản</label>
            <input
              type="text"
              id="username"
               name="username"
               placeholder="Nhập tài khoản của bạn..."
              style="border-radius: 8px; padding: 10px; font-weight: 600"
            />
          </div>
          <div style="display: flex; flex-direction: column; margin-top: 24px">
            <label style="font-weight: 700" for="password">Mật khẩu</label>
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Nhập mật khẩu của bạn..."
              style="border-radius: 8px; padding: 10px; font-weight: 600"
            />
          </div>

          <button type="submit" style="width: 31.5vw; margin-top: 24px" onclick="validate()">
            Đăng nhập
          </button>
        </form>

        <div style="margin-top: 24px">
          <span style="font-size: small; font-weight: 600; color: gray"
            > Bạn chưa có tài khoản, bấm đây để đăng ký
          </span>
          <a
            href="./signup.php"
            style="
              text-decoration: none;
              color: #007bff;
              text-decoration: underline;
            "
            >Đăng ký</a
          >
        </div>
      </div>
    </div>
  </body>

  <script>
    var modal = document.getElementsByClassName('modal')[0];
    var span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
      modal.style.display = "none";
    }
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    function validate() {
      event.preventDefault(); 
      const signinForm = document.getElementById('signinForm');
      const username = signinForm.username.value;
      const password = signinForm.password.value;
      const failModal = document.getElementById('fail-modal');
      var modalParagraph = document.getElementById('modal-paragraph');
      if (username.length < 2 || username.length > 30) {
        modalParagraph.textContent = "Username have to have length between 2 and 30 characters";
        failModal.style.display = "block";
      } 
      else if (password.length < 2 || password.length > 30) {
        modalParagraph.textContent = "Password have to have length between 2 and 30 characters";
        failModal.style.display = "block";
      }
      else {
        var formData = new FormData(signinForm);
        fetch('/admin/auth.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            window.location.href = '/management/system.php';
          } else {
            modalParagraph.textContent = 'Credentials are incorrect';
            failModal.style.display = "block";
          }
        })
        .catch(error => {
          modalParagraph.textContent = 'Credentials are incorrect';
          failModal.style.display = "block";
        });


      }
    }
  </script>
</html>


<style>
body {
  font-family: sans-serif;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background-color: #f0f0f0;
}

.container {
  display: flex;
  align-items: center;
  width: 100%;
  height: 100%;
}

.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

input[type="text"]:focus {
  border: px solid black;
}

.form-group.checkbox {
  display: flex;
  align-items: center;
}

input[type="checkbox"] {
  margin-right: 10px;
}

button {
  display: inline-block;
  padding: 10px 20px;
  font-size: 16px;
  color: #fff;
  background-color: black;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: gray;
}

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}


.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

</style>