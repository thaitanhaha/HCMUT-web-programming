<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In Form</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <div
      style="
        display: flex;
        align-items: center;
        width: 100vw;
        height: 100vh;
        overflow-y: hidden;
      "
    >
      <div
        style="
          display: flex;
          align-items: center;
          flex-direction: column;
          justify-content: center;
          background-color: #f6f6f6;
          width: 50vw;
          height: 100vh;
        "
      >
        <img
          src="../assets/shark.svg"
          style="width: 40vw; height: 40vh; margin-top: -20px"
        />
      </div>
      <div
        style="
          display: flex;
          align-items: center;
          flex-direction: column;
          background-color: white;
          width: 50vw;
          height: 100vh;
          padding-top: 20vh;
        "
      >
        <h1>Welcome to BTL Lap Trinh Web</h1>

        <form action="#" style="width: 30vw" id="signupForm">
          <div style="display: flex; flex-direction: column; margin-top: 24px">
            <label style="font-weight: 700" for="account">Tài khoản</label>
            <input
              type="text"
              id="account"
              name="account"
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

          <button type="submit" style="width: 31.5vw; margin-top: 24px">
            Đăng nhập
          </button>
        </form>

        <div style="margin-top: 24px">
          <span style="font-size: small; font-weight: 600; color: gray"
            >Bạn chưa có tài khoản, bấm đây để đăng ký
          </span>
          <a
            href="signup.html"
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
    document
      .getElementById("signupForm")
      .addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the default form submission

        // You can access form fields and their values here
        var account = document.getElementById("account").value;
        var password = document.getElementById("password").value;

        if (!account) {
          alert("Account is required");
        } else if (!password) {
          alert("Password is required");
        } else {
          alert("Sign In successful");
        }
      });
  </script>
</html>
