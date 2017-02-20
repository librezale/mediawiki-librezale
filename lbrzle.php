<?php
/**
 * Lbrzle
 *
 * Based on MonoBook
 *
 * @todo document
 * @file
 * @ingroup Skins
 */

if( !defined( 'MEDIAWIKI' ) )
	die( -1 );


$wgValidSkinNames['lbrzle'] = 'lbrzle';
/**
 * Inherit main code from SkinTemplate, set the CSS and template filter.
 * @todo document
 * @ingroup Skins
 */
class SkinLbrzle extends SkinTemplate {
	/** Using lbrzle. */
	function initPage( OutputPage $out ) {
		parent::initPage( $out );
		$this->skinname  = 'lbrzle';
		$this->stylename = 'lbrzle';
		$this->template  = 'LbrzleTemplate';

	}

	function setupSkinUserCss( OutputPage $out ) {
		global $wgHandheldStyle;

		parent::setupSkinUserCss( $out );

		// Append to the default screen common & print styles...
		$out->addStyle( 'lbrzle/main.css', 'screen' );
		if( $wgHandheldStyle ) {
			// Currently in testing... try 'chick/main.css'
			$out->addStyle( $wgHandheldStyle, 'handheld' );
		}

		$out->addStyle( 'lbrzle/IE50Fixes.css', 'screen', 'lt IE 5.5000' );
		$out->addStyle( 'lbrzle/IE55Fixes.css', 'screen', 'IE 5.5000' );
		$out->addStyle( 'lbrzle/IE60Fixes.css', 'screen', 'IE 6' );
		$out->addStyle( 'lbrzle/IE70Fixes.css', 'screen', 'IE 7' );

		//$out->addStyle( 'lbrzle/rtl.css', 'screen', '', 'rtl' );
	}
}

/**
 * @todo document
 * @ingroup Skins
 */
class LbrzleTemplate extends QuickTemplate {
	var $skin;
	/**
	 * Template filter callback for Lbrzle skin.
	 * Takes an associative array of data set from a SkinTemplate-based
	 * class, and a wrapper for MediaWiki's localization database, and
	 * outputs a formatted page.
	 *
	 * @access private
	 */
	function execute() {
		global $wgRequest;
		$this->skin = $skin = $this->data['skin'];
		$action = $wgRequest->getText( 'action' );

		// Suppress warnings to prevent notices about missing indexes in $this->data
		wfSuppressWarnings();

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="<?php $this->text('xhtmldefaultnamespace') ?>" <?php
	foreach($this->data['xhtmlnamespaces'] as $tag => $ns) {
		?>xmlns:<?php echo "{$tag}=\"{$ns}\" ";
	} ?>xml:lang="<?php $this->text('lang') ?>" lang="<?php $this->text('lang') ?>" dir="<?php $this->text('dir') ?>">
	<head>
		<meta http-equiv="Content-Type" content="<?php $this->text('mimetype') ?>; charset=<?php $this->text('charset') ?>" />
		<?php $this->html('headlinks') ?>
		<title><?php $this->text('pagetitle') ?></title>
		<?php $this->html('csslinks') ?>

		<!--[if lt IE 7]><script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('stylepath') ?>/common/IEFixes.js?<?php echo $GLOBALS['wgStyleVersion'] ?>"></script>
		<meta http-equiv="imagetoolbar" content="no" /><![endif]-->

		<?php print Skin::makeGlobalVariablesScript( $this->data ); ?>

		<script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('stylepath' ) ?>/common/wikibits.js?<?php echo $GLOBALS['wgStyleVersion'] ?>"><!-- wikibits js --></script>
		<!-- Head Scripts -->
<?php $this->html('headscripts') ?>
<?php	if($this->data['jsvarurl']) { ?>
		<script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('jsvarurl') ?>"><!-- site js --></script>
<?php	} ?>
<?php	if($this->data['pagecss']) { ?>
		<style type="text/css"><?php $this->html('pagecss') ?></style>
<?php	}
		if($this->data['usercss']) { ?>
		<style type="text/css"><?php $this->html('usercss') ?></style>
<?php	}
		if($this->data['userjs']) { ?>
		<script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('userjs' ) ?>"></script>
<?php	}
		if($this->data['userjsprev']) { ?>
		<script type="<?php $this->text('jsmimetype') ?>"><?php $this->html('userjsprev') ?></script>
<?php	}
		if($this->data['trackbackhtml']) print $this->data['trackbackhtml']; ?>
	</head>
<body<?php if($this->data['body_ondblclick']) { ?> ondblclick="<?php $this->text('body_ondblclick') ?>"<?php } ?>
<?php if($this->data['body_onload']) { ?> onload="<?php $this->text('body_onload') ?>"<?php } ?>
 class="mediawiki <?php $this->text('dir') ?> <?php $this->text('pageclass') ?> <?php $this->text('skinnameclass') ?>">
	<div id="globalWrapper">
		<div id="ezker-menuak">
			<div id="p-logo">
				<!-- <a style="background-image: url(<?php $this->text('logopath') ?>);" <?php
					?>href="<?php echo htmlspecialchars($this->data['nav_urls']['mainpage']['href'])?>"<?php echo $skin->tooltipAndAccesskeyAttribs('p-logo');/*echo $skin->tooltipAndAccesskey('p-logo')*/ ?>></a>-->
				<a style="background-image: url('<?php $this->text('stylepath') ?>/lbrzle/librezale-logoa.png');"
					href="http://librezale.eus" title="Librezale"></a>
			</div>
			<div id="bilatzailea">



                    <form action="http://librezale.eus/berria/wp-content/themes/librezale/bilatu.php" method="post">
                        <fieldset>
                            <label for="zer">Bilatu:</label>

                            <select name="non">
                                <option value="0">Librezale osoan</option>
                                <option value="1">Webgunean</option>
                                <option value="2">Foroan</option>

                                <option value="3">Albisteetan</option>
                            </select>
                            <input type="text" name="zer" id="zer" /> 
                            <input class="botoia" name="bilatu" type="submit" value="" /> 
                        </fieldset>

                    </form>


			</div>
		</div>

		<div id="eskuin-menuak">
			<div id="menua">
				<div class="ezkerrean">
					<h3>Librezale / <span class="txikitu">Menua</span></h3>
					<ul id="menu-zerrenda">
						<li><a href="http://librezale.eus/wiki/" title="Librezaleren wikiaren aurkibidera">Aurkibidea</a></li>
						<li><a href="http://pootle.librezale.eus" title="Pootle zerbitzarira">Pootle</a></li>
						<li><a href="http://librezale.eus/wiki/Lan-tresnak" title="Lan-tresnen orrira">Lan-tresnak</a></li>
						<li><a href="http://librezale.eus/wiki/Lokalizazio-gida" title="Lokalizazio-gidara">Lokalizazio-gida</a></li>
					</ul>
				</div>
				<div class="ezkerrean">
					<a id="parte-hartu" href="http://librezale.eus/wiki/Parte hartu nahi duzu%3F">Parte hartu nahi duzu?</a>
					<p id="menua-proiektuak">Proiektuak:</p>
					<a href="http://librezale.eus/wiki/Mozilla" title="Mozilla proiektuaren orrira"><img src="/irudiak/menua-mozilla.png" alt="Mozilla" /></a><a href="http://librezale.eus/wiki/WordPress" title="WordPress proiektuaren orrira"><img src="/irudiak/menua-wordpress.png" alt="WordPress" /></a><a href="http://librezale.eus/wiki/Proiektuak" title="Proiektu guztien orrira"><img class="azkena" src="/irudiak/menua-gehiago.png" alt="Gehiago..." /></a>
				</div>
				<div style="clear: both;"></div>
			</div>
		</div>
	<div id="column-content">
	<div id="content">


		<a name="top" id="top"></a>
		<?php if($this->data['sitenotice']) { ?><div id="siteNotice"><?php $this->html('sitenotice') ?></div><?php } ?>
		<h1 id="firstHeading" class="firstHeading"><?php $this->data['displaytitle']!=""?$this->html('title'):$this->text('title') ?></h1>
		<div id="bodyContent">
			<h3 id="siteSub"><?php $this->msg('tagline') ?></h3>
			<div id="contentSub"><?php $this->html('subtitle') ?></div>
			<?php if($this->data['undelete']) { ?><div id="contentSub2"><?php     $this->html('undelete') ?></div><?php } ?>
			<?php if($this->data['newtalk'] ) { ?><div class="usermessage"><?php $this->html('newtalk')  ?></div><?php } ?>
			<?php if($this->data['showjumplinks']) { ?><div id="jump-to-nav"><?php $this->msg('jumpto') ?> <a href="#column-one"><?php $this->msg('jumptonavigation') ?></a>, <a href="#searchInput"><?php $this->msg('jumptosearch') ?></a></div><?php } ?>
			<!-- start content -->
			<?php $this->html('bodytext') ?>
			<?php if($this->data['catlinks']) { $this->html('catlinks'); } ?>
			<!-- end content -->
			<?php if($this->data['dataAfterContent']) { $this->html ('dataAfterContent'); } ?>

			<div class="visualClear"></div>
		</div>
	</div>
		</div>

	<div id="p-cactions" class="portlet">
		<?php if($this->data['loggedin']) { ?>
		<h5><?php $this->msg('views') ?></h5>
		<div class="pBody">
			<ul>
	<?php		foreach($this->data['content_actions'] as $key => $tab) {
					echo '
				 <li id="' . Sanitizer::escapeId( "ca-$key" ) . '"';
					if( $tab['class'] ) {
						echo ' class="'.htmlspecialchars($tab['class']).'"';
					}
					echo'><a href="'.htmlspecialchars($tab['href']).'"';
					# We don't want to give the watch tab an accesskey if the
					# page is being edited, because that conflicts with the
					# accesskey on the watch checkbox.  We also don't want to
					# give the edit tab an accesskey, because that's fairly su-
					# perfluous and conflicts with an accesskey (Ctrl-E) often
					# used for editing in Safari.
				 	if( in_array( $action, array( 'edit', 'submit' ) )
				 	&& in_array( $key, array( 'edit', 'watch', 'unwatch' ))) {
				 		echo $skin->tooltip( "ca-$key" );
				 	} else {
				 		/*echo $skin->tooltipAndAccesskey( "ca-$key" );*/
						echo $skin->tooltipAndAccesskeyAttribs("ca-$key");
				 	}
				 	echo '>'.htmlspecialchars($tab['text']).'</a></li>';
				} ?>

				<li id="t-upload"><a href="<?php
				echo htmlspecialchars($this->data['nav_urls']['upload']['href'])
				?>"<?php echo $this->skin->tooltipAndAccesskeyAttribs('t-upload'); /*$this->skin->tooltipAndAccesskey('t-upload')*/ ?>><?php $this->msg('upload') ?></a></li>
			</ul>
		</div>
		<?php } ?>	
	</div>
	<div class="portlet" id="p-personal">
		<h5><?php $this->msg('personaltools') ?></h5>
		<div class="pBody">
			<ul>
<?php 			foreach($this->data['personal_urls'] as $key => $item) { ?>
				<li id="<?php echo Sanitizer::escapeId( "pt-$key" ) ?>"<?php
					if ($item['active']) { ?> class="active"<?php } ?>><a href="<?php
				echo htmlspecialchars($item['href']) ?>"<?php echo $skin->tooltipAndAccesskeyAttribs('pt-'.$key); /*$skin->tooltipAndAccesskey('pt-'.$key)*/ ?><?php
				if(!empty($item['class'])) { ?> class="<?php
				echo htmlspecialchars($item['class']) ?>"<?php } ?>><?php
				echo htmlspecialchars($item['text']) ?></a></li>
<?php			} ?> 
			</ul>
		</div>
	</div>

	<script type="<?php $this->text('jsmimetype') ?>"> if (window.isMSIE55) fixalpha(); </script>
<?php
		$sidebar = $this->data['sidebar'];
		if ( !isset( $sidebar['SEARCH'] ) ) $sidebar['SEARCH'] = true;
		if ( !isset( $sidebar['TOOLBOX'] ) ) $sidebar['TOOLBOX'] = true;
		if ( !isset( $sidebar['LANGUAGES'] ) ) $sidebar['LANGUAGES'] = true;
		foreach ($sidebar as $boxName => $cont) {
			if ( $boxName == 'SEARCH' ) {
				//$this->searchBox();
			} elseif ( $boxName == 'TOOLBOX' ) {
				$this->toolbox();
			} elseif ( $boxName == 'LANGUAGES' ) {
				$this->languageBox();
			} else {
				$this->customBox( $boxName, $cont );
			}
		}
?>

<!-- end of the left (by default at least) column -->
			<div class="visualClear"></div>
		<div id="oina">
			<p id="informazio-menua"><a href="http://librezale.eus/wiki/Zer da Librezale%3F" title="Librezale zer den">Zer da Librezale?</a> | <a href="http://librezale.eus/wiki/Kontaktua" title="Kontaktua">Kontaktua</a> | <a href="http://librezale.eus/wiki/RSS jarioa" title="RSS">RSS jarioa</a> | <a href="http://librezale.eus/wiki/Lizentzia" title="Lizentzia">Lizentzia</a></p>

			<p id="kreditu-menua"><strong>Erabilitako softwarea:</strong>&nbsp;<a href="http://mediawiki.org">MediaWiki</a>,&nbsp;<a href="http://eu.wordpress.org">WordPress</a> eta <a href="http://fluxbb.org">FluxBB</a></p>
		</div>

<!-- <?php
		if($this->data['poweredbyico']) { ?>
				<div id="f-poweredbyico"><?php $this->html('poweredbyico') ?></div>
<?php 	}
		if($this->data['copyrightico']) { ?>
				<div id="f-copyrightico"><?php $this->html('copyrightico') ?></div>
<?php	}
?> -->

<div id="footer">
<!-- <?php
		// Generate additional footer links
		$footerlinks = array(
			'lastmod', 'viewcount', 'numberofwatchingusers', 'credits', 'copyright',
			//'privacy', 'disclaimer', 'tagline',
			//'privacy', 'about', 'disclaimer', 'tagline',
		);
		$validFooterLinks = array();
		foreach( $footerlinks as $aLink ) {
			if( isset( $this->data[$aLink] ) && $this->data[$aLink] ) {
				$validFooterLinks[] = $aLink;
			}
		}
		if ( count( $validFooterLinks ) > 0 ) {
?>			<ul id="f-list">
<?php
			foreach( $validFooterLinks as $aLink ) {
				if( isset( $this->data[$aLink] ) && $this->data[$aLink] ) {
?>					<li id="<?php echo$aLink?>"><?php $this->html($aLink) ?></li>
<?php 			}
			}
?>
			</ul>
<?php	}
?> -->
</div>
</div>

<?php $this->html('bottomscripts'); /* JS call to runBodyOnloadHook */ ?>
<?php $this->html('reporttime') ?>
<?php if ( $this->data['debug'] ): ?>
<!-- Debug output:
<?php $this->text( 'debug' ); ?>

-->
<?php endif; ?>
</body></html>
<?php
	wfRestoreWarnings();
	} // end of execute() method

	/*************************************************************************************************/
	function searchBox() {
		global $wgUseTwoButtonsSearchForm;
?>

	<!--div id="p-search" class="portlet">
		<!--h5><label for="searchInput"><?php $this->msg('search') ?></label></h5>
		<div id="searchBody" class="pBody">
			<form action="<?php $this->text('wgScript') ?>" id="searchform"><div>
				<input type='hidden' name="title" value="<?php $this->text('searchtitle') ?>"/>
				<input id="searchInput" name="search" type="text"<?php echo $this->skin->tooltipAndAccesskeyAttribs('search'); /*$this->skin->tooltipAndAccesskey('search');*/
					if( isset( $this->data['search'] ) ) {
						?> value="<?php $this->text('search') ?>"<?php } ?> />
				<!input type='submit' name="go" class="searchButton" id="searchGoButton"	value="<?php $this->msg('searcharticle') ?>"<?php echo $this->skin->tooltipAndAccesskeyAttribs( 'search-go' ) /*$this->skin->tooltipAndAccesskey( 'search-go' );*/ ?> /><?php if ($wgUseTwoButtonsSearchForm) { ?>&nbsp;
				<input type='submit' name="fulltext" class="searchButton" id="mw-searchButton" value="<?php $this->msg('searchbutton') ?>"<?php echo $this->skin->tooltipAndAccesskeyAttribs( 'search-fulltext' ); /*$this->skin->tooltipAndAccesskey( 'search-fulltext' );*/ ?> /><?php } else { ?>

				<div><a href="<?php $this->text('searchaction') ?>" rel="search"><?php $this->msg('powersearch-legend') ?></a></div><?php } ?>

			</div></form>
		</div>
	</div-->

<?php 
	}

	/*************************************************************************************************/
	function toolbox() {

	}

	/*************************************************************************************************/
	function languageBox() {

	}

	/*************************************************************************************************/
	function customBox( $bar, $cont ) {

	}

} // end of class
