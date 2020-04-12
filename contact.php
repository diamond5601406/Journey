<?php require_once("./template/header.php"); ?>

<div class="container-fluid">
  <div class="row no-gutters">

    <?php require("./template/navigation.php"); ?>

    <div class="col-md-10 smp-home-main">
      <div class="main">
        <div class="row no-gutters">
          <div class="col-12 contact-area-wrapper">
            <div class="contact-area">
              <h1>GET IN TOUCH</h1>

              <form method="post" action="./mail.php">
                <dl>
                  <dd>
                    <input class="contact" type="text" name="Name" maxlength="50" placeholder="Name" value="<?php echo @$posts['Name']; ?>">
                    <?php if( isset( $error['Name'] ) ){ ?>
                      <span class="errorMsg"><?php echo $error['Name']; ?></span>
                    <?php } ?>
                  </dd>

                  <dd>
                    <input class="contact" type="email" name="Email" maxlength="50" placeholder="Email" value="<?php echo @$posts['Email']; ?>">
                    <?php if( isset( $error['Email'] ) ){ ?>
                      <span class="errorMsg"><?php echo $error['Email']; ?></span>
                    <?php } ?>
                  </dd>

                  <dd>
                    <textarea class="contact" name="Message" placeholder="Message"><?php echo @$posts['Message']; ?></textarea>
                    <?php if( isset( $error['Message'] ) ){ ?>
                      <span class="errorMsg"><?php echo $error['Message']; ?></span>
                    <?php } ?>
                  </dd>
                </dl>
                <p>
                  <input type="submit" class="btn btn-light" value="Submit" />
                </p> 
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
