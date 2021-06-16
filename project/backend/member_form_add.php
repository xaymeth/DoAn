<?php include('h.php');?>
<form  name="register" action="member_form_add_db.php" method="POST" class="form-horizontal">
       <div class="form-group">
          <div class="col-sm-5" align="left">
            <input  name="m_user" type="text" required class="form-control" id="m_user" placeholder="Username" pattern="^[a-zA-Z0-9]+$" title="English or numbers only " minlength="2"  />
          </div>
      </div> 
        <div class="form-group">
          <div class="col-sm-5" align="left">
            <input  name="m_pass" type="password" required class="form-control" id="m_pass" placeholder="Password" pattern="^[a-zA-Z0-9]+$" minlength="2" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-5" align="left">
            <input  name="m_name" type="text" required class="form-control" id="m_name" placeholder="Name-Surname  " />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-5" align="left">
            <input  name="m_email" type="email" class="form-control" id="m_email"   placeholder=" Email  name@hotmail.com"/>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-5" align="left">
            <input  name="m_tel" type="text" class="form-control" id="m_tel"  placeholder="Phone numbers, numbers only " />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-5" align="left">
            <textarea name="m_address" class="form-control" id="m_address" required></textarea> 
          </div>
        </div>
      <div class="form-group">
          <div class="col-sm-5" align="right">
          <button type="submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-ok"></span> Register   </button>
          </div>     
      </div>
      </form>