// Lấy thẻ HTML của các input và checkbox
var usernameInput = document.querySelector('input[type="text"]');
var passwordInput = document.querySelector('input[type="password"]');
var rememberMeCheckbox = document.getElementById('rememberMe');

// Kiểm tra xem đã lưu thông tin đăng nhập trong local storage chưa
var savedUsername = localStorage.getItem('username');
var savedPassword = localStorage.getItem('password');

if (savedUsername && savedPassword) {
  // Nếu đã lưu, tự động điền thông tin đăng nhập và đánh dấu checkbox
  usernameInput.value = savedUsername;
  passwordInput.value = savedPassword;
  rememberMeCheckbox.checked = true;
}

// // Xử lý sự kiện click vào nút "Đăng nhập"
// var loginButton = document.querySelector('.login');
//   loginButton.addEventListener('click', function(event) {
//   // Ngăn chặn hành động mặc định của nút submit
//   event.preventDefault();

//   // Lấy giá trị của các input và checkbox
//   var username = usernameInput.value;
//   var password = passwordInput.value;
//   var rememberMe = rememberMeCheckbox.checked;

//   // Lưu thông tin đăng nhập vào local storage nếu checkbox được đánh dấu
//   if (rememberMe) {
//     localStorage.setItem('username', username);
//     localStorage.setItem('password', password);
//   } else {
//     localStorage.removeItem('username');
//     localStorage.removeItem('password');
//   }

//   // Chuyển hướng qua trang đăng kí
//   // window.location.href = '../user/register.html';
  
// });

// Lấy các thẻ HTML của các liên kết
const forgotPasswordLink = document.querySelector('.forgot-password');
const registerLink = document.querySelector('.register');

// Xử lý sự kiện click vào liên kết "Quên mật khẩu?"
forgotPasswordLink.addEventListener('click', (event) => {
  // Ngăn chặn hành động mặc định của liên kết
  event.preventDefault();
  // Chuyển hướng qua trang quên mật khẩu
  window.location.href = '../user/forgotPassword.html';
});

// Xử lý sự kiện click vào liên kết "Đăng ký ngay"
registerLink.addEventListener('click', (event) => {
  // Ngăn chặn hành động mặc định của liên kết
  event.preventDefault();
  // Chuyển hướng qua trang đăng ký
  window.location.href = '../user/register.html';
});

