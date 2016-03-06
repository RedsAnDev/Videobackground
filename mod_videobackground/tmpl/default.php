<?php defined('_JEXEC') or die; ?>
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
