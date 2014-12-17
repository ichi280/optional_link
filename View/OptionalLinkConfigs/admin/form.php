<?php
/**
 * [ADMIN] OptionalLink
 *
 * @link			http://www.materializing.net/
 * @author			arata
 * @license			MIT
 */
?>
<?php if($this->request->params['action'] != 'admin_add'): ?>
	<?php echo $this->BcForm->create('OptionalLinkConfig', array('url' => array('action' => 'edit'))) ?>
	<?php echo $this->BcForm->input('OptionalLinkConfig.id', array('type' => 'hidden')) ?>
	<?php echo $this->BcForm->input('OptionalLinkConfig.blog_content_id', array('type' => 'hidden')) ?>
<?php else: ?>
	<?php echo $this->BcForm->create('OptionalLinkConfig', array('url' => array('action' => 'add'))) ?>
<?php endif ?>

<h2>
<?php $this->BcBaser->link($blogContentDatas[$this->request->data['OptionalLinkConfig']['blog_content_id']] .' ブログ設定編集はこちら', array(
	'admin' => true, 'plugin' => 'blog', 'controller' => 'blog_contents',
	'action' => 'edit', $this->request->data['OptionalLinkConfig']['blog_content_id']
)) ?>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php $this->BcBaser->link('≫記事一覧こちら', array(
	'admin' => true, 'plugin' => 'blog', 'controller' => 'blog_posts',
	'action' => 'index', $this->request->data['OptionalLinkConfig']['blog_content_id']
)) ?>
</h2>

<div id="OptionalLinkConfigConfigTable">
<table cellpadding="0" cellspacing="0" class="form-table section">
	<tr>
		<th class="col-head"><?php echo $this->BcForm->label('OptionalLinkConfig.id', 'NO') ?></th>
		<td class="col-input">
			<?php echo $this->BcForm->value('OptionalLinkConfig.id') ?>
		</td>
	</tr>
	<tr>
		<th class="col-head">
			<?php echo $this->BcForm->label('OptionalLinkConfig.status', 'オプショナルリンクの利用') ?>
			<?php echo $this->BcBaser->img('admin/icn_help.png', array('id' => 'helpOptionalLinkConfigStatus', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
			<div id="helptextOptionalLinkConfigStatus" class="helptext">
				<ul>
					<li>ブログ記事でのオプショナルリンクの利用の有無を指定します。</li>
				</ul>
			</div>
		</th>
		<td class="col-input">
			<?php echo $this->BcForm->input('OptionalLinkConfig.status', array('type' => 'radio', 'options' => $this->BcText->booleanDoList('利用'))) ?>
			<?php echo $this->BcForm->error('OptionalLinkConfig.status') ?>
		</td>
	</tr>
</table>
</div>

<div class="submit">
	<?php echo $this->BcForm->submit('保　存', array('div' => false, 'class' => 'btn-red button')) ?>
</div>
<?php echo $this->BcForm->end() ?>
