<?php
	if (!isset($subpages)) {
		if (isset($template)) {
			$subpages = $site->children()->filterBy('template',$template);
		} else {
			$subpages = $site->children();
		}
	} else {
		if (isset($template)) {
			$subpages = $subpages->filterBy('template',$template);
		} else {
			$subpages = $subpages;
		}
	}
?>

<ul class="<?php if ($class) echo $class ?>">
  <?php $class = false; ?>
  <?php foreach($subpages->visible() AS $p): ?>
  <li class="depth-<?php echo $p->depth() ?>">
    <a<?php echo ($p->isActive()) ? ' class="active"' : '' ?> href="<?php echo $p->url() ?>"><?php echo $p->title() ?></a>
    <?php if($p->hasChildren()): ?>
        <?php snippet('treemenu',array('subpages' => $p->children(), 'template' => 'category', 'class' => 'no-bullet')) ?>
    <?php endif ?>
  </li>
  <?php endforeach ?>
</ul>