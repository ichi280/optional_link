<?php
/**
 * [PUBLISH] RSS：OptionalLink
 *
 * @link			http://www.materializing.net/
 * @author			arata
 * @license			MIT
 */
?>
<h1>TEST</h1>
<?php
if ($posts) {
	if (!$OptionalLinkConfig['OptionalLinkConfig']['status']) {
		echo $this->Rss->items($posts, 'transformRSS');
	} else {
		echo $this->Rss->items($posts, 'transformRSSEx');
	}
}

// 通常のブログRSS動作
function transformRSS($data) {
	return array(
		'title' => $data['BlogPost']['name'],
		'link' => '/' . $data['BlogContent']['name'] . '/archives/' . $data['BlogPost']['no'],
		'guid' => '/' . $data['BlogContent']['name'] . '/archives/' . $data['BlogPost']['no'],
		'category' => $data['BlogCategory']['title'],
		'description' => $data['BlogPost']['content'] . $data['BlogPost']['detail'],
		'pubDate' => $data['BlogPost']['posts_date']
	);
}
// 通常のブログRSS動作
function transformRSSEx($data) {
	$hoge = 1;
	if ($data['OptionalLink']['status']) {
		$link = $data['OptionalLink']['name'];
		$guid = $data['OptionalLink']['name'];
	} else {
		$link = '/' . $data['BlogContent']['name'] . '/archives/' . $data['BlogPost']['no'];
		$guid = '/' . $data['BlogContent']['name'] . '/archives/' . $data['BlogPost']['no'];
	}

	return array(
		'title' => $data['BlogPost']['name'],
		'link' => $link,
		'guid' => $guid,
		'category' => $data['BlogCategory']['title'],
		'description' => $data['BlogPost']['content'] . $data['BlogPost']['detail'],
		'pubDate' => $data['BlogPost']['posts_date']
	);
}
