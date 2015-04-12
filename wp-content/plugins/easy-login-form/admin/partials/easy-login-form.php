<?php

/**
 * The Easy Timeout Session is a plugin that allows you to change the
 * session timeout for a wordpress user. This particular file is
 * responsible for including the dependencies and starting the plugin.
 *
 * @package ETS
 */

?>

<div class="ets-container">
    <div class="ets-header">
        <img src="<?php echo  plugins_url( '../img/title.png', __FILE__ )?>">
        <div class="dashicons dashicons-wordpress easy-icon"></div>

    </div>
    <div class="ets-inside">
        <div class="ets-left">
            <div class="ets-left-inside">
                <form method="post" action="options.php" enctype="multipart/form-data">
                    <?php settings_fields( 'elf' ); ?>
                    <?php do_settings_sections( 'elf' ); ?>
                    <?php $elf=get_option('elf'); if (!is_array($elf)){ $elf = array(); $elf['logo']=''; $elf['val']=''; } ?>
                    <h2>Specify Logo and colors</h2>
                    <br/>
                    <table>
                        <tr>
                            <td>
                                Logo uri (inside theme)
                            </td>
                            <td>
                                <input type="text" name="elf[logo]" id="elf[logo]" value="<?= $elf['logo']; ?>" maxlength="255" style="width:300px"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Background Color
                            </td>
                            <td>
                                <input type="color" name="elf[back]" id="elf[back]" value="<?= $elf['back']; ?>" style="height: 30px;"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Form Back Color
                            </td>
                            <td>
                                <input type="color" name="elf[fback]" id="elf[fback]" value="<?= $elf['fback']; ?>" style="height: 30px;"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Form Front Color
                            </td>
                            <td>
                                <input type="color" name="elf[ffront]" id="elf[ffront]" value="<?= $elf['ffront']; ?>" style="height: 30px;"/>
                            </td>
                        </tr>
                    </table>
                    <?php submit_button(); ?>
                </form>
            </div>
            <div class="ets-left-inside">
                <h2>Preview: (you have to press "save changes" before)</h2>
                <div style="width:100%;height:700px;background: <?= $elf['back']; ?>">
                    <div style="background: <?= $elf['fback']; ?>; padding-top: 0px; top: 8%; position: relative;
                        border-radius: 5px;width: 320px; margin: auto;">
                        <h1><a href="#" style="background-image: url(<?= get_template_directory_uri() ?>/<?= $elf['logo']; ?>) !important;
                                background-size: contain; height: 150px !important; width: 150px !important; margin-bottom: 0px;
                                background-position: center top; background-repeat: no-repeat;text-indent: -9999px;
                                outline: 0; overflow: hidden; display: block;margin: 0 auto 0px;" title="Powered by WordPress">website title</a></h1>

                        <form style="margin-top: 0px;margin-left: 0;padding: 26px 24px 0px;font-weight: 400;overflow: hidden;background: #fff;
                            -webkit-box-shadow: 0 1px 3px rgba(0,0,0,.13);box-shadow: 0 1px 3px rgba(0,0,0,.13);">
                            <p>
                                <label style="color: #777;font-size: 14px;" for="user_login">Username<br>
                                    <input style="font-size: 24px;line-height: 1;background: #fbfbfb;width: 100%;padding: 3px;margin: 2px 6px 16px 0;" type="text" name="log" id="user_login" class="input" value="" size="20"></label>
                            </p>
                            <p>
                                <label style="color: #777;font-size: 14px;" for="user_pass">Password<br>
                                    <input style="font-size: 24px;line-height: 1;background: #fbfbfb;width: 100%;padding: 3px;margin: 2px 6px 16px 0;" type="password" name="pwd" id="user_pass" class="input" value="" size="20"></label>
                            </p>
                            <p class="forgetmenot" style="float:left"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember Me</label></p>
                            <p class="submit" style="float:right">
                                <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Log In" disabled>
                            </p>
                        </form>

                        <p id="nav" style="margin: 24px 0 0;font-size: 13px;padding: 0 24px;">
                            <a style="text-decoration: none; color: <?= $elf['ffront']; ?> !important;"
                               href="#" title="Password Lost and Found">Lost your password?</a>
                        </p>

                        <p id="backtoblog"  style="margin: 24px 0 0;font-size: 13px;padding: 0 24px;"><a style="text-decoration: none; color: <?= $elf['ffront']; ?> !important;"
                                               href="#" title="Are you lost?">← Back to Idea Website</a>
                        </p>

                    </div>
                </div>
            </div>
        </div><div class="ets-right">
            <div class="ets-right-inside">
                <h2>"Easy" plugins</h2>
                <p>This plugin is offered for free but you may consider helping the further development of this and others plugins. Thank you! :)</p>
                <br/>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="CHXF6Q9T3YLQU">
                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                    <img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
                </form>
                <hr>
                <h2>More "Easy" plugins</h2>
                <ul>
                    <li>
                        <a href="https://wordpress.org/plugins/easy-login-form/" target="_blank">Easy Login Form</a>
                    </li>
                    <li>
                        <a href="https://wordpress.org/plugins/easy-wysiwyg-style/" target="_blank">Easy Wysiwyg Style</a>
                    </li>
                    <li>
                        <a href="https://wordpress.org/plugins/easy-admin-menu/" target="_blank">Easy Admin Menu</a>
                    </li>
                    <li>
                        <a href="https://wordpress.org/plugins/easy-options-page/" target="_blank">Easy Options Page</a>
                    </li>
                    <li>
                        <a href="https://wordpress.org/plugins/easy-timeout-session/" target="_blank">Easy Timeout Session</a>
                    </li>
                </ul>
                <hr>
                <p>Please, rate the plugins, and if you have any problem/feedback, don't hesitate to post in the support forum.</p>
                <p><strong>Enjoy! ;)</strong></p>
            </div>
        </div>
    </div>
</div>
