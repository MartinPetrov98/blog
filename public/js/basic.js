$( document ).ready(function(e) {
   ;
    $('.del-article').click(function (e) {

        e.preventDefault();
        let form = $(this).parent().parent().attr('action'); //wrap this in jQuery


           $('.delete-modal').show();
            $('.btn-secondary, .xmark').click(function () {
                $('.delete-modal').hide();
            });
            $('.btn-primary').click(function () {
                e.preventDefault();
                   e.stopImmediatePropagation();
               // form.submit();
               //  $(this).attr('action').submit();
               // form.submit();
                $('.delete-article').submit();


            });

        // $('#contactsForm').attr('action', "/test1").submit();
    });

    $('.edit-article').on('click',function(e){
              e.preventDefault();
       //  let form = $(this).parent().parent().attr('action');
        let form =   $(this).parent().parent();
       $(this).parent().next().show();
        // $('.edit-modal').show();
        $('.btn-secondary, .xmark').click(function () {
            $('.edit-modal').hide();
        });
        $('.btn-primary').click(function () {
            e.preventDefault();
            e.stopImmediatePropagation();
             //
             // $(this).parent().parent().submit();
               form.submit();
        });
        // alert('asd');



    });



    $(document.body).on('click','.add-article-btn',function () {


               $('.create-modal').show(function () {
                   $('.btn-secondary, .xmark').click(function () {
                       $('.create-modal').hide();
                   });
                   $('.btn-primary').click(function () {
                       // e.preventDefault();
                       // e.stopImmediatePropagation();
                       //
                       // $(this).parent().parent().submit();
                        $('.create-article-form').submit();
                   });
               });


    });


    $('#navbarDropdown').on('click',function () {
        $('.dropdown-menu-right').show();
    });

});