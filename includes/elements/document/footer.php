
</div>

</div>

<?php if (strrpos($_SERVER['SERVER_NAME'], "localhost") === false) :?>
<script src="http://www.boxjs.com/box.js"></script>
<script>
Box('<?php echo "http://".$_SERVER['SERVER_NAME'];?>/includes/js/src/', [
        'jquery.tooltip.js',
        'jquery.html5form.js',
        'jquery.form.js',
        'shadowbox.js',
        'common.js'
], { minify: false });
</script>
<?php else:?>
<script src="/includes/js/src/jquery.jqmodal.js" charset="utf-8"></script>
<?php endif;?>
<script type="text/javascript">

     var _gaq = _gaq || [];
     _gaq.push(['_setAccount', 'UA-318641-1']);
     _gaq.push(['_setDomainName', '.iamdash.net']);
     _gaq.push(['_trackPageview']);

     (function() {
          var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
          ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
          var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
     })();

</script>
<img src="/images/common/logo.png" style="display:none;" />
</body>
</html>