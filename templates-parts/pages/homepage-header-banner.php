<div class="banner text-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <h1 class="mb-5">What Would You <br> Like To Read Today?</h1>
                    <?php

						//$tags = get_tags(array('get' => 'all'));
						$tags = get_tags();

                    $output = '';

                    $output .= '<ul class="list-inline widget-list-inline">';

                    if ($tags) {
                    	foreach ($tags as $index => $tag):

                    		$output .= '<li  class="list-inline-item"><a href="' . get_term_link($tag) . '">' . $tag->name . '</a></li>';

                    		if($index >= 10) {
                    			break;
                    		}
								
                    	endforeach;
                    } else {
                    	_e('No tags created.', 'text-domain');
                    }

                    $output .= '</ul>';

                    echo $output;
						
                    ?>
            </div>
        </div>
    </div>

</div>