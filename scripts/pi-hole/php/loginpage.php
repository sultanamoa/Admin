<?php
/* Pi-hole: A black hole for Internet advertisements
*  (c) 2017 Pi-hole, LLC (https://pi-hole.net)
*  Network-wide ad blocking via your own hardware.
*
*  This file is copyright under the latest version of the EUPL.
*  Please see LICENSE file for your rights under this license. */ ?>

<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" style="float:none">
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="text-center">
        <img src="img/logo.svg" alt="Pi-hole logo" style="width: <?php if ($boxedlayout) { ?>50%<?php } else { ?>30%<?php } ?>;">
      </div>
      <br>

      <div class="panel-title text-center"><span class="logo-lg" style="font-size: 25px;"><b>نظام الشبكـــة الآمنة</b></span></div>
      <p class="login-box-msg">قم التسجيل لبدا الجلسة</p>
      <div id="cookieInfo" class="panel-title text-center text-red" style="font-size: 150%" hidden>تأكد من الكعكات مفعلة<code><?php echo $_SERVER['HTTP_HOST']; ?></code></div>
      <?php if ($wrongpassword) { ?>
        <div class="form-group has-error login-box-msg">
          <label class="control-label"><i class="fa fa-times-circle"></i> الرقم السري خاطئ</label>
        </div>
      <?php } ?>
    </div>

    <div class="panel-body">
      <form action="" id="loginform" method="post">
        <div class="form-group has-feedback <?php if ($wrongpassword) { ?>has-error<?php } ?>">
          <input type="password" id="loginpw" name="pw" class="form-control" placeholder="Password" autofocus>
          <span class="fa fa-key form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8 hidden-xs hidden-sm">
          <ul>
            <li><kbd>Return</kbd> &rarr; قم تالتسجيل والذهاب لصفحة البدء (<?php echo $scriptname; ?>)</li>
            <li><kbd>Ctrl</kbd>+<kbd>Return</kbd> &rarr; قم بالتسجيل والذهاب للوحة الإعدادات</li>
          </ul>
          </div>
          <div class="col-xs-12 col-md-4">
              <div class="pull-right">
                <div>
                  <input type="checkbox" id="logincookie" name="persistentlogin">
                  <label for="logincookie">تذكرني خلال 7 ايام</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary pull-right"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;&nbsp;Log in</button>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-<?php if (!$wrongpassword) { ?>info<?php } else { ?>danger<?php }
            if (!$wrongpassword) { ?> collapsed-box<?php } ?> box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">هل نسيت الرقم السري</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                      class="fa <?php if ($wrongpassword) { ?>fa-minus<?php } else { ?>fa-plus<?php } ?>"></i>
                  </button>
                </div>
              </div>
              <div class="box-body">
                بعد تثبيت النظام لأول مرة ، يتم إنشاء كلمة مرور وعرضها للمستخدم. ال
                لا يمكن استرداد كلمة المرور لاحقًا ، ولكن من الممكن تعيين كلمة مرور جديدة (أو تعطيلها بشكل صريح
                كلمة المرور عن طريق تعيين كلمة مرور فارغة) باستخدام الأمر
                <pre>sudo pihole -a -p</pre>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
