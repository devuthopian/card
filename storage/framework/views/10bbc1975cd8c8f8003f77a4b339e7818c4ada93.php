<?php $cardsObj = $profile->cards; ?>
<?php if(count($cardsObj)>0): ?>
<?php $i=0; ?>
    <?php $__currentLoopData = $cardsObj; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-6 col-md-4 block-container" id="card_<?php echo $card->id ?>">
            <div class="pop_up">
                <h2><span>Bonus + 50</span> <?php echo e($card->card_name); ?></h2>
                <img src="<?php echo e(URL::asset('uploads/card/')); ?>/<?php echo e($card->image); ?>" alt="" style="min-height: 400px;">
                <div class="content_caption">
                    <h3><span>F</span> Tier 1</h3>
                    <h4>Rewards <span>The holder reviews news 10 minuts later</span></h4>
                    <p><?php echo e($card->description); ?></p>
                </div>
                <div class="hover_pop">
                    <ul>
                        <li><a href="javascript:void()" onclick="zoomImage('<?php echo $card->image ?>')">Zoom</a></li>
                        <li><a href="javascript:void()" onclick="editCard('<?php echo $card->id ?>')">Edit</a></li>
                        <?php if(empty($card->is_released)): ?>
                        <li><a href="javascript:void()" id="released_option_<?php echo $card->id ?>" onclick="releaseCard('<?php echo $card->id ?>')">Release</a></li>
                        <?php endif; ?>
                        <li><a href="javascript:void()" onclick="duplicateCard('<?php echo $card->id ?>')">Duplicate</a></li>
                        <li><a href="javascript:void()" onclick="removeCard('<?php echo $card->id ?>')">Remove</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php $i++; ?>
        <?php if($i%3==0): ?>
        <!-- <div class="clearfix"></div> -->
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <div class="text-center">Cards not available</div>
<?php endif; ?>