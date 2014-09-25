<?php
/**
 * [PUBLISH] 記事一覧
 *
 * BaserHelper::blogPosts( コンテンツ名, 件数 ) で呼び出す
 * （例）<?php $this->BcBaser->blogPosts('news', 3) ?>
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2014, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2014, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Blog.View
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */
$options = array();
if($target) {
	$options = array('target' => $target);
}
?>
<?php if ($posts): ?>
	<ul class="PdfList post-list">
		<?php foreach ($posts as $key => $post): ?>
  			<?php $class = array('post-' . ($key + 1)) ?>
			<?php if ($this->BcArray->first($posts, $key)): ?>
				<?php $class[] = 'first' ?>
			<?php elseif ($this->BcArray->last($posts, $key)): ?>
				<?php $class[] = 'last' ?>
			<?php endif ?>
 			<li class="<?php echo implode(' ', $class) ?> <?php echo $this->Pdf->getFileType($post['Pdf']['pdf_file']); ?>">
				<div class="title"><?php $this->Pdf->postTitle($post, true, $options) ?></div>
				<div class="date"><?php $this->Blog->postDate($post, 'Y.m.d') ?></div>
			</li>
		<?php endforeach; ?>
	</ul>
	<?php else: ?>
	<p class="no-data">記事がありません</p>
<?php endif ?>
