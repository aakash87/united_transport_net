<li class="rad-dropmenu-header"><a href="#">New Messages</a></li>
<?php foreach ($count_notification as $count_noti) : ?>
   <li>
        <a href="#" data-id= "<?php echo $count_noti['id'] ?>" class="rad-content get_id_of_notification ">
            <div class="inbox-item">
                <div class="inbox-item-img"><img src="<?php echo base_url() ?>admin_assets/assets/dist/img/avatar.png" class="img-circle" alt=""></div>
                <strong class="inbox-item-author"> <?php echo $count_noti['id'] ?> </strong>
                <span class="inbox-item-date">-13:40 PM</span>
                <!-- <p class="inbox-item-text">Hey! there I'm available...</p> -->
                <span class="profile-status available pull-right"></span>
            </div>
        </a>
    </li>
<?php endforeach; ?>



<script type="text/javascript">
    
    $('.get_id_of_notification').click(function(){

        var notificationID = $(this).attr('data-id');
        // alert(notificationID);

        $.ajax({

            url: "<?php echo base_url(); ?>/admin/orders/update_view_colum",
            type: "POST",
            data: {notificationID : notificationID},

            success: function(resp){

                window.location.href = "<?php echo base_url(); ?>/admin/orders/process_of_order_by_admin/"+notificationID;

            }

        });

    });

</script>