<?php
/**
 * [ADMIN] OptionalLink
 *
 * @link			http://www.materializing.net/
 * @author			arata
 * @license			MIT
 */
$classies = array();
if (!$this->OptionalLink->allowPublish($data)) {
	$classies = array('unpublish', 'disablerow');
} else {
	$classies = array('publish');
}
$class=' class="'.implode(' ', $classies).'"';
?>
<tr<?php echo $class; ?>>
	<td class="row-tools">
	<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_unpublish.png', array('width' => 24, 'height' => 24, 'alt' => '無効', 'class' => 'btn')),
			array('action' => 'ajax_unpublish', $data['OptionalLink']['id']), array('title' => '無効', 'class' => 'btn-unpublish')) ?>
	<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_publish.png', array('width' => 24, 'height' => 24, 'alt' => '有効', 'class' => 'btn')),
			array('action' => 'ajax_publish', $data['OptionalLink']['id']), array('title' => '有効', 'class' => 'btn-publish')) ?>

	<?php // ブログ記事編集画面へ移動 ?>
	<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_check.png', array('width' => 24, 'height' => 24, 'alt' => 'ブログ記事編集', 'class' => 'btn')),
			array('admin' => true, 'plugin' => 'blog', 'controller' => 'blog_posts', 'action' => 'edit', $data['BlogPost']['blog_content_id'], $data['BlogPost']['id']), array('title' => 'ブログ記事編集')) ?>

	<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_edit.png', array('width' => 24, 'height' => 24, 'alt' => '編集', 'class' => 'btn')),
			array('action' => 'edit', $data['OptionalLink']['id']), array('title' => '編集')) ?>
	<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_delete.png', array('width' => 24, 'height' => 24, 'alt' => '削除', 'class' => 'btn')),
		array('action' => 'ajax_delete', $data['OptionalLink']['id']), array('title' => '削除', 'class' => 'btn-delete')) ?>
	</td>
	<td style="width: 45px;">
		<?php echo $this->BcBaser->link($data['OptionalLink']['id'], array('action' => 'edit', $data['OptionalLink']['id']), array('title' => '編集')) ?>
	</td>
	<td>
		<?php echo $blogContentDatas[$data['OptionalLink']['blog_content_id']] ?>
	</td>
	<td>
		<?php echo $data['OptionalLink']['name'] ?>
	</td>
	<td>
		<?php echo $this->BcText->booleanDo($data['OptionalLink']['blank'], '指定') ?>
	</td>
	<td style="white-space: nowrap">
		<?php echo $this->BcTime->format('Y-m-d', $data['OptionalLink']['created']) ?>
		<br />
		<?php echo $this->BcTime->format('Y-m-d', $data['OptionalLink']['modified']) ?>
	</td>
</tr>
