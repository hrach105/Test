<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package task
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container">
           <div class="footer-wrapper">
               <div class="site-info">
                   <?php
                   the_custom_logo();
                   ?>
               </div>
               <div class="socials">
                   <p>Lets hung out</p>
                   <ul>
                       <li>
                           <a href="#" target="_blank">
                               <svg xmlns="http://www.w3.org/2000/svg" width="45" height="46" viewBox="0 0 45 46" fill="none">
                                   <rect y="0.75" width="45" height="45" rx="22.5" fill="#4CE0D7"/>
                                   <path d="M28.3174 24.8125L29.0117 20.2881H24.6704V17.3521C24.6704 16.1143 25.2769 14.9077 27.2212 14.9077H29.1948V11.0557C29.1948 11.0557 27.4038 10.75 25.6914 10.75C22.1162 10.75 19.7793 12.917 19.7793 16.8398V20.2881H15.8052V24.8125H19.7793V35.75H24.6704V24.8125H28.3174Z" fill="white"/>
                               </svg>
                           </a>
                       </li>
                       <li>
                           <a href="" target="_blank">
                               <svg xmlns="http://www.w3.org/2000/svg" width="45" height="46" viewBox="0 0 45 46" fill="none">
                                   <rect y="0.75" width="45" height="45" rx="22.5" fill="#4CE0D7"/>
                                   <path d="M22.5027 17.6396C19.3972 17.6396 16.8923 20.1445 16.8923 23.25C16.8923 26.3555 19.3972 28.8603 22.5027 28.8603C25.6082 28.8603 28.113 26.3555 28.113 23.25C28.113 20.1445 25.6082 17.6396 22.5027 17.6396ZM22.5027 26.8975C20.4958 26.8975 18.8552 25.2617 18.8552 23.25C18.8552 21.2383 20.491 19.6025 22.5027 19.6025C24.5144 19.6025 26.1501 21.2383 26.1501 23.25C26.1501 25.2617 24.5095 26.8975 22.5027 26.8975ZM29.6511 17.4102C29.6511 18.1377 29.0652 18.7188 28.3425 18.7188C27.615 18.7188 27.0339 18.1328 27.0339 17.4102C27.0339 16.6875 27.6199 16.1016 28.3425 16.1016C29.0652 16.1016 29.6511 16.6875 29.6511 17.4102ZM33.3669 18.7383C33.2839 16.9854 32.8835 15.4326 31.5994 14.1533C30.3201 12.874 28.7673 12.4736 27.0144 12.3857C25.2078 12.2832 19.7927 12.2832 17.9861 12.3857C16.238 12.4688 14.6853 12.8691 13.4011 14.1484C12.1169 15.4277 11.7214 16.9805 11.6335 18.7334C11.531 20.54 11.531 25.9551 11.6335 27.7617C11.7166 29.5146 12.1169 31.0674 13.4011 32.3467C14.6853 33.626 16.2332 34.0264 17.9861 34.1143C19.7927 34.2168 25.2078 34.2168 27.0144 34.1143C28.7673 34.0312 30.3201 33.6309 31.5994 32.3467C32.8787 31.0674 33.2791 29.5146 33.3669 27.7617C33.4695 25.9551 33.4695 20.5449 33.3669 18.7383ZM31.033 29.7002C30.6521 30.6572 29.9148 31.3945 28.9529 31.7803C27.5125 32.3516 24.0945 32.2197 22.5027 32.2197C20.9109 32.2197 17.488 32.3467 16.0525 31.7803C15.0955 31.3994 14.3582 30.6621 13.9724 29.7002C13.4011 28.2598 13.533 24.8418 13.533 23.25C13.533 21.6582 13.406 18.2354 13.9724 16.7998C14.3533 15.8428 15.0906 15.1055 16.0525 14.7197C17.4929 14.1484 20.9109 14.2803 22.5027 14.2803C24.0945 14.2803 27.5173 14.1533 28.9529 14.7197C29.9099 15.1006 30.6472 15.8379 31.033 16.7998C31.6042 18.2402 31.4724 21.6582 31.4724 23.25C31.4724 24.8418 31.6042 28.2646 31.033 29.7002Z" fill="white"/>
                               </svg>
                           </a>
                       </li>
                       <li>
                           <a href="" target="_blank">
                               <svg xmlns="http://www.w3.org/2000/svg" width="45" height="46" viewBox="0 0 45 46" fill="none">
                                   <rect y="0.75" width="45" height="45" rx="22.5" fill="#4CE0D7"/>
                                   <path d="M16.459 34.1873H11.9238V19.5828H16.459V34.1873ZM14.189 17.5906C12.7388 17.5906 11.5625 16.3894 11.5625 14.9392C11.5625 14.2426 11.8392 13.5746 12.3318 13.082C12.8243 12.5895 13.4924 12.3127 14.189 12.3127C14.8855 12.3127 15.5536 12.5895 16.0462 13.082C16.5387 13.5746 16.8154 14.2426 16.8154 14.9392C16.8154 16.3894 15.6387 17.5906 14.189 17.5906ZM33.4326 34.1873H28.9072V27.0779C28.9072 25.3835 28.873 23.2107 26.5493 23.2107C24.1914 23.2107 23.8301 25.0515 23.8301 26.9558V34.1873H19.2998V19.5828H23.6494V21.575H23.7129C24.3184 20.4275 25.7974 19.2166 28.0039 19.2166C32.5938 19.2166 33.4375 22.239 33.4375 26.1648V34.1873H33.4326Z" fill="white"/>
                               </svg>
                           </a>
                       </li>
                   </ul>
               </div>
           </div>
            <p class="copyright">Copyright © 2024 The Logo Blog. All Rights Reserved.</p>
        </div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>