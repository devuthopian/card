<?php if(count($cards)>0): ?>
<?php $i=0; ?>
    <?php $__currentLoopData = $cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-6 col-md-4 block-container" id="card_<?php echo $card->id ?>">
            <div class="pop_up">
                <h2><span>Bonus + 50</span> <?php echo e($card->card_name); ?></h2>
                <img src="<?php echo e(URL::asset('public/uploads/card/')); ?>/<?php echo e($card->image); ?>" alt="" style="height: 400px;">
                <div class="content_caption">
                    <h3><span>F</span> Tier 1</h3>
                    <h4>Rewards <span>The holder reviews news 10 minuts later</span></h4>
                    <p><?php echo e($card->description); ?></p>
                </div>
                <div class="hover_pop">
                    <ul>
                        <li><a href="javascript:void()" onclick="zoomImage('<?php echo $card->image ?>')">Zoom</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php $i++; ?>
        <?php if($i%3==0): ?>
        <div class="clearfix"></div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <div class="text-center">Cards not available</div>
<?php endif; ?>