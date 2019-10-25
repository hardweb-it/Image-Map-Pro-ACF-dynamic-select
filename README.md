# Image-Map-Pro-ACF-dynamic-select
This snippet make you able to dynamically populate an ACF select field with the Image Map Pro projects

## Image Map Pro
This useful premium plugin make you able to create dynamic images with tooltip, links and informations by hand drawing areas over the image.These areas will be clickable or will show informations while hovering mouse on it.

Unfortunately this plugin doesn't use a CPT (Custom Post Type) to save every project, but it store the datas to a classic wp option, with array and json formats. So you can't use a normal ACF relational field to retrieve the Image Map projects.

## How to use
1. Create an empty select field to your ACF fields' group.
2. Simply copy and paste the snippet to your 'functions.php' theme's file (a child-theme is better)
3. Configure the snippet by replacing your_field_name (see the example below)

## Configuration
If you made a select field named 'image_map_pro_projects', you have to replace this line

        add_filter('acf/load_field/name=your_field_name', 'hw_acf_load_imagemappro_field_choices');
        
WITH

        add_filter('acf/load_field/name=image_map_pro_projects', 'hw_acf_load_imagemappro_field_choices');
        
THAT'S ALL, ENJOY!
