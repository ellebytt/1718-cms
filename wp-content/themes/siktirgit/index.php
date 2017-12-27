<?php get_header(); ?>

<?php 

if(have_posts()) 
{
    while(have_posts())
    {
        the_post();
        //Print the title and the content of the current post
        the_title('<h1>', '</h1>');
        the_content();
    }
}
else
{
    echo 'No content available';
} ?>

<?php get_footer(); ?>