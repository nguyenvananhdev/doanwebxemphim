const signInPasswordLink = document.querySelector('.btn-primary_pan');
// Xử lý sự kiện click vào liên kết "huỷ?"
signInPasswordLink.addEventListener('click', (event) => {
    // Ngăn chặn hành động mặc định của liên kết
    event.preventDefault();
    // Chuyển hướng qua trang đăng nhập
    window.location.href = '../user/SignIn.html';
  });