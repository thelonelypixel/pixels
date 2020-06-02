<?php
$heading = get_field('heading');
$content = get_field('content');
?>

<section class="block block__text">
	<div class="container--narrow">
        <h2><?php echo $heading; ?></h2>
        <div class="wave">
            <svg width="120" height="12px" viewBox="5 0 120 12" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round">
                    <g id="Home-Concept-4" transform="translate(-786.000000, -1558.000000)" stroke="#9DDFFF" stroke-width="5">
                        <path d="M789,1567 C796.684299,1567 796.172013,1561 804,1561 C811.827987,1561 811.172013,1567 819,1567 C826.827987,1567 826.172013,1561 834,1561 C841.827987,1561 841.172013,1567 849,1567 C856.827987,1567 856.172013,1561 864,1561 C871.827987,1561 871.172013,1567 879,1567 C886.827987,1567 886.172013,1561 894,1561 C901.827987,1561 901.172013,1567 909,1567 C916.827987,1567 916.172013,1561 924,1561 C931.827987,1561 931.172013,1567 939,1567 C946.827987,1567 946.172013,1561 954,1561 C961.827987,1561 961.172013,1567 969,1567 C976.827987,1567 976.172013,1561 984,1561 C991.827987,1561 991.172013,1567 999,1567 C1006.82799,1567 1006.17201,1561 1014,1561" id="Path"></path>
                    </g>
                </g>
            </svg>
        </div>
    	<?php echo $content; ?>
	</div>
</section>
