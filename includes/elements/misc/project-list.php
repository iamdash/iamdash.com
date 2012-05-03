          <ul class="project-list">
               <?php
               $i = 1;
               foreach ($projects as $p):
                    $class = array();
                    if ($i % 3 == 0) {
                         $class[] = 'omega';
                    }
                    $class[] = 'item-'.$i;
                    if($p['project']['slug'] == $project['slug']):
                         $class[] = 'current';
                    endif;
                    ?>
                    <li class="<?php echo implode(' ', $class); ?> shadow">
                         <div class="project-thumb">
                              <a href="/portfolio/<?php echo $p['project']['slug']; ?>" title="<?php echo snippet($p['project']['description'], 100); ?>">
                                   <img src="/images/projects/<?php echo $p['project']['ref']; ?>/thumb-bw.png" alt="Image thumb <?php echo $i;?>" />
                                   <h3 class="project-name"><?php echo $p['project']['title']; ?></h3>
                              </a>
                         </div>
                    </li>
                    <?php
                    $i++;
               endforeach;
               ?>
          </ul>
