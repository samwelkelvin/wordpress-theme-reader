<?php

/**
 *
 * footer contents are wrapped in bootsrap container-fluid for full page coverage
 *
 */
?>


<footer class="footer">
    <svg class="footer-border" height="214" viewBox="0 0 2204 214" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M2203 213C2136.58 157.994 1942.77 -33.1996 1633.1 53.0486C1414.13 114.038 1200.92 188.208 967.765 118.127C820.12 73.7483 263.977 -143.754 0.999958 158.899"
            stroke-width="2" />
    </svg>
    <div class="container-fluid">
        <div class="row align-items-center">

            <?php get_template_part('templates-parts/footer', 'menu'); ?>

        </div>
    </div>
    <div class="text-center">
        <p>All rights reserved @  <script>document.write(new Date().getFullYear())</script></p>
    </div>
</footer>