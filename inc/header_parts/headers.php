<base href="/"> 
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- Chrome, Firefox OS and Opera -->
<meta name="theme-color" content="#3a8df4">
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#3a8df4">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="#3a8df4">

<link rel="manifest" href="./manifest.json" />
<script defer src="./site.js"></script>

<link rel="shortcut icon" type="image/png" href="/img/favicon.png"/>
<title>Goblineer</title>

<!-- <meta name="description" content="In-depth data analizer tool for the World of Warcraft Auction House"> -->
<!-- When sharing to Facebook / Discord, if the page is a blogpost it will show its thumbnail and excerpt -->
<?php
// Include WordPress
  define('WP_USE_THEMES', false);
  require($_SERVER['DOCUMENT_ROOT'] . '/blog/wp-blog-header.php');
?>

<?php if ( have_posts() ) : $displayedOnePost = false; while ( have_posts() ) : the_post(); ?>

    <?php if(!$displayedOnePost)  : ?>
        <meta name="description" content="<?php if (is_single()) {
                //single_post_title('', true); 
                echo wp_strip_all_tags(get_the_excerpt(), true);
            } else {
                echo "In-depth data analizer tool for the World of Warcraft Auction House";
            }
            ?>" />
    <?php $displayedOnePost = true; endif; ?>

<?php endwhile; endif; ?>




<meta name="keywords" content="wow,ah,goblineer,money,gold">
<meta name="author" content="Peter Andi">

<link rel="stylesheet" href="./css/master.css">

<!-- Font -->
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 

<!-- Wowhead tooltips -->
<script async type="text/javascript" src="//wow.zamimg.com/widgets/power.js"></script>
<script>var wowhead_tooltips = { "colorlinks": true, "iconizelinks": true, "renamelinks": true }</script>

<!-- Bootstap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!--DARK THEME <link href="https://bootswatch.com/3/cyborg/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">-->

<!-- Lightbox (Picture Gallery) -->
<link href="./css/lightbox.min.css" rel="stylesheet">

<script async>
    //Google Analytics
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-102757928-1', 'auto');
ga('send', 'pageview');

</script>