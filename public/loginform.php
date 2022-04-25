<div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" >Đăng nhập</h4>
            <button type="button" class="close display-4" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
            <form role="form" action="login.php" method="POST">
              <input type="hidden" name="_csrf_token" value=''>
              <div class="form-group" >
                <label for="user" control-label><i class="fa fa-user" aria-hidden="true"></i> Tài khoản</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tài khoản" required>
                <?php
                  if(isset($_GET['name'])){
                    if($_GET['name'] == "f"){
                      echo '<p class="text-danger m-0 p-0" id="f1">Nhập sai tài khoản!</p>';
                    }
                  }
                ?>
              </div>
              <div class="form-group">
                <label for="firstname" control-label><i class="fa fa-eye" aria-hidden="true"></i> Mật khẩu</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu" required>
                <?php
                  if(isset($_GET['pwd'])){
                    if($_GET['pwd'] == "f"){
                      echo '<p class="text-danger m-0 p-0" id="f2">Nhập sai mật khẩu!</p>';
                    }
                  }
                ?>
              </div>
              <div class="form-group">        
                  <div class="checkbox">
                    <label><input type="checkbox" name="remember"> Ghi nhớ tôi</label>
                  </div>
              </div>
              <div class="form-group" > 
                  <button type="submit" name="login" class="btn btn-primary btn-block"class="fa fa-power-off" aria-hidden="true">Đăng nhập</button>                 
              </div>
           </form>
        </div>
        <div class="modal-footer">
          <div>
            <a data-toggle='modal' data-dismiss="modal" data-target='#register' href="#">Đăng kí</a>
          </div>
          <div>
            <a>Quên mật khẩu</a>
          </div> 
        </div>
        </div>
    </div>
</div>

