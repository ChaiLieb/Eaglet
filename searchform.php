<!-- search -->
<?php $searchText = __(''); ?>
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
<fieldset class="search">
		<input type="text" class="box" title="" value="<?php echo htmlspecialchars(get_search_query() ? get_search_query() : $searchText ); ?>" onfocus="if (this.value == '<?php echo htmlspecialchars($searchText) ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo htmlspecialchars($searchText) ?>';}"  name="s" id="s" />
		<input type="submit" id="searchsubmit" title="search" class="btn" value="<?php _e('Go') ?>" />
	</fieldset>
</form>
<!-- /search -->