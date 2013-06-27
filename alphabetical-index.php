<?php
/*Template name: Alphabetical Index
 */

get_header(); ?>
<h1>Alphabetical Index</h1>

<?php wp_list_pages( 'exclude=161,228,242,244,263,266,270,273,275,607,279,295,297,299,301,303,305,307,309,311,313,315,604,816,4464,4535,4538,4544,4545,4551&sort_column=post_title&depth=-1&title_li=' ); ?> 


<?php get_footer(); ?>