<ul >
     <li<?php echo $page['slug'] == 'home' ? ' class="active"' : ''; ?>><a href="/">Home</a></li>
     <li<?php echo $page['slug'] == 'about' ? ' class="active"' : ''; ?>><a href="/about">About</a></li>
     <li<?php echo $page['slug'] == 'services' ? ' class="active"' : ''; ?>><a href="/services">Services</a></li>
     <li<?php echo $page['slug'] == 'portfolio' ? ' class="active"' : ''; ?>><a href="/portfolio">Portfolio</a></li>
</ul>