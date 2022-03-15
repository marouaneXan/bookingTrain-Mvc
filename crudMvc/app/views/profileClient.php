<div class="container rounded bg-white   mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center  text-center p-3 py-5">
				<img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
				<span class="font-weight-bold"><?php  if (isset($_SESSION['isLogin'])) echo $_SESSION['nom']?></span><span class="text-black-50"><?php  if (isset($_SESSION['isLogin'])) echo $_SESSION['email']?></span><span> </span>
			</div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Edit</h4>
                </div>
				<form action="<?php echo BURL ?>voyage/profileCEdit" method="POST">    
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">nom</label><input type="text" class="form-control" name="nomC" placeholder=" nom" value="<?php  if (isset($_SESSION['isLogin'])) echo $_SESSION['nom']?>"></div>
                    <div class="col-md-6"><label class="labels">prenom</label><input type="text" class="form-control" value="<?php  if (isset($_SESSION['isLogin'])) echo $_SESSION['prenom']?>"  name="prenomC" placeholder="prenom"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Tel</label><input type="number" class="form-control"  name="telC" placeholder="Tel" value="<?php  if (isset($_SESSION['isLogin'])) echo $_SESSION['tel']?>"></div>
                    <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" name="emailC" placeholder="Email" value="<?php  if (isset($_SESSION['isLogin'])) echo $_SESSION['email']?>"></div>
                    <div class="col-md-12"><label class="labels"> password</label><input type="password" class="form-control"  name="passC"placeholder="password" value=""></div>
                    
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">new password</label><input type="password" name="nPassC" class="form-control" placeholder="new password" value=""></div>
                    <div class="col-md-6"><label class="labels">confirm new password</label><input type="password" name="cNPassC" class="form-control" value="" placeholder=" confirm new password"></div>
                </div>
                <div class="mt-5 text-center"><button  class="btn btn-primary profile-button"  name ="submit" type="submit">Save Profile</button></div>
				</form>
            </div>
        </div>
       
    </div>
</div>
</div>
</div>