<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="wrap">
        <h1>Login</h1>
        <form action="{{ route('admins.nhtLoginSubmit') }}" method="POST">
            @csrf

            <div class="user-box">
                <input type="text" name="nhtTaiKhoan" id="nhtTaiKhoan" value="{{ old('nhtTaiKhoan') }}" />
                <label for="nhtTaiKhoan">Username</label>
                @error('nhtTaiKhoan')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="user-box">
                <input type="password" name="nhtMatKhau" id="nhtMatKhau" />
                <label for="nhtMatKhau">Password</label>
                @error('nhtMatKhau')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="remember-forgot">
                <div class="remember">
                    <input type="checkbox" id="remember" name="remember" onclick="toggleForgetPassword()" />
                    <label for="remember">Remember me</label>
                </div>
            </div>

            <input type="submit" value="Login" class="login" />

        </form>

        <a href="#" class="next hidden-when-remembered" id="goBackLink">Go Back</a>
    </div>

    <script>
      function toggleForgetPassword() {
        const isChecked = document.getElementById('remember').checked;
        
        const forgetPasswordLink = document.getElementById('forgotPasswordLink');
        const goBackLink = document.getElementById('goBackLink');
        
        if (isChecked) {
          forgetPasswordLink.classList.add('hidden');
          goBackLink.classList.add('hidden');
        } else {
          forgetPasswordLink.classList.remove('hidden');
          goBackLink.classList.remove('hidden');
        }

        if (isChecked) {
          const username = document.getElementById('nhtTaiKhoan').value;
          const password = document.getElementById('nhtMatKhau').value;
          document.cookie = `nhtTaiKhoan=${username}; path=/; max-age=31536000`; 
          document.cookie = `nhtMatKhau=${password}; path=/; max-age=31536000`; 
        } else {

          document.cookie = 'nhtTaiKhoan=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC';
          document.cookie = 'nhtMatKhau=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC';
        }
      }

      window.onload = function() {
        const cookies = document.cookie.split(';');
        let username = '';
        let password = '';
        cookies.forEach(cookie => {
          if (cookie.trim().startsWith('nhtTaiKhoan=')) {
            username = cookie.trim().split('=')[1];
          }
          if (cookie.trim().startsWith('nhtMatKhau=')) {
            password = cookie.trim().split('=')[1];
          }
        });

        if (username && password) {
          document.getElementById('nhtTaiKhoan').value = username;
          document.getElementById('nhtMatKhau').value = password;
          document.getElementById('remember').checked = true;
          toggleForgetPassword();
        }
      };
    </script>

</body>
</html>