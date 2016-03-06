
<?php defined('_JEXEC') or die;
//jimport('joomla.environment.browser');
//$browser=&JBrowser::getInstance();
//$browser = ($params->get("safeMobile"))? $browser->isMobile() : false;
//echo ($browser) ? "YES ".$browser : "NO ".$browser;
$moduleclass_sfx = htmlspecialchars($params->get("moduleclass_sfx"));
// Interroga G+ e valorizza la variabile $posts per una successiva visualizzazione
?>
<div class="video-background <?php echo $moduleclass_sfx; ?>" data-target="video.video">
  <?php if($params->get("stream")): ?>
    <video class="video"
    src="<?php echo htmlspecialchars($params->get("video"));?>" poster="<?php echo htmlspecialchars($params->get("image"));?>"
    <?php echo ($params->get("autoplay")) ? "autoplay" : "";?>
    <?php echo ($params->get("muted")) ? "muted" : "";?>
    <?php echo ($params->get("loop")) ? "loop" : "";?>
     >
    </video>
    <div class="controller">
      <a href="#" class="cta-button" data-target="video.video">Test</a>
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
<?php else:?>
  <?php /*<iframe id="ytplayer" class="video" type="text/html" width="100%" height="100vh"
  src="https://www.youtube.com/embed/<?php echo $params->get('youtube');?>?&controls=0&showinfo=0&rel=1&enablejsapi=1&playlist=<?php
    echo $params->get('youtube');
    echo (!$params->get("autoplay")) ? "&autoplay=0" : "&autoplay=1";
    echo ($params->get("muted")) ? "&mute=0" : "";
    echo ($params->get("loop")) ? "&loop=1" : "";?>&origin=<?php echo $baseurl;?>"
  frameborder="0"></iframe>
*/?>
  <div id="player"></div>

    <script>
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: window.innerHeight,
          width: window.innerWidth,
          playerVars: {
            'controls':0,'showinfo':0,'rel':1,
            'autoplay':<?php echo (!$params->get("autoplay")) ? "0" : "1";?>,
            'loop':<?php echo ($params->get("loop")) ? "1" : "0";?>},
          videoId: '<?php echo $params->get('youtube');?>',
          events: {
            'onReady': onPlayerReady,
          }
        });
      }
      function onPlayerReady(event) {
        event.target.setVolume(0)
        event.target.playVideo();
      }
      var play = true;
      function buttonPlayPause() {
        if(play){
          player.pauseVideo();
        }
        if(!play){
          player.playVideo();
        }
        play=!play;
      }
    </script>
<?php endif;?>
<?php
// Richiama il layout selezionato per questo modulo
require JModuleHelper::getLayoutPath("mod_videobackground", $params->get('layout', 'default'));
?>
</div>
<style>
  .video-background{
    width:100%;
    position: relative;
    min-height: 400px;
  }
  .video,iframe.video, iframe.video iframe{
    width: 100%;
    height: 100vh;
    background-size: cover;
    z-index: 0;
  }
  .message{
    position: absolute;
    top:20%;
    padding:0px;
    margin:0px;
    width:100%;
    background-color: rgba(255,255,255,0.7);
    z-index:1;
  }
</style>
<?php
