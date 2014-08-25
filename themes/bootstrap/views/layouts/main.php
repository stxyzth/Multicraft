<?php
/**
 *
 *   Copyright © 2010-2012 by xhost.ch GmbH
 *
 *   All rights reserved.
 *
 **/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!--
 -
 -   Copyright © 2010-2012 by xhost.ch GmbH
 -
 -   All rights reserved.
 -
 -->
<head>
    <meta content="initial-scale=1.0, width=device-width, user-scalable=yes" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <link rev="made" href="mailto:multicraft@xhost.ch">
    <meta name="description" content="Multicraft: The Minecraft server control panel">
    <meta name="keywords" content="Multicraft, Minecraft, server, management, control panel, hosting">
    <meta name="author" content="xhost.ch GmbH">

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Theme::css('screen.css') ?>" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Theme::css('print.css') ?>" media="print" />
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Theme::css('ie.css') ?>" media="screen, projection" />
    <![endif]-->

<!--    <link rel="stylesheet" type="text/css" href="<?php echo Theme::css('main.css') ?>" /> -->
    <link rel="stylesheet" type="text/css" href="<?php echo Theme::css('form.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo Theme::css('theme.css') ?>" />
        <style type="text/css">
        /* Custom Background */
    body {background-image: url("images/bg.png");}

      /* Sticky footer styles
      -------------------------------------------------- */

      html,
      body {
        height: 100%;
        /* The html and body elements cannot have any padding or margin. */
      }

      /* Wrapper for page content to push down footer */
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -60px;
      }

      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 60px;
      }
      #footer {
        background-color: #f5f5f5;
      }
div[style="padding: 10px; margin: 10px 20px; font-size: 0.8em; text-align: center; border-top: 1px solid #dfdfdf;"] {
    display:none;
}
      /* Lastly, apply responsive CSS fixes as necessary */
      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
        }
      }
      
    </style>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<div id="wrap">
<div class="container" id="page">
    <div id="mainmenu">
        <?php
        Yii::app()->getComponent("bootstrap");
        $items = array();
$this->widget(
    'booster.widgets.TbNavbar',
    array(
        'type' => null, // null or 'inverse'
        'brand' => 'Multicraft',
        'brandUrl' => array('/site/page', 'view'=>'home'),
        'collapse' => true, // requires bootstrap-responsive.css
        'fixed' => 'top',
        'fluid' => false,
        'htmlOptions' => array('style' => 'position:absolute'),
        'items' => array(
            array(
                'class' => 'booster.widgets.TbMenu',
            	'type' => 'navbar',
                'items' => array(
            		array('label'=>Yii::t('mc', 'Home'), 'url'=>array('/site/page', 'view'=>'home')),
            		array(
                		  'label'=>Yii::t('mc', 'Servers'),
                	      'url'=>array('/server/index', 'my'=>(!Yii::app()->user->isSuperuser() ? 1 : 0))),
            		array(
            			  'label'=>Yii::t('mc', 'Users'),
                	      'url'=>array('/user/index'),
                	      'visible'=>(Yii::app()->user->isSuperuser()
                	       || !(Yii::app()->user->isGuest || (Yii::app()->params['hide_userlist'] === true)))),
            		array(
                	      'label'=>Yii::t('mc', 'Profile'),
                	      'url'=>array('/user/view', 'id'=>Yii::app()->user->id),
                	      'visible'=>(!Yii::app()->user->isSuperuser() && !Yii::app()->user->isGuest
                	        && ((Yii::app()->params['hide_userlist'] === true)))),
            		array(
                	      'label'=>Yii::t('mc', 'Settings'),
                	      'url'=>array('/daemon/index'),
                	      'visible'=>Yii::app()->user->isSuperuser()),
            		array(
                	      'label'=>Yii::t('mc', 'Support'),
                	      'url'=>array('/site/report'),
                	      'visible'=>!empty(Yii::app()->params['admin_email'])),
                ),
            ),
            array(
                'class' => 'booster.widgets.TbMenu',
                'type' => 'navbar',
                'htmlOptions' => array('class' => 'pull-right'),
                'items' => array(	
            		array(
                	      'label'=>Yii::t('mc', 'Logout ({name})', array('{name}'=>Yii::app()->user->name)),
                	      'url'=>array('/site/logout'),
                	      'visible'=>(!Yii::app()->user->isGuest)),
                	array(
                          'label' => 'Account',
                          'items' => array(
            		array(
                	      'label'=>Yii::t('mc', 'Login'),
                	      'url'=>array('/site/login'),
                	      'visible'=>(Yii::app()->user->isGuest)),
                	array(
                	      'label'=>Yii::t('mc', 'Register'),
                	      'url'=>array('/site/register'),
                	      'visible'=>(Yii::app()->user->isGuest)),
                	      )
                	    )
                ),
            ),
        ),
    )
);
echo CHtml::closeTag('br');
echo CHtml::closeTag('br');
echo CHtml::closeTag('br');
echo CHtml::closeTag('br');

?>
    </div><!-- mainmenu -->
    <div id="outer">
    <?php echo $content; ?>
    </div>
              <div id="push"></div>
              </div>
    </div><!--wrap-->
    <div id="footer">
      <div class="container">
         <p class="muted credit" style="text-align: center; margin-top: 20px;">Powered by <a href="http://www.multicraft.org">Multicraft Control Panel</a></p>
        </div>
    </div><!-- footer -->
<!-- page -->

</body>
<!--  C o p y r i g h t   (c)   2 0 1 0 - 2 0 1 2   b y   x h o s t . c h   G m b H .   A l l   r i g h t s   r e s e r v e d .  -->
</html>
