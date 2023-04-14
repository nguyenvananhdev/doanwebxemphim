<!doctype html>
<html lang="en">

<head>
    <title>Đăng ký</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register.css">
    <script src="js/checkEmail.js"></script>
</head>

<body class="d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center" style="margin:20px;">
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-title">
                    Đăng ký
                </div>
                <div class="col-lg-12 login-form">
                    <form action="php/reg.php" method="post">
                        <div class="form-group">
                            <label class="form-control-label">Tên</label>
                            <input type="text" name="username" class="form-control" id="username">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" id="phone">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Mật khẩu</label>
                            <input type="password" name="password" class="form-control" id="password" i>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-control-label">Ngày sinh</label>
                                    <input type="date" name="date" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Giới tính</label>
                                    <select name="gender" class="form-control">
                                      <option value="">Chọn giới tính</option>
                                      <option value="male">Nam</option>
                                      <option value="female">Nữ</option>
                                   </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Khu vực</label>
                            <select name="province" class="form-control" id="province">
                              <option value="">Chọn Khu vực</option>
                              <option value="Hà Nội">Hà Nội</option>
                              <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                              <option value="Đà Nẵng">Đà Nẵng</option>
                              <option value="Hải Phòng">Hải Phòng</option>
                              <option value="Khánh Hoà">Khánh Hoà</option>
                            </select>
                        </div>

                        <div class="col-12 login-btm login-button justify-content-center d-flex">
                            <input type="submit" name="btn-reg" class="btn btn-outline-primary" value="Đăng ký">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>