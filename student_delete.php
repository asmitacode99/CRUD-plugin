<?php
//echo "student delete";
function student_delete(){
    echo "student delete";
    if(isset($_GET['id'])){
        global $wpdb;
        $table_name=$wpdb->prefix.'student_list';
        $i=$_GET['id'];
        $wpdb->delete(
            $table_name,
            array('id'=>$i)
        );
        echo "deleted";
    }
    echo get_site_url() .'/wp-admin/admin.php?page=Student_List';
    ?>
    <meta http-equiv="refresh" content="0; url=http://localhost/wordpressmyplugin/wordpress/wp-admin/admin.php?page=Student_Listing" />
    <?php
    //wp_redirect( admin_url('admin.php?page=page=Student_List'),301 );
    //exit;
    //header("location:http://localhost/wordpressmyplugin/wordpress/wp-admin/admin.php?page=Student_Listing");
}
?>