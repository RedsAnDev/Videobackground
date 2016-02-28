<?php defined('_JEXEC') or die; ?>
<style>
  .video-background{
    width:100%;
    position: relative;
    min-height: 400px;
  }
  .video{
    width: 100%;
    height: 100%;
    background-size: cover;
  }
  .message{
    position: absolute;
    top:20%;
    padding:5px 30px;
    width:100%;
    background-color: rgba(255,255,255,0.7);
  }
</style>
<div class="video-background <?php echo $moduleclass_sfx; ?>" data-target="video.video">
  <video muted class="video" src="<?php echo htmlspecialchars($params->get("video"));?>" poster="<?php echo htmlspecialchars($params->get("image"));?>">
  </video>
  <div class="message">
    <?php if($params->get("show_maintitle")):?>
      <p class="h1"><?php echo htmlspecialchars($params->get("maintitle"));?></p>
    <?php endif;?>
      <?php if($params->get("show_subtitle")):?>
        <p class="h2"><?php echo htmlspecialchars($params->get("subtitle"));?></p>
      <?php endif;?>
        <?php if($params->get("show_description")):?>

            <?php echo $params->get("description");?>

        <?php endif;?>
  </div>
  <div class="controller">
    <a href="#" class="cta-button" data-target="video.video">Test</a>
  </div>
</div>


<script type="javascript">
jQuery(document).ready(function($) {
    $('.cta-button').add('video.video').click(function() {
      var video=$(this).data('target');
        if(video.get(0).paused){
          video.get(0).play()
          $('div.message').fadeOut('slow');
        }
        else{
         video.get(0).pause();
         $('div.message').fadeIn('slow');
       }

    });
});
</script>
