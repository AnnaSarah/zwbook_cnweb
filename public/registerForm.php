<div class="modal fade" id="register" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         
         <h4 class="modal-title" >Đăng kí</h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          
        </div>
        <div class="modal-body">

            <form role="form" action="register.php" method="POST">

              <input type="hidden" name="_csrf_token" value=''>
              
              <div class="form-group" >
              <label for="user" control-label><i class="fa fa-user" aria-hidden="true"></i> Tài khoản</label>
              <input type="text" name="res-username" id="res-username" class="form-control" placeholder="Nhập tài khoản" required>
              
              </div>

              <div class="form-group">
              <label for="firstname" control-label><i class="fa fa-eye" aria-hidden="true"></i> Mật khẩu</label>
              <input type="password" name="res-password" id="res-password" class="form-control" placeholder="Nhập mật khẩu" required>
              
              </div>

              <div class="form-group">        
                  <div class="checkbox">
                    <label><input type="checkbox" name="remember"> Ghi nhớ tôi</label>
                  </div>

              </div>
              <div class="form-group" >        
                  
                  <button type="submit" name="register" class="btn btn-primary btn-block"class="fa fa-power-off" aria-hidden="true">Đăng kí</button>
                  
              </div>

           </form>
        </div>
        <div class="modal-footer">
          <div>
            <a data-toggle='modal' data-dismiss="modal" data-target='#login' href="#">Đăng nhập</a>
          </div>
          <div>
            <a>Quên mật khẩu</a>
          </div> 
        </div>
        </div>
    </div>
</div>